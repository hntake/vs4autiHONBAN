<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use Stripe\SetupIntent;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Design;
use App\Models\Download;
use App\Models\Artist;
use App\Models\Buyer;
use App\Models\Ship;
use Carbon\Carbon;
use App\Mail\RegisterMail;
use App\Mail\DownloadMail;
use App\Mail\DownloadUnMail;
use App\Mail\AddressMail;
use App\Mail\AddressUnMail;
use App\Mail\ShipMail;
use App\Mail\BankMail;
use App\Mail\ReceiptMail;
use App\Mail\PrepaidMail;
use App\Mail\PrepaidCardMail;
use App\Mail\BankCartMail;
use Doctrine\Inflector\Rules\Substitution;
use Illuminate\Support\Facades\Mail;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Response;
use Laravel\Cashier\Cashier;
use Stripe\Customer;
use Stripe\PaymentMethod;


class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        $user=Auth::user();
        if($user){
            return view('stripe',[
            'intent' => $user->createSetupIntent()
        ]);
        }
        else{
            session()->flash('flash_message', 'まずは無料登録をしてください。');
            return view('auth.register');
        }

    }
    

    /**顧客支払画面へ(ユーザー一回払い画面へ)
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function design_stripe(Request $request, $id)
{
    $design=Design::where('id','=',$id)->first();

    $user = Auth::user();
    $buyer=Buyer::where('email','=',$user->email)->first();
    if ($user) {

    $setupIntent = $user->createSetupIntent();
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    if ($user->stripe_id) {
    // ユーザーに関連するCustomerオブジェクトを取得
    $customer = Customer::retrieve($user->stripe_id);
    $defaultPaymentMethodId = $customer->invoice_settings['default_payment_method'];

    // デフォルトの支払い情報を取得
    $paymentMethod = \Stripe\PaymentMethod::retrieve($defaultPaymentMethodId);
    //他の支払い情報を取得
    $paymentMethods = \Stripe\PaymentMethod::all([
        'customer' => $customer, // カスタマーIDを指定することで、そのカスタマーに関連付けられた支払い方法を取得します
        'type' => 'card', // 取得したい支払い方法のタイプを指定します。例えば、'card'はクレジットカードを表します
    ]);
    // $paymentMethodを除外する
    $filteredPaymentMethods = array_filter($paymentMethods->data, function ($method) use ($defaultPaymentMethodId) {
        return $method->id !== $defaultPaymentMethodId;
    });
    
    return view('design/stripe', [
        'intent' => $setupIntent ?? null,
        'design'=>$design,
        'paymentMethod'=>$paymentMethod,
        'filteredPaymentMethods'=>$filteredPaymentMethods,
        'buyer'=>$buyer,
    ]);
    } else {
        // ログインしていない場合もセットアップインテントを作成
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $setupIntent = \Stripe\SetupIntent::create();
    return view('design/stripe_new', [
        'intent' => $setupIntent,
        'design'=>$design,
        'buyer'=>$buyer,
    ]);
        }
    }
}
 /**顧客支払画面へ(非ユーザー一回)
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function design_once(Request $request, $id)
{
    $design=Design::where('id','=',$id)->first();

    $cartItemId = 'design_' . $design->id;
    $tempCart = Session::get('tempCart', []);
        $tempCart[$cartItemId] = [
            'design_id' => $design->id,
            'artist_id' => $design->artist_id,
            'user_id' => 0,
            'price' => $design->price,
            'designName' => $design->name,
            // Add other design information as needed
        ];
        Session::put('tempCart', $tempCart);

    $designs = []; // デザイン情報を格納する配列

    foreach($tempCart as $downloadId => $downloadDetails){
        $downloads[] = [
            'design_id' => $downloadDetails['design_id'],
            'price' => $downloadDetails['price'],
            'designName' => $downloadDetails['designName'],
            // 他のデザイン情報も必要に応じて追加
        ];
        // 合計金額を計算
    }
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    // Stripeセットアップインテントの作成
    $setupIntent = SetupIntent::create([
        'payment_method_types' => ['card'], // クレジットカードのみを受け付ける場合
    ]);;    

    
        // ログインしていない場合もセットアップインテントを作成
    return view('design/once', [
        'intent' => $setupIntent,
        'design'=>$design,
        'tempCart'=>$tempCart,
    ]);
}
//カートに入れる
public function design_cart(Request $request, $id)
{

    $design=Design::where('id','=',$id)->first();
    $user = Auth::user();
    if (Auth::user()) {
    $download=new Download();
    $download->artist_id=$design->artist_id;
    $download->design_id=$design->id;
    $download->user_id=$user->id;
    $download->price=$design->price;
    $download->designName=$design->name;
    $download->email=$user->email;
    $download->save();
    }else{
    $cartItemId = 'design_' . $design->id;
    $tempCart = Session::get('tempCart', []);
        $tempCart[$cartItemId] = [
            'design_id' => $design->id,
            'artist_id' => $design->artist_id,
            'user_id' => 0,
            'price' => $design->price,
            'designName' => $design->name,
            'original' => $design->original,
        ];
        Session::put('tempCart', $tempCart);
    }
    return redirect('design/list');

}
//マイカート画面表示(ユーザー)
public function index_cart()
{
    $user = Auth::user();
    $buyer = Buyer::where('email','=', $user->email)->first();

    $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=',0)->orderBy('created_at', 'desc')->get();
     // 現物があるか確認
    $designIds = $downloads->pluck('design_id')->toArray();
    $originals = Design::whereIn('id', $designIds)->pluck('original', 'id');
    $total = Download::where('user_id', $user->id)->where('payment_status','=',0)->sum('price');
    $setupIntent = $user->createSetupIntent();
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        if ($user->stripe_id) {
        // ユーザーに関連するCustomerオブジェクトを取得
        $customer = Customer::retrieve($user->stripe_id);
        $defaultPaymentMethodId = $customer->invoice_settings['default_payment_method'];

        // デフォルトの支払い情報を取得
        $paymentMethod = \Stripe\PaymentMethod::retrieve($defaultPaymentMethodId);
        //他の支払い情報を取得
        $paymentMethods = \Stripe\PaymentMethod::all([
            'customer' => $customer, // カスタマーIDを指定することで、そのカスタマーに関連付けられた支払い方法を取得します
            'type' => 'card', // 取得したい支払い方法のタイプを指定します。例えば、'card'はクレジットカードを表します
        ]);
        // $paymentMethodを除外する
        $filteredPaymentMethods = array_filter($paymentMethods->data, function ($method) use ($defaultPaymentMethodId) {
            return $method->id !== $defaultPaymentMethodId;
        });
        return view('design/cart', [
            'intent' => $setupIntent ?? null,
            'downloads'=>$downloads,
            'originals'=>$originals,
            'total'=>$total,
            'buyer'=>$buyer,
            'paymentMethod'=>$paymentMethod,
            'filteredPaymentMethods'=>$filteredPaymentMethods,
        ]);
        }else{
            return view('design/cart_new', [
                'intent' => $setupIntent ?? null,
                'downloads'=>$downloads,
                'originals'=>$originals,
                'total'=>$total,
                'paymentMethod'=>null,
                'buyer'=>$buyer,
            ]);
        }

}
//マイカート画面表示(非ユーザー)
public function index_cart_un()
{
    $tempCart = Session::get('tempCart', []);
    $downloads = []; // デザイン情報を格納する配列
    $total= 0; // 合計金額を格納する変数
    //現物かダウンロードの判別のため、まずは
    $address=false;
    $designIdForBankTransfer = null;

    if (empty($tempCart)) {
        // tempCartが空の場合の処理
        return view('design/cart_un', [
            'total' => $total,
            'tempCart' => $tempCart,
            'downloads' => $downloads,
            'address' => $address,
            'clientSecret' => null,
            'originals' => [],
            'designIdForBankTransfer' => null,
            'message' => 'カートが空です。',
        ]);
    }

    foreach($tempCart as $downloadId => $downloadDetails){
        $downloads[] = [
            'design_id' => $downloadDetails['design_id'],
            'price' => $downloadDetails['price'],
            'designName' => $downloadDetails['designName'],
            'original' => $downloadDetails['original'],
        ];
    // 合計金額を計算
    $total += $downloadDetails['price'];
    }
     // 銀行振込用のデザインIDを保存
    if (!$designIdForBankTransfer) {
        $designIdForBankTransfer = $downloadDetails['design_id'];
    }
    // 現物があるか確認
    $designIds = array_column($downloads, 'design_id');
    $originals = Design::whereIn('id', $designIds)->pluck('original', 'id');

    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    // Stripeセットアップインテントの作成
    $setupIntent = SetupIntent::create([
        'payment_method_types' => ['card'], // クレジットカードのみを受け付ける場合
    ]);
return view('design/cart_un', [
    'total'=>$total,
    'tempCart'=>$tempCart,
    'downloads' => $downloads,
    'address' => $address,
    'clientSecret' => $setupIntent->client_secret,
    'originals'=>$originals,
    'designIdForBankTransfer' => $designIdForBankTransfer,

]);
}

public function delete_cart($id)
{
    //ユーザーしか削除作業ができない
    $user = Auth::user();
    $download=Download::find($id)->delete();

    $buyer = Buyer::where('email','=', $user->email)->first();
    $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=',0)->orderBy('created_at', 'desc')->get();
    $total = Download::where('user_id', $user->id)->sum('price');
    $setupIntent = $user->createSetupIntent();

    // 現物があるか確認
    $designIds = $downloads->pluck('design_id')->toArray();
    $originals = Design::whereIn('id', $designIds)->pluck('original', 'id');

    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        if ($user->stripe_id) {
        // ユーザーに関連するCustomerオブジェクトを取得
        $customer = Customer::retrieve($user->stripe_id);
        $defaultPaymentMethodId = $customer->invoice_settings['default_payment_method'];

        // 支払い情報を取得
        $paymentMethod = \Stripe\PaymentMethod::retrieve($defaultPaymentMethodId);
        return view('design/cart', [
            'intent' => $setupIntent ?? null,
            'downloads'=>$downloads,
            'originals'=>$originals,
            'total'=>$total,
            'buyer'=>$buyer,            
            'paymentMethod'=>$paymentMethod,
        ]);
        }else{
            return view('design/cart', [
                'intent' => $setupIntent ?? null,
                'downloads'=>$downloads,
                'originals'=>$originals,
                'total'=>$total,
                'buyer'=>$buyer,
                'paymentMethod'=>null,
            ]);
        }

}
//カートを空にする
public function empty_cart(){
    //ユーザーしか削除作業ができない
    $user = Auth::user();
    $download=Download::where('email','=',$user->email)->where('download_status','=','0')->delete();

    // リダイレクトなど適切な応答を返す
    return redirect()->route('index_cart')->with('success', 'カートが空になりました');

}
//カートを空にする(非ユーザー)
public function empty_cart_un(){
    $tempCart = session('tempCart', []);
    // カートを空にする処理
    session()->forget('tempCart');

    // リダイレクトなど適切な応答を返す
    return redirect()->route('index_cart_un')->with('success', 'カートが空になりました');

}

//マイカートでの支払い(ユーザー)
public function post_cart(Request $request)
{
    $user = Auth::user();
    $buyer = Buyer::where('email','=',$user->email)->first();
    $total = Download::where('user_id', $user->id)->where('payment_status','=','0')->sum('price');
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
    // 顧客がStripeの顧客IDを持っている場合、デフォルトの支払い方法を取得する
    if ($user->stripe_id) {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // ユーザーのデフォルトの支払い方法を取得
        $paymentMethods = PaymentMethod::all([
            'customer' => $user->stripe_id,
            'type' => 'card',
            'limit' => 1, // デフォルトの支払い方法は1つだけ取得する
        ]);

        // デフォルトの支払い方法がある場合、その支払い方法を使用する
        if (!empty($paymentMethods->data)) {
            $defaultPaymentMethod = $paymentMethods->data[0];
            $attachedPaymentMethod = $defaultPaymentMethod->id;
            // 支払いインテントを作成
            $paymentIntent = PaymentIntent::create([
                'amount' => $total, // 
                'currency' => 'JPY',
                'customer' => $user->stripe_id, // 顧客のIDを指定する
                'payment_method' => $attachedPaymentMethod,
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

        } else {
            // デフォルトの支払い方法が見つからない場合、エラー処理を行うか、適切な処理を行う
            return back()->with('error', 'デフォルトの支払い方法が見つかりませんでした。');
        }
    } else {
       // またStripe顧客でなければ、新規顧客にする
        $stripeCustomer = $user->createOrGetStripeCustomer();
       // フォーム送信の情報から$paymentMethodを作成する
        $paymentMethod = $request->input('stripePaymentMethod');
       //PaymentMethod を顧客にアタッチする
        $attachedPaymentMethod = $user->updateDefaultPaymentMethod($paymentMethod);
         // 支払いインテントを作成
        $paymentIntent = PaymentIntent::create([
            'amount' => $total, // 
            'currency' => 'JPY',
            'customer' => $stripeCustomer->id, // 顧客のIDを指定する
            'payment_method' => $attachedPaymentMethod->id,
            'confirmation_method' => 'manual',
            'confirm' => true,
        ]);

    }
        // ここで支払いが成功したかどうかを確認するロジックを実装
        if ($paymentIntent->status === 'succeeded') {
            // 支払いが成功した場合の処理この
            $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=','0')->get();
            foreach($downloads as $download){
                //payment_statusの変更0->1
                $download->payment_status = 1;
                $download->name = $request->name;
                $download->save();
                $design =Design::where('id','=',$download->design_id)->first();
                if ($design) {
                    // デザインを配列に追加
                    $designs[] = $design;
                }
                 //ダウンロード購入があったら$to_downloadsに入れる
                $to_download = Design::where('id','=',$download->design_id)->where('original','=','0')->first();
                    if ($to_download){
                    $to_downloads[]=$to_download;
                    }
            }
        //支払が今行われたものでダウンロードがまだ起きていないもの
            $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=','1')->where('download_status','=','0') ->get();
        // 追加されたデザインの中で original が 1 または 0 であるものをチェック
            $hasOriginalOne = false;
            $hasOriginalZero = false;

            foreach ($designs as $design) {
                if ($design->original == 1) {
                    $hasOriginalOne = true;
                }
                if ($design->original == 0) {
                    $hasOriginalZero = true;
                }
            }
           // 分岐処理（現物とDL)
            if ($hasOriginalOne && $hasOriginalZero) {
                //現物販売のもののdownload_statusを更新する
            
                $pdf = \PDF::loadView('design.pdf2', compact('total','downloads','buyer'));
                //現物なら
                foreach($downloads as $download){
                    $design =Design::where('id','=',$download->design_id)->first();
                    if ($design->original == 1) { 
                        $download->update([
                            'download_status'=>10,
                        ]);
                    }
                }
                $email = $user->email;
                \Mail::to($email)->send(new AddressUnMail($email,$total,$pdf));
                $date = Carbon::today()->addWeek();
                foreach($designs as $design){
                    if($design->original==1){
                    \Mail::to($design->email)->send(new ShipMail($design,$buyer,$date));
                    $ship=new Ship();
                    $ship->design_id=$design->id;
                    $ship->postal=$buyer->postal;
                    $ship->address=$buyer->address;
                    $ship->name=$buyer->name;
                    $ship->tel=$buyer->tel;
                    $ship->order_email=$buyer->email;
                    $ship->order=true;
                    $ship->ship=true;
                    $ship->paid=true;
                    $ship->due_date=$date;
                    $ship->save();
                     //表示を販売済みに変更する
                    $design->update([
                        'original'=>3,
                    ]);

                    }
                }
                return view('design/receipt_mix',[
                    'user'=>$user,
                    'email'=>$email,
                ]);
                //現物のみ
            } elseif ($hasOriginalOne) {
                //領収書作成→メール送信
                $pdf = \PDF::loadView('design.pdf2', compact('total','downloads','buyer'));
                foreach($downloads as $download){
                    $download->update([
                        'download_status'=>10,
                    ]);
                }
                $email = $user->email;
                \Mail::to($email)->send(new AddressMail($user, $total, $pdf, $email)); // 引数の順番を確認
                $date = Carbon::today()->addWeek();
                foreach($designs as $design){
                    \Mail::to($design->email)->send(new ShipMail($design,$buyer,$date));
                    $ship=new Ship();
                    $ship->design_id=$design->id;
                    $ship->postal=$buyer->postal;
                    $ship->address=$buyer->address;
                    $ship->name=$buyer->name;
                    $ship->tel=$buyer->tel;
                    $ship->order_email=$buyer->email;
                    $ship->order=true;
                    $ship->paid=true;
                    $ship->ship=true;
                    $ship->due_date=$date;
                    $ship->save();
                //表示を販売済みに変更する
                $design->update([
                    'original'=>3,
                ]);
            }

                return view('design/receipt_address',[
                    'user'=>$user,
                    'email'=>$email,
                ]);
            // DLのみ
            } elseif ($hasOriginalZero) {
                //pdf作成
                $pdf = \PDF::loadView('design.pdf', compact('total','downloads'));
                $email = $user->email;
                \Mail::to($user['email'])->send(new DownloadMail($user,$total, $pdf,$email));  
                return view('design/receipt',[
                    'user'=>$user,
                    'email'=>$email,
                ]);
                }
            //カートを空にする


            return view('design/receipt',[
                'user'=>$user,
                'email'=>$email,
            ]);
        } else {
            // 支払いが失敗した場合の処理
            return redirect()->route('payment.failed');
        }
    }

//別の支払い方法を追加するページ表示(カート利用)
public function add_index(){

\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

// Stripeセットアップインテントの作成
$setupIntent = SetupIntent::create([
    'payment_method_types' => ['card'], // クレジットカードのみを受け付ける場合
]);;    


    // ログインしていない場合もセットアップインテントを作成
return view('design/add_payment', [
    'intent' => $setupIntent,
]);
}

//別の支払い方法を追加するページ表示(一回ダウンロード用)
public function add_index_once(){

    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
    // Stripeセットアップインテントの作成
    $setupIntent = SetupIntent::create([
        'payment_method_types' => ['card'], // クレジットカードのみを受け付ける場合
    ]);;    
    
    
        // ログインしていない場合もセットアップインテントを作成
    return view('design/add_payment_once', [
        'intent' => $setupIntent,
    ]);
    }
//別の支払い方法を追加する
public function add_payment(Request $request)
{
    $user = Auth::user();
    $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=',0)->orderBy('created_at', 'desc')->get();
    $total = Download::where('user_id', $user->id)->where('payment_status','=',0)->sum('price');
    $setupIntent = $user->createSetupIntent();

    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    // ユーザーに関連するCustomerオブジェクトを取得
    $customer = Customer::retrieve($user->stripe_id);
    //デフォルト指定されたら
    if (null !== $request->input('default_payment')) {
        // 新しいトークンからPaymentMethodを作成する
        $paymentMethod = \Stripe\PaymentMethod::create([
            'type' => 'card',
            'card' => [
                'token' => $request->input('stripePaymentMethod'),
            ],
        ]);

       // 顧客に支払い方法をアタッチする
        $attachedPaymentMethod = $paymentMethod->attach(['customer' => $user->stripe_id]);

        // 顧客のデフォルト支払い方法を更新する
        \Stripe\Customer::update($user->stripe_id, [
            'invoice_settings' => [
                'default_payment_method' => $paymentMethod->id,
            ],
        ]);

        
    }
    else {
        // フォーム送信の情報から$paymentMethodを作成する
        $paymentMethod = $request->input('stripePaymentMethod');
        // PaymentMethod を顧客にアタッチする
        $attachedPaymentMethod = $user->updateDefaultPaymentMethod($paymentMethod);
    }
        $customer = Customer::retrieve($user->stripe_id);
        $defaultPaymentMethodId = $customer->invoice_settings['default_payment_method'];
        $paymentMethods = \Stripe\PaymentMethod::all([
            'customer' => $customer, // カスタマーIDを指定することで、そのカスタマーに関連付けられた支払い方法を取得します
            'type' => 'card', // 取得したい支払い方法のタイプを指定します。例えば、'card'はクレジットカードを表します
        ]);
        // $paymentMethodを除外する
        $filteredPaymentMethods = array_filter($paymentMethods->data, function ($method) use ($defaultPaymentMethodId) {
            return $method->id !== $defaultPaymentMethodId;
        });


    return view('design/cart', [
        'intent' => $setupIntent ?? null,
        'downloads'=>$downloads,
        'total'=>$total,
        'paymentMethod'=>$paymentMethod,
        'filteredPaymentMethods'=>$filteredPaymentMethods,
    ]);
}
//別の支払い方法を追加する(一回ダウンロード)
public function add_payment_once(Request $request)
{
    $user = Auth::user();
    $buyer=Buyer::where('email','=',$user->email)->first();
    $download=Download::where('user_id','=',$user->id)->where('payment_status','=',1)->first();
    $design=Design::where('id','=',$download->design_id)->first();
    $setupIntent = $user->createSetupIntent();

    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    // ユーザーに関連するCustomerオブジェクトを取得
    $customer = Customer::retrieve($user->stripe_id);
    //デフォルト指定されたら
    if (null !== $request->input('default_payment')) {
        // 新しいトークンからPaymentMethodを作成する
        $paymentMethod = \Stripe\PaymentMethod::create([
            'type' => 'card',
            'card' => [
                'token' => $request->input('stripePaymentMethod'),
            ],
        ]);

       // 顧客に支払い方法をアタッチする
        $attachedPaymentMethod = $paymentMethod->attach(['customer' => $user->stripe_id]);

        // 顧客のデフォルト支払い方法を更新する
        \Stripe\Customer::update($user->stripe_id, [
            'invoice_settings' => [
                'default_payment_method' => $paymentMethod->id,
            ],
        ]);

        
    }
    else {
        // フォーム送信の情報から$paymentMethodを作成する
        $paymentMethod = $request->input('stripePaymentMethod');
        // PaymentMethod を顧客にアタッチする
        $attachedPaymentMethod = $user->updateDefaultPaymentMethod($paymentMethod);
    }
        $customer = Customer::retrieve($user->stripe_id);
        $defaultPaymentMethodId = $customer->invoice_settings['default_payment_method'];
        $paymentMethods = \Stripe\PaymentMethod::all([
            'customer' => $customer, // カスタマーIDを指定することで、そのカスタマーに関連付けられた支払い方法を取得します
            'type' => 'card', // 取得したい支払い方法のタイプを指定します。例えば、'card'はクレジットカードを表します
        ]);
        // $paymentMethodを除外する
        $filteredPaymentMethods = array_filter($paymentMethods->data, function ($method) use ($defaultPaymentMethodId) {
            return $method->id !== $defaultPaymentMethodId;
        });


        return view('design/stripe', [
            'intent' => $setupIntent ?? null,
            'design'=>$design,
            'paymentMethod'=>$paymentMethod,
            'filteredPaymentMethods'=>$filteredPaymentMethods,
            'buyer'=>$buyer,
        ]);
}
//非ユーザーの場合のカートからの支払い
public function post_cart_un(Request $request,$id,$address){
    $total=$id;
    // stripe.confirmCardSetup を呼び出す
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // フォーム送信の情報から PaymentMethod を作成
    $paymentMethod = $request->input('stripePaymentMethod');
     // 非ユーザーの場合、Stripe 顧客情報を新規に作成
    $stripeCustomer = \Stripe\Customer::create([
        'email' => $request->input('email'), // 仮の例。必要な情報に応じて変更してください。
        // 他の必要な情報を追加
    ]);
    // PaymentMethod を顧客にアタッチする
    $attachedPaymentMethod = \Stripe\PaymentMethod::retrieve($paymentMethod);
    $attachedPaymentMethod->attach(['customer' => $stripeCustomer->id]);

    // PaymentIntent を作成
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => $total,
        'currency' => 'JPY',
        'customer' => $stripeCustomer->id,
        'payment_method' => $attachedPaymentMethod->id,
        'confirmation_method' => 'manual',
        'confirm' => true,
    ]);

    // PaymentIntent から client_secret を取得
    $clientSecret = $paymentIntent->client_secret;

        // ここで支払いが成功したかどうかを確認するロジックを実装
        if ($paymentIntent->status === 'succeeded') {
            // 支払いが成功した場合の処理(1.新規データ保存 2.download_statusの更新 3.pdf作成 4.メール送信)

            $tempCart = Session::get('tempCart', []);
            //Downloadに新規保存
            foreach ($tempCart as $downloadId => $downloadDetails) {
            $download=new Download();
            $download->artist_id=$downloadDetails['artist_id'];
            $download->design_id=$downloadDetails['design_id'];
            $download->user_id=0;
            $download->price=$downloadDetails['price'];
            $download->payment_status=1;
            $download->designName=$downloadDetails['designName'];
            $download->email=$request->email;
            $download->name = $request->name;
            $download->save();   
             // デザインを取得する
            $design = Design::where('id', $downloadDetails['design_id'])->first();
            if ($design) {
                // デザインを配列に追加
                $designs[] = $design;
            }
            //ダウンロード購入があったら$to_downloadsに入れる
            $to_download = Design::where('id', $downloadDetails['design_id'])->where('original','=','0')->first();
            if ($to_download){
                $to_downloads[]=$to_download;
            }
        }
            //支払が今行われたものでダウンロードがまだ起きていないもの
            $downloads=Download::where('email','=',$request->email)->where('payment_status','=','1')->where('download_status','=','0') ->get();

            //ダウンロードのみ
            if($address==false){
                //pdf作成
                $pdf = \PDF::loadView('design.pdf', compact('total','downloads'));
                // 一回での支払い完了メール送信
                $email = $request['email'];
                \Mail::to($email)->send(new DownloadUnMail($email,$total,$pdf));
            //ダウンロードと現物のミックス
            }elseif ($address == true && isset($to_downloads)) {
            //現物販売のもののdownload_statusを更新する
            foreach($downloads as $download){
            // デザインを取得する
                $design = Design::where('id', $download['design_id'])->first();
                $original=$design['original'];
                if ($original == 1) { // $download が null でない場合のみ実行
                    $download->update([
                        'download_status'=>10,
                    ]);
                    }
                }
            $buyer = (object) [
                'email' =>$request->email,
                'name' => $request->name,
                'postal' => $request->postal,
                'tel' => $request->tel,
                'address' => $request->address,
            ];
            $pdf = \PDF::loadView('design.pdf2', compact('total','downloads','buyer'));
            // 一回での支払い完了メール送信
            $email = $request['email'];
            \Mail::to($email)->send(new AddressUnMail($email,$total,$pdf));
            $date = Carbon::today()->addWeek();
            foreach($designs as $design){
                if($design->original==1){
                    \Mail::to($design->email)->send(new ShipMail($design,$buyer,$date));
                    $ship=new Ship();
                    $ship->design_id=$design->id;
                    $ship->postal=$buyer->postal;
                    $ship->address=$buyer->address;
                    $ship->name=$buyer->name;
                    $ship->tel=$buyer->tel;
                    $ship->order_email=$buyer->email;
                    $ship->order=true;
                    $ship->ship=true;
                    $ship->paid=true;
                    $ship->due_date=$date;
                    $ship->save();
                    //表示を販売済みに変更する
                    $design->update([
                    'original'=>3,
                ]);
                }
            }
            // 現物のみ
            }else{

                foreach($downloads as $download){
                    $download->update([
                        'download_status'=>10,
                    ]);
                }
                $buyer = (object) [
                    'email' =>$request->email,
                    'name' => $request->name,
                    'postal' => $request->postal,
                    'tel' => $request->tel,
                    'address' => $request->address,
                ];
                $pdf = \PDF::loadView('design.pdf2', compact('total','download','buyer'));
                // 一回での支払い完了メール送信
                $email = $request['email'];
                \Mail::to($email)->send(new AddressUnMail($email,$total,$pdf));
                $date = Carbon::today()->addWeek();
                foreach($designs as $design){
                \Mail::to($design->email)->send(new ShipMail($design,$buyer,$date));
                $ship=new Ship();
                $ship->design_id=$design->id;
                $ship->postal=$buyer->postal;
                $ship->address=$buyer->address;
                $ship->name=$buyer->name;
                $ship->tel=$buyer->tel;
                $ship->order_email=$buyer->email;
                $ship->order=true;
                $ship->ship=true;
                $ship->paid=true;
                $ship->due_date=$date;
                $ship->save();
                  //表示を販売済みに変更する
                $design->update([
                    'original'=>3,
                ]);
            }

            }
            //カートを空にする
            $tempCart = session('tempCart', []);
            // カートを空にする処理
            session()->forget('tempCart');
            if($address==false){
            return view('design/receipt',[
                'email'=>$email,
            ]);
            }elseif ($address == true && isset($to_downloads)) {
                return view('design/receipt_mix',[
                    'email'=>$email,
                ]);
            }else{
                return view('design/receipt_address',[
                    'email'=>$email,
                ]);
            }
        } else {
            // 支払いが失敗した場合の処理
            return redirect()->route('payment.failed');
        }
    }
//一回での支払いポスト(ユーザー)
    public function design_stripePost(Request $request,$id)
    {
        $design=Design::where('id','=',$id)->first();
        // ログインユーザーを$buyerとする
        $user = Auth::user();
         // 顧客がStripeの顧客IDを持っている場合、デフォルトの支払い方法を取得する
    if ($user->stripe_id) {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // ユーザーのデフォルトの支払い方法を取得
        $paymentMethods = PaymentMethod::all([
            'customer' => $user->stripe_id,
            'type' => 'card',
            'limit' => 1, // デフォルトの支払い方法は1つだけ取得する
        ]);
            // デフォルトの支払い方法がある場合、その支払い方法を使用する
            if (!empty($paymentMethods->data)) {
                $defaultPaymentMethod = $paymentMethods->data[0];
                $attachedPaymentMethod = $defaultPaymentMethod->id;
                // 支払いインテントを作成
                $paymentIntent = PaymentIntent::create([
                    'amount' => $design->price, // 
                    'currency' => 'JPY',
                    'customer' => $user->stripe_id, // 顧客のIDを指定する
                    'payment_method' => $attachedPaymentMethod,
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                ]);
    
            } else {
                // デフォルトの支払い方法が見つからない場合、エラー処理を行うか、適切な処理を行う
                return back()->with('error', 'デフォルトの支払い方法が見つかりませんでした。');
            }
            //新規ユーザー
            } else {
        // またStripe顧客でなければ、新規顧客にする
        $stripeCustomer = $user->createOrGetStripeCustomer();
        // フォーム送信の情報から$paymentMethodを作成する
        $paymentMethod = $request->input('stripePaymentMethod');
        //PaymentMethod を顧客にアタッチする
        $attachedPaymentMethod = $user->updateDefaultPaymentMethod($paymentMethod);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // 支払いインテントを作成
        $paymentIntent = PaymentIntent::create([
            'amount' => $design->price, // 
            'currency' => 'JPY',
            'customer' => $stripeCustomer->id, // 顧客のIDを指定する
            'payment_method' => $attachedPaymentMethod->id,
            'confirmation_method' => 'manual',
            'confirm' => true,
        ]);
    }
        // ここで支払いが成功したかどうかを確認するロジックを実装
        if ($paymentIntent->status === 'succeeded') {
            // 支払いが成功した場合の処理
            $download=new Download();
            $download->artist_id=$design->artist_id;
            $download->design_id=$design->id;
            $download->user_id=$user->id;
            $download->price=$design->price;
            $download->designName=$design->name;
            $download->name=$request->name;
            $download->payment_status=1;
            $download->email=$user->email;
            $download->save();
            
            $total=$download->price;
            //pdf作成
            $pdf = \PDF::loadView('design.pdf', compact('total','download'));
            // 一回での支払い完了メール送信
            $email = $user->email;
            \Mail::to($user['email'])->send(new DownloadMail($user, $total, $pdf, $email)
        );

    
            // 処理後に'ルート設定'にページ移行
            return view('design/receipt',[
                'email'=>$email,
            ]);
            // return redirect()->route('design_receipt', $design)->withHeaders($response->headers->all());
        } else {
            // 支払いが失敗した場合の処理
            return redirect()->route('payment.failed');
        }
        
    }
//一回での支払いポスト(ユーザー/現物購入)
public function design_stripePost_address(Request $request,$id)
{
    $design=Design::where('id','=',$id)->first();
    // ログインユーザーを$buyerとする
    $user = Auth::user();
    $buyer =Buyer::where('email','=',$user->email)->first();
     // 顧客がStripeの顧客IDを持っている場合、デフォルトの支払い方法を取得する
if ($user->stripe_id) {
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    // ユーザーのデフォルトの支払い方法を取得
    $paymentMethods = PaymentMethod::all([
        'customer' => $user->stripe_id,
        'type' => 'card',
        'limit' => 1, // デフォルトの支払い方法は1つだけ取得する
    ]);
        // デフォルトの支払い方法がある場合、その支払い方法を使用する
        if (!empty($paymentMethods->data)) {
            $defaultPaymentMethod = $paymentMethods->data[0];
            $attachedPaymentMethod = $defaultPaymentMethod->id;
            // 支払いインテントを作成
            $paymentIntent = PaymentIntent::create([
                'amount' => $design->price, // 
                'currency' => 'JPY',
                'customer' => $user->stripe_id, // 顧客のIDを指定する
                'payment_method' => $attachedPaymentMethod,
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

        } else {
            // デフォルトの支払い方法が見つからない場合、エラー処理を行うか、適切な処理を行う
            return back()->with('error', 'デフォルトの支払い方法が見つかりませんでした。');
        }
    } else {
    // またStripe顧客でなければ、新規顧客にする
    $stripeCustomer = $user->createOrGetStripeCustomer();
    // フォーム送信の情報から$paymentMethodを作成する
    $paymentMethod = $request->input('stripePaymentMethod');
    //PaymentMethod を顧客にアタッチする
    $attachedPaymentMethod = $user->updateDefaultPaymentMethod($paymentMethod);

    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    // 支払いインテントを作成
    $paymentIntent = PaymentIntent::create([
        'amount' => $design->price, // 
        'currency' => 'JPY',
        'customer' => $stripeCustomer->id, // 顧客のIDを指定する
        'payment_method' => $attachedPaymentMethod->id,
        'confirmation_method' => 'manual',
        'confirm' => true,
    ]);
}
    // ここで支払いが成功したかどうかを確認するロジックを実装
    if ($paymentIntent->status === 'succeeded') {
        // 支払いが成功した場合の処理
        $download=new Download();
        $download->artist_id=$design->artist_id;
        $download->design_id=$design->id;
        $download->user_id=$user->id;
        $download->price=$design->price;
        $download->designName=$design->name;
        $download->name=$request->name;
        $download->payment_status=1;
        $download->email=$user->email;
         // 現物購入と示す
        $download->download_status = 10;
        $download->save();
        
        $total=$download->price;

        //pdf作成→メール送信
        $pdf = \PDF::loadView('design.pdf2', compact('total','download','buyer'));
        // 一回での支払い完了メール送信
        $email = $user->email;
        \Mail::to($user['email'])->send(new AddressMail($user, $total, $pdf, $email));
        $date = Carbon::today()->addWeek();
        \Mail::to($design->email)->send(new ShipMail($design,$buyer,$date));
        $ship=new Ship();
        $ship->design_id=$design->id;
        $ship->postal=$buyer->postal;
        $ship->address=$buyer->address;
        $ship->name=$buyer->name;
        $ship->tel=$buyer->tel;
        $ship->order_email=$buyer->email;
        $ship->order=true;
        $ship->ship=true;
        $ship->paid=true;
        $ship->due_date=$date;
        $ship->save();
        //表示を販売済みに変更する
        $design->update([
            'original'=>3,
        ]);
        // 処理後に'ルート設定'にページ移行
        return view('design/receipt_address',[
            'email'=>$email,
        ]);
        // return redirect()->route('design_receipt', $design)->withHeaders($response->headers->all());
    } else {
        // 支払いが失敗した場合の処理
        return redirect()->route('payment.failed');
    }
    
}

    //非ユーザーの一回の支払いポスト
    public function design_oncePost (Request $request,$id){
        $design=Design::where('id','=',$id)->first();
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // フォーム送信の情報から PaymentMethod を作成
        $paymentMethod = $request->input('stripePaymentMethod');
        // 非ユーザーの場合、Stripe 顧客情報を新規に作成
        $stripeCustomer = \Stripe\Customer::create([
            'email' => $request->input('email'), // 仮の例。必要な情報に応じて変更してください。
            // 他の必要な情報を追加
        ]);
        // PaymentMethod を顧客にアタッチする
        $attachedPaymentMethod = \Stripe\PaymentMethod::retrieve($paymentMethod);
        $attachedPaymentMethod->attach(['customer' => $stripeCustomer->id]);

        // PaymentIntent を作成
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $design->price,
            'currency' => 'JPY',
            'customer' => $stripeCustomer->id,
            'payment_method' => $attachedPaymentMethod->id,
            'confirmation_method' => 'manual',
            'confirm' => true,
        ]);

          // PaymentIntent から client_secret を取得
        $clientSecret = $paymentIntent->client_secret;

         // ここで支払いが成功したかどうかを確認するロジックを実装
        if ($paymentIntent->status === 'succeeded') {
            // 支払いが成功した場合の処理
            $tempCart = Session::get('tempCart', []);
            //Downloadに新規保存
            foreach ($tempCart as $downloadId => $downloadDetails) {
            $download=new Download();
            $download->artist_id=$downloadDetails['artist_id'];
            $download->design_id=$downloadDetails['design_id'];
            $download->user_id=0;
            $download->price=$downloadDetails['price'];
            $download->payment_status=1;
            $download->designName=$downloadDetails['designName'];
            $download->email=$request->email;
            $download->name = $request->name;
            $download->save();
            }

        //pdf作成
        $total=$design->price;
        $pdf = \PDF::loadView('design.pdf', compact('total','download'));
        // 一回での支払い完了メール送信
        $email = $request['email'];
        \Mail::to($email)->send(new DownloadUnMail($email,$total,$pdf));
        //カートを空にする
        $tempCart = session('tempCart', []);
        // カートを空にする処理
        session()->forget('tempCart');

        return view('design/receipt',[
            'email'=>$email,
        ]);
        //ダウンロードが始まる
        //コピーライセンスの有無
        if($design->license==0){
            $filePath = storage_path("app/public/{$design->real_image}");
            return Response::download($filePath);
        }else{
            $filePath = storage_path("app/public/{$design->real_image_with_name}");
            return Response::download($filePath);
        }
        // 処理後に'ルート設定'にページ移行(機能せず)
        // return redirect()->route('design_receipt', $design)->withHeaders($response->headers->all());
    }
    else {
    // 支払いが失敗した場合の処理
    return redirect()->route('payment.failed');
    }
    }

    //非ユーザーの一回の支払いポスト(現物販売)
    public function design_oncePost_address (Request $request,$id){
        $design=Design::where('id','=',$id)->first();
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // フォーム送信の情報から PaymentMethod を作成
        $paymentMethod = $request->input('stripePaymentMethod');
        // 非ユーザーの場合、Stripe 顧客情報を新規に作成
        $stripeCustomer = \Stripe\Customer::create([
            'email' => $request->input('email'), // 仮の例。必要な情報に応じて変更してください。
            // 他の必要な情報を追加
        ]);
        // PaymentMethod を顧客にアタッチする
        $attachedPaymentMethod = \Stripe\PaymentMethod::retrieve($paymentMethod);
        $attachedPaymentMethod->attach(['customer' => $stripeCustomer->id]);

        // PaymentIntent を作成
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $design->price,
            'currency' => 'JPY',
            'customer' => $stripeCustomer->id,
            'payment_method' => $attachedPaymentMethod->id,
            'confirmation_method' => 'manual',
            'confirm' => true,
        ]);

            // PaymentIntent から client_secret を取得
        $clientSecret = $paymentIntent->client_secret;

            // ここで支払いが成功したかどうかを確認するロジックを実装
        if ($paymentIntent->status === 'succeeded') {
            // 支払いが成功した場合の処理
            $tempCart = Session::get('tempCart', []);
            //Downloadに新規保存
            foreach ($tempCart as $downloadId => $downloadDetails) {
            $download=new Download();
            $download->artist_id=$downloadDetails['artist_id'];
            $download->design_id=$downloadDetails['design_id'];
            $download->user_id=0;
            $download->price=$downloadDetails['price'];
            $download->payment_status=1;
            $download->designName=$downloadDetails['designName'];
            $download->email=$request->email;
            $download->name = $request->name;
            // 現物購入と示す
            $download->download_status = 10;
            $download->save();
            }

        //pdf作成
        $total=$design->price;
            // $userが存在しない場合の処理
            $buyer = (object) [
            'email' =>$request->email,
            'name' => $request->name,
            'postal' => $request->postal,
            'tel' => $request->tel,
            'address' => $request->address,
        ];
        $pdf = \PDF::loadView('design.pdf2', compact('total','download','buyer'));
        // 一回での支払い完了メール送信
        $email = $request['email'];
        \Mail::to($email)->send(new AddressUnMail($email,$total,$pdf));
        $date = Carbon::today()->addWeek();
        \Mail::to($design->email)->send(new ShipMail($design,$buyer,$date));
        $ship=new Ship();
        $ship->design_id=$design->id;
        $ship->postal=$buyer->postal;
        $ship->address=$buyer->address;
        $ship->name=$buyer->name;
        $ship->tel=$buyer->tel;
        $ship->order_email=$buyer->email;
        $ship->order=true;
        $ship->ship=true;
        $ship->paid=true;
        $ship->due_date=$date;
        $ship->save();
    
        //表示を販売済みに変更する
        $design->update([
            'original'=>3,
        ]);
        //カートを空にする
        $tempCart = session('tempCart', []);
        // カートを空にする処理
        session()->forget('tempCart');

        return view('design/receipt_address',[
            'email'=>$email,
        ]);
        
    }
    else {
    // 支払いが失敗した場合の処理
    return redirect()->route('payment.failed');
    }
    }

    public function design_receipt($design){

        $user = Auth::user();

        return view('design/receipt',compact('user','design'));
    }

    public function stripePost(Request $request){
        // ログインユーザーを$userとする
        $user=Auth::user();

        // またStripe顧客でなければ、新規顧客にする
        $stripeCustomer = $user->createOrGetStripeCustomer();

        // フォーム送信の情報から$paymentMethodを作成する
        $paymentMethod=$request->input('stripePaymentMethod');

        // プランはconfigに設定したbasic_plan_idとする
        $plan=config('services.stripe.basic_plan_id');

        // 上記のプランと支払方法で、サブスクを新規作成する
        $user->newSubscription('basic_plan', $plan)
        ->trialDays(30)
        ->create($paymentMethod);
        $email = $request['email'];

        Mail::send(new RegisterMail($email));

        // 処理後に'ルート設定'にページ移行
        return redirect()->route('receipt',$user);
    }

    public function receipt(User $user){
        return view('receipt',compact('user'));
    }

    public function cancelsubscription(User $user, Request $request){
        $user->subscription('basic_plan')->cancelNow();
        $user->delete();
        return view('cancel');
    }

    public function cancel(Request $request){
        return view('cancel');
    }
    public function portalsubscription(User $user, Request $request){
        return $request->user()->redirectToBillingPortal();
    }

    public function account(Request $request){
        $user = Auth::user();
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('Y-m-d');
        $subscription = Subscription::where('user_id',$user->id)->first();
        $trial = Carbon::createFromFormat('Y-m-d H:i:s', $subscription->trial_ends_at)->format('Y-m-d');
        $now=Carbon::now();
        return view('account',compact('user','date','trial','now'));
    }
    public function profile_edit(Request $request){
        $user = Auth::user();
        return view('profile_edit', [
            'user' => $user,
        ]);
    }
    public function update_profile(Request $request){
        $id = Auth::id();
        $users = User::find($id);
        /* $users->name = $request->input('name'); */
        $users->email = $request->input('email');
        $users->save();

        return redirect('account');
    }
    //銀行振込選択後情報表示画面(cartでユーザーの場合)
    public function bank(Request $request,$id){

        $download=Download::where('id','=',$id)->first();

        return view('design/bank',[
            'download'=>$download,
        ]);
    }

     //銀行振込選択後情報表示画面(非ユーザーもしくは一回払いの場合)
    public function bank_un(Request $request,$id){

        $design=Design::where('id','=',$id)->first();

        if (Auth::user()) {
        $user = Auth::user();
        $email=$user->email;
        }else{
            $email=$request->email;
        }

        return view('design/bank_un',[
            'design'=>$design,
            'email'=>$email,
        ]);
    }
     //銀行振込選択ポスト(cartの場合)
    public function bank_submit(Request $request,$id){
        $total=$id;
        $user = Auth::user();
        if($user){
            $buyer = Buyer::where('email','=', $user->email)->first();
            $email=$user->email;
            //カートに入れる時にダウンロードテーブルに保存済みなので
            $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=',0)->orderBy('created_at', 'desc')->get();
            $date = Carbon::today()->addWeek();
            //まだ未払いがあるか確認
            $pends = Download::where('email', '=', $email)
            ->where(function($query) {
                $query->where('payment_status', '=', 3)
                    ->orWhere('payment_status', '=', 6);
            })
            ->get();
            // 3のステータスが含まれているかチェック
            $hasStatus3 = $pends->contains('payment_status', 3);

            // 6のステータスが含まれているかチェック
            $hasStatus6 = $pends->contains('payment_status', 6);
            foreach($downloads as $download){

                $designs = []; // 初期化

                    $design =Design::where('id','=',$download->design_id)->first();
                    if ($design) {
                        // デザインを配列に追加
                        $designs[] = $design;
                    }
                    //現物ならShipテーブルに作成
                    if($design->original==1){
                        $ship=new Ship();
                        $ship->design_id=$design->id;
                        $ship->postal=$buyer->postal;
                        $ship->address=$buyer->address;
                        $ship->name=$buyer->name;
                        $ship->tel=$buyer->tel;
                        $ship->order_email=$email;
                        $ship->order=true;
                        $ship->due_date=$date;
                        $ship->save();
                        //表示を販売済みに変更する
                        $design->update([
                            'original'=>3,
                        ]);
                    }
                if ($pends->isEmpty()) {
                    //支払いがペンディングにある＝３
                        $download->update([
                            'payment_status' => 3,
                    ]);
                }else{
                    if ($hasStatus3 && !$hasStatus6) {
                        //先のペンディングと分ける支払いがペンディングにある＝6
                        $download->update([
                            'payment_status' => 6,
                    ]);
                    } elseif ($hasStatus6 && !$hasStatus3) {
                        $download->update([
                            'payment_status' => 3,
                    ]);
                    }else{
                        $download->update([
                            'payment_status' => 10,
                    ]);
                    }
                }
            }
            //振込情報・金額をメール
            \Mail::to($email)->send(new BankCartMail($email,$total,$designs,$date));
        }else{
            $tempCart = Session::get('tempCart', []);

            $designs = []; // デザイン情報を格納する配列
            $buyer = Session::get('buyer'); // セッションからバイヤー情報を取得
            //まだ未払いがあるか確認
            $pends = Download::where('email', '=', $buyer->email)
            ->where(function($query) {
                $query->where('payment_status', '=', 3)
                    ->orWhere('payment_status', '=', 6);
            })
            ->get();
            // 3のステータスが含まれているかチェック
            $hasStatus3 = $pends->contains('payment_status', 3);

            // 6のステータスが含まれているかチェック
            $hasStatus6 = $pends->contains('payment_status', 6);
            //現物かダウンロードの判別のため、まずは
            $address=false;

           //Downloadに新規保存
            foreach ($tempCart as $downloadId => $downloadDetails) {
            $download=new Download();
            $download->artist_id=$downloadDetails['artist_id'];
            $download->design_id=$downloadDetails['design_id'];
            $download->user_id=0;
            $download->price=$downloadDetails['price'];
            $download->designName=$downloadDetails['designName'];
            $download->email=$buyer->email;
            $download->name = $buyer->name;
            if ($pends->isEmpty()) {
            $download->payment_status=3;//ペンディング
            }else{
                if ($hasStatus3 && !$hasStatus6) {
                    $download->payment_status=6;//ペンディング
                } elseif ($hasStatus6 && !$hasStatus3) {
                    $download->payment_status=3;//ペンディング
                }else{
                    $download->payment_status=10;//ペンディング
                }
            }
            $download->save();  
            $design =Design::where('id','=',$download->design_id)->first();
            if($design->original==1){
            //表示を販売済みに変更する
            $design->update([
                'original'=>3,
            ]);
            }
            if ($design) {
                // デザインを配列に追加
                $designs[] = $design;
            }
            } 
            // 現物があるか確認
            $designIds = array_map(function($design) {
                return $design->id;
            }, $designs);
            $originals = Design::whereIn('id', $designIds)->pluck('original', 'id');
            $date = Carbon::today()->addWeek();

            foreach($originals as $id => $original) {
                //現物があるなら(すでに完売3に変更済み)
                if($original==3){
                    // $userが存在しない場合の処理
                    $ship=new Ship();
                    $ship->design_id = $id;
                    $ship->postal = $buyer->postal;
                    $ship->address = $buyer->address;
                    $ship->name = $buyer->name;
                    $ship->tel = $buyer->tel;
                    $ship->order_email = $buyer->email;
                    $ship->order=true;
                    $ship->due_date=$date;
                    $ship->save();
                }

        }
        $email=$buyer->email;

        //振込情報・金額をメール
        \Mail::to($email)->send(new BankCartMail($email,$total,$designs,$date));

            //カートを空にする
            $tempCart = session('tempCart', []);
            // カートを空にする処理
            session()->forget('tempCart');
    }
    if ($pends->isEmpty()) {
        $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=',3)->orderBy('created_at', 'desc')->get();
    }else{
        if ($hasStatus3 && !$hasStatus6) {
            $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=',6)->orderBy('created_at', 'desc')->get();
        } elseif ($hasStatus6 && !$hasStatus3) {
            $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=',3)->orderBy('created_at', 'desc')->get();
        }else{
            $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=',10)->orderBy('created_at', 'desc')->get();
        }
    }
            $pdf = \PDF::loadView('design.pdf_later', compact('total','downloads','buyer'));
            \Mail::to('info@itcha50.com')->send(new ReceiptMail($pdf));

        return view('design/bank_complete');
    }
      //銀行振込選択ポスト(一回払いの場合)
    public function bank_submit_un(Request $request,$id){

        $design=Design::where('id','=',$id)->first();
        $total=$design->price;
        $designName=$design->name;
        $date = Carbon::today()->addWeek();
        if (Auth::user()) {
            $user = Auth::user();
            $buyer = Buyer::where('email','=', $user->email)->first();
            $email=$user->email;
             //まだ未払いがあるか確認
            $pends = Download::where('email', '=', $email)
            ->where(function($query) {
                $query->where('payment_status', '=', 3)
                    ->orWhere('payment_status', '=', 6);
            })
            ->get();
            // 3のステータスが含まれているかチェック
            $hasStatus3 = $pends->contains('payment_status', 3);

            // 6のステータスが含まれているかチェック
            $hasStatus6 = $pends->contains('payment_status', 6);

             //Downloadに新規保存
                $download=new Download();
                $download->artist_id=$design->artist_id;
                $download->design_id=$design->id;
                $download->user_id=$user->id;
                $download->price=$design->price;
                if ($pends->isEmpty()) {
                    $download->payment_status=3;//ペンディング
                    }else{
                        if ($hasStatus3 && !$hasStatus6) {
                            $download->payment_status=6;//ペンディング
                        } elseif ($hasStatus6 && !$hasStatus3) {
                            $download->payment_status=3;//ペンディング
                        }else{
                            $download->payment_status=10;//ペンディング
                        }
                    }
                $download->designName=$design->name;
                $download->email=$user->email;
                $download->name = $buyer->name;
                $download->save(); 
                //現物販売ならshipテーブルを作る
                if($design->original==1){
                    $date = Carbon::today()->addWeek();
                    $ship=new Ship();
                    $ship->design_id=$design->id;
                    $ship->postal=$buyer->postal;
                    $ship->address=$buyer->address;
                    $ship->name=$buyer->name;
                    $ship->tel=$buyer->tel;
                    $ship->order_email=$email;
                    $ship->order=true;
                    $ship->due_date=$date;
                    $ship->save();
                    //表示を販売済みに変更する
                    $design->update([
                        'original'=>3,
                    ]);
                    }
            }else{
                $email=$request->email;
                //Downloadテーブルを作る
                $tempCart = Session::get('tempCart', []);
                 //まだ未払いがあるか確認
                $pends = Download::where('email', '=', $email)
                ->where(function($query) {
                    $query->where('payment_status', '=', 3)
                        ->orWhere('payment_status', '=', 6);
                })
                ->get();
                // 3のステータスが含まれているかチェック
                $hasStatus3 = $pends->contains('payment_status', 3);

                // 6のステータスが含まれているかチェック
                $hasStatus6 = $pends->contains('payment_status', 6);
                //Downloadに新規保存
                foreach ($tempCart as $downloadId => $downloadDetails) {
                $download=new Download();
                $download->artist_id=$downloadDetails['artist_id'];
                $download->design_id=$downloadDetails['design_id'];
                $download->user_id=0;
                $download->price=$downloadDetails['price'];
                if ($pends->isEmpty()) {
                    $download->payment_status=3;//ペンディング
                    }else{
                        if ($hasStatus3 && !$hasStatus6) {
                            $download->payment_status=6;//ペンディング
                        } elseif ($hasStatus6 && !$hasStatus3) {
                            $download->payment_status=3;//ペンディング
                        }else{
                            $download->payment_status=10;//ペンディング
                        }
                    }                
                $download->designName=$downloadDetails['designName'];
                $download->email=$request->email;
                $download->name = $request->name;
                $download->save();   
                //現物販売ならshipテーブルを作る
                if($design->original==1){
                $date = Carbon::today()->addWeek();
                $ship=new Ship();
                $ship->design_id=$design->id;
                $ship->postal=$request->postal;
                $ship->address=$request->address;
                $ship->name=$request->name;
                $ship->tel=$request->tel;
                $ship->order_email=$email;
                $ship->order=true;
                $ship->due_date=$date;
                $ship->save();
                //表示を販売済みに変更する
                $design->update([
                    'original'=>3,
                ]);
                }
            }
        }

         //振込情報・金額をメール
        \Mail::to($email)->send(new BankMail($email,$total,$designName,$date));

        $buyer = (object) [
            'email' =>$request->email,
            'name' => $request->name,
            'postal' => $request->postal,
            'tel' => $request->tel,
            'address' => $request->address,
        ];

        if ($pends->isEmpty()) {
            $downloads=Download::where('email','=',$buyer->email)->where('payment_status','=',3)->orderBy('created_at', 'desc')->get();
        }else{
            if ($hasStatus3 && !$hasStatus6) {
                $downloads=Download::where('email','=',$buyer->email)->where('payment_status','=',6)->orderBy('created_at', 'desc')->get();
            } elseif ($hasStatus6 && !$hasStatus3) {
                $downloads=Download::where('email','=',$buyer->email)->where('payment_status','=',3)->orderBy('created_at', 'desc')->get();
            }else{
                $downloads=Download::where('email','=',$buyer->email)->where('payment_status','=',10)->orderBy('created_at', 'desc')->get();
            }
        }
        //入金確認後のメールに添付する領収書を受け取っておく
        $pdf = \PDF::loadView('design.pdf_later', compact('total','downloads','buyer'));
        \Mail::to('info@itcha50.com')->send(new ReceiptMail($pdf));

        return view('design/bank_complete');
    }

    //プリペイド購入ページを表示
    public function prepaid(Request $request){
        $user = Auth::user();
        if($user){
            $buyer=Buyer::where('email','=',$user->email)->first();
            return view('design/prepaid',[ 
                'buyer'=>$buyer,
                ]);
        }else{

        session()->flash('flash_message', 'まずは無料登録をしてください。');
        return view('auth.register');
        }

    }
    //銀行振込選択ポスト
    public function prepaid_bank(Request $request){

        $user = Auth::user();
        $buyer=Buyer::where('email','=',$user->email)->first();
        $email=$user->email;
        $total=$request->amount;
        $date = Carbon::today()->addWeek();
        //振込情報・金額をメール
        \Mail::to($email)->send(new PrepaidMail($email,$total,$date));

        return view('design/bank_prepaid');

    }
    //クレジットカード選択後カード情報入力ページ表示
    public function prepaid_purchase_card(Request $request){
        $user = Auth::user();

        $setupIntent = $user->createSetupIntent();
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        if ($user->stripe_id) {
        // ユーザーに関連するCustomerオブジェクトを取得
        $customer = Customer::retrieve($user->stripe_id);
        $defaultPaymentMethodId = $customer->invoice_settings['default_payment_method'];
    
        // デフォルトの支払い情報を取得
        $paymentMethod = \Stripe\PaymentMethod::retrieve($defaultPaymentMethodId);
        //他の支払い情報を取得
        $paymentMethods = \Stripe\PaymentMethod::all([
            'customer' => $customer, // カスタマーIDを指定することで、そのカスタマーに関連付けられた支払い方法を取得します
            'type' => 'card', // 取得したい支払い方法のタイプを指定します。例えば、'card'はクレジットカードを表します
        ]);
        // $paymentMethodを除外する
        $filteredPaymentMethods = array_filter($paymentMethods->data, function ($method) use ($defaultPaymentMethodId) {
            return $method->id !== $defaultPaymentMethodId;
        });
        
        return view('design/prepaid_card', [
            'intent' => $setupIntent ?? null,
            'paymentMethod'=>$paymentMethod,
            'filteredPaymentMethods'=>$filteredPaymentMethods,
        ]);
        } else {
            // ログインしていない場合もセットアップインテントを作成
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $setupIntent = \Stripe\SetupIntent::create();
        return view('design/prepaid_card_new', [
            'intent' => $setupIntent,
        ]);
            }
        }

    //新規ユーザー支払いポスト
    public function prepaid_new_purchase(Request $request){

        $user = Auth::user();
        $total=$request->amount;

        //支払いプロセス
        // Stripe顧客ではないので、新規顧客にする
        $stripeCustomer = $user->createOrGetStripeCustomer();
        // フォーム送信の情報から$paymentMethodを作成する
        $paymentMethod = $request->input('stripePaymentMethod');
        //PaymentMethod を顧客にアタッチする
        $attachedPaymentMethod = $user->updateDefaultPaymentMethod($paymentMethod);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // 支払いインテントを作成
        $paymentIntent = PaymentIntent::create([
            'amount' => $total, // 
            'currency' => 'JPY',
            'customer' => $stripeCustomer->id, // 顧客のIDを指定する
            'payment_method' => $attachedPaymentMethod->id,
            'confirmation_method' => 'manual',
            'confirm' => true,
        ]);
        // ここで支払いが成功したかどうかを確認するロジックを実装
        if ($paymentIntent->status === 'succeeded') {
            
            // 一回での支払い完了メール送信
            $email = $user->email;
            \Mail::to($user['email'])->send(new PrepaidCardMail($email,$total)
        );
            $buyer=Buyer::where('email','=',$user->email)->first();
            //プリペイド残高追加
            $buyer->update([
                'balance' => (int)$buyer->balance + (int)$request->amount,
            ]);
            $downloads=Download::where('user_id','=',$user->id)->orderBy('created_at','asc')->get();
            $type=$user->type;

            return view('my_page',compact('type','downloads','user','buyer'));
    
            // return redirect()->route('design_receipt', $design)->withHeaders($response->headers->all());
        } else {
            // 支払いが失敗した場合の処理
            return redirect()->route('payment.failed');
        }

    }
    //リピーター支払いポスト
    public function prepaid_repeat_purchase(Request $request){

        $user = Auth::user();
        $total=$request->amount;

        //支払いプロセス
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // ユーザーのデフォルトの支払い方法を取得
        $paymentMethods = PaymentMethod::all([
            'customer' => $user->stripe_id,
            'type' => 'card',
            'limit' => 1, // デフォルトの支払い方法は1つだけ取得する
        ]);
            // デフォルトの支払い方法がある場合、その支払い方法を使用する
            if (!empty($paymentMethods->data)) {
                $defaultPaymentMethod = $paymentMethods->data[0];
                $attachedPaymentMethod = $defaultPaymentMethod->id;
                // 支払いインテントを作成
                $paymentIntent = PaymentIntent::create([
                    'amount' => $total, // 
                    'currency' => 'JPY',
                    'customer' => $user->stripe_id, // 顧客のIDを指定する
                    'payment_method' => $attachedPaymentMethod,
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                ]);
    
                // ここで支払いが成功したかどうかを確認するロジックを実装
        if ($paymentIntent->status === 'succeeded') {
            
            // 一回での支払い完了メール送信
            $email = $user->email;
            \Mail::to($user['email'])->send(new PrepaidCardMail($email,$total)
        );

        $buyer=Buyer::where('email','=',$user->email)->first();
        //プリペイド残高追加
        $buyer->update([
            'balance' => (int)$buyer->balance + (int)$request->amount,
        ]);
        $downloads=Download::where('user_id','=',$user->id)->orderBy('created_at','asc')->get();
        $type=$user->type;

        return view('my_page',compact('type','downloads','user','buyer'));
            } else {
                // デフォルトの支払い方法が見つからない場合、エラー処理を行うか、適切な処理を行う
                return back()->with('error', 'デフォルトの支払い方法が見つかりませんでした。');
            }
    }
}
    //プリペイド残高利用(一回購入)
    public function prepaid_submit(Request $request,$id){
        $design=Design::where('id','=',$id)->first();
        // ログインユーザーを$buyerとする
        $user = Auth::user();
        $buyer=Buyer::where('email','=',$user->email)->first();
        $total=$design->price;
        //残高から金額を差し引く
        $buyer->update([
            'balance' => (int)$buyer->balance - (int)$total,
        ]);
        //DLか現物かの分岐
        $original=$design->original;
        if($original==0){
            $download=new Download();
            $download->artist_id=$design->artist_id;
            $download->design_id=$design->id;
            $download->user_id=$user->id;
            $download->price=$design->price;
            $download->designName=$design->name;
            $download->name=$request->name;
            $download->payment_status=1;
            $download->email=$user->email;
            $download->save();
            $total=$download->price;
            //pdf作成
            $pdf = \PDF::loadView('design.pdf', compact('total','download'));
            // 一回での支払い完了メール送信
            $email = $user->email;
            \Mail::to($user['email'])->send(new DownloadMail($user, $total, $pdf, $email));
          // 処理後に'ルート設定'にページ移行
            return view('design/receipt',[
            'email'=>$email,
        ]);
        }else{
            $download=new Download();
            $download->artist_id=$design->artist_id;
            $download->design_id=$design->id;
            $download->user_id=$user->id;
            $download->price=$design->price;
            $download->designName=$design->name;
            $download->name=$request->name;
            $download->payment_status=1;
            $download->email=$user->email;
             // 現物購入と示す
            $download->download_status = 10;
            $download->save();

            $total=$download->price;

            //pdf作成→メール送信
            $pdf = \PDF::loadView('design.pdf2', compact('total','download','buyer'));
            // 一回での支払い完了メール送信
            $email = $user->email;
            \Mail::to($user['email'])->send(new AddressMail($user, $total, $pdf, $email));
            $date = Carbon::today()->addWeek();
            \Mail::to($design->email)->send(new ShipMail($design,$buyer,$date));
            $ship=new Ship();
            $ship->design_id=$design->id;
            $ship->postal=$buyer->postal;
            $ship->address=$buyer->address;
            $ship->name=$buyer->name;
            $ship->tel=$buyer->tel;
            $ship->order_email=$buyer->email;
            $ship->order=true;
            $ship->ship=true;
            $ship->paid=true;
            $ship->due_date=$date;
            $ship->save();
            //表示を販売済みに変更する
            $design->update([
                'original'=>3,
            ]);
            // 処理後に'ルート設定'にページ移行
            return view('design/receipt_address',[
                'email'=>$email,
            ]);

        }
    }
    //プリペイド残高利用
    public function prepaid_submit_cart(Request $request,$id){

        $user = Auth::user();
        $buyer=Buyer::where('email','=',$user->email)->first();
        $total=$id;
        //残高から金額を差し引く
        $buyer->update([
            'balance' => (int)$buyer->balance - (int)$total,
        ]);
        // 支払いが成功した場合の処理
        $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=','0')->get();
        foreach($downloads as $download){
            //payment_statusの変更0->1
            $download->payment_status = 1;
            $download->name = $request->name;
            $download->save();
            $design =Design::where('id','=',$download->design_id)->first();
            if ($design) {
                // デザインを配列に追加
                $designs[] = $design;
            }
            //ダウンロード購入があったら$to_downloadsに入れる
            $to_download = Design::where('id','=',$download->design_id)->where('original','=','0')->first();
                if ($to_download){
                $to_downloads[]=$to_download;
                }
        }
        //支払が今行われたものでダウンロードがまだ起きていないもの
            $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=','1')->where('download_status','=','0') ->get();
        // 追加されたデザインの中で original が 1 または 0 であるものをチェック
            $hasOriginalOne = false;
            $hasOriginalZero = false;

            foreach ($designs as $design) {
                if ($design->original == 1) {
                    $hasOriginalOne = true;
                }
                if ($design->original == 0) {
                    $hasOriginalZero = true;
                }
            }
        // 分岐処理（現物とDL)
            if ($hasOriginalOne && $hasOriginalZero) {
                //現物販売のもののdownload_statusを更新する
            
            $pdf = \PDF::loadView('design.pdf2', compact('total','downloads','buyer'));
            //現物なら
            foreach($downloads as $download){
                $design =Design::where('id','=',$download->design_id)->first();
                if ($design->original == 1) { 
                    $download->update([
                        'download_status'=>10,
                    ]);
                }
            }
            $email = $user->email;
            \Mail::to($email)->send(new AddressUnMail($email,$total,$pdf));
            $date = Carbon::today()->addWeek();
            foreach($designs as $design){
                if($design->original==1){
                \Mail::to($design->email)->send(new ShipMail($design,$buyer,$date));
                $ship=new Ship();
                $ship->design_id=$design->id;
                $ship->postal=$buyer->postal;
                $ship->address=$buyer->address;
                $ship->name=$buyer->name;
                $ship->tel=$buyer->tel;
                $ship->order_email=$buyer->email;
                $ship->order=true;
                $ship->ship=true;
                $ship->paid=true;
                $ship->due_date=$date;
                $ship->save();
                //表示を販売済みに変更する
                $design->update([
                    'original'=>3,
                ]);

                    }
                }
                return view('design/receipt_mix',[
                    'user'=>$user,
                    'email'=>$email,
                ]);
                //現物のみ
            } elseif ($hasOriginalOne) {
                //領収書作成→メール送信
                $pdf = \PDF::loadView('design.pdf2', compact('total','downloads','buyer'));
                foreach($downloads as $download){
                    $download->update([
                        'download_status'=>10,
                    ]);
                }
                $email = $user->email;
                \Mail::to($email)->send(new AddressMail($user, $total, $pdf, $email)); // 引数の順番を確認
                $date = Carbon::today()->addWeek();
                foreach($designs as $design){
                    \Mail::to($design->email)->send(new ShipMail($design,$buyer,$date));
                    $ship=new Ship();
                    $ship->design_id=$design->id;
                    $ship->postal=$buyer->postal;
                    $ship->address=$buyer->address;
                    $ship->name=$buyer->name;
                    $ship->tel=$buyer->tel;
                    $ship->order_email=$buyer->email;
                    $ship->order=true;
                    $ship->paid=true;
                    $ship->ship=true;
                    $ship->due_date=$date;
                    $ship->save();
                //表示を販売済みに変更する
                $design->update([
                    'original'=>3,
                ]);
            }

                return view('design/receipt_address',[
                    'user'=>$user,
                    'email'=>$email,
                ]);
            // DLのみ
            } elseif ($hasOriginalZero) {
                //pdf作成
                $pdf = \PDF::loadView('design.pdf', compact('total','downloads'));
                $email = $user->email;
                \Mail::to($user['email'])->send(new DownloadMail($user,$total, $pdf,$email));  
                return view('design/receipt',[
                    'user'=>$user,
                    'email'=>$email,
                ]);
                }
            //カートを空にする


            return view('design/receipt',[
                'user'=>$user,
                'email'=>$email,
            ]);
        }
    //プリペイド登録作業
    public function prepaid_add(Request $request){
        $user = Auth::user();
        $buyer=Buyer::where('email','=',$user->email)->first();
        $total=$id;
        //登録を確認
        $code=$request->code;
        $prepaid=Prepaid::where('code','=',$code)->first();
        if (!$prepaid) {
            // レコードが見つからなかった場合の処理
            // 例: エラーメッセージを返す
            return response()->json(['error' => '認証コードを確認して下さい。'], 404);
        }else{
            $buyer->update([
                'balance' => (int)$buyer->balance + (int)$prepaid->price,
            ]);

            return view('design/prepaid_add',compact('user','buyer'));

        }
    }

    }