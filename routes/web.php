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
Route::get('/lost/ask', function () {
    return view('lost/ask');
});
Route::get('/design/policy', function () {
    return view('design/policy');
});
Route::get('/design/return', function () {
    return view('design/return');
});
Route::get('/design/packing', function () {
    return view('design/packing');
});
Route::get('/design/post_select', function () {
    return view('design/post_select');
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

Route::post('/contact/confirm', [App\Http\Controllers\ContactController::class, 'confirm'])->name('contact.confirm');
//確認ページ

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
//お守りシール
Route::get('lost/pdf', [\App\Http\Controllers\PDFController::class, 'pdf'])->name('pdf');

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
Route::get('delete', [App\Http\Controllers\HomeController::class, 'delete_index'])->name('delete_account');

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

//消費税廃止アプリ入力画面
Route::get('tax/input', function () {
    return view('tax/input');
});
//買い控えリスト表示
Route::get('tax/list', [App\Http\Controllers\TaxController::class, 'list'])->name('tax_list');
//値をポスト
Route::post('tax/input', [App\Http\Controllers\TaxController::class, 'tax'])->name('tax');

//マイフィーリング選択画面
Route::get('feel/choice', [App\Http\Controllers\FeelController::class, 'choice'])->name('feel_choice');
//マイフィーリング表示
Route::get('feel/index1', [App\Http\Controllers\FeelController::class, 'index1'])->name('index1');
Route::get('feel/index2', [App\Http\Controllers\FeelController::class, 'index2'])->name('index2');
Route::get('feel/index3', [App\Http\Controllers\FeelController::class, 'index3'])->name('index3');
Route::get('feel/index4', [App\Http\Controllers\FeelController::class, 'index4'])->name('index4');
//マイフィーリング設定画面
Route::get('feel/create', [App\Http\Controllers\FeelController::class, 'input'])->name('feel_input');
//マイフィーリング登録
Route::post('feel/create', [App\Http\Controllers\FeelController::class, 'create'])->name('feel_create');

//掲示板トップページ
Route::get('bbs/list', [App\Http\Controllers\BbsController::class, 'list'])->name('bbs_list');

//掲示コメント入力ページ
Route::get('bbs/input/{id}', [App\Http\Controllers\BbsController::class, 'input'])->name('bbs_input');
Route::post('bbs/input/{id}', [App\Http\Controllers\BbsController::class, 'post'])->name('bbs_post');

//新規スレッド作成ページへ
Route::get('bbs/create', [App\Http\Controllers\BbsController::class, 'thread'])->name('bbs_thread');
Route::post('bbs/create', [App\Http\Controllers\BbsController::class, 'create'])->name('bbs_create');


//掲示板各スレッド表示
Route::get('bbs/index/{id}', [App\Http\Controllers\BbsController::class, 'index'])->name('bbs_index');

//掲示板スレッド削除ページ表示
Route::get('bbs/edit', [App\Http\Controllers\BbsController::class, 'update_index'])->name('bbs_update_index');
//掲示板コメント削除ページ表示
Route::get('bbs/delete', [App\Http\Controllers\BbsController::class, 'update_comment']);
//掲示板修正
Route::patch('bbs/edit', [App\Http\Controllers\BbsController::class, 'update'])->name('bbs_update');

//掲示板スレッド削除
Route::get('bbs/delete/{id}', [App\Http\Controllers\BbsController::class, 'delete'])->name('bbs_delete');
//掲示板コメント削除
Route::get('bbs/delete_comment/{id}', [App\Http\Controllers\BbsController::class, 'delete_comment'])->name('bbs_delete_comment');
//掲示板コメント削除
Route::get('bbs/delete_reply/{id}', [App\Http\Controllers\BbsController::class, 'delete_reply'])->name('bbs_delete_reply');

//返信ポストページへ
Route::get('bbs/reply/{id}', [App\Http\Controllers\BbsController::class, 'reply'])->name('bbs_reply');
Route::post('bbs/reply/{id}', [App\Http\Controllers\BbsController::class, 'reply_post'])->name('bbs_reply_post');

//掲示板スレッド並び替え
Route::get('bbs/sort', [App\Http\Controllers\BbsController::class, 'sort'])->name('bbs_sort');
//掲示板スレッド検索
Route::get('bbs/search', [App\Http\Controllers\BbsController::class, 'search'])->name('bbs_search');
//掲示板違反報告
Route::get('bbs/thread_alert/{id}', [App\Http\Controllers\BbsController::class, 'thread_alert'])->name('thread_alert');
Route::post('bbs/thread_alert/{id}', [App\Http\Controllers\BbsController::class, 'thread_alert_post'])->name('thread_alert_post');
Route::get('bbs/comment_alert/{id}', [App\Http\Controllers\BbsController::class, 'comment_alert'])->name('comment_alert');
Route::post('bbs/comment_alert/{id}', [App\Http\Controllers\BbsController::class, 'comment_alert_post'])->name('comment_alert_post');
Route::get('bbs/reply_alert/{id}', [App\Http\Controllers\BbsController::class, 'reply_alert'])->name('reply_alert');
Route::post('bbs/reply_alert/{id}', [App\Http\Controllers\BbsController::class, 'reply_alert_post'])->name('reply_alert_post');

//障がい者アート関連
//募集ページ
Route::get('design/recruit', [App\Http\Controllers\DesignController::class, 'poster'])->name('design_recruit');
//障がい者アートTOP
Route::get('design/list', [App\Http\Controllers\DesignController::class, 'list'])->name('design_list');
//カテゴリ毎ページ
Route::get('design/genre/{id}', [App\Http\Controllers\DesignController::class, 'genre'])->name('genre');
//アート検索
Route::get('design/search', [App\Http\Controllers\DesignController::class, 'search'])->name('art_search');
//アーティスト検索
Route::get('design/artist_search', [App\Http\Controllers\DesignController::class, 'artist_search'])->name('artist_search');
//プロフィール画像編集ページへ
Route::get('design/edit_image', [App\Http\Controllers\DesignController::class, 'image'])->name('edit_image');
Route::post('design/edit_image', [App\Http\Controllers\DesignController::class, 'update_image'])->name('update_image');
//プロフィール画像確認ページへ
Route::get('design/image_confirm', [App\Http\Controllers\DesignController::class, 'image_confirm'])->name('image_confirm');
Route::post('design/image_confirm/{id}', [App\Http\Controllers\DesignController::class, 'image_send'])->name('image_send');

//DL画像ポストページ
Route::get('design/post', [App\Http\Controllers\DesignController::class, 'post'])->name('design_post');
Route::post('design/post', [App\Http\Controllers\DesignController::class, 'posted'])->name('design_posted');
//現物画像ポストページ
Route::get('design/post_ad', [App\Http\Controllers\DesignController::class, 'post_ad'])->name('design_post_ad');
Route::post('design/post_ad', [App\Http\Controllers\DesignController::class, 'posted_ad'])->name('design_posted_ad');
//画像確認〜アップロード(DL)
Route::get('design/confirm', [App\Http\Controllers\DesignController::class, 'confirm'])->name('design_confirm');
Route::post('design/confirm/{id}', [App\Http\Controllers\DesignController::class, 'upload'])->name('design_upload');
//画像確認〜アップロード(現物販売)
Route::get('design/confirm_ad', [App\Http\Controllers\DesignController::class, 'confirm_ad'])->name('design_confirm_ad');
Route::post('design/confirm_ad/{id}', [App\Http\Controllers\DesignController::class, 'upload_ad'])->name('design_upload_ad');

Route::get('design/download/{id}', [App\Http\Controllers\DesignController::class, 'select_download'])->name('design_select');

//画像ダウンロード準備ページ
Route::get('design/to_download/{id}', [App\Http\Controllers\DesignController::class, 'to_download'])->name('design_download');
Route::post('design/to_download/{id}', [App\Http\Controllers\DesignController::class, 'download'])->name('design_downloaded');
//画像ダウンロード準備ページ(mix)
Route::get('design/to_download_mix/{id}', [App\Http\Controllers\DesignController::class, 'to_download_mix'])->name('design_download_mix');
Route::post('design/to_download_mix/{id}', [App\Http\Controllers\DesignController::class, 'download_mix'])->name('design_downloaded_mix');
//無料画像ダウンロード準備ページ
Route::get('design/to_download_free/{id}', [App\Http\Controllers\DesignController::class, 'to_download_free'])->name('design_download_free');

//画像ダウンロード実行ページ
Route::post('design/execute', [App\Http\Controllers\DesignController::class, 'executeDownload'])->name('executeDownload');
//画像個々ダウンロードページ
Route::get('design/download_each/{id}', [App\Http\Controllers\DesignController::class, 'to_download_each'])->name('design_download_each');
Route::post('design/download_each/{id}', [App\Http\Controllers\DesignController::class, 'download_each'])->name('design_downloaded_each');
//購入後の再ダウンロード
Route::post('my_page/{id}', [App\Http\Controllers\DesignController::class, 'download_each_mine'])->name('design_downloaded_each_mine');
//カートに入れる
Route::post('design/to_cart/{id}', [App\Http\Controllers\StripeController::class, 'design_cart'])->name('design_cart');
//カートページ
Route::get('design/cart', [App\Http\Controllers\StripeController::class, 'index_cart'])->name('index_cart');
Route::post('design/cart', [App\Http\Controllers\StripeController::class, 'post_cart'])->name('post_cart');
//支払い方法追加
Route::get('design/add_payment', [App\Http\Controllers\StripeController::class, 'add_index'])->name('add_payment');
Route::post('design/add_payment', [App\Http\Controllers\StripeController::class, 'add_payment'])->name('post_add_payment');
//支払い方法追加(ダウンロードから)
Route::get('design/add_payment_once', [App\Http\Controllers\StripeController::class, 'add_index_once'])->name('add_payment_once');
Route::post('design/add_payment_once', [App\Http\Controllers\StripeController::class, 'add_payment_once'])->name('post_add_payment_once');
//非ユーザーのカートでの支払い
Route::get('design/cart_un', [App\Http\Controllers\StripeController::class, 'index_cart_un'])->name('index_cart_un');
Route::post('design/cart_un/{id}/address/{address}', [App\Http\Controllers\StripeController::class, 'post_cart_un'])->name('post_cart_un');
//カート内の削除
Route::get('design/cart_delete/{id}', [App\Http\Controllers\StripeController::class, 'delete_cart'])->name('delete_cart');
//カートを空にする
Route::get('design/empty', [App\Http\Controllers\StripeController::class, 'empty_cart'])->name('empty_cart');
//カートを空にする(カート)
Route::get('design/empty_un', [App\Http\Controllers\StripeController::class, 'empty_cart_un'])->name('empty_cart_un');
//購入画面
Route::get('design/stripe/{id}', [App\Http\Controllers\StripeController::class, 'design_stripe'])->name('design_stripe');
//支払いボタン(ログインユーザー)
Route::post('design/stripe/{id}', [App\Http\Controllers\StripeController::class, 'design_stripePost'])->name('design_stripe.post');
//支払いボタン(非ユーザー)
Route::get('design/once/{id}', [App\Http\Controllers\StripeController::class, 'design_once'])->name('design_once');
Route::post('design/once/{id}', [App\Http\Controllers\StripeController::class, 'design_oncePost'])->name('design_once.post');
//支払い完了画面
Route::get('design/receipt/{user}', [App\Http\Controllers\StripeController::class, 'design_receipt'])->name('design_receipt');
//マイシート
Route::get('design/my_sheet', [App\Http\Controllers\DesignController::class, 'my_sheet'])->name('design_my_sheet');
Route::patch('design/my_sheet', [App\Http\Controllers\DesignController::class, 'edit'])->name('design_edit');
//画像削除
Route::get('design/delete/{id}', [App\Http\Controllers\DesignController::class, 'design_delete_index'])->name('design_delete_index');
Route::post('design/delete/{id}', [App\Http\Controllers\DesignController::class, 'design_deleted'])->name('design_deleted');

//アーティストページ
Route::get('design/artist/{id}', [App\Http\Controllers\DesignController::class, 'artist'])->name('design_artist');
//アーティストリストページ
Route::get('design/artist_list', [App\Http\Controllers\DesignController::class, 'artist_list'])->name('design_artist_list');
//送金申込
Route::get('design/pay', [App\Http\Controllers\DesignController::class, 'design_pay'])->name('design_pay');
Route::post('design/pay', [App\Http\Controllers\DesignController::class, 'design_order'])->name('design_order');
//送金完了
Route::get('design/paid', [App\Http\Controllers\DesignController::class, 'paid'])->name('design_register');
//バイヤー登録
Route::get('design/register', [App\Http\Controllers\DesignController::class, 'register'])->name('buyer_register');
Route::post('design/register', [App\Http\Controllers\DesignController::class, 'registered'])->name('registered');
//ダウンロードページからのログイン
Route::get('design/login/{id}', [App\Http\Controllers\Auth\LoginController::class, 'log'])->name('buyer_login');

//配送情報登録画面へ
Route::get('/design/address/{id}', [App\Http\Controllers\DesignController::class, 'buyer_address'])->name('buyer_address');
//配送情報登録画面へ(カートから)
Route::get('/design/address_cart/{id}', [App\Http\Controllers\DesignController::class, 'buyer_address_cart'])->name('buyer_address_cart');
//配送情報確認画面へ
Route::post('/design/address/{id}', [App\Http\Controllers\DesignController::class, 'buyer_post'])->name('buyer_post');
//配送情報確認画面へ(カートから)
Route::post('/design/address_cart/{id}', [App\Http\Controllers\DesignController::class, 'buyer_post_cart'])->name('buyer_post_cart');
//配送情報登録
Route::post('/design/address_confirm/{id}', [App\Http\Controllers\DesignController::class, 'address_post'])->name('address_post');
//配送情報登録(カートから)
Route::post('/design/address_cart_confirm/{id}', [App\Http\Controllers\DesignController::class, 'address_post_cart'])->name('address_post_cart');
//購入画面
Route::get('design/stripe_address/{id}', [App\Http\Controllers\StripeController::class, 'design_stripe_address'])->name('design_stripe_address');
//支払いボタン(ログインユーザー)
Route::post('design/stripe_address/{id}', [App\Http\Controllers\StripeController::class, 'design_stripePost_address'])->name('design_stripe_address.post');
//支払いボタン(非ユーザー)
Route::get('design/once_address/{id}', [App\Http\Controllers\StripeController::class, 'design_once_address'])->name('design_once_address');
Route::post('design/once_address/{id}', [App\Http\Controllers\StripeController::class, 'design_oncePost_address'])->name('design_once_address.post');

//アーティストページ内並び替え
Route::get('artist/sort/{id}', [App\Http\Controllers\DesignController::class, 'sort'])->name('design_sort');
//リストページ内並び替え
Route::get('design/sort', [App\Http\Controllers\DesignController::class, 'list_sort'])->name('design_list_sort');
//バッジ売り上げ報告ページへ
Route::get('design/badge', [App\Http\Controllers\DesignController::class, 'badge'])->name('badge');
//バッジ売り上げ報告ポスト
Route::post('design/badge', [App\Http\Controllers\DesignController::class, 'badge_post'])->name('badge_post');
//支払失敗
Route::get('design/fail', function () {
    return view('design/failed');
})->name('design.fail');
//ダウンロード完了
Route::get('design/complete', function () {
    return view('design/complete');
});
//ダウンロード失敗
Route::get('design/error', function () {
    return view('design/error');
});
//サイトマップ
Route::get('sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index' ])->name('get.sitemap');
