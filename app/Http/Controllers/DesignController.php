<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Artist;
use App\Models\Design;
use App\Models\Download;
use App\Models\Badge;
use App\Models\Genre;
use App\Models\Buyer;
use App\Models\Ship;
use App\Mail\Pay;
use App\Mail\Unpaid;
use App\Mail\Protect;
use App\Mail\DownloadMail;
use App\Mail\ShippedMail;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use File;
use Session;
use Illuminate\Support\Facades\Response;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use App\Helpers\TwitterHelper;
use Stripe\SetupIntent;
use Stripe\PaymentIntent;
use Laravel\Cashier\Cashier;
use Stripe\Customer;
use Stripe\PaymentMethod;
use Illuminate\Support\Str;




class DesignController extends Controller
{
    //アーティスト募集ページ
    public function poster(Request $request){
        return view('design/recruit');
    }
    //アーティスト登録ページ
    public function register(Request $request){
        return view('design/register');
    }
    //障がいアートトップページ
    public function list(){
        if (Auth::user()) {
        $user=Auth::user();
        $designs=Design::whereNotNull('name')
        ->orderBy('id', 'desc')->paginate(10);
        return view('design/list',[
            'designs'=>$designs,
            'user'=>$user,
        ]);
    }else{
        $tempCart = Session::get('tempCart', []);
        $designs=Design::whereNotNull('name')
        ->orderBy('id', 'desc')->paginate(10);
        return view('design/list',[
            'designs'=>$designs,
            'tempCart'=>$tempCart,
        ]);
    }
}
       //カテゴリー毎ページ
    public function genre($id){
        if (Auth::user()) {
        $user=Auth::user();
        //ジャンル名を渡す
        $genre=Genre::where('id','=',$id)->value('genre');
        $designs=Design::orWhere('genre1',$id)->orWhere('genre2',$id)->orWhere('genre3',$id)->orderBy('id', 'desc')->paginate(10);
        //ジャンルに該当するデザインがあったら
        if($designs){
            $preload = Design::where('genre1', $id)
            ->orWhere('genre2', $id)
            ->orWhere('genre3', $id)
            ->inRandomOrder() // ランダムに並べ替え
            ->first(); // 最初のレコードを取得
            }else{
            $preload=0;
        }
        return view('design/genre',[
            'designs'=>$designs,
            'user'=>$user,
            'genre'=>$genre,
            'preload'=>$preload,
        ]);
    }else{
        $tempCart = Session::get('tempCart', []);
        $genre=Genre::where('id','=',$id)->value('genre');

        $designs=Design::orWhere('genre1',$id)->orWhere('genre2',$id)->orWhere('genre3',$id)->orderBy('id', 'desc')->paginate(10);
        //ジャンルに該当するデザインがあったら
        if($designs){
            $preload = Design::where('genre1', $id)
            ->orWhere('genre2', $id)
            ->orWhere('genre3', $id)
            ->inRandomOrder() // ランダムに並べ替え
            ->first(); // 最初のレコードを取得
            }else{
            $preload=0;
        }
        return view('design/genre',[
            'designs'=>$designs,
            'tempCart'=>$tempCart,
            'genre'=>$genre,
            'preload'=>$preload,
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
        $total = Download::where('artist_id', $artist->id)->selectRaw('SUM(price) as total_price')->first();
        $cost = round(($total->total_price)*0.046);
        $badges=Badge::where('artist_id','=',$artist->id)->paginate(10);
        return view('design/my_sheet',[
            'user'=>$user,
            'designs'=>$designs,
            'artist'=>$artist,
            'downloads'=>$downloads,
            'total'=>$total,
            'cost'=>$cost,
            'badges'=>$badges,
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
        $total = Download::where('artist_id', $artist->id)->selectRaw('SUM(price) as total_price')->first();
        $cost = round(($total->total_price)*0.046);
        $badges=Badge::where('artist_id','=',$artist->id)->paginate(10);

        return view('design/my_sheet',[
            'user'=>$user,
            'designs'=>$designs,
            'artist'=>$artist,
            'downloads'=>$downloads,
            'total'=>$total,
            'cost'=>$cost,
            'badges'=>$badges,

        ]);
    }

    //アーティストページ（閲覧用）
    public function artist(Request $request,$id){
        $user=Auth::user();
        $artist=Artist::find($id);
        $designs=Design::where('email','=',$artist->email)->orderBy('id', 'desc')->paginate(10);
        return view('design/artist',[
            'artist'=>$artist,
            'designs'=>$designs,
            'user'=>$user
        ]);
    }
      //アーティストリストページ（閲覧用）
    public function artist_list(){
        $artists=Artist::orderBy('id', 'asc')->paginate(10);
        return view('design/artist_list',[
            'artists'=>$artists,
        ]);
    }
    //DL作品登録ページへ
    public function post(){

        $genres= Genre::all();
        return view('design/post', compact('genres'));
    }
    //現物作品登録ページへ
    public function post_ad(){

        $genres= Genre::all();
        return view('design/post_ad', compact('genres'));
    }
    //作品ポスト
    public function posted(Request $request){
        $user=Auth::user();
        $now = Carbon::now();
        $now_format = $now->format('Y-m-d H:i:s');

        $validate = $request->validate(
            [
                'image' => 'required|file|image:jpeg,png,jpg|max:200000',
                'genre' => 'required',
                'price' => 'required|numeric|not_between_custom:1,49',
            ],
            [
                'image.required' => '画像を選択してください。',
                'image.file' => '画像を選択してください。',
                'image.image' => '画像ファイルを選択してください。',
                'image.mimes' => '画像はJPEG、PNG、JPG形式である必要があります。',
                'image.max' => '画像サイズは2MB以下である必要があります。',
                'genre.required' => 'カテゴリを選択してください。',
                'price.required' => '価格を入力してください。',
                'price.in' => '価格は0か50以上である必要があります。',

                ]
        );
        $design_name=$request->name;
        $design_price=$request->price;
        $design_genre=$request->genre[0];
        if(isset($request->genre[1])) {
            $design_genre1=$request->genre[1];
            $genreName2 = Genre::find($design_genre1)->genre;
        }else{
            $design_genre1=0;
            $genreName2=null;
        }
        if(isset($request->genre[2])) {
            $design_genre2=$request->genre[2];
            $genreName3 = Genre::find($design_genre2)->genre;

        }else{
            $design_genre2=0;
            $genreName3=null;

        }
        $genreName1 = Genre::find($design_genre)->genre;

        $validate = $request->validate(
            [
                'image' => 'required|file|image:jpeg,png,jpg|max:500000',
                'genre' => 'required',
            ],
            [
                'image' => '画像を選んでください',
                'genre' => 'カテゴリを選んでください',

                ]
        );
        $newFileName = "{$design_name}_{$now_format}.png"; // 新しいファイル名
        $path = $request->file('image')->storeAs('public', $newFileName);
        $imagePath = str_replace('public/', '', $path);

        // 元の画像のパス
        $originalImagePath = storage_path('app/public/') . $imagePath;

        // コピー先のディレクトリ
        $copyDirectory = storage_path('app/public/');

        // 新しい名前の画像ファイル
        $processedImageName = "{$design_name}_{$now_format}.". pathinfo($imagePath, PATHINFO_EXTENSION);

        // 画像を読み込み
        $image = Image::make($originalImagePath);

        // 縮小するための幅と高さを決定
        $maxWidth = 800;
        $maxHeight = 600;

        // 元の画像サイズを取得
        $originalWidth = $image->getWidth();
        $originalHeight = $image->getHeight();
        // 元の画像が指定した最大サイズより小さい場合は、縮小せずにそのまま保存
        if ($originalWidth <= $maxWidth && $originalHeight <= $maxHeight) {
            $newWidth = $originalWidth;
            $newHeight = $originalHeight;
        } else {
            // 縮小後の画像サイズを計算
            $ratioWidth = $maxWidth / $originalWidth;
            $ratioHeight = $maxHeight / $originalHeight;

            // 幅と高さの比率を比較し、小さい方の比率で縮小する
            $ratio = min($ratioWidth, $ratioHeight);
            $newWidth = $originalWidth * $ratio;
            $newHeight = $originalHeight * $ratio;

             // 画像をリサイズ
            $image->resize($newWidth, $newHeight);
        }
        // リサイズされた画像を保存
        $new_image = str_replace('public/', '', $imagePath);
        $image->save(storage_path('app/public/' .$new_image));


        // 画像のメモリを解放
        $image->destroy();

        $isChecked = $request->input('checkbox');
        $isProtect = $request->input('protect');


        return view('design/confirm',[
            'design_name'=>$design_name,
            'design_price'=>$design_price,
            'design_genre'=>$design_genre,
            'design_genre1'=>$design_genre1,
            'design_genre2'=>$design_genre2,
            'genreName1'=>$genreName1,
            'genreName2'=>$genreName2,
            'genreName3'=>$genreName3,
            'new_image'=>$new_image,
            'isChecked'=>$isChecked,
            'isProtect'=>$isProtect,
        ]);

    }

    //作品ポスト(現物販売)
    public function posted_ad(Request $request){
        $user=Auth::user();
        $now = Carbon::now();
        $now_format = $now->format('Y-m-d H:i:s');

        $validate = $request->validate(
            [
                'image' => 'required|file|image:jpeg,png,jpg|max:200000',
                'genre' => 'required',
                'price' => 'required|numeric|not_between_custom:1,49',
            ],
            [
                'image.required' => '画像を選択してください。',
                'image.file' => '画像を選択してください。',
                'image.image' => '画像ファイルを選択してください。',
                'image.mimes' => '画像はJPEG、PNG、JPG形式である必要があります。',
                'image.max' => '画像サイズは2MB以下である必要があります。',
                'genre.required' => 'カテゴリを選択してください。',
                'price.required' => '価格を入力してください。',
                'price.in' => '価格は0か50以上である必要があります。',

                ]
        );
        $design_name=$request->name;
        $design_price=$request->price;
        $design_genre=$request->genre[0];
        if(isset($request->genre[1])) {
            $design_genre1=$request->genre[1];
            $genreName2 = Genre::find($design_genre1)->genre;
        }else{
            $design_genre1=0;
            $genreName2=null;
        }
        if(isset($request->genre[2])) {
            $design_genre2=$request->genre[2];
            $genreName3 = Genre::find($design_genre2)->genre;

        }else{
            $design_genre2=0;
            $genreName3=null;

        }
        $genreName1 = Genre::find($design_genre)->genre;

        $validate = $request->validate(
            [
                'image' => 'required|file|image:jpeg,png,jpg|max:500000',
                'genre' => 'required',
            ],
            [
                'image' => '画像を選んでください',
                'genre' => 'カテゴリを選んでください',

                ]
        );
        $newFileName = "{$design_name}_{$now_format}.png"; // 新しいファイル名
        $path = $request->file('image')->storeAs('public', $newFileName);
        $imagePath = str_replace('public/', '', $path);

        // 元の画像のパス
        $originalImagePath = storage_path('app/public/') . $imagePath;

        // コピー先のディレクトリ
        $copyDirectory = storage_path('app/public/');

        // 新しい名前の画像ファイル
        $processedImageName = "{$design_name}_{$now_format}.". pathinfo($imagePath, PATHINFO_EXTENSION);

        // 画像を読み込み
        $image = Image::make($originalImagePath);

        // 縮小するための幅と高さを決定
        $maxWidth = 800;
        $maxHeight = 600;

        // 元の画像サイズを取得
        $originalWidth = $image->getWidth();
        $originalHeight = $image->getHeight();
        // 元の画像が指定した最大サイズより小さい場合は、縮小せずにそのまま保存
        if ($originalWidth <= $maxWidth && $originalHeight <= $maxHeight) {
            $newWidth = $originalWidth;
            $newHeight = $originalHeight;
        } else {
            // 縮小後の画像サイズを計算
            $ratioWidth = $maxWidth / $originalWidth;
            $ratioHeight = $maxHeight / $originalHeight;

            // 幅と高さの比率を比較し、小さい方の比率で縮小する
            $ratio = min($ratioWidth, $ratioHeight);
            $newWidth = $originalWidth * $ratio;
            $newHeight = $originalHeight * $ratio;

             // 画像をリサイズ
            $image->resize($newWidth, $newHeight);
        }
        // リサイズされた画像を保存
        $new_image = str_replace('public/', '', $imagePath);
        $image->save(storage_path('app/public/' .$new_image));


        // 画像のメモリを解放
        $image->destroy();

        $isChecked = $request->input('checkbox');
        $isProtect = $request->input('protect');


        return view('design/confirm_ad',[
            'design_name'=>$design_name,
            'design_price'=>$design_price,
            'design_genre'=>$design_genre,
            'design_genre1'=>$design_genre1,
            'design_genre2'=>$design_genre2,
            'genreName1'=>$genreName1,
            'genreName2'=>$genreName2,
            'genreName3'=>$genreName3,
            'new_image'=>$new_image,
            'isChecked'=>$isChecked,
            'isProtect'=>$isProtect,
        ]);

    }

    
    //作品登録ページへ
    public function upload(Request $request,$new_image){
        $user=Auth::user();
        $now = Carbon::now();
        $now_format = $now->format('Y-m-d H:i:s');

        $design=new Design();
        $design->email=$user->email;
        $design->image=$new_image;
        $design->name=$request->name;
        $design->price=$request->price;
        $design->genre1=$request->genre1;
        $design->genre2=$request->genre2;
        $design->genre3=$request->genre3;
        $design->artist_name=Artist::where('email','=',$user->email)->value('artist_name');
        $design->artist_id=Artist::where('email','=',$user->email)->value('id');

        $isChecked = $request->input('checkbox');
        $isProtect = $request->input('protect');


        // チェックされた場合の処理
        if ($isChecked) {
        $design->license = 1 ;
        } 
        if ($isProtect) {
        $design->protect = 1 ;
        //お守りバッジへの連絡
        \Mail::to(env('MAIL_USERNAME'))->send(new Protect($design));
        } 
        // 元の画像のパス
        $originalImagePath = storage_path('app/public/') . $new_image;

        // コピー先のディレクトリ
        $copyDirectory = storage_path('app/public/');


       // 乱数やUUIDを生成してファイル名に追加
        $randomString = Str::random(10); // 10文字の乱数文字列を生成
        // 乱数を含む新しいreal_imageのファイル名
        $randomRealImageName = $randomString . '_' . $new_image;

        // real_image_with_name にも乱数を追加したファイル名を作成
        $processedRealImageWithArtistName = $randomString . "_{$design->artist_name}." . pathinfo($new_image, PATHINFO_EXTENSION);
        // 加工された新しい名前の画像ファイル (乱数はつけない)
        $processedImageName = "{$design->name}_{$now_format}_with_processed." . pathinfo($new_image, PATHINFO_EXTENSION);


        // 画像を読み込み
        $image = Image::make($originalImagePath);
        $real_image = Image::make($originalImagePath);

        // ウォーターマークのパス
        $watermarkPath = public_path('img/maskCenter.png');

        // ウォーターマークを載せる
        $image->insert($watermarkPath, 'center', 0, 0);

         // 加工後の画像を保存
        $processedImagePath = $copyDirectory . $processedImageName;
        $image->save($processedImagePath);

        // 乱数を含むreal_imageを保存
        $real_image->save($copyDirectory . $randomRealImageName);

        // デザインに元の画像と加工後の画像のパスを保存
        $design->real_image = $randomRealImageName; // 乱数を含むreal_image
        $design->image = $processedImageName; // 加工後の画像のパス

        $fontPath = storage_path('fonts/NotoSansJP-Thin.ttf');

        $imageWidth = $image->getWidth(); // 画像の幅
        $imageHeight = $image->getHeight(); // 画像の高さ

        $fontSize = 12;

        // GDライブラリを使用
        $textInfo = imagettfbbox($fontSize, 0, $fontPath, $design->artist_name);
        $textWidth = $textInfo[2] - $textInfo[0]; // テキストの幅
        $textHeight = $textInfo[1] - $textInfo[7]; // テキストの高さ


        // 右下にテキストを配置するための座標を計算する
        $textX = $imageWidth - $textWidth;
        $textY = $imageHeight - $textHeight;

        // 画像にテキストを追加する
        $imageWithArtistName = $image->text('©' . $design->artist_name, $textX, $textY, function($font) use ($fontPath) {
        $font->file($fontPath); // フォントのパスを指定
        $font->size(24);
        $font->color('#777777'); // 文字の色を指定
        $font->align('right');
        $font->valign('bottom');
    });
        // アーティスト名を含む水印を追加した画像を保存
        $processedImageWithArtistName =  '_with_artist_name_' . $processedImageName;
        $imageWithArtistName->save($copyDirectory . $processedImageWithArtistName);

        // アーティスト名を含むオリジナル画像も乱数付きで保存
        $processedRealImageWithArtistName = $randomString . "_" . "{$design->artist_name}." . pathinfo($new_image, PATHINFO_EXTENSION);
        // original画像にテキストを追加する
        $realImageWithArtistName = $real_image->text('©' . $design->artist_name, $textX, $textY, function($font) use ($fontPath) {
            $font->file($fontPath); // フォントのパスを指定
            $font->size(24);
            $font->color('#777777'); // 文字の色を指定
            $font->align('right');
            $font->valign('bottom');
        });
        $realImageWithArtistName->save($copyDirectory . $processedRealImageWithArtistName);

        // アーティスト名を含むオリジナル画像を保存
        // $processedRealImageWithArtistName =  "{$design->artist_name}." . $new_image;

        // デザインにアーティスト名を含む水印を追加した画像のパスを保存
        $design->image_with_artist_name = $processedImageWithArtistName;

        // デザインにアーティスト名を含むオリジナル画像のパスを保存
        $design->real_image_with_name = $processedRealImageWithArtistName;
        $design->save();

        


        $artist=Artist::where('email','=',$user->email)->first();
        //登録したのでデザイン数が増える
        $artist->update([
            'design' => $artist->design + 1,
        ]);
        $designs=Design::where('email','=',$user->email)->orderBy('id', 'desc')->paginate(10);
        $downloads=Download::where('artist_id','=',$artist->id)->paginate(10);
        $total = Download::where('artist_id', $artist->id)->selectRaw('SUM(price) as total_price')->first();
        $cost = round(($total->total_price)*0.046);
        $badges=Badge::where('artist_id','=',$artist->id)->paginate(10);

        // Twitterにツイートする例
        $twitterHelper = new TwitterHelper();
        $result = $twitterHelper->tweet($design);

        return view('design/my_sheet',[
            'user'=>$user,
            'designs'=>$designs,
            'artist'=>$artist,
            'downloads'=>$downloads,
            'total'=>$total,
            'cost'=>$cost,
            'badges'=>$badges,

        ]);

    }

    //現物販売作品登録ページへ
    public function upload_ad(Request $request,$new_image){
        $user=Auth::user();
        $now = Carbon::now();
        $now_format = $now->format('Y-m-d H:i:s');

        $design=new Design();
        $design->email=$user->email;
        $design->image=$new_image;
        $design->name=$request->name;
        $design->price=$request->price;
        $design->genre1=$request->genre1;
        $design->genre2=$request->genre2;
        $design->genre3=$request->genre3;
        $design->artist_name=Artist::where('email','=',$user->email)->value('artist_name');
        $design->artist_id=Artist::where('email','=',$user->email)->value('id');
        if ($request->has('image1')) {
            $path1 = $request->file('image1')->store('public');
            $design->image1 = str_replace('public/', '', $path1);
        }
        if ($request->has('image2')) {
            $path2= $request->file('image2')->store('public');
            $design->image2 = str_replace('public/', '', $path2);
        }
        if ($request->has('image3')) {
            $path3 = $request->file('image3')->store('public');
            $design->image3 = str_replace('public/', '', $path3);
        }
        if ($request->has('width')) {
            $design->width = $request->width;
        }
        if ($request->has('depth')) {
            $design->depth = $request->depth;
        }  if ($request->has('weight')) {
            $design->weight = $request->weight;
        }  if ($request->has('height')) {
            $design->height = $request->height;
        }
        $design->original=1;
        $design->save();

        

        $artist=Artist::where('email','=',$user->email)->first();
        //登録したのでデザイン数が増える
        $artist->update([
            'design' => $artist->design + 1,
        ]);
        $designs=Design::where('email','=',$user->email)->orderBy('id', 'desc')->paginate(10);
        $downloads=Download::where('artist_id','=',$artist->id)->paginate(10);
        $total = Download::where('artist_id', $artist->id)->selectRaw('SUM(price) as total_price')->first();
        $cost = round(($total->total_price)*0.046);
        $badges=Badge::where('artist_id','=',$artist->id)->paginate(10);

        // Twitterにツイートする例
        $twitterHelper = new TwitterHelper();
        $result = $twitterHelper->tweet($design);

        return view('design/my_sheet',[
            'user'=>$user,
            'designs'=>$designs,
            'artist'=>$artist,
            'downloads'=>$downloads,
            'total'=>$total,
            'cost'=>$cost,
            'badges'=>$badges,

        ]);
    }
    /*デザイン削除確認画面へ
* @param Request $request
* @return Response
*/
public function design_delete_index($id)
{
    $design=Design::where('id','=',$id)->first();
    return view('design/delete',[
        'design'=>$design,
    ]);
}
//作品削除
    public function design_deleted(Request $request,$id)
{
    $user=Auth::user();
    // デザインを取得
    $image = Design::find($id);

    //現物かDLか分岐
    if($image->original==0){
    // デザインが存在するか確認
        if ($image) {

        // 画像ファイルのパスを取得
        $imagePath =  $image->image;
        $real_imagePath = $image->real_image;
        $imagePathWith = $image->image_with_artist_name;
        $real_imagePathWith = $image->real_image_with_name;

        // データベース内のデザインエントリを削除
        $image->delete();

            Storage::disk('public')->delete($imagePath);
            Storage::disk('public')->delete($real_imagePath);
            Storage::disk('public')->delete($imagePathWith);
            Storage::disk('public')->delete($real_imagePathWith);

        }
    }else{
        $imagePath =  $image->image;
        if(isset($image1)){
            $image1Path =  $image->image1;
        }
        if(isset($image2)){
            $image2Path =  $image->image2;
        } if(isset($image3)){
            $image3Path =  $image->image3;
        }

        $image->delete();
        Storage::disk('public')->delete($imagePath);
        if(isset($image1)){
            Storage::disk('public')->delete($image1Path);
        }
        if(isset($image2)){
            Storage::disk('public')->delete($image2Path);
        }
        if(isset($image3)){
            Storage::disk('public')->delete($image3Path);
        }
    }

    $artist=Artist::where('email','=',$user->email)->first();
    //削除したのでデザイン数が減る
    $artist->update([
        'design' => $artist->design - 1,
    ]);
    $designs=Design::where('email','=',$user->email)->orderBy('id', 'desc')->paginate(10);
    $downloads=Download::where('artist_id','=',$artist->id)->paginate(10);
    $total = Download::where('artist_id', $artist->id)->selectRaw('SUM(price) as total_price')->first();
    $cost = round(($total->total_price)*0.046);
    $badges=Badge::where('artist_id','=',$artist->id)->paginate(10);

    return view('design/my_sheet',[
        'user'=>$user,
        'designs'=>$designs,
        'artist'=>$artist,
        'downloads'=>$downloads,
        'total'=>$total,
        'cost'=>$cost,
        'badges'=>$badges,

    ]);}
    //送金申請ページへ遷移
    public function design_pay(Request $request)
    {
        $user=Auth::user();
        $artist=Artist::where('email','=',$user->email)->first();
        $total = $artist->unpaid;
        $artist=Artist::where('email','=',$user->email)->first();

        return view('design/pay',[
            'artist'=>$artist,
            'total'=>$total,
        ]);}

    //送金申請post
    public function design_order(Request $request)
    {
        $user=Auth::user();
        $price=$request->price;
        // $paid=round(($request->price)/0.954);
        $artist = Artist::where('email', '=', $user->email)->first();
            $artist->update([        
            'paid'=>$artist->paid + $request->price,
            'unpaid'=>$artist->unpaid - $price,
            'bank_name'=>$request->bank_name,
            'bank_branch'=>$request->bank_branch,
            'account_number'=>$request->account_number,
            'account_name'=>$request->name,
            'bank_type'=>$request->bank_type,
        ]);
        //入力されたメールアドレスにメールを送信
        //   \Mail::to($artist['email'])->send(new Paymail($artist));
        \Mail::to($user['email'])->send(new Pay($artist,$price));
        \Mail::to(env('MAIL_USERNAME'))->send(new Pay($artist,$price));

          //再送信を防ぐためにトークンを再発行
        $request->session()->regenerateToken();

          //送信完了ページのviewを表示
        return view('design/paid',[
            'artist'=>$artist,
            'price'=>$price,
        ]);
    }
    //ダウンロードかカートか選択画面
    public function select_download($id)
    {
        $user=Auth::user();
        $design=Design::where('id','=',$id)->first();
        if ($user) {

            return view('design/download',[
                'design'=>$design,
                'user'=>$user,
            ]);
            }else{
                Session::put('design_id', $design->id);
                $designId = Session::get('design_id');
            return view('design/download',[
                'design'=>$design,
            ]);
            }
    }
    public function to_download($id)
    {
        $user=Auth::user();
        if ($user) {

            $downloads=Download::where('email','=',$user->email)->where('payment_status','=','1')->where('download_status','=','0') ->get();
            $designs = collect(); // 空のコレクションを作成

            foreach ($downloads as $download) {
                // $download から design_id を取得し、それを使用して Design モデルを取得
                $design = Design::find($download->design_id);
                
                // Design モデルが存在する場合はコレクションに追加
                if ($design) {
                    $designs->push($design);
                }
                }
                    return view('design/to_download',[
                    'downloads'=>$downloads,
                    'designs'=>$designs,
                    'user'=>$user,
                    'email'=>$id,
                ]);
        }else{
                    $downloads=Download::where('email','=',$id)->where('payment_status','=','1')->where('download_status','=','0') ->get();
                    $designs = collect(); // 空のコレクションを作成

                    foreach ($downloads as $download) {
                        // $download から design_id を取得し、それを使用して Design モデルを取得
                        $design = Design::find($download->design_id);
                        
                        // Design モデルが存在する場合はコレクションに追加
                        if ($design) {
                            $designs->push($design);
                        }
                    }
            return view('design/to_download',[
                'downloads'=>$downloads,
                'designs'=>$designs,
                'email'=>$id,

            ]);
            }
    }
    public function to_download_mix($id)
    {
        $user=Auth::user();
        if ($user) {

            $downloads=Download::where('email','=',$user->email)->where('payment_status','=','1')->where('download_status','=','0') ->get();

            $designs = collect(); // 空のコレクションを作成
            foreach ($downloads as $download) {
                // $download から design_id を取得し、それを使用して Design モデルを取得
                $design = Design::find($download->design_id);
                // Design モデルが存在する場合はコレクションに追加
                if ($design->original == 0) {
                    $designs->push($design);
                }
                }

                    return view('design/to_download_mix',[
                    'downloads'=>$downloads,
                    'designs'=>$designs,
                    'user'=>$user,
                    'email'=>$id,
                ]);
        }else{
                    $downloads=Download::where('email','=',$id)->where('payment_status','=','1')->where('download_status','=','0') ->get();
                    $designs = collect(); // 空のコレクションを作成

                    foreach ($downloads as $download) {
                        // $download から design_id を取得し、それを使用して Design モデルを取得
                        $design = Design::find($download->design_id);

                        // Design モデルが存在する場合はコレクションに追加
                        if ($design->original == 0) {
                            $designs->push($design);
                        }
                    }
            return view('design/to_download_mix',[
                'downloads'=>$downloads,
                'designs'=>$designs,
                'email'=>$id,

            ]);
            }
    }
    //無料画像の場合ダウンロードページへ
    public function to_download_free($id)
    {
        $user=Auth::user();
        $design=Design::where('id','=',$id)->first();

        if ($user) {
        $download=new Download();
        $download->artist_id=$design->artist_id;
        $download->design_id=$design->id;
        $download->user_id=$user->id;
        $download->price=$design->price;
        $download->designName=$design->name;
        $download->name=null;
        $download->payment_status=1;
        $download->email=$user->email;
        $download->save();
        $artist=Artist::where('id','=',$download->artist_id)->value('artist_name');


        return view('design/download_each',[
            'download'=>$download,
            'artist'=>$artist,
            'design'=>$design,

        ]);

        }else{
        $download=new Download();
        $download->artist_id=$design->artist_id;
        $download->design_id=$design->id;
        $download->user_id=0;
        $download->price=$design->price;
        $download->designName=$design->name;
        $download->name=null;
        $download->payment_status=1;
        $download->email=null;
        $download->save();
        $artist=Artist::where('id','=',$download->artist_id)->value('artist_name');


        return view('design/download_each',[
            'download'=>$download,
            'artist'=>$artist,
            'design'=>$design,
        ]);
        }
    }
    //ダウンロードポスト
    public function download($id)
    {

        $downloads=Download::where('email','=',$id)->where('payment_status','=','1')->where('download_status','=','0') ->get();

        //本番用のzipの置き場ディレクトリー用意/storage/tempって意味
        $tempDir = storage_path('temp');
        $zipFileName = 'downloads.zip';

        // ZipArchiveオブジェクトを作成
        $zip = new ZipArchive;

        // 一時ファイルを作成（一時ファイルのパスとZIPファイル名を結合してパスを作成）
        $tempZipFilePath = $tempDir . '/' . $zipFileName;


        // ZIPファイルを作成
        if ($zip->open($tempZipFilePath, ZipArchive::CREATE) === TRUE) {

            foreach($downloads as $download){
            $design=Design::where('id','=',$download->design_id)->first();
            //designのdownloadedに加算
            $design->downloaded += 1;
            $design->save();

            //download_statusの変更0->1
            $download->download_status = 1;
            $download->save();

            //artistのunpaidに加算
            $artist = Artist::find($download->artist_id);
            $artist->increment('unpaid', round($design->price * 0.954));
            //unpaidが2000円超えたらメール送信
            if($artist->unpaid >= 2000){
                \Mail::to($artist['email'])->send(new Unpaid($artist));
            }
            //コピーライセンスの有無
            if($design->license==0){
                $filePath = storage_path("app/public/{$design->real_image}");
                $zip->addFile($filePath, $design->real_image);
            }else{
                $filePath = storage_path("app/public/{$design->real_image_with_name}");
                $zip->addFile($filePath, $design->real_image_with_name);

            }
        }

        $zip->close();

         // ZIPファイルを生成し、セッションに保存
        session(['tempZipFilePath' => $tempZipFilePath]);
        // 画面遷移
        return redirect('design/complete')->with('success', 'ダウンロード準備が完了しました');
    }
    if ($downloads->isEmpty()) {
    return view('design/error')->with('error', 'ダウンロードに失敗しました');
    }
}

 //ダウンロードポスト（mix)
    public function download_mix($id)
    {

        $downloads=Download::where('email','=',$id)->where('payment_status','=','1')->where('download_status','=','0') ->get();

        //本番用のzipの置き場ディレクトリー用意/storage/tempって意味
        $tempDir = storage_path('temp');
        $zipFileName = 'downloads.zip';

        // ZipArchiveオブジェクトを作成
        $zip = new ZipArchive;

        // 一時ファイルを作成（一時ファイルのパスとZIPファイル名を結合してパスを作成）
        $tempZipFilePath = $tempDir . '/' . $zipFileName;


        // ZIPファイルを作成
        if ($zip->open($tempZipFilePath, ZipArchive::CREATE) === TRUE) {

            foreach($downloads as $download){
            $design=Design::where('id','=',$download->design_id)->first();
            //designのdownloadedに加算
            $design->downloaded += 1;
            $design->save();

            if($design->original==0){
            //download_statusの変更0->1
            $download->download_status = 1;
            $download->save();
            }else{
                //download_statusの変更0->10
            $download->download_status = 10;
            $download->save();
            }

            //artistのunpaidに加算
            $artist = Artist::find($download->artist_id);
            $artist->increment('unpaid', round($design->price * 0.954));
            //unpaidが2000円超えたらメール送信
            if($artist->unpaid >= 2000){
                \Mail::to($artist['email'])->send(new Unpaid($artist));
            }
            //コピーライセンスの有無
            if($design->license==0){
                $filePath = storage_path("app/public/{$design->real_image}");
                $zip->addFile($filePath, $design->real_image);
            }else{
                $filePath = storage_path("app/public/{$design->real_image_with_name}");
                $zip->addFile($filePath, $design->real_image_with_name);

            }
        }

        $zip->close();

        // ZIPファイルを生成し、セッションに保存
        session(['tempZipFilePath' => $tempZipFilePath]);
        // 画面遷移
        return redirect('design/complete')->with('success', 'ダウンロード準備が完了しました');
    }
    if ($downloads->isEmpty()) {
    return view('design/error')->with('error', 'ダウンロードに失敗しました');
    }
    }

// 別のアクションでダウンロードを実行する
public function executeDownload()
{
    $tempZipFilePath = session('tempZipFilePath');
    if (isset($tempZipFilePath) && file_exists($tempZipFilePath)) {
        return response()->download($tempZipFilePath)->deleteFileAfterSend();
    }

    return redirect('design/error')->with('error', 'ダウンロードに失敗しました');
}

    //個々ダウンロード開始画面(my_pageでしてる？)
    // public function to_download_each($id)
    // {

    //         $download=Download::where('id','=',$id)->first();
    //             return view('design/to_download_each',[
    //             'downloads'=>$downloads,
    //             ]);
    // }
    //個々ダウンロードポスト
    public function download_each($id)
    {
        
        $download=Download::where('id','=',$id)->first();
        //status=0つまり、初めてのダウンロードの場合のみ行う
        if( $download->download_status == 0){
            //download_statusの変更0->1
            $download->download_status = 1;
            $download->save();  
        }
         //ダウンロードが始まる
        $downloadFilePaths = [];

            $design=Design::where('id','=',$download->design_id)->first();
        
        if($design->license==0){
            $filePath = storage_path("app/public/{$design->real_image}");
            }else{
            $filePath = storage_path("app/public/{$design->real_image_with_name}");
            }
            return response()->download($filePath);


    }

    //購入済みの再度個々ダウンロードポスト
    public function download_each_mine($id)
    {
        $download=Download::where('id','=',$id)->first();

        //ダウンロードが始まる
        $downloadFilePaths = [];

            $design=Design::where('id','=',$download->design_id)->first();
            if($design->license==0){
            $filePath = storage_path("app/public/{$design->real_image}");
            }else{
            $filePath = storage_path("app/public/{$design->real_image_with_name}");
            }
            return response()->download($filePath);


        return redirect('design/to_download')->with('success','ダウンロード完了しました');
    }
    //検索
    public function search(Request $request)
    {
        $user=Auth::user();

        $keyword = $request->input('keyword');
        $query = Design::query();
        
        if(!empty($keyword)) {
            $query->where(function($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('name_en', 'LIKE', "%{$keyword}%")
                    ->orWhereHas('Genre1', function($query) use ($keyword) {
                        $query->where('genre', 'LIKE', "%{$keyword}%");
                    })->orWhereHas('Genre2', function($query) use ($keyword) {
                        $query->where('genre', 'LIKE', "%{$keyword}%");
                    })->orWhereHas('Genre3', function($query) use ($keyword) {
                        $query->where('genre', 'LIKE', "%{$keyword}%");
                    });
            });
            

        }
    

        $designs = $query->paginate(10);
        return view('design/list', compact('designs', 'keyword','user'));
    }

    //アーティスト検索
    public function artist_search(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Artist::query();
        
        if(!empty($keyword)) {
            $query->where(function($query) use ($keyword) {
                $query->where('artist_name', 'LIKE', "%{$keyword}%");
                    
            } );
        };
        $artists = $query->paginate(10);
        return view('design/artist_list', compact('artists', 'keyword'));
    }
    /*リスト並び替え機能*/
    public function list_sort(Request $request)
    {
        $user=Auth::user();

        $select = $request->narabi;

    if ($select == 'asc') {
        $sorts=Design::orderBy('created_at', 'asc'); // 2. 条件に基づいて並べ替え
    } elseif ($select == 'desc') {
        $sorts=Design::orderBy('created_at', 'desc');
    } elseif ($select == 'up') {
        $sorts=Design::orderBy('downloaded', 'desc');
    } elseif ($select == 'down') {
        $sorts=Design::orderBy('price', 'desc');
    } else {
        $sorts=Design::orderBy('downloaded', 'asc');
    }

    $designs = $sorts->paginate(10); // ページネーションを適切な数に調整
    return view('design/list', compact('designs','user','select'));
    }

    /*並び替え機能*/
    public function sort(Request $request,$id)
    {
        $user=Auth::user();
        $artist=Artist::find($id);

        $sorts = Design::where('artist_id', $id); // 1. クエリビルダーを初期化

        $select = $request->narabi;

    if ($select == 'asc') {
        $sorts->orderBy('created_at', 'asc'); // 2. 条件に基づいて並べ替え
    } elseif ($select == 'desc') {
        $sorts->orderBy('created_at', 'desc');
    } elseif ($select == 'up') {
        $sorts->orderBy('downloaded', 'desc');
    } elseif ($select == 'down') {
        $sorts->orderBy('price', 'desc');
    } else {
        $sorts->orderBy('downloaded', 'asc');
    }
    $designs = $sorts->paginate(10); // ページネーションを適切な数に調整
    return view('design/artist', compact('designs','user','artist','select'));
    }

    //バッジ売り上げ報告ページへ
    public function badge(){
        $user=Auth::user();
        if($user->role==1){
            return view('design/badge');
        }
    }
    //バッジ売り上げ報告ポスト
    public function badge_post(Request $request){
        $id=$request->id;
        $design=Design::find($id);
        $artist_id=$design->artist_id;
        $badge=new Badge();
        $badge->design_id=$id;
        $badge->artist_id=$artist_id;
        $badge->designName=$design->name;
        $badge->save();

        //アーティストに付与
        $artist = Artist::find($artist_id);
        $artist->increment('unpaid',50);
        //unpaidが2000円超えたらメール送信
        if($artist->unpaid >= 2000){
            \Mail::to($artist['email'])->send(new Unpaid($artist));
        }

        return view('design/badge');
    }

    //住所入力画面へ
    public function buyer_address(Request $request,$id){

        $user=Auth::user();
        $buyer=null;
        if($user){
            $buyer=Buyer::where('email','=',$user->email)->first();
        }
        $design= Design::where('id','=', $id)->first();

        return view('design/address',compact('user','design','buyer'));
    }

    //住所入力画面へ(カートから)
    public function buyer_address_cart(Request $request,$id){

        // totalを渡す
        $total=$id;
        $tempCart = Session::get('tempCart', []);

        $user=Auth::user();
        $buyer=null;
        if($user){
            $buyer=Buyer::where('email','=',$user->email)->first();
        }else{
              // $userが存在しない場合の処理
            $buyer = (object) [
                'email' =>$request->email,
                'name' => $request->name,
                'postal' => $request->postal,
                'tel' => $request->tel,
                'address' => $request->address,
            ];
        }

        return view('design/address_cart',compact('user','buyer','tempCart','total'));
    }

      //バイヤー住所登録→確認画面へ
    public function buyer_post(Request $request,$id){

        $user=Auth::user();
        if($user){
            $buyer = (object) [
                'email' =>$user->email,
                'name' => $request->name,
                'postal' => $request->postal,
                'tel' => $request->tel,
                'address' => $request->address,
            ];
        } else {
            // $userが存在しない場合の処理
            $buyer = (object) [
                'email' =>$request->email,
                'name' => $request->name,
                'postal' => $request->postal,
                'tel' => $request->tel,
                'address' => $request->address,
            ];
        }
        $design= Design::where('id','=', $id)->first();

            // $buyerオブジェクトをセッションに保存
            $request->session()->put('buyer', $buyer);

        return view('design/address_confirm',compact('user','design','buyer'));
    }


      //バイヤー住所登録→確認画面へ(カートから)
    public function buyer_post_cart(Request $request,$id){

        // totalを渡す
        $total=$id;

        $tempCart = Session::get('tempCart', []);

        $user=Auth::user();
        if($user){
            $buyer = (object) [
                'email' =>$user->email,
                'name' => $request->name,
                'postal' => $request->postal,
                'tel' => $request->tel,
                'address' => $request->address,
            ];
        } else {
            // $userが存在しない場合の処理
            $buyer = (object) [
                'email' =>$request->email,
                'name' => $request->name,
                'postal' => $request->postal,
                'tel' => $request->tel,
                'address' => $request->address,
            ];
        }

            // $buyerオブジェクトをセッションに保存
            $request->session()->put('buyer', $buyer);

        return view('design/address_confirm_cart',compact('user','buyer','tempCart','total'));
    }

          //バイヤー住所登録確認
        public function address_post(Request $request,$id){
            $design= Design::where('id','=', $id)->first();
            $user=Auth::user();

            if($user){
                $buyer=Buyer::where('email','=',$user->email)->first();

                //登録されてない場合
                if (!$buyer) {
                    $buyer=new Buyer();
                    $buyer->email=$user->email;
                    $buyer->name= $request->name;
                    $buyer->postal= $request->postal;
                    $buyer->tel= $request->tel;
                    $buyer->address= $request->address;
                    $buyer->save();
                }else{
                    $buyer->update([
                        'name'=>$request->name,
                        'address'=>$request->address,
                        'tel'=>$request->tel,
                        'postal'=>$request->postal,
                    ]);
                }
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

                return view('design/stripe_address', [
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
                    return view('design/stripe_address', [
                        'intent' => $setupIntent,
                        'design'=>$design,
                        'buyer'=>$buyer,
                        'paymentMethod'=>null,

                    ]);
                }

            } else {
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

                // $userが存在しない場合の処理
                $buyer = (object) [
                    'email' =>$request->email,
                    'name' => $request->name,
                    'postal' => $request->postal,
                    'tel' => $request->tel,
                    'address' => $request->address,
                ];
                return view('design/once_address', [
                    'intent' => $setupIntent,
                    'design'=>$design,
                    'tempCart'=>$tempCart,
                    'buyer'=>$buyer,
                ]);
            }
    
        }

        //バイヤー住所登録確認(カートから)
        public function address_post_cart(Request $request,$id){

            $tempCart = Session::get('tempCart', []);
            $designs = []; // デザイン情報を格納する配列
            // totalを渡す
            $total=$id;
            //住所入力確認済み
            $address=true;
            $user=Auth::user();

            if($user){
                $buyer=Buyer::where('email','=',$user->email)->first();
                //登録されてない場合
                if (!$buyer) {
                    $buyer=new Buyer();
                    $buyer->email=$user->email;
                    $buyer->name= $request->name;
                    $buyer->postal= $request->postal;
                    $buyer->tel= $request->tel;
                    $buyer->address= $request->address;
                    $buyer->save();
                }else{
                    $buyer->update([
                        'name'=>$request->name,
                        'address'=>$request->address,
                        'tel'=>$request->tel,
                        'postal'=>$request->postal,
                    ]);
                }

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
                $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=',0)->orderBy('created_at', 'desc')->get();
                return view('design/cart', [
                    'intent' => $setupIntent ?? null,
                    'downloads' => $downloads,
                    'paymentMethod'=>$paymentMethod,
                    'filteredPaymentMethods'=>$filteredPaymentMethods,
                    'buyer'=>$buyer,
                    'address'=>$address,
                ]);                
            } else {
                // ログインしていない場合もセットアップインテントを作成
                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $setupIntent = \Stripe\SetupIntent::create();
                $downloads=Download::where('user_id','=',$user->id)->where('payment_status','=',0)->orderBy('created_at', 'desc')->get();
                $designIds = $downloads->pluck('design_id')->toArray();
                $originals = Design::whereIn('id', $designIds)->pluck('original', 'id');
                $total = Download::where('user_id', $user->id)->where('payment_status','=',0)->sum('price');
                $setupIntent = $user->createSetupIntent();
            return view('design/cart_new', [
                'intent' => $setupIntent ?? null,
                'downloads'=>$downloads,
                'originals'=>$originals,
                'total'=>$total,
                'paymentMethod'=>null,
                'buyer'=>$buyer,

            ]);
                }

            } else {
                    Session::put('tempCart', $tempCart);
            
                $designs = []; // デザイン情報を格納する配列
            
                foreach($tempCart as $downloadId => $downloadDetails){
                    $downloads[] = [
                        'design_id' => $downloadDetails['design_id'],
                        'price' => $downloadDetails['price'],
                        'designName' => $downloadDetails['designName'],
                        'original' => $downloadDetails['original'],

                    ];
                    // 合計金額を計算
                }
                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            
                // Stripeセットアップインテントの作成
                $setupIntent = SetupIntent::create([
                    'payment_method_types' => ['card'], // クレジットカードのみを受け付ける場合
                ]);;    

                // $userが存在しない場合の処理
                $buyer = (object) [
                    'email' =>$request->email,
                    'name' => $request->name,
                    'postal' => $request->postal,
                    'tel' => $request->tel,
                    'address' => $request->address,
                ];
                return view('design/cart_un', [
                    'intent' => $setupIntent,
                    'downloads' => $downloads,
                    'tempCart'=>$tempCart,
                    'buyer'=>$buyer,
                    'address'=>$address,
                    'total' => $total,
                    'clientSecret' => $setupIntent->client_secret,
                ]);
            }
    
        }

        //発送状況確認シート表示
        public function ship(Request $request)
        {
            $ships=Ship::orderBy('id', 'desc')->paginate(10);

            // ユーザーが認証されているかどうかを確認
            $user = auth()->user();
            if ($user && $user->role != 0) {
                return view('design/ship',[
                    'ships'=>$ships,
                ]);
            } else {
                // 認証されていない場合やアクセス権がない場合の処理
                return redirect('/')->with('error', 'アクセス権がありません');
            }
        }
        //振込確認
        public function ship_paid(Request $request,$id)
        {
            $ships=Ship::orderBy('id', 'desc')->paginate(10);

            $ship=Ship::where('id','=',$id)->first();
            $ship->update([
                'paid' =>  1,
            ]);
            $download=Download::where('email','=',$ship->order_email)->where('payment_status','=',0)->first();
                $design=Design::where('id','=',$ship->design_id)->first();
                if($design->original=3){
                    $download->update([
                        'download_status'=> 10,
                    ]);
                    $date = Carbon::today()->addWeek();
                    $buyer = (object) [
                        'email' =>$ship->email,
                        'name' => $ship->name,
                        'postal' => $ship->postal,
                        'tel' => $ship->tel,
                        'address' => $ship->address,
                    ];
                    \Mail::to($design->email)->send(new ShipMail($design,$buyer,$date));
                    $ship->update([
                        'paid' =>  1,
                        'due_date'=> $date,//発送期限を表示させる
                    ]);
    
                }
                    $download->update([
                        'payment_status'=> 1,
                    ]);
    

                return view('design/ship',[
                    'ships'=>$ships,
                ]);
        }
         //発送確認
        public function ship_shipped(Request $request,$id)
        {
            $ships=Ship::orderBy('id', 'desc')->paginate(10);

            $ship=Ship::where('id','=',$id)->first();
            $ship->carrier=$request->carrier;
            $ship->number=$request->number;
            $ship->save();
            $email=$ship->order_email;
            $design_id=$ship->design_id;
            $design=Design::where('id','=',$design_id)->value('name');
            $buyer=$ship->name;
            \Mail::to($email)->send(new ShippedMail($design,$buyer));
            $ship->update([
                'shipped' =>  1,
            ]);
            return view('design/ship',[
                'ships'=>$ships,
            ]);

        }

            //到着確認
            public function ship_arrive(Request $request,$id)
            {
            $ships=Ship::orderBy('id', 'desc')->paginate(10);

            $ship=Ship::where('id','=',$id)->first();
            $ship->update([
                'arrive' =>  1,
            ]);
            $design_id=$ship->design_id;
            $design=Design::where('id','=',$design_id)->first();
            $artist_id=Design::where('id','=',$design_id)->value('artist_id');
            $artist=Artist::where('id','=',$artist_id)->first();
            $artist->increment('unpaid', round($design->price * 0.954));
                //unpaidが2000円超えたらメール送信
            if($artist->unpaid >= 2000){
                \Mail::to($artist['email'])->send(new Unpaid($artist));
            }
            return view('design/ship',[
                'ships'=>$ships,
            ]);
            }
    }