<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\News;
use App\Models\User;
use App\Models\Lost;
use App\Models\Design;
use App\Models\Download;
use App\Models\Shop;
use App\Models\Feel;
use App\Models\Picture;
use App\Models\Independence;
use App\Models\Artist;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index() {

        //scheduleより最新のデータを取得
        $schedule = Schedule::orderBy('created_at', 'desc')->first();

        return view('home',compact('schedule'));
    }


    /* public function index()
    {
        $schedules = Schedule::where('created_at', 'asc')->first();
        return view('home', [
            'schedules' => $schedules,
        ]);
    } */
      //本登録画面に遷移
    public function showForm()
    {
            $user=Auth::user();

        return view('auth.main.register');

    }
      //vs4会員のバッジ申込画面に遷移
    public function register()
    {
        $user=Auth::user();

        return view('lost.register', compact('user'));

    }
      //バッジ会員のVS4申込画面に遷移
    public function vs4()
    {
        $user=Auth::user();

        return view('vs4', compact('user'));

    }
       //確認画面
    public function mainCheck(Request $request)
    {

        //データ保持用
        $email_token = $request->email_token;
        //申込種類によって分ける
        $user=User::where('id','=',Auth::user()->id)->first();
        //vs4のみ
        if($user->type==0){
            $user
            ->update([
                'image_id'=> $request->image_id,
                'gender'=> $request->gender,
            ]);
            return view('auth.main.registered', compact('user','email_token'));
            /*  return view('auth.main.register_check', compact('user','email_token')); */
    }
        //お守りバッジのみ
        elseif($user->type==1){
        $lost=new Lost();
        $lost->name=$request->name;
        $lost->name_pronunciation = $request->name_pronunciation;
        $lost->email=$user->email;
        $lost->uuid=$user->uuid;
        $lost->tel1=$request->tel1;
        $lost->tel2=$request->tel2;
        $lost->address=$request->address;
        $lost->mon1=$request->mon1;
        $lost->mon2=$request->mon2;
        $lost->mon3=$request->mon3;
        $lost->tue1=$request->tue1;
        $lost->tue2=$request->tue2;
        $lost->tue3=$request->tue3;
        $lost->wed1=$request->wed1;
        $lost->wed2=$request->wed2;
        $lost->wed3=$request->wed3;
        $lost->thu1=$request->thu1;
        $lost->thu2=$request->thu2;
        $lost->thu3=$request->thu3;
        $lost->fri1=$request->fri1;
        $lost->fri2=$request->fri2;
        $lost->fri3=$request->fri3;
        $lost->sat1=$request->sat1;
        $lost->sat2=$request->sat2;
        $lost->sat3=$request->sat3;
        $lost->sun1=$request->sun1;
        $lost->sun2=$request->sun2;
        $lost->sun3=$request->sun3;
          //確認前なので渡すだけ
/*           $lost->save();
 */
        return view('auth.main.register_check', compact('email_token','lost','user'));
        }
        //アーティスト登録
        elseif($user->type==10){
            $artist=new Artist();
            $artist->name=$request->name;
            $artist->name_pronunciation = $request->name_pronunciation;
            $artist->artist_name = $request->artist_name;
            $artist->email=$user->email;
            $artist->type=$request->disability;
              //確認前なので渡すだけ
    /*           $lost->save();
     */
            return view('auth.main.register_check', compact('email_token','artist','user'));
        }
        //バイヤー登録
        elseif($user->type==8){
            $new_status=1;
            $user=User::where('id', '=', Auth::id())
            ->update([
                'status'=>$new_status,
            ]);          
            $user=Auth::user();
            $type=$user->type;
            $downloads=Download::where('user_id','=',$user->id)->orderBy('created_at','asc')->get();
            return view('my_page',compact('type','downloads','user'));
        //マイりく
        }else{
            $new_status=1;
            $user=User::where('id', '=', Auth::id())
            ->update([
                'status'=>$new_status,
            ]);            //feel
            $feel=new Feel();
            $feel->user_id = User::where('id', '=', Auth::id())->value('id');
            $feel->email = User::where('id', '=', Auth::id())->value('email');

            $feel->save();
        return view('feel/create',compact('feel'));
            
    }
}
    //バッジ会員のVS4確認画面
    public function vs4Check(Request $request)
    {
/*         $request->validate([
            'name' => 'required|string',

            ]); */
            //データ保持用
            $email_token = $request->email_token;
            //申込種類によって分ける
        $user=User::where('id','=',Auth::user()->id)->first();
            $user
            ->update([
                'image_id'=> $request->image_id,
                'gender'=> $request->gender,
            ]);
            return view('vs4_check', compact('user','email_token'));

    }
    //VS4からお守りへの申込確認画面
    public function lostCheck(Request $request)
    {
            //データ保持用
            $email_token = $request->email_token;
            //申込種類によって分ける
        $user=User::where('id','=',Auth::user()->id)->first();
        $lost=new Lost();
        $lost->name=$request->name;
        $lost->name_pronunciation = $request->name_pronunciation;
        $lost->email=$user->email;
        $lost->uuid=$user->uuid;
        $lost->tel1=$request->tel1;
        $lost->tel2=$request->tel2;
        $lost->address=$request->address;
        $lost->mon1=$request->mon1;
        $lost->mon2=$request->mon2;
        $lost->mon3=$request->mon3;
        $lost->tue1=$request->tue1;
        $lost->tue2=$request->tue2;
        $lost->tue3=$request->tue3;
        $lost->wed1=$request->wed1;
        $lost->wed2=$request->wed2;
        $lost->wed3=$request->wed3;
        $lost->thu1=$request->thu1;
        $lost->thu2=$request->thu2;
        $lost->thu3=$request->thu3;
        $lost->fri1=$request->fri1;
        $lost->fri2=$request->fri2;
        $lost->fri3=$request->fri3;
        $lost->sat1=$request->sat1;
        $lost->sat2=$request->sat2;
        $lost->sat3=$request->sat3;
        $lost->sun1=$request->sun1;
        $lost->sun2=$request->sun2;
        $lost->sun3=$request->sun3;


        return view('lost.register_check', compact('email_token','lost','user'));

        }
      //本登録
    public function mainRegister(Request $request)
    {
        $user = Auth::user();
        $new_status=1;
        $user=User::where('id', '=', Auth::id())
        ->update([
            'status'=>$new_status,
        ]);
        $user = Auth::user();
        if($user->type==0){
            $user=User::where('id', '=', Auth::id())
            ->update([
                'image_id'=> $request->image_id,
                'gender'=> $request->gender,
            ]);
            $user=User::where('id', '=', Auth::id())->first();
            $feel=new Feel();
            $feel->user_id = User::where('id', '=', Auth::id())->value('id');
            $feel->email = User::where('id', '=', Auth::id())->value('email');

            $feel->save();
        }
        elseif($user->type==1){
            $lost=new Lost;
            $lost->name=$request->name;
            $lost->name_pronunciation = $request->name_pronunciation;
            $lost->email=$user->email;
            $lost->uuid=$user->uuid;
            $lost->tel1=$request->tel1;
            $lost->tel2=$request->tel2;
            $lost->address=$request->address;
            $lost->mon1=$request->mon1;
            $lost->mon2=$request->mon2;
            $lost->mon3=$request->mon3;
            $lost->tue1=$request->tue1;
            $lost->tue2=$request->tue2;
            $lost->tue3=$request->tue3;
            $lost->wed1=$request->wed1;
            $lost->wed2=$request->wed2;
            $lost->wed3=$request->wed3;
            $lost->thu1=$request->thu1;
            $lost->thu2=$request->thu2;
            $lost->thu3=$request->thu3;
            $lost->fri1=$request->fri1;
            $lost->fri2=$request->fri2;
            $lost->fri3=$request->fri3;
            $lost->sat1=$request->sat1;
            $lost->sat2=$request->sat2;
            $lost->sat3=$request->sat3;
            $lost->sun1=$request->sun1;
            $lost->sun2=$request->sun2;
            $lost->sun3=$request->sun3;
            $lost->save();
            $feel=new Feel();
            $feel->user_id = User::where('id', '=', Auth::id())->value('id');
            $feel->email = User::where('id', '=', Auth::id())->value('email');

            $feel->save();
        }
        elseif($user->type==10){
            $artist=new Artist;
            $artist->name=$request->name;
            $artist->name_pronunciation = $request->name_pronunciation;
            $artist->artist_name = $request->artist_name;
            $artist->email=$user->email;
            $artist->type=$request->disability;
            $artist->save();
        }
        return view('auth.main.registered', compact('user'));

    }
    //バッジ会員のVS4本登録
    public function vs4Register(Request $request)
    {

        $user = Auth::user();
        $user=User::where('id', '=', Auth::id());
        $user
        ->update([
            'image_id'=> $request->image_id,
            'gender'=> $request->gender,
            'type'=> 3,
        ]);
        $user=User::where('id', '=', Auth::id())->first();
        $type=$user->type;
        $schedules = Schedule::where('user_id', '=', Auth::user()->id)->where('list', '=', '0')->get();
        $illusts = Schedule::where('user_id', '=', Auth::user()->id)->where('list', '=', '2')->get();
        $dentists = Schedule::where('user_id', '=', Auth::user()->id)->where('list', '=', '1')->get();
        $medicals = Schedule::where('user_id', '=', Auth::user()->id)->where('list', '=', '3')->get();
        $supports = Independence::where('user_id', '=', Auth::user()->id)->get();
        return view('dashboard', [
            'schedules' => $schedules,
            'illusts' => $illusts,
            'dentists' => $dentists,
            'medicals' => $medicals,
            'supports' => $supports,
            'user' => $user,
            'type'=>$type,
        ]);
    }
    //VS4会員のお守りバッジ本登録
    public function lostRegister(Request $request)
    {
        $user = Auth::user();
        $user=User::where('id', '=', Auth::id())
        ->update([
            'type'=> 3,
        ]);
            $user = Auth::user();

            $lost=new Lost;
            $lost->name=$request->name;
            $lost->name_pronunciation = $request->name_pronunciation;
            $lost->email=$user->email;
            $lost->uuid=$user->uuid;
            $lost->tel1=$request->tel1;
            $lost->tel2=$request->tel2;
            $lost->address=$request->address;
            $lost->mon1=$request->mon1;
            $lost->mon2=$request->mon2;
            $lost->mon3=$request->mon3;
            $lost->tue1=$request->tue1;
            $lost->tue2=$request->tue2;
            $lost->tue3=$request->tue3;
            $lost->wed1=$request->wed1;
            $lost->wed2=$request->wed2;
            $lost->wed3=$request->wed3;
            $lost->thu1=$request->thu1;
            $lost->thu2=$request->thu2;
            $lost->thu3=$request->thu3;
            $lost->fri1=$request->fri1;
            $lost->fri2=$request->fri2;
            $lost->fri3=$request->fri3;
            $lost->sat1=$request->sat1;
            $lost->sat2=$request->sat2;
            $lost->sat3=$request->sat3;
            $lost->sun1=$request->sun1;
            $lost->sun2=$request->sun2;
            $lost->sun3=$request->sun3;
            $lost->save();

            $uuid=$lost->uuid;
            $user = User::where('uuid',$uuid)->first();
        return view('auth.main.registered', compact('user'));
    }
        //my_page画面に遷移
        public function my_page()
        {
            $user=Auth::user();
            $type=$user->type;
            if($type==3){
                $lost=Lost::where('email','=',$user->email)->first();
                $picture=Picture::where('uuid','=',$lost->uuid)->first();
                return view('my_page',compact('type','lost','user','picture'));
            }
            elseif($type==2){
                $feel=Feel::where('user_id','=',$user->id)->first();
                return view('my_page',compact('feel','user','type'));
            }
            elseif($type==1){
                if($user->status==0){
                    return view('auth.main.register');
                }
                $lost=Lost::where('email','=',$user->email)->first();
                $picture=Picture::where('uuid','=',$lost->uuid)->first();
                return view('my_page',compact('type','lost','user','picture'));
            }
            elseif($type==8){
                $downloads=Download::where('email','=',$user->email)->get();
                return view('my_page',compact('user','type','downloads'));

            }    
            else{
                return view('my_page',compact('user','type'));
            }
            
            }

        /**
     * 選択したユーザーの編集画面へ
     *
     * @param Request $request
     * @return Response
     */
    public function edit_user(Request $request, $id)
    {
        $user = User::where('id', $request->id)->first();
        $lost=Lost::where('email','=',$user->email)->first();
        $artist=Artist::where('email','=',$user->email)->first();

        return view('edit_user', [
            'id' => $id,
            'user' => $user,
            'lost'=>$lost,
            'artist'=>$artist,
        ]);
    }

    /**
     * 選択したユーザーを編集する
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user=Auth::user();
        if($user->type==0){
        $users = User::find($id);
        $users->email = $request->input('email');
        $users->gender = $request->input('gender');
        $users->image_id = $request->input('image_id');
        $users->save();
        }
        elseif($user->type==2){
        $users = User::find($id);
        $users->email = $request->input('email');
        $users->save();
        }
        elseif($user->type==1){
        $lost=Lost::where('uuid','=',$user->uuid)->first();
        $lost->email = $request->input('email');
        $lost->name = $request->input('name');
        $lost->name_pronunciation = $request->input('name_pronunciation');
        $lost->tel1 = $request->input('tel1');
        $lost->tel2 = $request->input('tel2');
        $lost->address = $request->input('address');
        $lost->mon1 = $request->input('mon1');
        $lost->mon2 = $request->input('mon2');
        $lost->mon3 = $request->input('mon3');
        $lost->tue1 = $request->input('tue1');
        $lost->tue2 = $request->input('tue2');
        $lost->tue3 = $request->input('tue3');
        $lost->wed1 = $request->input('wed1');
        $lost->wed2 = $request->input('wed2');
        $lost->wed3 = $request->input('wed3');
        $lost->thu1 = $request->input('thu1');
        $lost->thu2 = $request->input('thu2');
        $lost->thu3 = $request->input('thu3');
        $lost->fri1 = $request->input('fri1');
        $lost->fri2 = $request->input('fri2');
        $lost->fri3 = $request->input('fri3');
        $lost->sat1 = $request->input('sat1');
        $lost->sat2 = $request->input('sat2');
        $lost->sat3 = $request->input('sat3');
        $lost->sun1 = $request->input('sun1');
        $lost->sun2 = $request->input('sun2');
        $lost->sun3 = $request->input('sun3');
        $lost->save();
        $uuid=$lost->uuid;
        $user = User::where('uuid',$uuid)->first();
        $user->email = $request->input('email');
        $user->save();
        $type=$user->type;
         // もし空欄の場合はエラーメッセージを表示
        if (empty($request->input('name')) || empty($request->input('tel1'))) {
            return back()->withErrors([
                'name' => '名前は必須です',
                'tel1' => '連絡先①は必須です'
            ])->withInput();
        }
        return view('my_page',[
            'user'=>$user,
            'lost'=>$lost,
            'type'=>$type
        ]);
        }
        else{
        $artist=Artist::where('email','=',$user->email)->first();
        $artist->email = $request->input('email');
        $artist->name = $request->input('name');
        $artist->tel1 = $request->input('tel1');
        $artist->name_pronunciation = $request->input('name_pronunciation');
        $artist->artist_name = $request->input('artist_name');
        $artist->address = $request->input('address');
        $artist->save();
        $designs=Design::where('email','=',$artist->email)->orderBy('created_at', 'asc')->paginate(30);

        return view('design/my_sheet',[
            'artist'=>$artist,
            'user'=>$user,
            'designs'=>$designs,

        ]);

        }
    }
  
            /**
     * 選択したユーザーのパスワード変更画面へ
     *
     * @param Request $request
     * @return Response
     */
    public function password()
    {
        $user =  $user=Auth::user();
        return view('update_password',[
            'user' => $user,
        ]);
    }
    protected function validator(array $data)
    {
        return Validator::make($data,[
            'new_password' => 'required|string|min:6|confirmed',
            ]);
    }
  /**
     * 選択したユーザーのパスワードを変更する
     *
     * @param Request $request
     * @return Response
     */
    public function update_password(Request $request)
    {
        $user =  $user=Auth::user();
        if(!password_verify($request->current_password,$user->password))
        {
            return redirect('/password/change')
                ->with('warning','パスワードが違います');
        }

        //新規パスワードの確認
        $this->validator($request->all())->validate();
        $user->password = bcrypt($request->new_password);
        $user->save();

        if($user->type==10){
            $designs=Design::where('email','=',$user->email)->orderBy('created_at', 'asc')->paginate(30);
            $artist=Artist::where('email','=',$user->email)->first();
            return view('design/my_sheet',[
                'artist'=>$artist,
                'user'=>$user,
                'designs'=>$designs,
    
            ]);
        }

        else{
            return redirect ('/')
            ->with('status','パスワードの変更が終了しました');
        }
}
     
