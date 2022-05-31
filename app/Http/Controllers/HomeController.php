<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /* public function index() {

        //scheduleより最新のデータを取得
        $schedule = Schedule::orderBy('created_at', 'desc')->first();

        return view('home',compact('schedule'));
    } */
    /* public function index()
    {
        $schedules = Schedule::where('created_at', 'asc')->first();
        return view('home', [
            'schedules' => $schedules,
        ]);
    } */
}
