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
        if (Auth::user()) {
            $feel = Feel::where('user_id', Auth::user()->id)->first();

        return view('feel/create', compact('feel'));
        }
        else{
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


            //feelsテーブルへの受け渡し
            $feel=Feel::where('user=id','=',$user->id)->first();
            if (isset($request->message1)) {
                $feel->message1 = $request->message1;
            }
            if (isset($request->message2)) {
                $feel->message2 = $request->message2;
            }
            if (isset($request->message3)) {
                $feel->message3 = $request->message3;
            }
            if (isset($request->message4)) {
                $feel->message4 = $request->message4;
            }
            if (isset($request->message5)) {
                $feel->message5 = $request->message5;
            }
            if (isset($request->message6)) {
                $feel->message6 = $request->message6;
            }
            if (isset($request->message7)) {
                $feel->message7 = $request->message7;
            }
            if (isset($request->message8)) {
                $feel->message8 = $request->message8;
            }
          
            $feel->user_id = User::where('id', '=', Auth::id())->value('id');
            $feel->save();

            $old = Feel::where('user_id', '=', Auth::id())->where('created_at','<',$feel->created_at)->first();
            $old->delete();
            //作成するとログイン後のページ上部に表示されるようにする
            $user = Auth::user();
            $new_feel=5;
            $user=User::where('id', '=', Auth::id())
            ->update([
                'feel'=>$new_feel,
            ]);
            
            //アイコン非表示にするなら
            if($request->img1==1){
                $img1=Feel::where('user_id', '=', Auth::id())
                ->update([
                    'img1'=>1,
                ]);
            }
            if($request->img2==1){
                $img1=Feel::where('user_id', '=', Auth::id())
                ->update([
                    'img2'=>1,
                ]);
            }
            if($request->img3==1){
                $img1=Feel::where('user_id', '=', Auth::id())
                ->update([
                    'img3'=>1,
                ]);
            }
            if($request->img1==1){
                $img4=Feel::where('user_id', '=', Auth::id())
                ->update([
                    'img4'=>1,
                ]);
            }
            return view('feel/choice', [
                'feel' => $feel,
            ]);
            
        
    }

     /**
     * 選んだ感情を選択する画面表示
     *
     * @param Request $request
     * @return Response
     */
    public function choice(Request $request)
    {
        if (Auth::user()) {
            $feel=Feel::where('user_id', '=', Auth::id())->first();
        return view('feel/choice', [
            'feel' => $feel,
        ]);
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
