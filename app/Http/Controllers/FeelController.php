<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feel;
use Illuminate\Support\Facades\Auth;



class FeelController extends Controller
{
   /**
     * 作成画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function input(Request $request)
    {
        Auth::user();
            $feel = Feel::where('user_id', Auth::user()->id)->first();
            $id = Auth::user()->id;
            //マイリクで登録した人
        if(isset($feel)) {
            return view('feel/create', compact('feel'));
        }//他で登録した人
        elseif(isset($id)){
            $feel->user_id = User::where('id', '=', Auth::id())->value('id');
            $feel->email = User::where('id', '=', Auth::id())->value('email');

            return view('feel/create', compact('feel'));
        }else{
            return view('auth/login');
        }
    }

     /**
     * 作成保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $feel=Feel::where('user_id','=',$user->id)->first();
        //マイリク開始している人
        if (isset($feel)) {
            //画像表示設定をリセット
            $feel->img1=0;
            $feel->img2=0;
            $feel->img3=0;
            $feel->img4=0;
            $feel->save();
            //feelsテーブルへの受け渡し
            $feel->message2 = $request->input('message2');
            $feel->message1 = $request->input('message1');
            $feel->message3 = $request->input('message3');
            $feel->message4 = $request->input('message4');
            $feel->message5 = $request->input('message5');
            $feel->message6 = $request->input('message6');
            $feel->message7 = $request->input('message7');
            $feel->message8 = $request->input('message8');
            $feel->save();
            $feel->save();
            //アイコン非表示にするなら
            if($request->img1==1){
                $feel->img1=$request->img1;
            }
           
            if(isset($request->img2)){
                $feel->img2=$request->img2;
            }   
            if(isset($request->img3)){
                $feel->img3=$request->img3;
            }   
            if(isset($request->img4)){
                $feel->img4=$request->img4;
            }
            $feel->save();

              //作成するとログイン後のページ上部に表示されるようにする
              $user = Auth::user();
              $new_feel=5;
              $user=User::where('id', '=', Auth::id())
              ->update([
                  'feel'=>$new_feel,
              ]);
          
            return view('feel/choice', [
                'feel' => $feel,
            ]);
        }//マイリク初の人
        else{
            $feel=new Feel();
            $feel->user_id = User::where('id', '=', Auth::id())->value('id');
            $feel->email = User::where('id', '=', Auth::id())->value('email');
            $feel->message2 = $request->input('message2');
            $feel->message1 = $request->input('message1');
            $feel->message3 = $request->input('message3');
            $feel->message4 = $request->input('message4');
            $feel->message5 = $request->input('message5');
            $feel->message6 = $request->input('message6');
            $feel->message7 = $request->input('message7');
            $feel->message8 = $request->input('message8');
                //アイコン非表示にするなら
            if($request->img1==1){
                $feel->img1=1;
            }
            if($request->img2==1){
                $feel->img2=1;
            }
            if($request->img3==1){
                
                $feel->img3=1;
            }
            if($request->img4==1){
                $feel->img4=1;
            }
            $feel->save();
            return view('feel/choice', [
                'feel' => $feel,
            ]);
        }
        
    }

     /**
     * 選んだ感情を選択する画面表示
     *
     * @param Request $request
     * @return Response
     */
    public function choice(Request $request)
    {
        $feel=Feel::where('user_id', '=', Auth::id())->first();

        if (isset($feel)) {
        return view('feel/choice', [
            'feel' => $feel,
        ]);
        }
        elseif($feel==null&&Auth::user()){
            return view('feel/create');
        }
        else{
            return view('auth/login');
        }
    }

      /**
     * 選んだ感情を表示(angry)
     *
     * @param Request $request
     * @return Response
     */
    public function index1(Request $request)
    {
        $user=Auth::user();

        $feel = Feel::where('user_id', $user->id)->first();


        return view('feel/index1', compact('feel'));
    }
        /**
     * 選んだ感情を表示(pain)
     *
     * @param Request $request
     * @return Response
     */
    public function index2(Request $request)
    {

        $user=Auth::user();

        $feel = Feel::where('user_id', $user->id)->first();

        return view('feel/index2', compact('feel'));
    }
        /**
     * 選んだ感情を表示(sad)
     *
     * @param Request $request
     * @return Response
     */
    public function index3(Request $request)
    {

        $user=Auth::user();

        $feel = Feel::where('user_id', $user->id)->first();


        return view('feel/index3', compact('feel'));
    }
        /**
     * 選んだ感情を表示(scare)
     *
     * @param Request $request
     * @return Response
     */
    public function index4(Request $request)
    {

        $user=Auth::user();

        $feel = Feel::where('user_id', $user->id)->first();

        return view('feel/index4', compact('feel'));
    }
    }
