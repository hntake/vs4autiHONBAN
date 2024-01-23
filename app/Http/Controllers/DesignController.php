<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Artist;
use App\Models\Design;
use App\Models\Download;
use App\Mail\Pay;
use Intervention\Image\Facades\Image;
use File;
use Session;



class DesignController extends Controller
{
    //アーティスト募集ページ
    public function poster(Request $request){
        return view('design/poster');
    }
    //アーティスト登録ページ
    public function register(Request $request){
        return view('design/register');
    }
    //障がいアートトップページ
    public function list(){
        if (Auth::user()) {
        $user=Auth::user();
        $designs=Design::orderBy('id', 'asc')->paginate(50);
        return view('design/list',[
            'designs'=>$designs,
        ]);
    }else{
        $tempCart = Session::get('tempCart', []);
        $designs=Design::orderBy('id', 'asc')->paginate(50);
        return view('design/list',[
            'designs'=>$designs,
            'tempCart'=>$tempCart,
        ]);
    }
    }
    //アーティストページ（自分用）
    public function my_sheet(Request $request){

        if (Auth::user()) {
        $user=Auth::user();
        $artist=Artist::where('email','=',$user->email)->first();
        $designs=Design::where('email','=',$user->email)->orderBy('id', 'desc')->paginate(10);
        $downloads=Download::where('artist_id','=',$artist->id)->paginate(10);
        $total = Download::where('artist_id', $artist->id)->selectRaw('SUM(price) as total_price')->get();
        return view('design/my_sheet',[
            'user'=>$user,
            'designs'=>$designs,
            'artist'=>$artist,
            'downloads'=>$downloads,
            'total'=>$total,
        ]);
    
    }
    else{
        return view('auth/login');
    }

    }
    //プロフィール画像登録ページへ
    public function image(){

        $user=Auth::user();
        $image=Artist::where('email','=',$user->email)->value('image');
        return view('design/edit_image',[
            'image'=>$image,
        ]);
    }
     //プロフィール画像登録(登録はしない)
    public function update_image(Request $request){
        $validate = $request->validate(
            [
                'image' => 'required|file|image:jpeg,png,jpg|max:5000',
            ],
            [
                'image' => '画像を選んでください',
                ]
        );
        $path = $request->file('image')->store('public');
        $user=Auth::user();
        $artist=Artist::where('email','=',$user->email)->first();
        $new_image=$artist->image = str_replace('public/', '', $path);
        return view('design/image_confirm',[
            'artist'=>$artist,
            'new_image'=>$new_image,
        ]);
    }
    
    //プロフィール画像本登録
    public function image_send(Request $request,$new_image){
        $user=Auth::user();
        $artist=Artist::where('email','=',$user->email)->first();
        $artist->image=$new_image;
        $artist->save();
        $designs=Design::where('email','=',$user->email)->orderBy('id', 'desc')->paginate(10);
        $downloads=Download::where('artist_id','=',$artist->id)->paginate(10);
        $total = Download::where('artist_id', $artist->id)->selectRaw('SUM(price) as total_price')->get();
        return view('design/my_sheet',[
            'user'=>$user,
            'designs'=>$designs,
            'artist'=>$artist,
            'downloads'=>$downloads,
            'total'=>$total,
        ]);
    }

    //アーティストページ（閲覧用）
    public function artist(Request $request,$id){
        $artist=Artist::find($id);
        $designs=Design::where('email','=',$artist->email)->orderBy('id', 'desc')->paginate(10);
        return view('design/artist',[
            'artist'=>$artist,
            'designs'=>$designs
        ]);
    }
    //作品登録ページへ
    public function post(){
        return view('design/post');
    }
    //作品ポスト
    public function posted(Request $request){
        $user=Auth::user();
        $design_name=$request->name;
        $design_price=$request->price;
        $validate = $request->validate(
            [
                'image' => 'required|file|image:jpeg,png,jpg|max:5000',
            ],
            [
                'image' => '画像を選んでください',
                ]
        );
        $path = $request->file('image')->store('public');
        $new_image = str_replace('public/', '', $path);

    



        return view('design/confirm',[
            'design_name'=>$design_name,
            'design_price'=>$design_price,
            'new_image'=>$new_image,
        ]);

    }
    //作品ポスト完了
    public function confirm($design_name,$design_price,$new_image){
        return view('design/confirm');
    }

