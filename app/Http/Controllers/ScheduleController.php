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
     * 歯科IDを選んだスケジュール表示
     *
     * @param Request $request
     * @return Response
     */
    public function dentist_index(Request $request)
    {

        $schedule = Schedule::where('id', $request->id)->first();


        return view('dentist/schedule',compact('schedule'));
    }
    /**
     * イラストIDを選んだスケジュール表示
     *
     * @param Request $request
     * @return Response
     */
    public function sort_index(Request $request)
    {

        $schedule = Schedule::where('id', $request->id)->first();


        return view('schedule_sort',compact('schedule'));
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
            'image0' => 'required|file|image:jpeg,png,jpg|max:5000',
            'image1' => 'required|file|image:jpeg,png,jpg|max:5000',
            'image2' =>  'file|image:jpeg,png,jpg|max:5000',
            'image3' =>  'file|image:jpeg,png,jpg|max:5000',
            'image4' =>  'file|image:jpeg,png,jpg|max:5000',
        ],
        [
            /**unique取り消し */
/*             'schedule_name.unique' => '別のスケジュール名にしてください。',
 */            'image0' => '画像を選んでください',

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
        $schedule->user_id = User::where('id','=',Auth::id())->value('id');
        $schedule->save();

        $user = Auth::user();
        $stripe = $user->stripe_id;
        $role =$user->role;
        if (isset($stripe)){

                $schedules = Schedule::where('user_id','=', Auth::user()->id)->get();

                return view('list', ['schedules'=>$schedules]);
            }

          /*   elseif(1==$role){
                $schedules = Schedule::where('user_id','=', Auth::user()->id)->get();

                return view('list', ['schedules'=>$schedules]);
            } */
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
        $schedule->user_id = '0';
        $schedule->save();

        $schedule = Schedule::orderBy('created_at', 'desc')->first();
        return redirect()->route('sample',$schedule);
    }

}
/**
     * 歯科スケジュールを作成保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function dentist_schedule(Request $request){

        $validate = $request -> validate([
            'schedule_name' => 'required|max:25',
            'image0' => 'required|max:25',
            'image1' => 'required|max:25',
          /*   'image2' => 'required|max:25',
            'image3' => 'required|max:25',
            'image4' => 'required|max:25', */
        ],
        [
            /*unique取り消し*/
/*             'schedule_name.unique' => '別のスケジュール名にしてください。',
 */
     ]);

     if (Auth::user() ){
        //schedulesテーブルへの受け渡し
        $schedule = new Schedule;
        $schedule->schedule_name = $request->schedule_name;
        $schedule->image0 = $request->image0;
        $schedule->image1 = $request->image1;
        if(isset($request->image2)){
            $schedule->image2 = $request->image2;
        }
        if(isset($request->image3)){
        $schedule->image3 = $request->image3;
        }
        if(isset($request->image4)){
        $schedule->image4 = $request->image4;
        }
        $schedule->user_id = User::where('id','=',Auth::id())->value('id');
        $schedule->list = 1;
        $schedule->save();

        $user = Auth::user();
        /*歯科スケジュールは無料会員も保存できるように変更*/
       /*  $stripe = $user->stripe_id;
        $role =$user->role; */
/*         if (isset($stripe)){
 */                $schedules = Schedule::where('user_id','=', Auth::user()->id)->get();
                return view('dentist/list', ['schedules'=>$schedules]);
          /*   }elseif(1==$role){
                $schedules = Schedule::where('user_id','=', Auth::user()->id)->get();

                return view('dentist/list', ['schedules'=>$schedules]);
            }else{
                $schedule = Schedule::orderBy('created_at', 'desc')->first();
            return redirect()->route('dentist_sample',$schedule);
            } */
        }
        else{

            //schedulesテーブルへの受け渡し
            $schedule = new Schedule;
            $schedule->schedule_name = $request->schedule_name;
            $schedule->image0 = $request->image0;
            $schedule->image1 = $request->image1;
            if(isset($request->image2)){
                $schedule->image2 = $request->image2;
            }
            if(isset($request->image3)){
            $schedule->image3 = $request->image3;
            }
            if(isset($request->image4)){
            $schedule->image4 = $request->image4;
            }
            $schedule->user_id = '0';
            $schedule->save();

        $schedule = Schedule::orderBy('created_at', 'desc')->first();
        return redirect()->route('dentist_sample',$schedule);
    }

        }
