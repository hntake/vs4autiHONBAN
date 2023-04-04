<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\News;
use App\Models\User;
use App\Models\Lost;
use Illuminate\Support\Facades\Auth;


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
       //確認画面
      public function mainCheck(Request $request)
      {
  /*         $request->validate([
              'name' => 'required|string',

            ]); */
            //データ保持用
            $email_token = $request->email_token;
            //申込種類によって分ける
           $user=User::where('id','=',Auth::user()->id)->first();
           if($user->type==0){
               $user
               ->update([
                   'image_id'=> $request->image_id,
                   'gender'=> $request->gender,
                ]);
                return view('auth.main.register_check', compact('user','email_token',));
        }

        elseif($user->type==1){
          $lost=new Lost();
          $lost->name=$request->name;
          $lost->name_pronunciation = $request->name_pronunciation;
          $lost->email=$user->email;
          $lost->password=$user->password;
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


        return view('auth.main.register_check', compact('email_token','lost'));

        }
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
        $user=User::where('id', '=', Auth::id());
        $user
        ->update([
            'image_id'=> $request->image_id,
            'gender'=> $request->gender,
         ]);
        }
        elseif($user->type==1){
            $lost=new Lost;
            $lost->name=$request->name;
            $lost->name_pronunciation = $request->name_pronunciation;
            $lost->email=$user->email;
            $lost->password=$user->password;
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
        }
        return view('auth.main.registered');
      }
          //my_page画面に遷移
          public function my_page()
          {
            $user=Auth::user();
            $lost=Lost::where('email','=',$user->email)->first();
                return view('my_page',compact('user','lost'));
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
        return view('edit_user', [
            'id' => $id,
            'user' => $user,
            'lost'=>$lost,
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
        else{
        $lost=Lost::where('email','=',$user->email)->first();
        $lost->email = $request->input('email');
        $lost->name = $request->input('name');
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

    }
        return redirect('my_page');
    }

}
