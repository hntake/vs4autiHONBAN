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
use App\Mail\Pay;
use App\Mail\Unpaid;
use App\Mail\Protect;
use App\Mail\DownloadMail;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use File;
use Session;
use Illuminate\Support\Facades\Response;
use ZipArchive;




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
    //作品登録ページへ
    public function post(){

        $genres= Genre::all();
        return view('design/post', compact('genres'));
    }
    //作品ポスト
    public function posted(Request $request){
        $user=Auth::user();
        $now = Carbon::now();
        $now_format = $now->format('Y-m-d');

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

     //作品登録ページへ
    public function upload(Request $request,$new_image){
        $user=Auth::user();
        $now = Carbon::now();
        $now_format = $now->format('Y-m-d');

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

        // 加工された新しい名前の画像ファイル
        $processedImageName = "{$design->name}_{$now_format}_with_processed."  . pathinfo($new_image, PATHINFO_EXTENSION);

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
        $real_image->save($originalImagePath);

        // デザインに元の画像と加工後の画像のパスを保存
        $design->real_image = $new_image; // 元の画像のパス
        $design->image = $processedImageName; // 加工後の画像のパス

        $fontPath = storage_path('fonts/Pacifico-Regular.ttf');

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
        // original画像にテキストを追加する
        $realImageWithArtistName = $real_image->text('©' . $design->artist_name, $textX, $textY, function($font) use ($fontPath) {
            $font->file($fontPath); // フォントのパスを指定
            $font->size(24);
            $font->color('#777777'); // 文字の色を指定
            $font->align('right');
            $font->valign('bottom');
        });
        // アーティスト名を含む水印を追加した画像を保存
        $processedImageWithArtistName =  '_with_artist_name_' . $processedImageName;
        $imageWithArtistName->save($copyDirectory . $processedImageWithArtistName);

        // アーティスト名を含むオリジナル画像を保存
        $processedRealImageWithArtistName =  "{$design->artist_name}." . $new_image;
        $realImageWithArtistName->save($copyDirectory . $processedRealImageWithArtistName);

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
//作品削除
    public function design_deleted(Request $request,$id)
{
    $user=Auth::user();
    $design=Design::where('id','=',$id)->delete();
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
            return view('design/to_download',[
                'downloads'=>$downloads,
                'user'=>$user,
                'email'=>$id,
            ]);
            }else{
                $downloads=Download::where('email','=',$id)->where('payment_status','=','1')->where('download_status','=','0') ->get();
            return view('design/to_download',[
                'downloads'=>$downloads,
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

        //エラー確認のため（始め）確認できたら削除->隠しておく
        $total=0;
             //pdf作成
            $pdf = \PDF::loadView('design.pdf', compact('total','download'));
             // 一回での支払い完了メール送信
            $email = $user->email;
            \Mail::to($user['email'])->send(new DownloadMail($user, $total, $pdf, $email)
        );
        return view('design/receipt',[
            'email'=>$email,
        ]);

        //エラー確認の為(終わり）

        return view('design/download_each',[
            'download'=>$download,
            'artist'=>$artist,
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
        ]);
        }
    }
    //ダウンロードポスト
    public function download($id)
    {

        $downloads=Download::where('email','=',$id)->where('payment_status','=','1')->where('download_status','=','0') ->get();

        //本番用のzipの置き場用意
        $tempDir = '/var/www/html/vs4auti/storage/temp';
        // 一時ディレクトリの所有者とパーミッションの設定
        chmod($tempDir, 0750); // 書き込み、実行、読み取り権限を所有者にのみ付与




        $zip = new ZipArchive;
        $zipFileName = 'downloads.zip';

        // 一時ファイルの場所を設定
        $zip->setTempFile($tempDir);

        // if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {

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
        session(['zipFilePath' => $zipFileName]);
        // 画面遷移
        return redirect('design/complete')->with('success', 'ダウンロード準備が完了しました');
    }

    return view('design/error')->with('error', 'ダウンロードに失敗しました');
}

// 別のアクションでダウンロードを実行する
public function executeDownload()
{
    $zipFilePath = session('zipFilePath');
   if (isset($zipFilePath) && file_exists($zipFilePath)) {
        return response()->download($zipFilePath)->deleteFileAfterSend();
    }

    return redirect('design/error')->with('error', 'ダウンロードに失敗しました');
}

    //個々ダウンロード開始画面(my_pageでしてる？)
    // public function to_download_each($id)
    // {

    //         $download=Download::where('id','=',$id)->first();
    //         return view('design/to_download_each',[
    //             'downloads'=>$downloads,
    //         ]);
    // }
    //個々ダウンロードポスト
    public function download_each($id)
    {
        
        $download=Download::where('id','=',$id)->first();

        //ダウンロードが始まる
        $downloadFilePaths = [];

            $design=Design::where('id','=',$download->design_id)->first();
            //designのdownloadedに加算
            $design->downloaded += 1;
            $design->save();
            if($design->license==0){
            $filePath = storage_path("app/public/{$design->real_image}");
            }else{
            $filePath = storage_path("app/public/{$design->real_image_with_name}");
            }
            return response()->download($filePath);

            //status=0つまり、初めてのダウンロードの場合のみ行う
            if( $download->download_status = 0){
            //download_statusの変更0->1
            $download->download_status = 1;
            $download->save();

            //artistのunpaidに加算
            $artist = Artist::find($download->artist_id);
            $artist->increment('unpaid', $download->price); 
            //unpaidが2000円超えたらメール送信
            if($artist->unpaid >= 2000){
                \Mail::to($artist['email'])->send(new Unpaid($artist));
            }
            }      

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
        if($user->role==10){
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
}