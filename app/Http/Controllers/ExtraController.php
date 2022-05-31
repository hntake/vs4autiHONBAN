<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

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
     if(!empty($keyword))
     {
       $query->where('schedule_name','like','%'.$keyword.'%');
     }


     $schedules = $query->get();


     return view('search', compact('schedules', 'keyword'));


    }

    /*並び替え機能*/
    public function sort (Request $request)
    {
        $select =$request->narabi;
        if($select == 'asc'){
            $schedules =Schedule::orderBy('created_at', 'asc')->get();
        } elseif($select == 'desc') {
            $schedules =Schedule::orderBy('created_at', 'desc')->get();
        } else {
            $schedules =Schedule::all();
        }
       /*  dd($select); */
        return view('list', compact('schedules'));
    }
}