/*デザイン選択送信
* @param Request $request
* @return Response
*/
public function choice(Request $request)
{
    $user=Auth::user();
    $lost=Lost::where('email','=',$user->email)->first();
    $design=Design::where('email','=',$user->email)->first();
    $lost->design = $request->input('design');
    $lost->save();

    return view('design_confirm',[
        'lost' => $lost,
        'design'=>$design,
    ]);
}
/*デザイン選択登録
* @param Request $request
* @return Response
*/
public function design_send(Request $request)
{
    $user=Auth::user();
    $lost=Lost::where('email','=',$user->email)->first();
    return view('design_registerd',[
        'lost' => $lost,
    ]);
}
/*オリジナルデザイン送信
* @param Request $request
* @return Response
*/
public function design_original(Request $request)
{
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
    $lost=Lost::where('email','=',$user->email)->first();
    $design=new Design();
    $design->email=$user->email;
    $design->name=0;
    $design->artist_id=0;
    $design->real_image=0;
    $design->image_with_artist_name=0;

    $design->image = str_replace('public/', '', $path);
    $design->save();

    return view('design_original_confirm',[
        'design'=>$design,
        'lost'=>$lost,
    ]);
}
/*オリジナルデザイン変更確認画面へ
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
/*オリジナルデザイン変更
* @param Request $request
* @return Response
*/
public function design_delete(Request $request)
{
    $user=Auth::user();
    $design=Design::where('email','=',$user->email)->delete();

    return view('design_original');
}
/*オリジナルデザイン選択登録
* @param Request $request
* @return Response
*/
public function design_original_send(Request $request)
{
    $user=Auth::user();
    $lost=Lost::where('email','=',$user->email)->first();
    return view('design_registerd',[
        'lost' => $lost,
    ]);
}

