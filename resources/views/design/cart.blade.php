{{-- ヘッダー部分の設定 --}}
@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<link rel="stylesheet" href="{{ asset('css/stripe.css') }}"> <!-- schedule.cssと連携 -->
<title>支払い申込画面(リピーター)</title>


@section('content')
<header id="header">
    <div class="wrapper">
        <div class="back">
            <button class="button"><a href="{{ url('/design/list') }}">トップページに戻る</a></button>
        </div>
    </div>
</header>
@if(isset($downloads)&& count($downloads) > 0)
<div class="card_container py-3">
    {{-- フォーム部分 --}}
    <form action="{{route('post_cart')}}" method="post" id="payment-form">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>画像</th>
                    <th>デザイン名</th>
                    <th>価格</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($downloads as $download)
                <tr>
                    <td><img src="{{ asset('storage/' . $download->Design->image) }}" alt="image" ></td>
                    <td>{{ $download->designName }}</td>
                    <td>{{ $download->Design->price }}</td>
                    <td><div class="list_button"><a href="{{ route('delete_cart',['id'=> $download->id]) }}">削除</a></div></td>
                </tr>
                @endforeach
            </tbody>  
        </table>   
                <label for="price">合計金額  {{$total}}円</label>
                <label for="exampleInputEmail1">お名前(クレジットカード上と同じ<span>ローマ字表記</span>でお願いします。)</label>
                <input type="text" class="form-control" id="card-holder-name" name="name" required>
                    <select name="paymentMethod" id="paymentMethod">
                            <option class="form-group MyCardElement " value="{{ $paymentMethod->id }}">登録済みの支払い方法{{ $paymentMethod->card->brand }} **** **** **** {{ $paymentMethod->card->last4 }}</option>
                            @if(isset($filteredPaymentMethods))
                            @foreach($filteredPaymentMethods as $paymentMethod)
                            <option class="form-group MyCardElement " value="{{ $paymentMethod->id }}">登録済みの支払い方法{{ $paymentMethod->card->brand }} **** **** **** {{ $paymentMethod->card->last4 }}</option>
                            @endforeach
                            @endif
                    </select>
                    <div class="add"> 
                        <button class="btn btn-primary"><a href="{{ route('add_payment') }}">別の支払いを追加</a></button>
                    </div>

        <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">送信する</button>
        <p>当サイトでは、支払いにStripeを使用しています。Stripeは世界的に信頼される決済プラットフォームで、高度なセキュリティ対策が施されています。
        お客様の個人情報やクレジットカード情報は、最先端の暗号化技術によって保護されています。</p>

        <p>安心してお買い物をお楽しみください。Stripeを通じた支払いは、迅速かつ安全に処理され、お客様のプライバシーを最大限に守ります。
        何かご不明点がありましたら、お気軽にお問い合わせください。</p>
    </form>
    <div class="try">
        <button class="btn btn-primary" id="cancel-button"><a href="{{ url('design/list') }}">キャンセルする</a></button>
    </div>
</div>

    @else
    <div>
        カートは空です
    </div>
    @endif

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

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

    // stripePaymentHandler 関数の定義
function stripePaymentHandler(setupIntent, paymentMethod) {
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripePaymentMethod');
    hiddenInput.setAttribute('value', setupIntent.payment_method);
    form.appendChild(hiddenInput);
    // フォームを送信
    form.submit();
}

// クリックイベントリスナー内で stripePaymentHandler 関数を呼び出す際に paymentMethod を渡す
stripePaymentHandler(setupIntent, paymentMethod);


        cardButton.addEventListener('click', async (e) => {
            // formのsubmitボタンのデフォルト動作を無効にする
            e.preventDefault();
            const cardHolderName = document.getElementById('card-holder-name').value;
            const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;

            if (paymentMethod === 'another') {
                // 別の支払い方法を選択した場合は、Stripeにクレジットカード情報を送信して処理する
                const { setupIntent, error } = await stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: cardHolderName
                            }
                        }
                    }
                );
                if (error) {
                    console.log('error');
                } else {
                    // 問題なければ、stripePaymentHandlerへ
                    stripePaymentHandler(setupIntent, paymentMethod);
                    
                }
            }//if
            else {
                // 保存された支払い方法のIDをフォームに追加して送信
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'paymentMethod');
                hiddenInput.setAttribute('value', paymentMethod);
                form.appendChild(hiddenInput);
                // フォームを送信
                form.submit();
            }//else
        });//eventListener
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
    }//init
</script>



