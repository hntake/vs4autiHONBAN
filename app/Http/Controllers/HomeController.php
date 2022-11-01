<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
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

         /**
     * 歯科リスト画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function dentist_list(Request $request)
    {

         $schedules = Schedule::where('user_id','=', Auth::user()->id)->where('list','=','1')->get();

        return view('dentist/list', [
            'schedules'=>$schedules,
        ]);
    }
    /* public function index()
    {
        $schedules = Schedule::where('created_at', 'asc')->first();
        return view('home', [
            'schedules' => $schedules,
        ]);
    } */
}
