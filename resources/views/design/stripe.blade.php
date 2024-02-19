@extends('layouts.app')

<title>支払い申込画面 (ユーザー用)</title>
<link rel="stylesheet" href="{{ asset('css/stripe.css') }}"> <!-- schedule.cssと連携 -->
<link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">


<header id="header">
    <div class="wrapper">
        <div class="back">
            <button class="button"><a href="{{ url('/design/list') }}">トップページに戻る</a></button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('card-button').addEventListener('click', function () {
                // ボタンの表示を「処理中...」に変更
                this.innerHTML = '処理中...';

                // 60秒後にボタンの表示を「完了しました」に変更
                setTimeout(function () {
                    document.getElementById('card-button').innerHTML = '完了しました';
                }, 60000);
                
                // ここに実際の処理を追加する（例: stripePaymentHandler(setupIntent);）
            });
        });
    </script>
</header>
<div class="card_container py-3">
    {{-- フォーム部分 --}}
    <form action="{{route('design_stripe.post',['id'=> $design->id])}}" method="post" id="payment-form">
        @csrf
        <td><img src="{{ asset('storage/' . $design->image) }}" alt="image" ></td>
        <td>作品名:{{ $design->name }}</td><br>
        <label for="exampleInputEmail1">カード名義人(クレジットカード上と同じ<span>ローマ字表記</span>でお願いします。)</label>
        <input type="text" class="form-control" id="card-holder-name" name="name" required>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="price">¥{{ $design->price }}</label><br>
        <div class="choice">
            <input type="radio" name="paymentMethod" value="{{ $paymentMethod->id }}" style="width:50px;">
            <label class="form-group MyCardElement " value="{{ $paymentMethod->id }}">登録済みの支払い方法{{ $paymentMethod->card->brand }} **** **** **** {{ $paymentMethod->card->last4 }}</label>
        </div>
        @if(isset($filteredPaymentMethods))
        @foreach($filteredPaymentMethods as $paymentMethod)
        <div class="choice">
            <input type="radio" name="paymentMethod" value="{{ $paymentMethod->id }}" style="width:50px;">
            <label class="form-group MyCardElement " value="{{ $paymentMethod->id }}">登録済みの支払い方法{{ $paymentMethod->card->brand }} **** **** **** {{ $paymentMethod->card->last4 }}</label>
        </div>
        @endforeach
        @endif
        <!-- <select name="paymentMethod" id="paymentMethod" >
                <option class="form-group MyCardElement " value="{{ $paymentMethod->id }}">登録済みの支払い方法{{ $paymentMethod->card->brand }} **** **** **** {{ $paymentMethod->card->last4 }}</option>
                @if(isset($filteredPaymentMethods))
                @foreach($filteredPaymentMethods as $paymentMethod)
                <option class="form-group MyCardElement " value="{{ $paymentMethod->id }}">登録済みの支払い方法{{ $paymentMethod->card->brand }} **** **** **** {{ $paymentMethod->card->last4 }}</option>
                @endforeach
                @endif
        </select> -->

        <div class="add"> 
            <button class="btn btn-primary"><a href="{{ route('add_payment_once') }}">別の支払いを追加</a></button>
        </div>

        <div id="card-errors" role="alert" style='color:red'></div>
        <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">購入する</button>

        <p>当サイトでは、支払いにStripeを使用しています。Stripeは世界的に信頼される決済プラットフォームで、高度なセキュリティ対策が施されています。
        お客様の個人情報やクレジットカード情報は、最先端の暗号化技術によって保護されています。</p>

        <p>安心してお買い物をお楽しみください。Stripeを通じた支払いは、迅速かつ安全に処理され、お客様のプライバシーを最大限に守ります。
        何かご不明点がありましたら、お気軽にお問い合わせください。</p>
    </form>

    <div class="try">
        <button class="btn btn-primary" id="cancel-button"><a href="{{ url('design/list') }}">キャンセルする</a></button>
    </div>
</div>

<script>
    // HTMLの読み込み完了後に実行するようにする
    window.onload = my_init;

    function my_init() {

        // Configに設定したStripeのAPIキーを読み込む
        const stripe = Stripe("{{ config('services.stripe.pb_key') }}");
        const elements = stripe.elements();

        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "1em",
                "::placeholder": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };

        const cardElement = elements.create('card', {
            style: style,
            hidePostalCode: true
        });
        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardButton.addEventListener('click', async (e) => {
            // formのsubmitボタンのデフォルト動作を無効にする
            e.preventDefault();
            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            );

            if (error) {
                // エラー処理
                console.log('error');

            } else {
                // 問題なければ、stripePaymentHandlerへ
                stripePaymentHandler(setupIntent);
            }
        });

        
    }

    function stripePaymentHandler(setupIntent) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripePaymentMethod');
        hiddenInput.setAttribute('value', setupIntent.payment_method);
        form.appendChild(hiddenInput);
        // フォームを送信
        form.submit();
    }
</script>



