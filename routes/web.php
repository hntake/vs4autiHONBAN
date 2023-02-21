<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/policy', function () {
    return view('policy');
});
Route::get('/rule', function () {
    return view('rule');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/payment', function () {
    return view('payment');
});
Route::get('/consumer', function () {
    return view('consumer');
});
Route::get('/myprofile', function () {
    return view('myprofile');
});
Route::get('/feature',function(){
    return view('feature');
});
Route::get('/plan',function(){
    return view('plan');
});
Route::get('/case',function(){
    return view('case');
});
Route::get('/admin',function(){
    return view('admin');
});
Route::get('/faq',function(){
    return view('faq');
});
Route::get('/partner',function(){
    return view('partner');
});
Route::get('/hair/schedule', [App\Http\Controllers\ScheduleController::class, 'cut'])->name('cut');
Route::get('/hair/cut',function(){
    return view('hair/cut');
});
Route::get('/hair/timer1',function(){
    return view('hair/timer1');
});
Route::get('/hair/timer2',function(){
    return view('hair/timer2');
});
Route::get('/hair/timer3',function(){
    return view('hair/timer3');
});
Route::get('/hair/timer4',function(){
    return view('hair/timer4');
});
Route::get('/hair/clipper',function(){
    return view('hair/clipper');
});


//入力ページ
Route::get('/admin_form', [App\Http\Controllers\ContactController::class, 'admin_form'])->name('admin_form');
//確認ページ
Route::post('/admin_confirm', [App\Http\Controllers\ContactController::class, 'admin_confirm'])->name('admin_confirm');

//送信完了ページ
Route::post('/admin_thanks', [App\Http\Controllers\ContactController::class, 'admin_send'])->name('admin_send');
/*
Route::group(['middleware' => 'admin_auth'], function(){

    // この中は、全てミドルウェアが適用されます。
    Route::get('middleware_test', 'HomeController@middleware_test');


});*/
/**仮登録から認証本登録 */
Route::post('register/pre_check', [App\Http\Controllers\Auth\RegisterController::class,'pre_check'])->name('register.pre_check');
Route::get('register/verify/{token}', [App\Http\Controllers\Auth\RegisterController::class,'showForm']);
Route::post('register/main_check', [App\Http\Controllers\Auth\RegisterController::class,'mainCheck'])->name('register.main.check');
Route::post('register/main_register', [App\Http\Controllers\Auth\RegisterController::class,'mainRegister'])->name('register.main.registered');

Auth::routes();
//ホーム画面表示
 Route::get('/home',function(){
    return view('auth.login');
});
//登録後メール
Auth::routes(['verify' => true]);
//メール認証//
 Route::get('/mail/register_mail', [App\Http\Controllers\Auth\RegisterController::class,'verify'])->middleware('auth')->name('verification.notice');


 //支払い画面へ
 Route::get('stripe', [App\Http\Controllers\StripeController::class, 'stripe'])->name('stripe');

/* Route::get('/auth/verifyemail/{token}', [App\Http\Controllers\Auth\RegisterController::class,'verify']);
*/
//メール確認済みのユーザーのみ
Route::middleware(['verified'])->group(function(){
//ホーム画面へ
Route::get('/home', [App\Http\Controllers\ScheduleController::class, 'list'])->name('home');
//リストページへ遷移
Route::get('/list', [App\Http\Controllers\ScheduleController::class, 'list'])->name('list');
//リスト削除
Route::get('/list/{id}', [App\Http\Controllers\ScheduleController::class, 'delete_list'])->name('delete_list');
//歯科リストページへ遷移
Route::get('dentist/list', [App\Http\Controllers\ScheduleController::class, 'dentist_list'])->name('dentist_list');
//医療リストページへ遷移
Route::get('medical/list', [App\Http\Controllers\ScheduleController::class, 'medical_list'])->name('medical_list');
//イラストリストページへ遷移
Route::get('list_sort', [App\Http\Controllers\ScheduleController::class, 'list_sort'])->name('list_sort');

//歯科リスト削除
Route::get('dentist/list/{id}', [App\Http\Controllers\ScheduleController::class, 'dentist_delete_list'])->name('dentist_delete_list');
//医療リスト削除
Route::get('medical/list/{id}', [App\Http\Controllers\ScheduleController::class, 'medical_delete_list'])->name('medical_delete_list');
//イラストリスト削除
Route::get('list_sort/{id}', [App\Http\Controllers\ScheduleController::class, 'sort_delete_list'])->name('sort_delete_list');

Route::get('/dashboard', [App\Http\Controllers\ScheduleController::class, 'list'])->name('dashoboad');
});
//サブスクに加入済みか判定し
Route::middleware(['subscribed'])->group(function () {
    /*     Route::get('stripe', [App\Http\Controllers\StripeController::class, 'stripe'])->middleware('subscribed'); */
    Route::get('/account', [App\Http\Controllers\StripeController::class, 'account']);


    //プロフィール編集画面へ
    Route::get('/profile_edit', [App\Http\Controllers\StripeController::class, 'profile_edit'])->name('profile_edit');
    Route::patch('/update_profile', [App\Http\Controllers\StripeController::class, 'update_profile'])->name('update_profile');
});
   //歯科新規作成画面へ遷移
   Route::get('/dentist/create', function () {
    return view('dentist/create');
    });
   //医療新規作成画面へ遷移
   Route::get('/medical/create', function () {
    return view('medical/create');
    });
   //並び替え新規作成画面へ遷移
   Route::get('/create_sort', function () {
    return view('create_sort');
    });

 //患者用歯科リストページへ遷移
 Route::get('dentist/patient/{id}', [App\Http\Controllers\ScheduleController::class, 'dentist_list_for'])->name('dentist_list_for');
 //学校用リストページへ遷移
 Route::get('school/{id}', [App\Http\Controllers\ScheduleController::class, 'list_for'])->name('list_for');


