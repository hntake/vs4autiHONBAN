<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lost;
use App\Models\Inspect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class InspectController extends Controller
{
     /*検品登録*/
  public function create(Request $request)
  {
    $user=Auth::user();
    if($user->role==1){
      $inspect = new Inspect;
      $inspect->name = $request->name;
      $inspect->start = $request->start;
      $inspect->end = $request->end;
      $inspect->count = $inspect->end -$inspect->start +1;
      $inspect->save();

      //今回inspectに登録した商品IDをlostから全て取得
      $inspects=Lost::whereBetween('id', [$inspect->start,  $inspect->end])->get();
      //lostテーブルのorderが0→1に変更する
      foreach($inspects as $inspect){
      $lost=Lost::find($inspect->id);
      $lost
      ->update([
        'order'=>1,
        'office'=>$request->name,
        ]);
      }


      $offices=Inspect::orderBy('id', 'desc')->paginate(10);

      return view('inspect_list',[
        'offices'=>$offices,
      ]);
    }
  }
    /*検品表表示*/
    public function index(Request $request)
    {
        $losts=Lost::where('order','=',1)->orderBy('created_at', 'asc')->get();
        $offices=Inspect::orderBy('id', 'desc')->paginate(10);

        return view('inspect_list',[
            'losts'=>$losts,
            'offices'=>$offices,
        ]);

    }
    /*納入後*/
    public function delete(Request $request,$id)
    {
        $inspect = Inspect::find($id);
        //今回inspectに登録した商品IDをlostから全て取得
        $inspects=Lost::whereBetween('id', [$inspect->start,  $inspect->end])->get();
        //lostテーブルのorderが0→1に変更する
        foreach($inspects as $inspect){
        $lost=Lost::find($inspect->id);
        $lost
        ->update([
            'order'=>0,
            'complete'=>1,
            ]);
        }
        $delete=Inspect::where('id','=',$id)->delete();

        return redirect('inspect_list');

    }
        /*納品表表示*/
        public function index_complete(Request $request)
        {
            $losts=Lost::where('complete','=',1)->orderBy('created_at', 'asc')->get();

            return view('inspect_complete',[
                'losts'=>$losts,
            ]);

        }

}
