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
Route::get('/feature', function () {
    return view('feature');
});
Route::get('/protect', function () {
    return view('protect');
});
Route::get('/plan', function () {
    return view('plan');
});
Route::get('/case', function () {
    return view('case');
});
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/partner', function () {
    return view('partner');
});
Route::get('/paypay', function () {
    return view('paypay');
});
Route::get('/paypay800', function () {
    return view('paypay800');
});
Route::get('/paypay100', function () {
    return view('paypay100');
});

Route::get('/design', function () {
    return view('design');
});
Route::get('/design_original', function () {
    return view('design_original');
});
Route::get('/',  [App\Http\Controllers\FormController::class, 'welcome'])->name('welcome');

Route::get('/hair/schedule', [App\Http\Controllers\ScheduleController::class, 'cut_schedule'])->name('cut_schedule');

Route::get('/hair/cut', [App\Http\Controllers\ScheduleController::class, 'cut'])->name('cut');
Route::get('/hair/timer1', [App\Http\Controllers\ScheduleController::class, 'timer1'])->name('timer1');
Route::get('/hair/timer2', [App\Http\Controllers\ScheduleController::class, 'timer2'])->name('timer2');
Route::get('/hair/timer3', [App\Http\Controllers\ScheduleController::class, 'timer3'])->name('timer3');
Route::get('/hair/timer4', [App\Http\Controllers\ScheduleController::class, 'timer4'])->name('timer4');
Route::get('/hair/clipper', [App\Http\Controllers\ScheduleController::class, 'clipper'])->name('clipper');
Route::get('/independence/sample', function () {
    return view('independence/sample');
});
Route::get('/independence/one', function () {
    return view('independence/one');
});
Route::get('/independence/two', function () {
    return view('independence/two');
});
Route::get('/independence/three', function () {
    return view('independence/three');
});
Route::get('/independence/four', function () {
    return view('independence/four');
});
Route::get('/independence/five', function () {
    return view('independence/five');
});
//自立支援一般公開リストページへ遷移
Route::get('independence/public', [App\Http\Controllers\ScheduleController::class, 'independence_public'])->name('independence_public');
//自立支援一般公開で利用
Route::post('independence/pv/{id}', [App\Http\Controllers\ScheduleController::class, 'pv'])->name('pv');
//自立支援写真表示画面
Route::get('independence/schedule_one/{id}', [App\Http\Controllers\ScheduleController::class, 'independence_one'])->name('independence_one');
Route::get('independence/schedule_two/{id}', [App\Http\Controllers\ScheduleController::class, 'independence_two'])->name('independence_two');
Route::get('independence/schedule_three/{id}', [App\Http\Controllers\ScheduleController::class, 'independence_three'])->name('independence_three');
Route::get('independence/schedule_four/{id}', [App\Http\Controllers\ScheduleController::class, 'independence_four'])->name('independence_four');
Route::get('independence/schedule_five/{id}', [App\Http\Controllers\ScheduleController::class, 'independence_five'])->name('independence_five');


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
Route::post('register/pre_check', [App\Http\Controllers\Auth\RegisterController::class, 'pre_check'])->name('register.pre_check');
/* Route::get('auth/main/register', [App\Http\Controllers\HomeController::class,'showForm']); */
Route::post('main/register', [App\Http\Controllers\HomeController::class, 'mainCheck'])->name('register.main.check');
Route::post('register/main_register', [App\Http\Controllers\HomeController::class, 'mainRegister'])->name('register.main.registered');
//my_page表示
Route::get('my_page', [App\Http\Controllers\HomeController::class, 'my_page'])->name('my_page');
/*選択したユーザーの編集画面へ*/
Route::get('/edit_user/{id}', [App\Http\Controllers\HomeController::class, 'edit_user'])->name('edit_user');
/*選択したユーザーを編集する*/
Route::patch('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update_user');
/*選択したユーザーの編集画面へflutter*/
Route::get('/edit_user_fl/{id}', [App\Http\Controllers\HomeController::class, 'edit_user_fl'])->name('edit_user_fl');
/*選択したユーザーを編集するflutter*/
Route::patch('/update_fl/{id}', [App\Http\Controllers\HomeController::class, 'update_fl'])->name('update_user_fl');
/*選択したユーザーのパスワード変更画面へ*/
Route::get('/update_password', [App\Http\Controllers\HomeController::class, 'password'])->name('password');
/*選択したユーザーのパスワード変更申請*/
Route::patch('/update_password', [App\Http\Controllers\HomeController::class, 'update_password'])->name('update_password');
Auth::routes();
//ホーム画面表示
Route::get('/home', function () {
    return view('auth.login');
});
//登録後メール
Auth::routes(['verify' => true]);
//メール認証//
Route::get('/mail/register_mail', [App\Http\Controllers\Auth\RegisterController::class, 'verify'])->middleware('auth')->name('verification.notice');


