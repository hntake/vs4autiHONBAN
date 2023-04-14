<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Lost;
use App\Models\User;
use App\Models\Call;
use Carbon\Carbon;
use App\Mail\CallMail;
use Illuminate\Support\Facades\Auth;




class ExtraController extends Controller
{
    /**
     * キーワード受け取り
     *
     * @param Request $request
     * @return Response
     */
    #
    public function search(Request $request)
    {
        #キーワード受け取り
        $keyword = $request->input('keyword');

        #クエリ生成
        $query = Schedule::query();

        #もしキーワードがあったら
        if (!empty($keyword)) {
            $query->where('schedule_name', 'like', '%' . $keyword . '%');
        }


        $schedules = $query->get();


        return view('search', compact('schedules', 'keyword'));
    }

    /*並び替え機能*/
    public function sort(Request $request)
    {
        $select = $request->narabi;
        if ($select == 'asc') {
            $schedules = Schedule::orderBy('created_at', 'asc')->get();
        } elseif ($select == 'desc') {
            $schedules = Schedule::orderBy('created_at', 'desc')->get();
        } else {
            $schedules = Schedule::all();
        }
        /*  dd($select); */
        return view('list', compact('schedules'));
    }
    /*お守りページ*/
    public function protect(Request $request, $id)
    {
        /*uuidから対象者情報を取得*/
        $user = Lost::where('uuid', '=', $id)->first();
        if($user->mode==0){

            /*曜日・時間帯を取得*/
            $now = Carbon::now();
            $date = $now->hour;
            $week = $now->dayOfWeek;
            if ($week == 1 &&  $date >= 6 && $date <= 12) {
                $to_call = $user->mon1;
            } elseif ($week == 2 && $date >= 6 && $date <= 12) {
                $to_call = $user->tue1;
            } elseif ($week == 3 && $date >= 6 && $date <= 12) {
                $to_call = $user->wed1;
            } elseif ($week == 4 && $date >= 6 && $date <= 12) {
                $to_call = $user->thu1;
            } elseif ($week == 5 && $date >= 6 && $date <= 12) {
                $to_call = $user->fri1;
            } elseif ($week == 6 && $date >= 6 && $date <= 12) {
                $to_call = $user->sat1;
            } elseif ($week == 7 && $date >= 6 && $date <= 12) {
                $to_call = $user->sun1;
            } elseif ($week == 1 && $date >= 12 && $date <= 19) {
                $to_call = $user->mon2;
            } elseif ($week == 2 && $date >= 12 && $date <= 19) {
                $to_call = $user->tue2;
            } elseif ($week == 3 && $date >= 12 && $date <= 19) {
                $to_call = $user->wed2;
            } elseif ($week == 4 && $date >= 12 && $date <= 19) {
                $to_call = $user->thu2;
            } elseif ($week == 5 && $date >= 12 && $date <= 19) {
                $to_call = $user->fri2;
            } elseif ($week == 6 && $date >= 12 && $date <= 19) {
                $to_call = $user->sat2;
            } elseif ($week == 7 &&  $date >= 12 && $date <= 19) {
                $to_call = $user->sun2;
            } elseif ($week == 1 && $date >= 19 || $date <= 6) {
                $to_call = $user->mon3;
            } elseif ($week == 2 && $date >= 19 || $date <= 6) {
                $to_call = $user->tue3;
            } elseif ($week == 3 && $date >= 19 || $date <= 6) {
                $to_call = $user->wed3;
            } elseif ($week == 4 && $date >= 19 || $date <= 6) {
                $to_call = $user->thu3;
            } elseif ($week == 5 && $date >= 19 || $date <= 6) {
                $to_call = $user->fri3;
            } elseif ($week == 6 && $date >= 19 || $date <= 6) {
                $to_call = $user->sat3;
            } else {
                $to_call = $user->sun3;
            }
            return view('lost/home', [
                'user' => $user,
                'to_call' => $to_call,
            ]);
        }
        else{
            return view('stop');
        }
    }
    /*お守りで電話ボタンクリック*/
    public function to_call(Request $request, $id, $to_call)
    {
        $user = Lost::where('id', '=', $id)->first();
        if ($to_call == 0) {
            $tel = $user->tel1;
        } else {
            $tel = $user->tel2;
        }

        $call = new Call;
        $call->name = $user->name;
        $call->tel1 = $tel;
        $call->ip = $request->ip();
        $call->save();

        \Mail::to($user['email'])->send(new CallMail($user, $call));

        return redirect("tel:{{$tel}}");
    }
    /*お守りバッジサービスを停止確認画面*/
    public function stop(Request $requestl)
    {

        return view('lost/stop');
    }
    /*お守りバッジサービスを停止確認画面*/
    public function stop_call(Request $requestl)
    {

        $new_lost=1;

        $user = Auth::user();
        $lost = Lost::where('email', '=',Auth::user()->email)->first();
        $lost
        ->update([
            'mode'=>$new_lost,
        ]);

        return redirect('my_page');
    }
    /*お守りバッジサービスを再開確認画面*/
    public function again(Request $requestl)
    {

        return view('lost/again');
    }
    /*お守りバッジサービスを再開確認画面*/
    public function again_call(Request $requestl)
    {

        $new_lost=0;

        $user = Auth::user();
        $lost = Lost::where('email', '=',Auth::user()->email)->first();
        $lost
        ->update([
            'mode'=>$new_lost,
        ]);

        return redirect('my_page');
    }

}