//新規作成画面へ遷移
Route::get('/create', [App\Http\Controllers\ScheduleController::class, 'create'])->name('create');
//新規スケジュールの保存
Route::post('/create', [App\Http\Controllers\ScheduleController::class, 'schedule'])->name('create');
//歯科新規スケジュールの保存
Route::post('dentist/create', [App\Http\Controllers\ScheduleController::class, 'dentist_schedule'])->name('dentist_create');
//医療新規スケジュールの保存
Route::post('medical/create', [App\Http\Controllers\ScheduleController::class, 'medical_schedule'])->name('medical_create');
//イラスト新規スケジュールの保存
Route::post('create_sort', [App\Http\Controllers\ScheduleController::class, 'schedule_sort'])->name('schedule_sort');
//サンプル画面表示
Route::get('/sample/{schedule}', [App\Http\Controllers\ScheduleController::class, 'sample'])->name('sample');
//歯科サンプル画面表示
Route::get('/dentist/sample/{schedule}', [App\Http\Controllers\ScheduleController::class, 'dentist_sample'])->name('dentist_sample');
//医療サンプル画面表示
Route::get('/medical/sample/{schedule}', [App\Http\Controllers\ScheduleController::class, 'medical_sample'])->name('medical_sample');
//イラストサンプル画面表示
Route::get('/sample_sort/{schedule}', [App\Http\Controllers\ScheduleController::class, 'sample_sort'])->name('sample_sort');

//画像表示ページ
/* Route::get('/selectpicture/{id}', [App\Http\Controllers\ScheduleController::class,'select_picture'])->name('select_picture');
 */ //画像削除
/* Route::get('/picture/{id}', [App\Http\Controllers\ScheduleController::class,'delete_picture'])->name('delete_picture');
 */
//画像投稿フォーム
/* Route::get('/store', [App\Http\Controllers\ScheduleController::class,'picture'])->name('store');
 */ //画像保存
/* Route::post('/store', [App\Http\Controllers\ScheduleController::class,'store'])->name('store');
 */
//入力ページ
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact.index');

//確認ページ
Route::post('/contact/confirm', [App\Http\Controllers\ContactController::class, 'confirm'])->name('contact.confirm');

//送信完了ページ
Route::post('/contact/thanks', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

//並び替え
Route::get('/sort', [App\Http\Controllers\ExtraController::class, 'sort'])->name('sort');
//スケジュール表示画面
Route::get('/schedule/{id}', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');
//歯科スケジュール表示画面
Route::get('dentist/schedule/{id}', [App\Http\Controllers\ScheduleController::class, 'dentist_index'])->name('dentist_schedule');
//医療スケジュール表示画面
Route::get('medical/schedule/{id}', [App\Http\Controllers\ScheduleController::class, 'medical_index'])->name('medical_schedule');
//イラストスケジュール表示画面
Route::get('schedule_sort/{id}', [App\Http\Controllers\ScheduleController::class, 'sort_index'])->name('schedule_sort');
//スケジュール検索画面表示
Route::get('/search', [App\Http\Controllers\ScheduleController::class, 'search'])->name('search');
//スケジュール検索
Route::get('/search', [App\Http\Controllers\ExtraController::class, 'search'])->name('search');
//スケジュール検索結果ページへ遷移
Route::get('/result', [App\Http\Controllers\ExtraController::class, 'search'])->name('search');

Route::post('register',[App\Http\Controllers\Auth\RegisterController::class, 'register']);
//ログイン
Route::post('log', [App\Http\Controllers\Auth\LoginController::class, 'log'])->name('log');
//ログアウト
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'loggedOut']);
//支払いボタン
Route::post('stripe', [App\Http\Controllers\StripeController::class, 'stripePost'])->name('stripe.post');
//支払い完了画面
Route::get('receipt/{user}', [App\Http\Controllers\StripeController::class, 'receipt'])->name('receipt');
//支払いキャンセルボタン
Route::post('/subscription/cancel/{user}',  [App\Http\Controllers\StripeController::class, 'cancelsubscription'])->name('stripe.cancel');
//STRIPEカスタマーポータル
Route::get('/subscription/portal/{user}',  [App\Http\Controllers\StripeController::class, 'portalsubscription'])->name('stripe.portalsubscription');



//キャンセル後遷移
/* Route::get('/cancel',  [App\Http\Controllers\StripeController::class,'cancel'])->name('cancel');
 */
/* Route::get('middleware_test', 'HomeController@middleware_test');
 */
/* });
 */
/* Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\Controller::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