     //作品登録ページへ
    public function upload(Request $request,$new_image){
        $user=Auth::user();

        $design=new Design();
        $design->email=$user->email;
        $design->image=$new_image;
        $design->name=$request->name;
        $design->price=$request->price;
        $design->artist_name=Artist::where('email','=',$user->email)->value('artist_name');
        $design->artist_id=Artist::where('email','=',$user->email)->value('id');

        // 元の画像のパス
        $originalImagePath = storage_path('app/public/') . $new_image;

        // コピー先のディレクトリ
        $copyDirectory = storage_path('app/public/');

        // 新しい名前の画像ファイル
        $processedImageName =  uniqid() . '.' . pathinfo($new_image, PATHINFO_EXTENSION);

        // 画像を読み込み
        $image = Image::make($originalImagePath);

        // ウォーターマークのパス
        $watermarkPath = public_path('img/mask.png');

        // ウォーターマークを載せる
        $image->insert($watermarkPath, 'bottom-right', 10, 10);

         // 加工後の画像を保存
        $processedImagePath = $copyDirectory . $processedImageName;
        $image->save($processedImagePath);

        // デザインに元の画像と加工後の画像のパスを保存
        $design->real_image = $new_image; // 元の画像のパス
        $design->image = $processedImageName; // 加工後の画像のパス
        $design->save();




        $artist=Artist::where('email','=',$user->email)->first();
        $designs=Design::where('email','=',$user->email)->orderBy('id', 'desc')->paginate(10);
        $downloads=Download::where('artist_id','=',$artist->id)->paginate(10);
        $total = Download::where('artist_id', $artist->id)->selectRaw('SUM(price) as total_price')->get();

        return view('design/my_sheet',[
            'user'=>$user,
            'designs'=>$designs,
            'artist'=>$artist,
            'downloads'=>$downloads,
            'total'=>$total,
        ]);

    }
//作品削除
    public function design_deleted(Request $request,$id)
{
    $user=Auth::user();
    $design=Design::where('id','=',$id)->delete();
    $artist=Artist::where('email','=',$user->email)->first();
    $designs=Design::where('email','=',$user->email)->orderBy('id', 'desc')->paginate(10);
    $downloads=Download::where('artist_id','=',$artist->id)->paginate(10);
    $total = Download::where('artist_id', $artist->id)->selectRaw('SUM(price) as total_price')->get();

    return view('design/my_sheet',[
        'user'=>$user,
        'designs'=>$designs,
        'artist'=>$artist,
        'downloads'=>$downloads,
        'total'=>$total,
    ]);}
    //送金申請ページ
    public function design_pay(Request $request)
    {
        $user=Auth::user();
        $artist=Artist::where('email','=',$user->email)->first();

        return view('design/pay',[
            'artist'=>$artist,
        ]);}

    //送金申請post
    public function design_order(Request $request)
    {
        $user=Auth::user();
        $price=$request->price;
        $artist = Artist::where('email', '=', $user->email)->first();
            $artist->update([        
            'paid'=>$artist->paid + $request->price,
            'unpaid'=>$artist->unpaid - $request->price,
            'bank_name'=>$request->bank_name,
            'bank_branch'=>$request->bank_branch,
            'account_number'=>$request->account_number,
        ]);
        //入力されたメールアドレスにメールを送信
        //   \Mail::to($artist['email'])->send(new Paymail($artist));
        \Mail::to($user['email'])->send(new Pay($user, $artist,$price));

          //再送信を防ぐためにトークンを再発行
        $request->session()->regenerateToken();

          //送信完了ページのviewを表示
        return view('design/paid',[
            'artist'=>$artist,
            'price'=>$price,
        ]);
    }
    //ダウンロード開始画面
    public function to_download($id)
    {
        $user=Auth::user();
        if ($user) {

            $downloads=Download::where('email','=',$user->email)->where('payment_status','=','1')->where('download_status','=','0') ->get();
            return view('design/download',[
                'downloads'=>$downloads,
                'user'=>$user,
            ]);
            }else{
                $downloads=Download::where('email','=',$id)->where('payment_status','=','1')->where('download_status','=','0') ->get();

            return view('design/to_download',[
                'downloads'=>$downloads,
            ]);
            }

    }
    //ダウンロードポスト
    public function download($id)
    {
        $downloads=Download::where('email','=',$id)->where('payment_status','=','1')->where('download_status','=','0') ->get();

        //ダウンロードが始まる
        $downloadFilePaths = [];

        foreach($downloads as $download){
            $design=Design::where('id','=',$download->design_id)->first();
            //designのdownloadedに加算
            $design->downloaded += 1;
            $design->save();

            $filePath = storage_path("app/public/{$design->real_image}");
            Response::download($filePath);

            //download_statusの変更0->1
            $download->download_status = 1;
            $download->save();

            //artistのunpaidに加算
            $artist = Artist::find($download->artist_id);
            $artist->increment('unpaid', $download->price);       
        }

        return redirect('design/to_download')->with('success','ダウンロード完了しました');
    }
}