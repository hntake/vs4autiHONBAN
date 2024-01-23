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
use Carbon\Carbon;
use App\Mail\RegisterMail;
use App\Mail\DownloadMail;
use App\Mail\DownloadUnMail;
use Doctrine\Inflector\Rules\Substitution;
use Illuminate\Support\Facades\Mail;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Response;
use Laravel\Cashier\Cashier;
use Stripe\Customer;



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
    

    /**顧客支払画面へ
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function design_stripe(Request $request, $id)
{
    $design=Design::where('id','=',$id)->first();

    $user = Auth::user();

    if ($user) {
        // ログインしている場合
    //Downloadに新規保存
    $download=new Download();
    $download->artist_id=$design->artist_id;
    $download->design_id=$design->id;
    $download->user_id=$user->id;
    $download->price=$design->price;
    $download->payment_status=1;
    $download->designName=$design->name;
    $download->save();    

    $setupIntent = $user->createSetupIntent();
    } else {
        // ログインしていない場合もセットアップインテントを作成
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $setupIntent = \Stripe\SetupIntent::create();
    }
    return view('design/stripe', [
        'intent' => $setupIntent,
        'design'=>$design,
    ]);
}

 /**顧客支払画面へ(非ユーザー)
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function design_once(Request $request, $id)
{
    $design=Design::where('id','=',$id)->first();

   
    //Downloadに新規保存
    $download=new Download();
    $download->artist_id=$design->artist_id;
    $download->design_id=$design->id;
    $download->user_id=0;
    $download->price=$design->price;
    $download->payment_status=1;
    $download->designName=$design->name;
    $download->save();    

    
        // ログインしていない場合もセットアップインテントを作成
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $setupIntent = \Stripe\SetupIntent::create();
    return view('design/once', [
        'intent' => $setupIntent,
        'design'=>$design,
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
            'user_id' => 0,
            'price' => $design->price,
            'designName' => $design->name,
            // Add other design information as needed
        ];
        Session::put('tempCart', $tempCart);

    }
    return redirect('design/list');

}
//マイカート画面表示
public function index_cart()
{
    $user = Auth::user();
    $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=',0)->orderBy('created_at', 'desc')->get();
    $total = Download::where('user_id', $user->id)->where('payment_status','=',0)->sum('price');
    $setupIntent = $user->createSetupIntent();

    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        if ($user->stripe_id) {
        // ユーザーに関連するCustomerオブジェクトを取得
        $customer = Customer::retrieve($user->stripe_id);

        // Customerオブジェクトから支払い情報を取得
        $paymentMethods = $customer->payment_methods;

        return view('design/cart', [
            'intent' => $setupIntent ?? null,
            'downloads'=>$downloads,
            'total'=>$total,
            'paymentMethods'=>$paymentMethods,
        ]);
        }else{
            return view('design/cart', [
                'intent' => $setupIntent ?? null,
                'downloads'=>$downloads,
                'total'=>$total,
                'paymentMethods'=>null,
            ]);
        }

}
//マイカート画面表示(非ユーザー)
public function index_cart_un()
{
    $tempCart = Session::get('tempCart', []);

    $designs = []; // デザイン情報を格納する配列
    $total= 0; // 合計金額を格納する変数

    foreach($tempCart as $downloadId => $downloadDetails){
        $downloads[] = [
            'design_id' => $downloadDetails['design_id'],
            'price' => $downloadDetails['price'],
            'designName' => $downloadDetails['designName'],
            // 他のデザイン情報も必要に応じて追加
        ];
        // 合計金額を計算
    $total += $downloadDetails['price'];
    }
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    // Stripeセットアップインテントの作成
    $setupIntent = SetupIntent::create([
        'payment_method_types' => ['card'], // クレジットカードのみを受け付ける場合
    ]);
    
return view('design/cart_un', [
    'total'=>$total,
    'tempCart'=>$tempCart,
    'clientSecret' => $setupIntent->client_secret,
]);
}

public function delete_cart($id)
{
    //ユーザーしか削除作業ができない
    $user = Auth::user();
    $download=Download::find($id)->delete();

    $user = Auth::user();
    $downloads=Download::where('user_id','=',$user->id)->orderBy('created_at', 'desc')->get();
    $total = Download::where('user_id', $user->id)->sum('price');
    $setupIntent = $user->createSetupIntent();


    return view('design/cart', [
        'intent' => $setupIntent,
        'downloads'=>$downloads,
        'total'=>$total,
    ]);

}
//カートを空にする
public function empty_cart(){
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
        $total = Download::where('user_id', $user->id)->where('payment_status','=','0')->sum('price');
        
    // またStripe顧客でなければ、新規顧客にする
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
            // 支払いが成功した場合の処理この
            $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=','0')->get();
            foreach($downloads as $download){
                //payment_statusの変更0->1
                $download->payment_status = 1;
                $download->name = $request->name;
                $download->save();
            }
        //支払が今行われたものでダウンロードがまだ起きていないもの
            $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=','1')->where('download_status','=','0') ->get();
            //pdf作成
            $pdf = \PDF::loadView('design.pdf', compact('total','download'));
            // 一回での支払い完了メール送信
            $email = $request['email'];
            \Mail::to($user['email'])->send(new DownloadMail($user,$total,$pdf));

            return view('design/receipt',[
                'user'=>$user,
                'email'=>$email,
            ]);
        } else {
            // 支払いが失敗した場合の処理
            return redirect()->route('payment.failed');
        }
    }

//非ユーザーの場合のカートからの支払い
public function post_cart_un(Request $request,$id){
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


    // try {
    //     // 引数を渡す必要がないので、第二引数は削除
    //     \Stripe\PaymentIntent::confirm($clientSecret);
    // } catch (\Stripe\Exception\CardException $e) {
    //     // カードエラーの場合の処理
    //     return redirect()->route('payment.failed');
    // } catch (\Stripe\Exception\InvalidRequestException $e) {
    //     // 他のエラーの場合の処理
    //     return redirect()->route('payment.failed');
    // }


        // ここで支払いが成功したかどうかを確認するロジックを実装
        if ($paymentIntent->status === 'succeeded') {
            // 支払いが成功した場合の処理この
            $downloads=Download::where('email','=',$request->email)->where('payment_status','=','0')->get();
            foreach($downloads as $download){
                //payment_statusの変更0->1
                $download->payment_status = 1;
                $download->name = $request->name;
                $download->save();
            }
        //支払が今行われたものでダウンロードがまだ起きていないもの
            $downloads=Download::where('email','=',$request->email)->where('payment_status','=','1')->where('download_status','=','0') ->get();
            //pdf作成
            $pdf = \PDF::loadView('design.pdf', compact('total','downloads'));
            // 一回での支払い完了メール送信
            $email = $request['email'];
            \Mail::to($email)->send(new DownloadUnMail($email,$total,$pdf));

            return view('design/receipt',[
                'email'=>$email,
            ]);
        } else {
            // 支払いが失敗した場合の処理
            return redirect()->route('payment.failed');
        }
    }
//一回での支払い(ユーザー)
    public function design_stripePost(Request $request,$id)
    {
        $design=Design::where('id','=',$id)->first();
        // ログインユーザーを$buyerとする
        $user = Auth::user();
        // 顧客の取得
        // $stripe_id = $user->stripe_id; // これは実際のユーザーのStripe IDのプロパティにアクセスするための例です。実際のプロパティに合わせて変更してください。
        // $user = Cashier::findBillable($stripeId);

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
            $download->save();
            
            $total=$download->price;
            //pdf作成
            $pdf = \PDF::loadView('design.pdf', compact('total','download'));
            // 一回での支払い完了メール送信
            $email = $request['email'];
            \Mail::to($user['email'])->send(new DownloadMail($total,$pdf,$user));
              //ダウンロードが始まる
            $filePath = storage_path("app/public/{$design->image}");
            return Response::download($filePath);
    
            // 処理後に'ルート設定'にページ移行
            return redirect()->route('design_receipt', $design)->withHeaders($response->headers->all());
        } else {
            // 支払いが失敗した場合の処理
            return redirect()->route('payment.failed');
        }
        
    }

    //非ユーザーの一回の支払い
    public function design_oncePost (Request $request,$id){
        
        $design=Design::where('id','=',$id)->first();

        
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $download = Download::create(array(
                'email' => $request->email,
                'source' => $request->stripeToken
            ));

            $paymentIntent = PaymentIntent::create([
                'customer' => $download->id,
                'amount' => $design->price,
                'currency' => 'jpy',
            ]);

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
            $download->save();

        // 一回での支払い完了メール送信
        $email = $request['email'];
        Mail::send(new DownloadMail($email));
            //ダウンロードが始まる
        $filePath = storage_path("app/public/{$design->image}");
        return Response::download($filePath);

        // 処理後に'ルート設定'にページ移行
        return redirect()->route('design_receipt', $design)->withHeaders($response->headers->all());
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
        //サブスク申し込み完了メール送信
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
}