//支払い画面へ
Route::get('stripe', [App\Http\Controllers\StripeController::class, 'stripe'])->name('stripe');

/* Route::get('/auth/verifyemail/{token}', [App\Http\Controllers\Auth\RegisterController::class,'verify']);
*/
//メール確認済みのユーザーのみ
Route::middleware(['verified'])->group(function () {
    //ホーム画面へ
    Route::get('/home', [App\Http\Controllers\ScheduleController::class, 'list'])->name('home');
    //リストページへ遷移
    Route::get('/list', [App\Http\Controllers\ScheduleController::class, 'list'])->name('list');
    //リスト削除
    Route::get('/delete/{id}', [App\Http\Controllers\ScheduleController::class, 'delete'])->name('delete');
    //リスト編集
    Route::get('/list/{id}', [App\Http\Controllers\ScheduleController::class, 'edit'])->name('edit');
    Route::patch('/list/{id}', [App\Http\Controllers\ScheduleController::class, 'update'])->name('update');
    //歯科リストページへ遷移
    Route::get('dentist/list', [App\Http\Controllers\ScheduleController::class, 'dentist_list'])->name('dentist_list');
    //医療リストページへ遷移
    Route::get('medical/list', [App\Http\Controllers\ScheduleController::class, 'medical_list'])->name('medical_list');
    //自立支援リストページへ遷移
    Route::get('independence/list', [App\Http\Controllers\ScheduleController::class, 'independence_list'])->name('independence_list');

    //イラストリストページへ遷移
    Route::get('list_sort', [App\Http\Controllers\ScheduleController::class, 'list_sort'])->name('list_sort');

    //歯科リスト削除
    Route::get('dentist/delete/{id}', [App\Http\Controllers\ScheduleController::class, 'dentist_delete'])->name('dentist_delete');
    //医療リスト削除
    Route::get('medical/delete/{id}', [App\Http\Controllers\ScheduleController::class, 'medical_delete'])->name('medical_delete');

    //イラストリスト削除
    Route::get('list_sort/delete/{id}', [App\Http\Controllers\ScheduleController::class, 'sort_delete'])->name('sort_delete');
    //自立支援リスト削除
    Route::get('independence_list/delete/{id}', [App\Http\Controllers\ScheduleController::class, 'independence_delete'])->name('independence_delete');
    //歯科リスト編集
    Route::get('dentist/list/{id}', [App\Http\Controllers\ScheduleController::class, 'dentist_edit'])->name('dentist_edit');
    //医療リスト編集
    Route::get('medical/list/{id}', [App\Http\Controllers\ScheduleController::class, 'medical_edit'])->name('medical_edit');

    //イラストリスト編集
    Route::get('list_sort/{id}', [App\Http\Controllers\ScheduleController::class, 'sort_edit'])->name('sort_edit');
    //自立支援リスト編集
    Route::get('independence_edit/{id}', [App\Http\Controllers\ScheduleController::class, 'independence_edit'])->name('independence_edit');
    //更新
    Route::patch('dentist/list/{id}', [App\Http\Controllers\ScheduleController::class, 'dentist_update'])->name('dentist_update');
    Route::patch('medical/list/{id}', [App\Http\Controllers\ScheduleController::class, 'medical_update'])->name('medical_update');
    Route::patch('list_sort/{id}', [App\Http\Controllers\ScheduleController::class, 'sort_update'])->name('sort_update');
    Route::patch('independence_list/{id}', [App\Http\Controllers\ScheduleController::class, 'independence_update'])->name('independence_update');

    Route::get('/dashboard', [App\Http\Controllers\ScheduleController::class, 'dashboard'])->name('dashboard');
    //自立支援新規作成画面へ遷移
    Route::get('/independence/create', function () {
        return view('independence/create');
    });
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
//自立支援新規スケジュールの保存
Route::post('independence/create', [App\Http\Controllers\ScheduleController::class, 'independence_schedule'])->name('independence_create');
//イラスト新規スケジュールの保存
Route::post('create_sort', [App\Http\Controllers\ScheduleController::class, 'schedule_sort'])->name('create_sort');
//サンプル画面表示
Route::get('/sample/{schedule}', [App\Http\Controllers\ScheduleController::class, 'sample'])->name('sample');
//歯科サンプル画面表示
Route::get('/dentist/sample/{schedule}', [App\Http\Controllers\ScheduleController::class, 'dentist_sample'])->name('dentist_sample');
//医療サンプル画面表示
Route::get('/medical/sample/{schedule}', [App\Http\Controllers\ScheduleController::class, 'medical_sample'])->name('medical_sample');
//イラストサンプル画面表示
Route::get('/sample_sort/{schedule}', [App\Http\Controllers\ScheduleController::class, 'sample_sort'])->name('sample_sort');

//QR表示ページ
Route::get('/selectpicture/{id}', [App\Http\Controllers\HomeController::class,'select_picture'])->name('select_picture');
 //QR削除
 Route::get('/picture/{id}', [App\Http\Controllers\HomeController::class,'delete_picture'])->name('delete_picture');

//QR投稿フォーム
 Route::get('/store', [App\Http\Controllers\HomeController::class,'picture'])->name('store');
//QR保存
 Route::post('/store', [App\Http\Controllers\HomeController::class,'store'])->name('store');

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
//自立支援スケジュール表示画面
Route::get('independence/schedule/{id}', [App\Http\Controllers\ScheduleController::class, 'independence_index'])->name('independence_schedule');
//イラストスケジュール表示画面
Route::get('schedule_sort/{id}', [App\Http\Controllers\ScheduleController::class, 'sort_index'])->name('schedule_sort');
//スケジュール検索画面表示
Route::get('/search', [App\Http\Controllers\ScheduleController::class, 'search'])->name('search');
//スケジュール検索
Route::get('/search', [App\Http\Controllers\ExtraController::class, 'search'])->name('search');
//スケジュール検索結果ページへ遷移
Route::get('/result', [App\Http\Controllers\ExtraController::class, 'search'])->name('search');

Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
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

/**news表示 */
Route::get('/news/index', [\App\Http\Controllers\FormController::class, 'news_index'])->name('news.index');
Route::get('/news/page{id}', [\App\Http\Controllers\FormController::class, 'news_page'])->name('news.page');
/*NEws書き込み権限*/
Route::get('/news', [\App\Http\Controllers\FormController::class, 'news'])->name('news.form');
Route::post('/news_post', [\App\Http\Controllers\FormController::class, 'save_news']);

//お守り
Route::get('lost/home/{id}', [\App\Http\Controllers\ExtraController::class, 'protect']);
//電話する
Route::post('lost/home/{id}/to_call/{to_call}', [\App\Http\Controllers\ExtraController::class, 'to_call'])->name('to_call');
//お守りを一時停止する画面へ
Route::get('lost/suspend', [\App\Http\Controllers\ExtraController::class, 'suspend'])->name('suspend');
//お守りを一時停止する
Route::post('lost/suspend', [\App\Http\Controllers\ExtraController::class, 'suspend_call'])->name('suspend_call');
//お守りを停止する画面へ
Route::get('lost/stop', [\App\Http\Controllers\ExtraController::class, 'stop'])->name('stop');
//お守りを停止する
Route::post('lost/stop', [\App\Http\Controllers\ExtraController::class, 'stop_call'])->name('stop_call');
//お守りを再開する画面へ
Route::get('lost/again', [\App\Http\Controllers\ExtraController::class, 'again'])->name('again');
//お守りを再開する
Route::post('lost/again', [\App\Http\Controllers\ExtraController::class, 'again_call'])->name('again_call');
//警察
Route::get('lost/verify-password/{id}/to_call/{to_call}', [\App\Http\Controllers\ExtraController::class, 'verify_index'])->name('verify_index');
Route::post('lost/verify-password/{id}/to_call/{to_call}', [\App\Http\Controllers\ExtraController::class, 'verify'])->name('verify');
//停止中画面表示
Route::get('stop/{id}/to_call/{to_call}', [\App\Http\Controllers\ExtraController::class, 'stop_index'])->name('stop_index');
//一時停止画面表示
Route::get('suspend/{id}/to_call/{to_call}', [\App\Http\Controllers\ExtraController::class, 'suspend_index'])->name('suspend_index');

//VS4会員がお守りバッジ申込む
Route::get('lost/register', [\App\Http\Controllers\HomeController::class, 'register'])->name('lost.register');
Route::post('lost/register', [App\Http\Controllers\HomeController::class, 'lostCheck'])->name('register.lost.check');
Route::post('lost/register_check', [App\Http\Controllers\HomeController::class, 'lostRegister'])->name('register.lost.registered');
//お守り会員がVS4を申込む
Route::get('vs4', [\App\Http\Controllers\HomeController::class, 'vs4'])->name('vs4');
Route::post('dashboard', [App\Http\Controllers\HomeController::class, 'vs4Check'])->name('vs4.check');
Route::post('vs4', [App\Http\Controllers\HomeController::class, 'vs4Register'])->name('vs4.registered');
//バッジデザイン選択
Route::post('design', [App\Http\Controllers\HomeController::class, 'choice'])->name('choice');
//デザイン登録
Route::post('design_send', [App\Http\Controllers\HomeController::class, 'design_send'])->name('design_send');
//originalデザイン送信
Route::post('design_original', [App\Http\Controllers\HomeController::class, 'design_original'])->name('design_original');
//originalデザイン変更
Route::get('design_original_confirm', [App\Http\Controllers\HomeController::class, 'design_delete'])->name('design_delete');
//originalデザイン登録
Route::post('design_original_confirm', [App\Http\Controllers\HomeController::class, 'design_original_send'])->name('design_original_send');

//payment表
Route::get('pay_type', [\App\Http\Controllers\HomeController::class, 'payment'])->name('payment');
Route::post('dashboard', [App\Http\Controllers\HomeController::class, 'payment_post'])->name('payment_post');
//カスタムデザイン表
Route::get('design_list', [\App\Http\Controllers\HomeController::class, 'design_list'])->name('design_list');
//店舗一覧表
Route::get('shop_list', [\App\Http\Controllers\ExtraController::class, 'shop_list'])->name('shop_list');
//店舗登録画面
Route::get('shop_register', [\App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
//店舗登録
Route::post('shop_register', [App\Http\Controllers\HomeController::class, 'shop_post'])->name('shop_post');

//発注登録
Route::get('inspect_create', function () {
    return view('inspect_create');
});
Route::post('inspect_create', [App\Http\Controllers\InspectController::class, 'create'])->name('inspect_create');
//発注表表示
Route::get('inspect_list', [App\Http\Controllers\InspectController::class, 'index'])->name('inspect');
//発注完了
Route::get('inspect_list/{id}', [App\Http\Controllers\InspectController::class, 'delete'])->name('inspect_delete');
//納入表表示
Route::get('inspect_complete', [App\Http\Controllers\InspectController::class, 'index_complete'])->name('inspect_complete');
//登録削除画面へ
Route::get('delete', function () {
    return view('delete');
});
Route::post('delete', [App\Http\Controllers\HomeController::class, 'delete'])->name('account_delete');

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
