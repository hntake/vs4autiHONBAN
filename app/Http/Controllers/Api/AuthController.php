<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lost;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;


class AuthController extends Controller
{
 /*     public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $user=Auth::user();
        $lost=Lost::where('email','=',$user->email)->first();
        return response(['lost' => $lost, 'access_token' => $accessToken]);

    } */
    function login(Request $R){
        $user = User::where('email', $R->email)->first();

        if($user!='[]' && Hash::check($R->password,$user->password)){
            $token = $user->createToken('authToken')->accessToken;
            $lost=Lost::where('email','=',$user->email)->first();
            $response = ['status' => 200, 'token' => $token, 'user'=>$user, 'lost' => $lost, 'message' => 'ログインに成功しました'];
            return response()->json($response);
        }else if($user=='[]'){
            $response = ['status' => 500, 'message' => 'No account found with this email'];
            return response()->json($response);

        }else{
            $response = ['status' => 500, 'message' => 'Wrong email or password! please try again'];
            return response()->json($response);
        }

    }

          /**
     * 選択したユーザーの編集画面へ(flutter)
     *
     * @param Request $request
     * @return Response
     */
    public function edit_user_fl(Request $request, $id)
    {
        // アクセストークンの取得
    $accessToken = $request->header('Authorization');

    // アクセストークンの検証やユーザーの認証を行う（例）
    if (!validateAccessToken($accessToken)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

        $lost=Lost::where('id','=',$id)->first();
        return view('edit_user_fl', [
            'id' => $id,
            'lost'=>$lost,
        ]);
    }

    public function update(Request $request, $id)
{
    $lost = Lost::find($id);
    if (!$lost) {
        return response()->json(['error' => '情報が見つかりません'], 404);
    }

    // リクエストからのデータを使ってユーザー情報を更新する
        $lost->email = $request->input('email');
        $lost->name = $request->input('name');
        $lost->tel1 = $request->input('tel1');
        $lost->tel2 = $request->input('tel2');
        $lost->save();
        $uuid=$lost->uuid;
        $user = User::where('uuid',$uuid)->first();
        $user->email = $request->input('email');
        $user->save();

    return response()->json(['message' => '更新しました']);
}
 /*お守りバッジサービスを一時停止に変更*/
 public function suspend_call( $id)
 {

     $new_lost=1;

     $lost = Lost::where('id','=',$id)->first();
     $lost
     ->update([
         'mode'=>$new_lost,
     ]);

     return response()->json(['message' => 'サービスが一時停止されました']);
 }
 /*お守りバッジサービスを停止に変更*/
 public function stop_call($id)
 {

     $new_lost=2;

     $lost = Lost::where('id','=',$id)->first();
     $lost
     ->update([
         'mode'=>$new_lost,
     ]);

     return response()->json(['message' => 'サービスが停止されました']);
 }
 /*お守りバッジサービスを再開に変更*/
 public function again_call($id)
 {

     $new_lost=0;

     $lost = Lost::where('id','=',$id)->first();
     $lost
     ->update([
         'mode'=>$new_lost,
     ]);

     return response()->json(['message' => 'サービスを再開しました']);
 }
}