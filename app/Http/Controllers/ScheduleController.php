<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Illust;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\Independence;
use App\Models\View;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use IntlChar;

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
        return view('search', compact('schedule'));
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
        $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');


        return view('schedule', compact('schedule', 'user_img'));
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
        $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');


        return view('dentist/schedule', compact('schedule', 'user_img'));
    }
    /**
     * 医療IDを選んだスケジュール表示
     *
     * @param Request $request
     * @return Response
     */
    public function medical_index(Request $request)
    {

        $schedule = Schedule::where('id', $request->id)->first();
        $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');

        return view('medical/schedule', compact('schedule', 'user_img'));
    }
    /**
     * 自立支援IDを選んだスケジュール表示
     *
     * @param Request $request
     * @return Response
     */
    public function independence_index(Request $request)
    {

        $schedule = Independence::where('id', $request->id)->first();

        return view('independence/schedule', compact('schedule'));
    }
    /**
     * 自立支援の選んだ写真１番表示
     *
     * @param Request $request
     * @return Response
     */
    public function independence_one(Request $request, $id)
    {

        $schedule = Independence::where('id', $id)->first();
        $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');

        return view('independence/schedule_one', compact('schedule'));
    }
    /**
     * 自立支援の選んだ写真2番表示
     *
     * @param Request $request
     * @return Response
     */
    public function independence_two(Request $request, $id)
    {

        $schedule = Independence::where('id', $id)->first();
        $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');

        return view('independence/schedule_two', compact('schedule'));
    }
    /**
     * 自立支援の選んだ写真3番表示
     *
     * @param Request $request
     * @return Response
     */
    public function independence_three(Request $request, $id)
    {

        $schedule = Independence::where('id', $id)->first();
        $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');

        return view('independence/schedule_three', compact('schedule'));
    }
    /**
     * 自立支援の選んだ写真4番表示
     *
     * @param Request $request
     * @return Response
     */
    public function independence_four(Request $request, $id)
    {

        $schedule = Independence::where('id', $id)->first();
        $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');

        return view('independence/schedule_four', compact('schedule'));
    }
    /**
     * 自立支援の選んだ写真5番表示
     *
     * @param Request $request
     * @return Response
     */
    public function independence_five(Request $request, $id)
    {

        $schedule = Independence::where('id', $id)->first();
        $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');

        return view('independence/schedule_five', compact('schedule'));
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
        $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');


        return view('schedule_sort', compact('schedule', 'user_img'));
    }
    /**
     * ヘアカットスケジュール表示
     *
     * @param Request $request
     * @return Response
     */
    public function cut_schedule(Request $request)
    {

        if (Auth::user()) {
            $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');
            $user = User::where('id', '=', Auth::user()->id)->value('gender');

            return view('hair/schedule', compact('user_img', 'user'));
        } else {
            $user_img = null;
            $user = null;

            return view('hair/schedule', compact('user_img', 'user'));
        }
    }
    /**
     * ヘアカットページ表示
     *
     * @param Request $request
     * @return Response
     */
    public function cut(Request $request)
    {

        if (Auth::user()) {
            $user = User::where('id', '=', Auth::user()->id)->first();

            return view('hair/cut', compact('user'));
        } else {

            $user = null;

            return view('hair/cut', compact('user'));
        }
    }
    /**
     * leftカットページ表示
     *
     * @param Request $request
     * @return Response
     */
    public function timer4(Request $request)
    {

        if (Auth::user()) {
            $user = User::where('id', '=', Auth::user()->id)->first();

            return view('hair/timer4', compact('user'));
        } else {

            $user = null;

            return view('hair/timer4', compact('user'));
        }
    }
    /**
     *rightカットページ表示
     *
     * @param Request $request
     * @return Response
     */
    public function timer3(Request $request)
    {

        if (Auth::user()) {
            $user = User::where('id', '=', Auth::user()->id)->first();

            return view('hair/timer3', compact('user'));
        } else {

            $user = null;

            return view('hair/timer3', compact('user'));
        }
    }
    /**
     * backカットページ表示
     *
     * @param Request $request
     * @return Response
     */
    public function timer2(Request $request)
    {

        if (Auth::user()) {
            $user = User::where('id', '=', Auth::user()->id)->first();

            return view('hair/timer2', compact('user'));
        } else {

            $user = null;

            return view('hair/timer2', compact('user'));
        }
    }
    /**
     * 前髪カットページ表示
     *
     * @param Request $request
     * @return Response
     */
    public function timer1(Request $request)
    {

        if (Auth::user()) {
            $user = User::where('id', '=', Auth::user()->id)->first();

            return view('hair/timer1', compact('user'));
        } else {

            $user = null;

            return view('hair/timer1', compact('user'));
        }
    }
    /**
     * clipperカットページ表示
     *
     * @param Request $request
     * @return Response
     */
    public function clipper(Request $request)
    {

        if (Auth::user()) {
            $user = User::where('id', '=', Auth::user()->id)->first();

            return view('hair/clipper', compact('user'));
        } else {

            $user = null;

            return view('hair/clipper', compact('user'));
        }
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

        return view('store', ['images' => $images]);
    }

    /**
     * 新しい画像を保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $image = new Image();
        $uploadImg = $request->image;
        if ($uploadImg->isValid()) {
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
    public function schedule(Request $request)
    {





        $validate = $request->validate(
            [
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
 */
                'image0' => '画像を選んでください',

            ]
        );
        $path0 = $request->file('image0')->store('public');
        $path1 = $request->file('image1')->store('public');
        if ($request->has('image2')) {
            $path2 = $request->file('image2')->store('public');
        }

        if (null !== $request->file('image3')) {
            $path3 = $request->file('image3')->store('public');
        }

        if (null !== $request->file('image4')) {
            $path4 = $request->file('image4')->store('public');
        }

        if (Auth::user()) {
            $user = Auth::user();
            $stripe = $user->stripe_id;
            /**stripeがNULLでないなら */
            if (isset($stripe)) {
                //schedulesテーブルへの受け渡し
                $schedule = new Schedule;
                $schedule->schedule_name = $request->schedule_name;
                $schedule->image0 = str_replace('public/', '', $path0);
                $schedule->image1 = str_replace('public/', '', $path1);
                if (isset($path2)) {
                    $schedule->image2 = str_replace('public/', '', $path2);
                }
                if (isset($path3)) {
                    $schedule->image3 = str_replace('public/', '', $path3);
                }
                if (isset($path4)) {
                    $schedule->image4 = str_replace('public/', '', $path4);
                }
                $schedule->user_id = User::where('id', '=', Auth::id())->value('id');
                $schedule->save();

                $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');


                return view('schedule', [
                    'schedule' => $schedule,
                    'user_img' => $user_img
                ]);
            }
            /*stripeがNULLなら*/ else {
                $count = Schedule::where('user_id', '=', Auth::user()->id)->where('list', '=', '0')->count();
                /*scheduleの数が5以下なら*/
                if ($count < 6) {
                    $schedule = new Schedule;
                    $schedule->schedule_name = $request->schedule_name;
                    $schedule->image0 = str_replace('public/', '', $path0);
                    $schedule->image1 = str_replace('public/', '', $path1);
                    if (isset($path2)) {
                        $schedule->image2 = str_replace('public/', '', $path2);
                    }
                    if (isset($path3)) {
                        $schedule->image3 = str_replace('public/', '', $path3);
                    }
                    if (isset($path4)) {
                        $schedule->image4 = str_replace('public/', '', $path4);
                    }
                    $schedule->user_id = User::where('id', '=', Auth::id())->value('id');
                    $schedule->save();

                    $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');


                    return view('schedule', [
                        'schedule' => $schedule,
                        'user_img' => $user_img
                    ]);
                } else {
                    $schedules = Schedule::where('user_id', '=', Auth::user()->id)->get();

                    session()->flash('flash_message', 'スケジュールの数が5個を超えています。削除するか、有料プランを申し込み下さい');
                    return view('list', ['schedules' => $schedules]);
                }
            }
        } else {

            //schedulesテーブルへの受け渡し
            $schedule = new Schedule;
            $schedule->schedule_name = $request->schedule_name;
            $schedule->image0 = str_replace('public/', '', $path0);
            $schedule->image1 = str_replace('public/', '', $path1);
            if (isset($path2)) {
                $schedule->image2 = str_replace('public/', '', $path2);
            }
            if (isset($path3)) {
                $schedule->image3 = str_replace('public/', '', $path3);
            }
            if (isset($path4)) {
                $schedule->image4 = str_replace('public/', '', $path4);
            }
            $schedule->user_id = '0';
            $schedule->save();

            $schedule = Schedule::orderBy('created_at', 'desc')->first();
            return redirect()->route('sample', $schedule);
        }
    }
    /**
     * 新しい自立支援スケジュールを作成保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function independence_schedule(Request $request)
    {




        $validate = $request->validate(
            [
                'schedule_name' => 'required|max:25',
                'image1' => 'required|file|image:jpeg,png,jpg|max:5000',
                'image2' => 'required|file|image:jpeg,png,jpg|max:5000',
                'image3' =>  'file|image:jpeg,png,jpg|max:5000',
                'image4' =>  'file|image:jpeg,png,jpg|max:5000',
                'image5' =>  'file|image:jpeg,png,jpg|max:5000',
                'explain1' => 'max:25',
                'explain2' =>  'max:25',
                'explain3' =>  'max:25',
                'explain4' =>  'max:25',
                'explain5' => 'max:25',
                'caution1' => 'max:25',
                'caution2' =>  'max:25',
                'caution3' =>  'max:25',
                'caution4' =>  'max:25',
                'caution5' => 'max:25',
            ],
            [
                /**unique取り消し */
                /*             'schedule_name.unique' => '別のスケジュール名にしてください。',
 */
                'image1' => '画像を選んでください',

            ]
        );
        $path1 = $request->file('image1')->store('public');
        $path2 = $request->file('image2')->store('public');
        if ($request->has('image3')) {
            $path3 = $request->file('image3')->store('public');
        }
        /* else{
            $path2=null;
        } */
        if (null !== $request->file('image4')) {
            $path4 = $request->file('image4')->store('public');
        }
        /* else{
            $path3=null;
        } */
        if (null !== $request->file('image5')) {
            $path5 = $request->file('image5')->store('public');
        }
        /* else{
            $path4=null;
        } */
        if (Auth::user()) {
            $user = Auth::user();
            $stripe = $user->stripe_id;
            /**stripeがNULLでないなら */
            if (isset($stripe)) {
                //schedulesテーブルへの受け渡し
                $schedule = new Independence;
                $schedule->schedule_name = $request->schedule_name;
                $schedule->user_id = User::where('id', '=', Auth::id())->value('id');
                if ($request->public == 1) {
                    //プライベート保存
                    $schedule->public = 0;
                }
                //一般に公開
                if ($request->public == 2) {
                    $schedule->public = 1;
                }
                $schedule->image1 = str_replace('public/', '', $path1);
                $schedule->image2 = str_replace('public/', '', $path2);
                if (isset($path3)) {
                    $schedule->image3 = str_replace('public/', '', $path3);
                }
                if (isset($path4)) {
                    $schedule->image4 = str_replace('public/', '', $path4);
                }
                if (isset($path5)) {
                    $schedule->image5 = str_replace('public/', '', $path5);
                }
                $schedule->explain1 = $request->explain1;
                $schedule->explain2 = $request->explain2;
                if (isset($request->explain3)) {
                    $schedule->explain3 = $request->explain3;
                }
                if (isset($request->explain4)) {
                    $schedule->explain4 = $request->explain4;
                }
                if (isset($request->explain5)) {
                    $schedule->explain5 = $request->explain5;
                }
                $schedule->caution1 = $request->caution1;
                $schedule->caution2 = $request->caution2;
                if (isset($request->caution3)) {
                    $schedule->caution3 = $request->caution3;
                }
                if (isset($request->caution4)) {
                    $schedule->caution4 = $request->caution4;
                }
                if (isset($request->caution5)) {
                    $schedule->caution5 = $request->caution5;
                }
                $schedule->save();

                $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');


                return view('independence/schedule', [
                    'schedule' => $schedule,
                    'user_img' => $user_img
                ]);
            }
            /*stripeがNULLなら*/ else {
                $count = Independence::where('user_id', '=', Auth::user()->id)->where('public', '=', '0')->count();
                /*scheduleの数が5以下なら*/
                if ($count < 6) {
                    $schedule = new Independence;
                    $schedule->schedule_name = $request->schedule_name;
                    $schedule->user_id = User::where('id', '=', Auth::id())->value('id');
                    if ($request->public == 1) {
                        //プライベート保存
                        $schedule->public = 0;
                    }
                    //一般に公開
                    if ($request->public == 2) {
                        $schedule->public = 1;
                    }
                    $schedule->image1 = str_replace('public/', '', $path1);
                    $schedule->image2 = str_replace('public/', '', $path2);
                    if (isset($path3)) {
                        $schedule->image3 = str_replace('public/', '', $path3);
                    }
                    if (isset($path4)) {
                        $schedule->image4 = str_replace('public/', '', $path4);
                    }
                    if (isset($path5)) {
                        $schedule->image5 = str_replace('public/', '', $path5);
                    }
                    $schedule->explain1 = $request->explain1;
                    $schedule->explain2 = $request->explain2;
                    if (isset($request->explain3)) {
                        $schedule->explain3 = $request->explain3;
                    }
                    if (isset($request->explain4)) {
                        $schedule->explain4 = $request->explain4;
                    }
                    if (isset($request->explain5)) {
                        $schedule->explain5 = $request->explain5;
                    }
                    $schedule->caution1 = $request->caution1;
                    $schedule->caution2 = $request->caution2;
                    if (isset($request->caution3)) {
                        $schedule->caution3 = $request->caution3;
                    }
                    if (isset($request->caution4)) {
                        $schedule->caution4 = $request->caution4;
                    }
                    if (isset($request->caution5)) {
                        $schedule->caution5 = $request->caution5;
                    }
                    $schedule->save();

                    $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');


                    return view('independence/schedule', [
                        'schedule' => $schedule,
                        'user_img' => $user_img
                    ]);
                } else {
                    $schedules = Independence::where('user_id', '=', Auth::user()->id)->get();

                    session()->flash('flash_message', 'スケジュールの数が5個を超えています。削除するか、有料プランを申し込み下さい');
                    return view('dashboard', ['schedules' => $schedules]);
                }
            }
        } else {
            //非ユーザーは作成は全て公開になる方向にしたいけど今は保留。保留解除時には以下は修正が必要です
            //schedulesテーブルへの受け渡し
            /*  $schedule = new Independence;
        $schedule->schedule_name = $request->schedule_name;
        $schedule->image1 = str_replace('public/', '', $path1);
        $schedule->image2 = str_replace('public/', '', $path2);
        if(isset($path3)){
        $schedule->image3 = str_replace('public/', '', $path3);
        }
        if(isset($path4)){
        $schedule->image4 = str_replace('public/', '', $path4);
        }
        if(isset($path5)){
        $schedule->image5 = str_replace('public/', '', $path5);
        }
        $schedule->user_id = '0';
        $schedule->save();

        $schedule = Schedule::orderBy('created_at', 'desc')->first(); */
            return redirect()->route('independence/sample');
        }
    }
    /**
     * 歯科スケジュールを作成保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function dentist_schedule(Request $request)
    {

        $validate = $request->validate(
            [
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
 */]
        );

        if (Auth::user()) {
            //schedulesテーブルへの受け渡し
            $schedule = new Schedule;
            $schedule->schedule_name = $request->schedule_name;
            $schedule->image0 = $request->image0;
            $schedule->image1 = $request->image1;
            if (isset($request->image2)) {
                $schedule->image2 = $request->image2;
            }
            if (isset($request->image3)) {
                $schedule->image3 = $request->image3;
            }
            if (isset($request->image4)) {
                $schedule->image4 = $request->image4;
            }
            $schedule->user_id = User::where('id', '=', Auth::id())->value('id');
            $schedule->list = 1;
            $schedule->save();

            $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');

            return view('dentist/schedule', [
                'schedule' => $schedule,
                'user_img' => $user_img
            ]);
        } else {

            //schedulesテーブルへの受け渡し
            $schedule = new Schedule;
            $schedule->schedule_name = $request->schedule_name;
            $schedule->image0 = $request->image0;
            $schedule->image1 = $request->image1;
            if (isset($request->image2)) {
                $schedule->image2 = $request->image2;
            }
            if (isset($request->image3)) {
                $schedule->image3 = $request->image3;
            }
            if (isset($request->image4)) {
                $schedule->image4 = $request->image4;
            }
            $schedule->user_id = '0';
            $schedule->save();

            $schedule = Schedule::orderBy('created_at', 'desc')->first();
            return redirect()->route('dentist_sample', $schedule);
        }
    }
    /**
     * 医療スケジュールを作成保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function medical_schedule(Request $request)
    {

        $validate = $request->validate(
            [
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
 */]
        );

        if (Auth::user()) {
            //schedulesテーブルへの受け渡し
            $schedule = new Schedule;
            $schedule->schedule_name = $request->schedule_name;
            $schedule->image0 = $request->image0;
            $schedule->image1 = $request->image1;
            if (isset($request->image2)) {
                $schedule->image2 = $request->image2;
            }
            if (isset($request->image3)) {
                $schedule->image3 = $request->image3;
            }
            if (isset($request->image4)) {
                $schedule->image4 = $request->image4;
            }
            $schedule->user_id = User::where('id', '=', Auth::id())->value('id');
            $schedule->list = 3;
            $schedule->save();

            $user = Auth::user();
            /*歯科スケジュールは無料会員も保存できるように変更*/
            /*  $stripe = $user->stripe_id;
        $role =$user->role; */
            /*         if (isset($stripe)){
*/
            $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');


            return view('medical/schedule', [
                'schedule' => $schedule,
                'user_img' => $user_img
            ]);
        } else {

            //schedulesテーブルへの受け渡し
            $schedule = new Schedule;
            $schedule->schedule_name = $request->schedule_name;
            $schedule->image0 = $request->image0;
            $schedule->image1 = $request->image1;
            if (isset($request->image2)) {
                $schedule->image2 = $request->image2;
            }
            if (isset($request->image3)) {
                $schedule->image3 = $request->image3;
            }
            if (isset($request->image4)) {
                $schedule->image4 = $request->image4;
            }
            $schedule->user_id = '0';
            $schedule->save();

            $schedule = Schedule::orderBy('created_at', 'desc')->first();
            return redirect()->route('medical_sample', $schedule);
        }
    }
    /**
     * イラストスケジュールを作成保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function schedule_sort(Request $request)
    {

        $validate = $request->validate(
            [
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
 */]
        );

        if (Auth::user()) {
            //schedulesテーブルへの受け渡し
            $schedule = new Schedule;
            $schedule->schedule_name = $request->schedule_name;
            $schedule->image0 = $request->image0;
            $schedule->image1 = $request->image1;
            if (isset($request->image2)) {
                $schedule->image2 = $request->image2;
            }
            if (isset($request->image3)) {
                $schedule->image3 = $request->image3;
            }
            if (isset($request->image4)) {
                $schedule->image4 = $request->image4;
            }
            $schedule->user_id = User::where('id', '=', Auth::id())->value('id');
            $schedule->list = 2;
            $schedule->save();

            $user = Auth::user();

            $user_img = User::where('id', '=', Auth::user()->id)->value('image_id');

            return view('schedule_sort', [
                'schedule' => $schedule,
                'user_img' => $user_img
            ]);
            /*   }elseif(1==$role){
                $schedules = Schedule::where('user_id','=', Auth::user()->id)->get();

                return view('dentist/list', ['schedules'=>$schedules]);
            }else{
                $schedule = Schedule::orderBy('created_at', 'desc')->first();
            return redirect()->route('dentist_sample',$schedule);
            } */
        } else {

            //schedulesテーブルへの受け渡し
            $schedule = new Schedule;
            $schedule->schedule_name = $request->schedule_name;
            $schedule->image0 = $request->image0;
            $schedule->image1 = $request->image1;
            if (isset($request->image2)) {
                $schedule->image2 = $request->image2;
            }
            if (isset($request->image3)) {
                $schedule->image3 = $request->image3;
            }
            if (isset($request->image4)) {
                $schedule->image4 = $request->image4;
            }
            $schedule->user_id = '0';
            $schedule->save();

            $schedule = Schedule::orderBy('created_at', 'desc')->first();
            return redirect()->route('sample_sort', $schedule);
        }
    }

    /*サンプル表示*/
    public function sample(Schedule $schedule)
    {
        return view('sample', compact('schedule'));
    }
    /*歯科サンプル表示*/
    public function dentist_sample(Schedule $schedule)
    {
        return view('dentist/sample', compact('schedule'));
    }
    /*医療サンプル表示*/
    public function medical_sample(Schedule $schedule)
    {
        return view('medical/sample', compact('schedule'));
    }
    /*イラストサンプル表示*/
    public function sample_sort(Schedule $schedule)
    {
        return view('sample_sort', compact('schedule'));
    }

    /**
     * 写真リスト画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function list(Request $request)
    {
        $user = Auth::user();

        $schedules = Schedule::where('user_id', '=', Auth::user()->id)->where('list', '=', '0')->get();

        return view('list', ['schedules' => $schedules]);
    }
    /**
     * ダッシュボード画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function dashboard(Request $request)
    {
        $user = Auth::user();

        $schedules = Schedule::where('user_id', '=', Auth::user()->id)->where('list', '=', '0')->get();
        $illusts = Schedule::where('user_id', '=', Auth::user()->id)->where('list', '=', '2')->get();
        $dentists = Schedule::where('user_id', '=', Auth::user()->id)->where('list', '=', '1')->get();
        $medicals = Schedule::where('user_id', '=', Auth::user()->id)->where('list', '=', '3')->get();
        $supports = Independence::where('user_id', '=', Auth::user()->id)->get();

        return view('dashboard', [
            'schedules' => $schedules,
            'illusts' => $illusts,
            'dentists' => $dentists,
            'medicals' => $medicals,
            'supports' => $supports,
        ]);
    }
    /**
     * 自立支援リスト画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function independence_list(Request $request)
    {
        $user = Auth::user();
        /*    $stripe = $user->stripe_id;
        $verify= $user->email_verified_at;
        if (isset($stripe)){ */
        $schedules = independence::where('user_id', '=', Auth::user()->id)->get();

        return view('independence/list', ['schedules' => $schedules]);
        /*  }
        else{
            $user=Auth::user();
            return view('stripe',[
                'intent' => $user->createSetupIntent()
            ]); */
    }
    /**
     * 自立支援一般公開リスト画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function independence_public(Request $request)
    {

        $schedules = independence::where('public', '=', '1')->get();

        return view('independence/public', ['schedules' => $schedules]);
        /*  }
        else{
            $user=Auth::user();
            return view('stripe',[
                'intent' => $user->createSetupIntent()
            ]); */
    }
    /**学校用リスト画面へ遷移
     * @param Request $request
     * @return Response
     */
    public function list_for(Request $request, $id)
    {
        /*uuidからデータを取得*/
        $school = User::where('uuid', '=', $request->id)->get()->pluck('id');
        /*作成者IDが$schoolと一致し、かつlistカラムが1(通常スケジュール）であるスケジュールを取得する*/
        $schedules = Schedule::where('user_id', '=', $school)->where('list', '=', '0')->get();

        return view('school', [
            'schedules' => $schedules,
            'id' => $id,
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

        $schedules = Schedule::where('user_id', '=', Auth::user()->id)->where('list', '=', '1')->get();

        return view('dentist/list', [
            'schedules' => $schedules,
        ]);
    }
    /**
     * 医療リスト画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function medical_list(Request $request)
    {

        $schedules = Schedule::where('user_id', '=', Auth::user()->id)->where('list', '=', '3')->get();

        return view('medical/list', [
            'schedules' => $schedules,
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

        $schedules = Schedule::where('user_id', '=', Auth::user()->id)->where('list', '=', '2')->get();

        return view('list_sort', [
            'schedules' => $schedules,
        ]);
    }
    /**
     * 患者用歯科リスト画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function dentist_list_for(Request $request, $id)
    {
        /*uuidから歯科データを取得*/
        $dentist = User::where('uuid', '=', $request->id)->get()->pluck('id');
        /*作成者名が$dentist一致し、かつlistカラムが1(歯科スケジュール）であるスケジュールを取得する*/
        $schedules = Schedule::where('user_id', '=', $dentist)->where('list', '=', '1')->get();

        return view('dentist/patient', [
            'schedules' => $schedules,
            'id' => $id,
        ]);
    }
    /**
     * 選択したリストを削除
     *
     * @param Request $request
     * @return Response
     */
    public function delete(Request $request, $id)
    {
        $schedule = Schedule::where('id', $request->id)->delete();
        return redirect('dashboard');
    }
    /**
     * 選択したリストの編集画面へ
     *
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request, $id)
    {

        $schedule = Schedule::where('id', $request->id)->first();
        return view('edit', [
            'id' => $id,
            'schedule' => $schedule,
        ]);
    }
    /**
     * 選択したスケジュールを編集する
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $schedules = Schedule::find($id);
        $schedules->schedule_name = $request->input('schedule_name');
        // 画像ファイルインスタンス取得
        // 現在の画像へのパスをセット
        if ($request->ask1 == 2) {
            $uploadImg0 = $request->image0;
            $filePath0 = $uploadImg0->store('public');
            $data['image0'] = str_replace('public/', '', $filePath0);
            // 現在の画像ファイルの削除
            $schedule0 = Schedule::where('id', $id)->pluck('image0');
            Storage::disk('public')->delete($schedule0);
        } else {
            $data['image0'] = Schedule::where('id', $id)->value('image0');
        }
        if ($request->ask2 == 2) {
            $uploadImg1 = $request->image1;
            $filePath1 = $uploadImg1->store('public');
            $data['image1'] = str_replace('public/', '', $filePath1);
            $schedule1 = Schedule::where('id', $id)->pluck('image1');
            Storage::disk('public')->delete($schedule1);
        } else {
            $data['image1'] = Schedule::where('id', $id)->value('image1');
        }
        if ($request->has('image2')) {
            if ($request->ask3 == 2) {
                $uploadImg2 = $request->image2;
                $filePath2 = $uploadImg2->store('public');
                $data['image2'] = str_replace('public/', '', $filePath2);
                $schedule2 = Schedule::where('id', $id)->pluck('image2');
                Storage::disk('public')->delete($schedule2);
            } else {
                $data['image2'] = Schedule::where('id', $id)->value('image2');
            }
        } else {
            $data['image2'] = null;
        }
        if (null !== $request->file('image3')) {
            if ($request->ask4 == 2) {
                $uploadImg3 = $request->image3;
                $filePath3 = $uploadImg3->store('public');
                $data['image3'] = str_replace('public/', '', $filePath3);
                $schedule3 = Schedule::where('id', $id)->pluck('image3');
                Storage::disk('public')->delete($schedule3);
            } else {
                $data['image3'] = Schedule::where('id', $id)->value('image3');
            }
        } else {
            $data['image3'] = null;
        }
        if (null !== $request->file('image4')) {
            if ($request->ask5 == 2) {
                $uploadImg4 = $request->image4;
                $filePath4 = $uploadImg4->store('public');
                $data['image4'] = str_replace('public/', '', $filePath4);
                $schedule4 = Schedule::where('id', $id)->pluck('image4');
                Storage::disk('public')->delete($schedule4);
            } else {
                $data['image4'] = Schedule::where('id', $id)->value('image4');
            }
        } else {
            $data['image4'] = null;
        }
        // データベースを更新
        $schedule = Schedule::find($id);

        $schedule->update([
            'schedule_name' => $request->schedule_name,
            'image0' => $data['image0'],
            'image1' => $data['image1'],
            'image2' => $data['image2'],
            'image3' => $data['image3'],
            'image4' => $data['image4'],
        ]);


        return redirect('dashboard');
    }
    /**
     * 選択した歯科リストを削除
     *
     * @param Request $request
     * @return Response
     */
    public function dentist_delete(Request $request, $id)
    {
        $schedule = Schedule::where('id', $request->id)->delete();
        return redirect('dashboard');
    }
    /**
     * 選択した歯科リストの編集ページへ
     *
     * @param Request $request
     * @return Response
     */
    public function dentist_edit(Request $request, $id)
    {
        $schedule = Schedule::where('id', $request->id)->first();
        return view('dentist/edit', [
            'id' => $id,
            'schedule' => $schedule,
        ]);
    }
    /**
     * 選択した歯科スケジュールを編集する
     *
     * @param Request $request
     * @return Response
     */
    public function dentist_update(Request $request, $id)
    {
        $schedules = Schedule::find($id);
        $schedules->schedule_name = $request->input('schedule_name');
        $schedules->image0 = $request->input('image0');
        $schedules->image1 = $request->input('image1');
        $schedules->image2 = $request->input('image2');
        $schedules->image3 = $request->input('image3');
        $schedules->image4 = $request->input('image4');

        $schedules->save();

        return redirect('dashboard');
    }
    /**
     * 選択した医療リストを削除
     *
     * @param Request $request
     * @return Response
     */
    public function medical_delete(Request $request, $id)
    {
        $schedule = Schedule::where('id', $request->id)->delete();
        return redirect('dashboard');
    }
    /**
     * 選択した医療リストの編集ページへ
     *
     * @param Request $request
     * @return Response
     */
    public function medical_edit(Request $request, $id)
    {
        $schedule = Schedule::where('id', $request->id)->first();
        return view('medical/edit', [
            'id' => $id,
            'schedule' => $schedule,
        ]);
    }
    /**
     * 選択した医療スケジュールを編集する
     *
     * @param Request $request
     * @return Response
     */
    public function medical_update(Request $request, $id)
    {
        $schedules = Schedule::find($id);
        $schedules->schedule_name = $request->input('schedule_name');
        $schedules->image0 = $request->input('image0');
        $schedules->image1 = $request->input('image1');
        $schedules->image2 = $request->input('image2');
        $schedules->image3 = $request->input('image3');
        $schedules->image4 = $request->input('image4');

        $schedules->save();

        return redirect('dashboard');
    }
    /**
     * 選択した自立支援リストを削除
     *
     * @param Request $request
     * @return Response
     */
    public function independence_delete(Request $request, $id)
    {
        $schedule = Independence::where('id', $request->id)->delete();
        return redirect('dashboard');
    }
    /**
     * 選択した自立支援リストの編集画面へ
     *
     * @param Request $request
     * @return Response
     */
    public function independence_edit(Request $request, $id)
    {
        $schedule = Independence::where('id', $request->id)->first();
        return view('independence/edit', [
            'id' => $id,
            'schedule' => $schedule,
        ]);
    }
    /**
     * 選択した自立支援リストを編集する
     *
     * @param Request $request
     * @return Response
     */
    public function independence_update(Request $request, $id)
    {
        $schedules = Independence::find($id);
        $schedules->explain1 = $request->input('explain1');
        $schedules->caution1 = $request->input('caution1');
        $schedules->explain2 = $request->input('explain2');
        $schedules->caution2 = $request->input('caution2');
        //プライベートに変更
        if($request->public==1){
            $schedules->public = 0;
        }
        //一般公開に変更
        if(($request->public==2)){
            $schedules->public = 1;
        }
        // 画像ファイルインスタンス取得
        // 現在の画像へのパスをセット
        if ($request->ask1 == 2) {
            $uploadImg0 = $request->image1;
            $filePath0 = $uploadImg0->store('public');
            $data['image1'] = str_replace('public/', '', $filePath0);
            // 現在の画像ファイルの削除
            $schedule0 = Independence::where('id', $id)->pluck('image1');
            Storage::disk('public')->delete($schedule0);
        } else {
            $data['image1'] = Independence::where('id', $id)->value('image1');
        }
        if ($request->ask2 == 2) {
            $uploadImg1 = $request->image2;
            $filePath1 = $uploadImg1->store('public');
            $data['image2'] = str_replace('public/', '', $filePath1);
            $schedule1 = Independence::where('id', $id)->pluck('image2');
            Storage::disk('public')->delete($schedule1);
        } else {
            $data['image2'] = Independence::where('id', $id)->value('image2');
        }
        if ($request->has('image3')) {
            $schedules->explain3 = $request->input('explain3');
            $schedules->caution3 = $request->input('caution3');
            if ($request->ask3 == 2) {
                $uploadImg2 = $request->image3;
                $filePath2 = $uploadImg2->store('public');
                $data['image3'] = str_replace('public/', '', $filePath2);
                $schedule2 = Independence::where('id', $id)->pluck('image3');
                Storage::disk('public')->delete($schedule2);
            } else {
                $data['image3'] = Independence::where('id', $id)->value('image3');
            }
        } else {
            $data['image3'] = null;
        }
        if (null !== $request->file('image4')) {
            $schedules->explain4 = $request->input('explain4');
            $schedules->caution4 = $request->input('caution4');
            if ($request->ask4 == 2) {
                $uploadImg3 = $request->image4;
                $filePath3 = $uploadImg3->store('public');
                $data['image4'] = str_replace('public/', '', $filePath3);
                $schedule3 = Independence::where('id', $id)->pluck('image4');
                Storage::disk('public')->delete($schedule3);
            } else {
                $data['image4'] = Independence::where('id', $id)->value('image4');
            }
        } else {
            $data['image4'] = null;
        }
        if (null !== $request->file('image5')) {
            $schedules->explain5 = $request->input('explain5');
            $schedules->caution5 = $request->input('caution5');
            if ($request->ask5 == 2) {
                $uploadImg4 = $request->image5;
                $filePath4 = $uploadImg4->store('public');
                $data['image5'] = str_replace('public/', '', $filePath4);
                $schedule4 = Independence::where('id', $id)->pluck('image5');
                Storage::disk('public')->delete($schedule4);
            } else {
                $data['image5'] = Independence::where('id', $id)->value('image5');
            }
        } else {
            $data['image5'] = null;
        }
        // データベースを更新
        $schedule = Independence::find($id);

        $schedule->update([
            'schedule_name' => $request->schedule_name,
            'explain1' => $request->explain1,
            'explain2' => $request->explain2,
            'explain3' => $request->explain3,
            'explain4' => $request->explain4,
            'explain5' => $request->explain5,
            'caution1' => $request->caution1,
            'caution2' => $request->caution2,
            'caution3' => $request->caution3,
            'caution4' => $request->caution4,
            'caution5' => $request->caution5,
            'public' => $request->public,
            'image1' => $data['image1'],
            'image2' => $data['image2'],
            'image3' => $data['image3'],
            'image4' => $data['image4'],
            'image5' => $data['image5'],
        ]);


        return redirect('dashboard');
    }
    /**
     * 選択したイラストリストを削除
     *
     * @param Request $request
     * @return Response
     */
    public function sort_delete(Request $request, $id)
    {
        $schedule = Schedule::where('id', $request->id)->delete();
        return redirect('dashboard');
    }
    /**
     * 選択したイラストリストの編集画面へ
     *
     * @param Request $request
     * @return Response
     */
    public function sort_edit(Request $request, $id)
    {
        $schedule = Schedule::where('id', $request->id)->first();
        return view('sort_edit', [
            'id' => $id,
            'schedule' => $schedule,
        ]);
    }
    /**
     * 選択した医療スケジュールを編集する
     *
     * @param Request $request
     * @return Response
     */
    public function illust_update(Request $request, $id)
    {
        $schedules = Schedule::find($id);
        $schedules->schedule_name = $request->input('schedule_name');
        $schedules->image0 = $request->input('image0');
        $schedules->image1 = $request->input('image1');
        $schedules->image2 = $request->input('image2');
        $schedules->image3 = $request->input('image3');
        $schedules->image4 = $request->input('image4');

        $schedules->save();

        return redirect('dashboard');
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
        return view('list', ['schedules' => $schedules]);
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



        return view('picture', compact('image'));
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
    /**
     * 自立支援公開でのページ選択時
     *
     * @param Request $request
     * @return Response
     */
    public function pv(Request $request, $id)
    {
        $schedule = Independence::where('id', $request->id)->first();
        $view = Independence::where('id', $request->id)->value('count');
        $new_count = $view = +1;
        $view = Independence::where('id', $request->id)
            ->update([
                'count' => $new_count
            ]);

        return view('independence/schedule', ['schedule' => $schedule]);
    }
}
