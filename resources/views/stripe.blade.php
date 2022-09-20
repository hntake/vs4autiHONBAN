{{-- ヘッダー部分の設定 --}}
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/stripe.css') }}"> <!-- schedule.cssと連携 -->
<title>支払い申込画面 自閉症支援ツール VS4Auti”</title>


@section('content')
<header id="header">
            <div class="wrapper">
             <div class="back">
                <button class="button" ><a href="{{ url('') }}" >トップページに戻る</a></button>
             </div>
            </div>
</header>
<div class="card_container py-3">
  <h3 class="mb-3">月額プラン登録フォーム</h3>
    <div class="explain">
        <p style="margin-bottom:0;">自分の作ったスケジュールを保存して、いつでも見れるようにするには<span>月額プランがおすすめ！</span></p><br>
        <div class="month">
            年額プランはメールでの申し込みが必要となります。→<a href="{{ route('admin_form') }}" style="background-color:none;">年額プラン申込ページへ移動する</a>
        </div>
        <p>月額100円のプランとなります。初めてのご登録の方のみ、ご登録から30日間無料でのご利用となります。<span>トライアル期間が終了と同時に支払いが発生しますので、利用を中止する場合はトライアル期間中に解約をするようにしてください。</span></p><br>
        <p>支払いはクレジットカードのみとなります。<span>無料トライアルのみの利用でも、クレジットカードの情報が必要となります。</span></p>
        <p>支払いシステムはStripeを使用しております。StripeはAmazonやGoogle、マイクロソフト、Salesforce、Spotifyのような誰もが知る大企業から中小企業、個人事業主まで、世界の120カ国以上の数百万社に導入されているオンライン決済システムです。</p>
    </div>
{{-- フォーム部分 --}}
    <form action="{{route('stripe.post')}}" method="post" id="payment-form">
    @csrf

    <label for="exampleInputEmail1">お名前(クレジットカード上と同じ<span>ローマ字表記</span>でお願いします。)</label>
        <input type="test" class="form-control " id="card-holder-name" required>
        <label for="exampleInputPassword1"></label>
        <div class="form-group MyCardElement " id="card-element"></div>

        <div id="card-errors" role="alert" style='color:red'></div>

        <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">送信する</button>

    </form>
        <div class="try">
            <h5>登録せずに使ってみる</h5>
            <button class="btn btn-primary" id="card-button"><a href="{{ url('create') }}" >お試しはこちらから</a></button>
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

		const cardElement = elements.create('card', {style: style, hidePostalCode: true});
		cardElement.mount('#card-element');

		const cardHolderName = document.getElementById('card-holder-name');
		const cardButton = document.getElementById('card-button');
		const clientSecret = cardButton.dataset.secret;

		cardButton.addEventListener('click', async (e) => {
			// formのsubmitボタンのデフォルト動作を無効にする
			e.preventDefault();
			const { setupIntent, error } = await stripe.confirmCardSetup(
				clientSecret, {
					payment_method: {
					card: cardElement,
					billing_details: { name: cardHolderName.value }
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
