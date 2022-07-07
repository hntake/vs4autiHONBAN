<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */


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
Route::get('/aboutus',function(){
    return view('aboutus');
});

 Route::get('/', function () {
    return view('welcome');
});
Route::get('/policy',function(){
    return view('policy');
});
Route::get('/rule',function(){
    return view('rule');
});
Route::get('/login',function(){
    return view('login');
});
/*
Route::group(['middleware' => 'admin_auth'], function(){

    // この中は、全てミドルウェアが適用されます。
    Route::get('middleware_test', 'HomeController@middleware_test');


});*/

Auth::routes();
//ホーム画面表示
/* Route::get('/home',function(){
    return view('auth.login');
});
*/
//支払い画面へ
Route::get('stripe', [App\Http\Controllers\StripeController::class, 'stripe'])->name('stripe');
//ホーム画面へ
//サブスクに加入済みか判定し
Route::middleware(['subscribed'])->group(function(){
    Route::get('/home', [App\Http\Controllers\ScheduleController::class, 'list'])->name('home');
/*     Route::get('stripe', [App\Http\Controllers\StripeController::class, 'stripe'])->middleware('subscribed'); */
    Route::get('/account', [App\Http\Controllers\StripeController::class, 'account']);

    //リストページへ遷移
    Route::get('/list', [App\Http\Controllers\ScheduleController::class,'list'])->name('list');
    Route::get('/dashboard', [App\Http\Controllers\ScheduleController::class,'list'])->name('dashoboad');
    //リスト削除
    Route::get('/list/{id}', [App\Http\Controllers\ScheduleController::class,'delete_list'])->name('delete_list');
    //プロフィール編集画面へ
    Route::get('/profile_edit', [App\Http\Controllers\StripeController::class,'profile_edit'])->name('profile_edit');
    Route::patch('/update_profile', [App\Http\Controllers\StripeController::class,'update_profile'])->name('update_profile');

});
// この中は、全てミドルウェアが適用されます。
/* Route::group(['middleware' => 'admin_auth'], function(){
 */


//新規作成画面へ遷移
Route::get('/create', [App\Http\Controllers\ScheduleController::class,'create'])->name('create');
//新規スケジュールの保存
Route::post('/create', [App\Http\Controllers\ScheduleController::class,'schedule'])->name('create');
//サンプル画面表示
Route::get('/sample/{schedule}', [App\Http\Controllers\ScheduleController::class,'sample'])->name('sample');

 //画像表示ページ
/* Route::get('/selectpicture/{id}', [App\Http\Controllers\ScheduleController::class,'select_picture'])->name('select_picture');
 */ //画像削除
/* Route::get('/picture/{id}', [App\Http\Controllers\ScheduleController::class,'delete_picture'])->name('delete_picture');
 */
//画像投稿フォーム
/* Route::get('/store', [App\Http\Controllers\ScheduleController::class,'picture'])->name('store');
 *///画像保存
/* Route::post('/store', [App\Http\Controllers\ScheduleController::class,'store'])->name('store');
 */
//入力ページ
Route::get('/contact', [App\Http\Controllers\ContactController::class,'contact'])->name('contact.index');

//確認ページ
Route::post('/contact/confirm', [App\Http\Controllers\ContactController::class,'confirm'])->name('contact.confirm');

//送信完了ページ
Route::post('/contact/thanks', [App\Http\Controllers\ContactController::class,'send'])->name('contact.send');

//並び替え
Route::get('/sort', [App\Http\Controllers\ExtraController::class,'sort'])->name('sort');
//スケジュール表示画面
Route::get('/schedule/{id}', [App\Http\Controllers\ScheduleController::class,'index'])->name('schedule');
//スケジュール検索画面表示
Route::get('/search', [App\Http\Controllers\ScheduleController::class,'search'])->name('search');
//スケジュール検索
Route::get('/search', [App\Http\Controllers\ExtraController::class,'search'])->name('search');
//スケジュール検索結果ページへ遷移
Route::get('/result', [App\Http\Controllers\ExtraController::class,'search'])->name('search');

//Route::post('register',[App\Http\Controllers\Auth\RegisterController::class, 'register']);
//ログアウト
Route::get('logout',[App\Http\Controllers\Auth\LoginController::class, 'loggedOut']);
//支払いボタン
Route::post('stripe', [App\Http\Controllers\StripeController::class, 'stripePost'])->name('stripe.post');
//支払い完了画面
Route::get('receipt/{user}', [App\Http\Controllers\StripeController::class, 'receipt'])->name('receipt');
//支払いキャンセルボタン
Route::post('/subscription/cancel/{user}',  [App\Http\Controllers\StripeController::class,'cancelsubscription'])->name('stripe.cancel');
//STRIPEカスタマーポータル
Route::get('/subscription/portal/{user}',  [App\Http\Controllers\StripeController::class,'portalsubscription'])->name('stripe.portalsubscription');
//キャンセル後遷移
/* Route::get('/cancel',  [App\Http\Controllers\StripeController::class,'cancel'])->name('cancel');
 */
    Route::get('middleware_test', 'HomeController@middleware_test');

/* });
 */
/* Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
