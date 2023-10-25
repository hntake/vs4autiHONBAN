<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AddressController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/address/{zip}', [AddressController::class, 'address']);

 ///ログイン
Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);


/*選択したユーザーの編集画面へ*/
Route::middleware('auth:api')-> get('/edit_user_fl/{id}', [App\Http\Controllers\Api\AuthController::class, 'edit_user_fl'])->name('edit_user_fl');
/*選択したユーザーを編集する*/
Route::put('/update_user_fl/{id}', [App\Http\Controllers\Api\AuthController::class, 'update'])->name('update_user_fl');
/*選択したユーザーのパスワード変更画面へ*/
Route::get('/update_password', [App\Http\Controllers\HomeController::class, 'password'])->name('password');
/*選択したユーザーのパスワード変更申請*/
Route::patch('/update_password', [App\Http\Controllers\HomeController::class, 'update_password'])->name('update_password');


//お守りを一時停止する
Route::post('lost/suspend/{id}', [\App\Http\Controllers\Api\AuthController::class, 'suspend_call'])->name('suspend_call_fl');

//お守りを停止する
Route::post('lost/stop/{id}', [\App\Http\Controllers\Api\AuthController::class, 'stop_call'])->name('stop_call_fl');

//お守りを再開する
Route::post('lost/again/{id}', [\App\Http\Controllers\Api\AuthController::class, 'again_call'])->name('again_call_fl');

/*リクエストを編集する*/
Route::put('/update_request/{id}', [App\Http\Controllers\Api\AuthController::class, 'update_request'])->name('update_request');