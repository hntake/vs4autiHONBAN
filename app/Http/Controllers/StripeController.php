<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use App\Models\User;
use Carbon\Carbon;

class StripeController extends Controller
{
     /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        $user=Auth::user();
        return view('stripe',[
        'intent' => $user->createSetupIntent()
    ]);

    }

    public function stripePost(Request $request){
        // ログインユーザーを$userとする
        $user=Auth::user();

        // またStripe顧客でなければ、新規顧客にする
        $stripeCustomer = $user->createOrGetStripeCustomer();

        // フォーム送信の情報から$paymentMethodを作成する
        $paymentMethod=$request->input('stripePaymentMethod');

        // プランはconfigに設定したbasic_plan_idとする
        $plan=config('services.stripe.basic_plan_id');

        // 上記のプランと支払方法で、サブスクを新規作成する
        $user->newSubscription('basic_plan', $plan)
        ->create($paymentMethod);

        // 処理後に'ルート設定'にページ移行
        return redirect()->route('receipt',$user);
    }

    public function receipt(User $user){
        return view('receipt',compact('user'));
    }

    public function cancelsubscription(User $user, Request $request){
        $user->subscription('basic_plan')->cancelNow();
        return view('cancel');
     }

    public function cancel(Request $request){
        return view('cancel');
    }
     public function portalsubscription(User $user, Request $request){
        return $request->user()->redirectToBillingPortal();
     }

     public function account(Request $request){
        $user = Auth::user();
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('Y-m-d');
        return view('account',compact('user','date'));
     }
     public function profile_edit(Request $request){
        $user = Auth::user();
        return view('profile_edit', [
            'user' => $user,
        ]);
     }
     public function update_profile(Request $request){
        $id = Auth::id();
        $users = User::find($id);
        $users->email = $request->input('email');
        $users->save();

        return redirect('account');
     }
}
