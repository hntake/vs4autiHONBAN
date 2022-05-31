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
       /*  $images = Image:: all(); */
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
            'schedule_name' => 'required|unique:schedules|max:25',
            'image0' => 'required|max:5000',
            'image1' => 'required|max:5000',
            'image2' => 'required|max:5000',
            'image3' => 'required|max:5000',
            'image4' => 'required|max:5000',
        ],
        [
            'schedule_name.unique' => '別のスケジュール名にしてください。',
            'image0' => '画像を選んでください',

     ]);
        $path0=$request->file('image0')->store('public');
        $path1=$request->file('image1')->store('public');
        $path2=$request->file('image2')->store('public');
        $path3=$request->file('image3')->store('public');
        $path4=$request->file('image4')->store('public');

        //schedulesテーブルへの受け渡し
        $schedule = new Schedule;
        $schedule->schedule_name = $request->schedule_name;
        $schedule->image0 = str_replace('public/', '', $path0);
        $schedule->image1 = str_replace('public/', '', $path1);
        $schedule->image2 = str_replace('public/', '', $path2);
        $schedule->image3 = str_replace('public/', '', $path3);
        $schedule->image4 = str_replace('public/', '', $path4);
        $schedule->name = User::where('id','=',Auth::id())->value('name');
        $schedule->save();


      /*  $schedules = Schedule::all();

        return view('list', ['schedules'=>$schedules]);*//*ホーム画面へ遷移へ変更の為**/
        $schedule = Schedule::orderBy('created_at', 'desc')->first();

        if(empty($schedule)) {
            return view('create');
        }
        else{

            //scheduleより最新のデータを取得

            return view('home',compact('schedule'));
        }




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