/*payment入力画面（手動）*/
public function payment(Request $request)
{
    $user=Auth::user();
    if($user->role==1){
        $payments=Payment::orderBy('id', 'desc')->paginate(10);
        return view('pay_type',compact('payments'));
    }
}
/*payment登録*/
public function payment_post(Request $request)
{
    $user=User::where('email', '=',$request->email)->first();
    $payment = new Payment;
    $payment->name = $request->name;
    $payment->email = $request->email;
    $payment->type = $request->type;
    $payment->uuid = $user->uuid;
    $payment->save();

    $new_pay=1;
    $user
    ->update([
        'pm_type'=>$new_pay,
    ]);

    return redirect('pay_type');
}

/*shop入力画面（手動）*/
public function shop(Request $request)
{
$user=Auth::user();
if($user->role==1){
    $shops=Shop::orderBy('id', 'desc')->paginate(10);
    return view('shop_register',compact('shops'));
}
}
/*shop登録*/
public function shop_post(Request $request)
{
    $shop = new Shop;
    $shop->name = $request->name;
    $shop->area = $request->area;
    $shop->place = $request->place;
    $shop->tel = $request->tel;
    $shop->email = $request->email;
    $shop->save();

    $shops=Shop::orderBy('id', 'desc')->paginate(10);
    return view('shop_list',[
    'shops'=>$shops
    ]);
}
/*カスタムデザイン一覧画面(自動で登録される)*/
public function design_list(Request $request)
{
$user=Auth::user();
if($user->role==1){
    $designs=Design::orderBy('id', 'desc')->paginate(10);
    return view('design_list',compact('designs'));
}
}
/*QR入力画面（手動）*/
public function picture(Request $request)
{
$user=Auth::user();
if($user->role==1){

    return view('store');
}
}
/*QR画像登録*/
public function store(Request $request)
{
    $picture = new Picture;
    $uploadImg = $request->image;
    if ($uploadImg->isValid()) {
        $filePath = $uploadImg->store('public');
        $picture->image = str_replace('public/', '', $filePath);
    }
    $picture->uuid = $request->uuid;
    $picture->save();

    return redirect('store');

  }
  /*登録削除ページへ*/
  public function delete_index(Request $request)
  {
    $user=Auth::user();

    return view('delete',[
        'user'=>$user,
    ]);

}
/*登録削除*/
public function delete(Request $request)
{
    $user=Auth::user();
    $schedules=Schedule::where('user_id',$user->id)->get();
    foreach ($schedules as $schedule) {
        $schedule->delete();
    }
   
    Lost::where('email',$user->email)->delete();
    Artist::where('email',$user->email)->delete();
    Design::where('email',$user->email)->delete();

    User::where('id', $user->id)->delete();
    return redirect('/');

  }
}
