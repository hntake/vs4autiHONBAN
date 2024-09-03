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
                
            });
            
        });
    </script>
</header>
<div id="prepaid-purchase-form" >
    <h4>あなたの残高:{{$buyer->balance}}円</h4>
    <a href="{{ route('prepaid') }}" target="_blank">プリペイド購入ページへ移動（新しいウインドウで開きます）</a>
</div>
@if($paymentMethod==null)
<div class="card_container py-3">
    {{-- フォーム部分 --}}
        <td><img src="{{ asset('storage/' . $design->image) }}" alt="image" ></td>
        <td>作品名:{{ $design->name }}</td><br>
        <div class="list_button"><a href="{{ route('empty_cart') }}">カートを空にする</a></div>
        <div class="try">
            <button class="btn btn-primary" id="bank-button">銀行振込を選択</button>
            <button class="btn btn-primary" id="credit-button">クレジットカードを選択</button>
            <button class="btn btn-primary" id="prepaid-button">プリペイド残高を使う</button>
            <button class="btn btn-primary" id="prepaid-add">プリペイドを登録する</button>
            <h5>プリペイドを登録した方はページを更新して下さい。残高が更新されます。</h5>
            <button class="btn btn-primary" id="cancel-button"><a href="{{ url('design/list') }}">キャンセルする</a></button>
        </div>
        <div id="credit-card-form" style="display:none;">
            <form action="{{route('design_stripe_address.post',['id'=> $design->id])}}" method="post" id="payment-form">
            @csrf
                <label for="exampleInputEmail1">カード名義人(クレジットカード上と同じ<span>ローマ字表記</span>でお願いします。)</label>
                <input type="text" class="form-control" id="card-holder-name" name="name" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="price">¥{{ $design->price }}</label>
                <label for="exampleInputPassword1"></label>
                <div class="form-group MyCardElement " id="card-element"></div>

                <div id="card-errors" role="alert" style='color:red'></div>
                <div class="pay-button">
                    <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">購入する</button>
                </div>
                <p>当サイトでは、支払いにStripeを使用しています。Stripeは世界的に信頼される決済プラットフォームで、高度なセキュリティ対策が施されています。
                お客様の個人情報やクレジットカード情報は、最先端の暗号化技術によって保護されています。</p>

                <p>安心してお買い物をお楽しみください。Stripeを通じた支払いは、迅速かつ安全に処理され、お客様のプライバシーを最大限に守ります。
                何かご不明点がありましたら、お気軽にお問い合わせください。</p>
            </form>
            <button class="btn btn-primary" id="save-payment-button">決済情報を保存する</button>

            <div class="try">
                <button class="btn btn-primary" id="cancel-button"><a href="{{ url('design/list') }}">キャンセルする</a></button>
            </div>
        </div>
        <div id="bank-info" style="display:none;">
            <form action="{{route('bank_submit_un',['id'=> $design->id])}}" method="post" id="payment-form">
            @csrf
                <p>振込口座名 llco 竹内 貴代</p>
                <p>銀行名 楽天銀行</p>
                <p>支店名 ポルカ</p>
                <p>口座種類 普通</p>
                <p>口座番号 5014182</p>
                <p>（恐れ入りますが振込手数料はお客様の負担でお願いいたします）</p>
                <p>振込金額{{$design->price}}円</p>
            <button type="submit" name="action" style="background-color:antiquewhite; border:1.6px orange solid; padding:8px;color:red;">
                購入するため、振込情報を送信する
            </button>
            </form>
        </div>
        <div id="prepaid-use-form" style="display:none;">
        <h4>あなたの残高:{{$buyer->balance}}円</h4>
            <form action="{{route('prepaid_submit',['id'=> $design->id])}}" method="post" id="payment-form">
            @csrf
            @if($design->price <= $buyer->balance)
            <button type="submit" name="action" style="background-color:antiquewhite; border:1.6px orange solid; padding:8px;color:red;">
            プリペイド残高で支払う
            </button>
            @else
            </form>
    </div>
    <div id="prepaid-add-form" style="display:none;">
        <h4>あなたの残高:{{$buyer->balance}}円</h4>
        <form action="{{route('prepaid_add')}}" method="post" id="payment-form">
        @csrf
            <label for="code">プリペイド認証コード</label>
                <input type="text" class="form-control" id="code" name="code" required>
                @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            <button type="submit" name="action" style="background-color:antiquewhite; border:1.6px orange solid; padding:8px;color:red;">
            プリペイドを登録する
            </button>
            <h5>プリペイドを登録した方はページを更新して下さい。残高が更新されます。</h5>
        </form>
    </div>
