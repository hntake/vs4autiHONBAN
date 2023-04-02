<?php

namespace App\Http\Controllers\Lost;

use Illuminate\Http\Request;
use App\Models\Lost;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class LostHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:lost'])->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index() {

        //lostより最新のデータを取得
        $lost = Lost::where('id','=',Auth::user()->id)->first();

        return view('lost.home',compact('lost'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function edit(Request $request,$id) {

      $losts= Lost::find($id);
      $losts->user_name= $request->input('user_name');
      $losts->email=$request->input('email');
      $losts->tel1=$request->input('tel1');
      $losts->tel2=$request->input('tel2');
      $losts->mode=$request->input('mode');
      $losts->mon1-$request->input('mon1');

    }


}
