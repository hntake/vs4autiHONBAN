{{-- ヘッダー部分の設定 --}}
@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>

<link rel="stylesheet" href="{{ asset('css/stripe.css') }}"> <!-- schedule.cssと連携 -->
<title>新しい支払い方法の追加画面(一回ダウンロード用)</title>


@section('content')
<header id="header">
    <div class="wrapper">
        <div class="back">
            <button class="button"><a href="{{ url('/design/list') }}">トップページに戻る</a></button>
        </div>
    </div>
</header>
<div class="card_container py-3">
    {{-- フォーム部分 --}}
    <form action="{{route('post_add_payment_once')}}" method="post" id="payment-form">
        @csrf
                <label for="exampleInputEmail1">お名前(クレジットカード上と同じ<span>ローマ字表記</span>でお願いします。)</label>
                <input type="text" class="form-control" id="card-holder-name" name="name" required>
                <label for="exampleInputPassword1"></label>
                <div class="form-group MyCardElement " id="card-element"></div>
                <div id="card-errors" role="alert" style='color:red'></div>

                <!-- デフォルトとして登録するかどうかを選択するチェックボックス -->
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="default-payment" name="default_payment">
                    <label class="form-check-label" for="default-payment">デフォルトとして登録する</label>
                </div>

        <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">カードを追加</button>
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
    // Stripe公開鍵を設定
    var stripe = Stripe("{{ config('services.stripe.pb_key') }}");

    // Stripe Elementsを初期化
    var elements = stripe.elements();
        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
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

    // エラーハンドリング
    cardElement.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // フォームの送信処理
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // トークンをフォームに追加して送信
                var tokenInput = document.createElement('input');
                tokenInput.setAttribute('type', 'hidden');
                tokenInput.setAttribute('name', 'stripePaymentMethod');
                tokenInput.setAttribute('value', result.token.id);
                form.appendChild(tokenInput);
                
                // チェックボックスの値をフォームに追加して送信
                var checkbox = document.getElementById('default-payment');
                if (checkbox.checked) {
                    var defaultPaymentInput = document.createElement('input');
                    defaultPaymentInput.setAttribute('type', 'hidden');
                    defaultPaymentInput.setAttribute('name', 'default_payment');
                    defaultPaymentInput.setAttribute('value', 'on');
                    form.appendChild(defaultPaymentInput);
                }

                // フォームの送信
                form.submit();
            }
        });
    });
</script>