</div> 
@else
<div class="card_container py-3">
    {{-- フォーム部分 --}}
    <form action="{{route('design_stripe_address.post',['id'=> $design->id])}}" method="post" id="payment-form">
        @csrf
        <td><img src="{{ asset('storage/' . $design->image) }}" alt="image" ></td>
        <td>作品名:{{ $design->name }}</td><br>
        <div class="list_button"><a href="{{ route('empty_cart') }}">カートを空にする</a></div>
        <div class="try">
            <button class="btn btn-primary" id="bank-button">銀行振込を選択</button>
            <button class="btn btn-primary" id="credit-button">クレジットカードを選択</button>
            <button class="btn btn-primary" id="prepaid-button">プリペイド残高を使う</button>
            <button class="btn btn-primary" id="prepaid-add">プリペイドを登録する</button>
            <h5>プリペイドを登録した方はページを更新して下さい。残高が更新されます。</h5>
            <button class="btn btn-primary" id="cancel-button"><a href="{{ url('design/list') }}">キャンセルする</a></button>
        </div>
    <div id="credit-card-form" style="display:none;">
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
        <div class="pay-button">
            <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">購入する</button>
        </div>
        <p>当サイトでは、支払いにStripeを使用しています。Stripeは世界的に信頼される決済プラットフォームで、高度なセキュリティ対策が施されています。
        お客様の個人情報やクレジットカード情報は、最先端の暗号化技術によって保護されています。</p>

        <p>安心してお買い物をお楽しみください。Stripeを通じた支払いは、迅速かつ安全に処理され、お客様のプライバシーを最大限に守ります。
        何かご不明点がありましたら、お気軽にお問い合わせください。</p>
        </form>
    </div>
    <div id="bank-info" style="display:none;">
        <form action="{{route('bank_submit_un',['id'=> $design->id])}}" method="post" id="payment-form">
        @csrf

            <p>振込口座名 llco 竹内 貴代</p>
            <p>銀行名 楽天銀行</p>
            <p>支店名 ポルカ</p>
            <p>口座種類 普通</p>
            <p>口座番号 5014182</p>
            <p>（恐れ入りますが振込手数料はお客様の負担でお願いいたします）</p>
            <p>振込金額{{$design->price}}円</p>
        <button type="submit" name="action" style="background-color:antiquewhite; border:1.6px orange solid; padding:8px;color:red;">
            購入するため、振込情報を送信する
        </button>
        </form>
    </div>
    <div id="prepaid-use-form" style="display:none;">
        <h4>あなたの残高:{{$buyer->balance}}円</h4>
            <form action="{{route('prepaid_submit',['id'=> $design->id])}}" method="post" id="payment-form">
            @csrf
            @if($design->price <= $buyer->balance)
            <button type="submit" name="action" style="background-color:antiquewhite; border:1.6px orange solid; padding:8px;color:red;">
            プリペイド残高で支払う
            </button>
            @else
            残高不足です。<a href="{{ route('prepaid') }}" target="_blank">プリペイド購入ページへ移動（新しいウインドウで開きます）</a>
            @endif           
        </form>
    </div>
    <div id="prepaid-add-form" style="display:none;">
        <h4>あなたの残高:{{$buyer->balance}}円</h4>
        <form action="{{route('prepaid_add')}}" method="post" id="payment-form">
        @csrf
            <label for="code">プリペイド認証コード</label>
                <input type="text" class="form-control" id="code" name="code" required>
                @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            <button type="submit" name="action" style="background-color:antiquewhite; border:1.6px orange solid; padding:8px;color:red;">
            プリペイドを登録する
            </button>
            <h5>プリペイドを登録した方はページを更新して下さい。残高が更新されます。</h5>
        </form>
    </div>
</div>
@endif
<div class="address">
<h1>配達情報</h1>
            <div class="form-group">
                <label for="name">名前:</label>
                <input type="text" id="name" name="name" value="{{ $buyer->name}}" required>
            </div>

            <div class="form-group">
                <label for="address">住所:</label>
                <input type="text" id="address" name="address" value="{{ $buyer->address}}" required>
            </div>

            <div class="form-group">
                <label for="postal">郵便番号:</label>
                <input type="text" id="postal" name="postal" value="{{ $buyer->postal}}" required>
            </div>

            <div class="form-group">
                <label for="tel">電話番号:</label>
                <input type="tel" id="tel" name="tel" value="{{ $buyer->tel}}" required>
            </div>
            <form method="GET" action="{{ route('buyer_address',['id'=> $design->id]) }}">
                <button type="submit" id="download-button" disabled>
                    <a href="{{url('design/address')}}">お届け先情報を修正する</a>
                </button>
            </form>
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
<script>
    function showSection(selectedId) {
        const sections = ['credit-card-form', 'bank-info', 'prepaid-use-form', 'prepaid-purchase-form', 'prepaid-add-form'];
        sections.forEach(function(id) {
            document.getElementById(id).style.display = id === selectedId ? 'block' : 'none';
        });
    }

    document.getElementById('bank-button').addEventListener('click', function() {
        showSection('bank-info');
    });

    document.getElementById('credit-button').addEventListener('click', function() {
        showSection('credit-card-form');
    });

    document.getElementById('prepaid-button').addEventListener('click', function() {
        showSection('prepaid-use-form');
    });

    document.getElementById('prepaid-add').addEventListener('click', function() {
        showSection('prepaid-add-form');
    });
</script>


