<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\Image;
use App\Models\User;

class ScheduleController extends Controller
{
    /**
     * 新規作成画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {

        return view('create');
    }
    /**
     * スケジュール検索画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        return view('search',compact('schedule'));
    }


    /**
     * IDを選んだスケジュール表示
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $schedule = Schedule::where('id', $request->id)->first();

/* dd($schedule->imageOne); */

        return view('schedule',compact('schedule'));
    }

    /**
     * 画像保存ページへ遷移
     *
     * @param  Request  $request
     * @return Response
     */

    public function picture(Request $request)
    {
        $images = Image::where('id', '>', 20)->get();

        return view('store', ['images'=>$images]);
    }

    /**
     * 新しい画像を保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request){

        $image = new Image();
        $uploadImg = $request->image;
        if($uploadImg->isValid()) {
            $filePath = $uploadImg->store('public');
            $image->image = str_replace('public/', '', $filePath);
        }
        $image->save();
        return redirect('/store');
    }
 /**
     * 新しいスケジュールを作成保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function schedule(Request $request){





        $validate = $request -> validate([
            'schedule_name' => 'required|max:25',
            'image0' => 'required|max:5000',
            'image1' => 'required|max:5000',
            /* 'image2' => 'required|max:5000',
            'image3' => 'required|max:5000',
            'image4' => 'required|max:5000', */
        ],
        [
            'schedule_name.unique' => '別のスケジュール名にしてください。',
            'image0' => '画像を選んでください',

     ]);
        $path0=$request->file('image0')->store('public');
        $path1=$request->file('image1')->store('public');
        if($request->has('image2')){
        $path2=$request->file('image2')->store('public');
         }
        /* else{
            $path2=null;
        } */
        if(null !==$request->file('image3')){
        $path3=$request->file('image3')->store('public');
        }
        /* else{
            $path3=null;
        } */
        if(null !==$request->file('image4')){
        $path4=$request->file('image4')->store('public');
        }
        /* else{
            $path4=null;
        } */
        if (Auth::user() ){
        //schedulesテーブルへの受け渡し
        $schedule = new Schedule;
        $schedule->schedule_name = $request->schedule_name;
        $schedule->image0 = str_replace('public/', '', $path0);
        $schedule->image1 = str_replace('public/', '', $path1);
        if(isset($path2)){
        $schedule->image2 = str_replace('public/', '', $path2);
        }
        if(isset($path3)){
        $schedule->image3 = str_replace('public/', '', $path3);
        }
        if(isset($path4)){
        $schedule->image4 = str_replace('public/', '', $path4);
        }
        $schedule->name = User::where('id','=',Auth::id())->value('name');
        $schedule->save();

        $user = Auth::user();
        if (isset($user['stripe_id'])){

                $schedules = Schedule::where('name','=', Auth::user()->name)->get();

                return view('list', ['schedules'=>$schedules]);
            }
            else{
                $schedule = Schedule::orderBy('created_at', 'desc')->first();
            return redirect()->route('sample',$schedule);
            }
        }

        else{

            //schedulesテーブルへの受け渡し
        $schedule = new Schedule;
        $schedule->schedule_name = $request->schedule_name;
        $schedule->image0 = str_replace('public/', '', $path0);
        $schedule->image1 = str_replace('public/', '', $path1);
        if(isset($path2)){
        $schedule->image2 = str_replace('public/', '', $path2);
        }
        if(isset($path3)){
        $schedule->image3 = str_replace('public/', '', $path3);
        }
        if(isset($path4)){
        $schedule->image4 = str_replace('public/', '', $path4);
        }
        $schedule->name = 'guest';
        $schedule->save();

        $schedule = Schedule::orderBy('created_at', 'desc')->first();
        return redirect()->route('sample',$schedule);
    }

}

/*サンプル表示*/
public function sample(Schedule $schedule){
        return view('sample',compact('schedule'));
    }

     /**
     * リスト画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function list(Request $request)
    {

         $schedules = Schedule::where('name','=', Auth::user()->name)->get();

        return view('list', ['schedules'=>$schedules]);
    }
     /**
     * 選択したリストを削除
     *
     * @param Request $request
     * @return Response
     */
    public function delete_list(Request $request)
    {
        $schedule = Schedule::where('id', $request->id)->delete();
        return redirect('list');

    }
    /**
     * リスト画面で並び替え
     *
     * @param Request $request
     * @return Response
     */
    public function sort(Request $request)
    {
        $schedules = Schedule::sortable()->get();
        return view('list', ['schedules'=>$schedules]);
    }

    /**
     * 選択画像ページへ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function select_picture(Request $request)
{

    $image = Image::where('id', $request->id)->first();



    return view('picture',compact('image'));
}
/**
* 選択した画像を削除
*
* @param Request $request
* @return Response
*/
public function delete_picture(Request $request)
{
   $image = Image::where('id', $request->id)->delete();
   return redirect('store');

}


}