/**
     * イラストスケジュールを作成保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function schedule_sort(Request $request){

        $validate = $request -> validate([
            'schedule_name' => 'required|max:25',
            'image0' => 'required',
            'image1' => 'required',
          /*   'image2' => 'required|max:25',
            'image3' => 'required|max:25',
            'image4' => 'required|max:25', */
        ],
        [
            /*unique取り消し*/
/*             'schedule_name.unique' => '別のスケジュール名にしてください。',
 */
     ]);

     if (Auth::user() ){
        //schedulesテーブルへの受け渡し
        $schedule = new Schedule;
        $schedule->schedule_name = $request->schedule_name;
        $schedule->image0 = $request->image0;
        $schedule->image1 = $request->image1;
        if(isset($request->image2)){
            $schedule->image2 = $request->image2;
        }
        if(isset($request->image3)){
        $schedule->image3 = $request->image3;
        }
        if(isset($request->image4)){
        $schedule->image4 = $request->image4;
        }
        $schedule->user_id = User::where('id','=',Auth::id())->value('id');
        $schedule->list = 2;
        $schedule->save();

        $user = Auth::user();
        /*歯科スケジュールは無料会員も保存できるように変更*/
       /*  $stripe = $user->stripe_id;
        $role =$user->role; */
/*         if (isset($stripe)){
 */                $schedules = Schedule::where('user_id','=', Auth::user()->id)->get();
                return view('list_sort', ['schedules'=>$schedules]);
          /*   }elseif(1==$role){
                $schedules = Schedule::where('user_id','=', Auth::user()->id)->get();

                return view('dentist/list', ['schedules'=>$schedules]);
            }else{
                $schedule = Schedule::orderBy('created_at', 'desc')->first();
            return redirect()->route('dentist_sample',$schedule);
            } */
        }
        else{

            //schedulesテーブルへの受け渡し
            $schedule = new Schedule;
            $schedule->schedule_name = $request->schedule_name;
            $schedule->image0 = $request->image0;
            $schedule->image1 = $request->image1;
            if(isset($request->image2)){
                $schedule->image2 = $request->image2;
            }
            if(isset($request->image3)){
            $schedule->image3 = $request->image3;
            }
            if(isset($request->image4)){
            $schedule->image4 = $request->image4;
            }
            $schedule->user_id = '0';
            $schedule->save();

        $schedule = Schedule::orderBy('created_at', 'desc')->first();
        return redirect()->route('sample_sort',$schedule);
    }

        }

/*サンプル表示*/
public function sample(Schedule $schedule){
        return view('sample',compact('schedule'));
    }
/*歯科サンプル表示*/
public function dentist_sample(Schedule $schedule){
        return view('dentist/sample',compact('schedule'));
    }
/*イラストサンプル表示*/
public function sample_sort(Schedule $schedule){
        return view('sample_sort',compact('schedule'));
    }

     /**
     * リスト画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function list(Request $request)
    {
        $user = Auth::user();
        $stripe = $user->stripe_id;
        $verify= $user->email_verified_at;
        if (isset($stripe)){
         $schedules = Schedule::where('user_id','=', Auth::user()->id)->where('list','=','0')->get();

        return view('list', ['schedules'=>$schedules]);
        }
        else{
            $user=Auth::user();
            return view('stripe',[
                'intent' => $user->createSetupIntent()
            ]);

    }
}
    /**学校用リスト画面へ遷移
    * @param Request $request
    * @return Response
    */
   public function list_for(Request $request,$id)
   {
       /*uuidからデータを取得*/
        $school= User::where('uuid','=',$request->id)->get()->pluck('id');
       /*作成者IDが$schoolと一致し、かつlistカラムが1(通常スケジュール）であるスケジュールを取得する*/
        $schedules = Schedule::where('user_id','=', $school)->where('list','=','0')->get();

       return view('school', [
           'schedules'=>$schedules,
           'id' =>$id,
       ]);
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
     /**
     * イラストスケリスト画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function list_sort(Request $request)
    {

         $schedules = Schedule::where('user_id','=', Auth::user()->id)->where('list','=','2')->get();

        return view('list_sort', [
            'schedules'=>$schedules,
        ]);
    }
     /**
     * 患者用歯科リスト画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function dentist_list_for(Request $request,$id)
    {
        /*uuidから歯科データを取得*/
         $dentist = User::where('uuid','=',$request->id)->get()->pluck('id');
        /*作成者名が$dentist一致し、かつlistカラムが1(歯科スケジュール）であるスケジュールを取得する*/
         $schedules = Schedule::where('user_id','=', $dentist)->where('list','=','1')->get();

        return view('dentist/patient', [
            'schedules'=>$schedules,
            'id' =>$id,
        ]);
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
     * 選択した歯科リストを削除
     *
     * @param Request $request
     * @return Response
     */
    public function dentist_delete_list(Request $request)
    {
        $schedule = Schedule::where('id', $request->id)->delete();
        return redirect('dentist/list');

    }
     /**
     * 選択したイラストリストを削除
     *
     * @param Request $request
     * @return Response
     */
    public function sort_delete_list(Request $request)
    {
        $schedule = Schedule::where('id', $request->id)->delete();
        return redirect('list_sort');

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
