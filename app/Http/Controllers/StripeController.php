<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

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
        $user->newSubscription('default', $plan)
        ->create($paymentMethod);

        // 処理後に'ルート設定'にページ移行
        return redirect()->route('ルート設定');
    }

    /* /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from tutsmake.com."
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    } */ 
}
