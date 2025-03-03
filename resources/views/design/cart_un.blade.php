{{-- ヘッダー部分の設定 --}}
@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<link rel="stylesheet" href="{{ asset('css/stripe.css') }}"> <!-- schedule.cssと連携 -->
<link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">

<title>支払い申込画面 </title>



<header id="header">
    <div class="wrapper">
        <div class="back">
            <button class="button" id="returnButton"><a href="{{ url('/design/list') }}">トップページに戻る</a></button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('card-button').addEventListener('click', function () {
                // ボタンの表示を「処理中...」に変更
                this.innerHTML = '処理中...';

            });
            document.getElementById('bank-button').addEventListener('click', function() {
                    document.getElementById('credit-card-form').style.display = 'none';
                    document.getElementById('bank-info').style.display = 'block';
                });

                document.getElementById('credit-button').addEventListener('click', function() {
                    document.getElementById('credit-card-form').style.display = 'block';
                    document.getElementById('bank-info').style.display = 'none';
                });
            });
    </script>
</header>
@if($total !== null && $total > 0)
    <!-- 現物販売の作品の場合は先に住所入力-->
    @php
            $hasOriginal = false;
            foreach ($downloads as $download) {
                if ($download['original'] == 1) {
                    $hasOriginal = true;
                    break;
                }
            }
        @endphp

    <!-- 現物購入で住所入力完了済み -->
    @if($hasOriginal &&  $address == true)
    <form method="GET" action="{{ route('buyer_address_cart',['id'=> $total]) }}">
        <button type="submit" id="download-button" disabled>
            <a href="{{url('design/address')}}">お届け先情報を修正する</a>
        </button>
    </form>
    {{-- フォーム部分 --}}
    <form action="{{ route('post_cart_un', ['id' => $total, 'address' => $address ? '1' : '0']) }}" method="post" id="payment-form">    
    @csrf
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
    </div>
    <div class="card_container py-3">
    <div id="credit-card-form" style="display:none;">
        <label for="exampleInputEmail1">お名前(クレジットカード上と同じ<span>ローマ字表記</span>でお願いします。)</label>
        <input type="text" class="form-control" id="card-holder-name" name="name" required>
        <label for="exampleInputPassword1"></label>
        <div class="form-group MyCardElement " id="card-element"></div>

        <div id="card-errors" role="alert" style='color:red'></div>

        <div class="pay-button">
            <button class="btn btn-primary" id="card-button" data-secret="{{ $clientSecret }}">購入する</button>
        </div>
        <p>当サイトでは、支払いにStripeを使用しています。Stripeは世界的に信頼される決済プラットフォームで、高度なセキュリティ対策が施されています。
        お客様の個人情報やクレジットカード情報は、最先端の暗号化技術によって保護されています。</p>

        <p>安心してお買い物をお楽しみください。Stripeを通じた支払いは、迅速かつ安全に処理され、お客様のプライバシーを最大限に守ります。
        何かご不明点がありましたら、お気軽にお問い合わせください。</p>
        </form>
    </div>
    <div id="bank-info" style="display:none;">
    <form action="{{route('bank_submit',['id'=> $total])}}" method="post" id="payment-form">
        @csrf

            <p>振込口座名 llco 竹内 貴代</p>
            <p>銀行名 楽天銀行</p>
            <p>支店名 ポルカ</p>
            <p>口座種類 普通</p>
            <p>口座番号 5014182</p>
            <p>（恐れ入りますが振込手数料はお客様の負担でお願いいたします）</p>
            <p>振込金額{{$total}}円</p>
            <button type="submit" name="action" style="background-color:antiquewhite; border:1.6px orange solid; padding:8px;color:red;">
                購入するため、振込情報を送信する
            </button>
        </form>
    </div>
    <div class="image">

        @foreach($tempCart as $downloadId => $downloadDetails)
        <div class="each_image">
        @php
            $design = \App\Models\Design::find($downloadDetails['design_id']);
        @endphp
        <td><img src="{{ asset('storage/' . $design->image) }}" alt="image"></td> 
        <td>{{ $downloadDetails['designName'] }}</td>
        <td>{{ $downloadDetails['price'] }}円</td>
        </div>
        @endforeach
    </div>
        <label for="email">メールアドレス</label>
        <input type="text" class="form-control" id="email" name="email" required>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="price">合計金額  {{$total}}円</label>
        <div class="list-button"><a href="{{ route('empty_cart_un') }}">カートを空にする</a></div>
        <div class="try">
            <button class="btn btn-primary" id="bank-button">銀行振込を選択</button>
            <button class="btn btn-primary" id="credit-button">クレジットカードを選択</button>
            <button class="btn btn-primary" id="cancel-button"><a href="{{ url('design/list') }}">キャンセルする</a></button>
        </div>
       
    <!-- 現物購入で住所入力が必要 -->
    @elseif($hasOriginal==true && $address==false)
    <div class="image">
    @foreach($tempCart as $downloadId => $downloadDetails)
        @php
            $design = \App\Models\Design::find($downloadDetails['design_id']);
        @endphp
        <div class="each_image">
            <td><img src="{{ asset('storage/' . $design->image) }}" alt="image"></td> 
            <td>{{ $downloadDetails['designName'] }}</td>
            <td>{{ $downloadDetails['price'] }}円</td>
        </div>
        @endforeach
    </div>
   
    <!-- <label for="email">メールアドレス</label>
    <input type="text" class="form-control" id="email" name="email" required>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror -->
    <label for="price">合計金額  {{$total}}円</label>
        <div class="list-button"><a href="{{ route('empty_cart_un') }}">カートを空にする</a></div>
            @if(isset($buyer))
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

                        <form method="GET" action="{{ route('buyer_address_cart',['id'=> $total]) }}">
                            <button type="submit" id="download-button" disabled>
                                <a href="{{url('design/address')}}">お届け先情報を修正する</a>
                            </button>
                        </form>
            </div>
            <div class="try">
                <button class="btn btn-primary" id="bank-button">銀行振込を選択</button>
                <button class="btn btn-primary" id="credit-button">クレジットカードを選択</button>
                <button class="btn btn-primary" id="cancel-button"><a href="{{ url('design/list') }}">キャンセルする</a></button>
            </div>
            @else
            <form method="GET" action="{{ route('buyer_address_cart',['id'=> $total]) }}">
                <button type="submit" id="address-button" >
                お届け先情報を入力して購入する
                </button>
            </form>
            <button class="btn btn-primary" id="cancel-button"><a href="{{ url('design/list') }}">キャンセルする</a></button>
            @endif
            <form action="{{ route('post_cart_un', ['id' => $total, 'address' => $address ? '1' : '0']) }}" method="post" id="payment-form">        
            @csrf
        <div id="credit-card-form" style="display:none;">
            <label for="exampleInputEmail1">お名前(クレジットカード上と同じ<span>ローマ字表記</span>でお願いします。)</label>
            <input type="text" class="form-control" id="card-holder-name" name="name" required>
            <label for="exampleInputPassword1"></label>
            <div class="form-group MyCardElement " id="card-element"></div>

            <div id="card-errors" role="alert" style='color:red'></div>

            <div class="pay-button">
            <button class="btn btn-primary" id="card-button" data-secret="{{ $clientSecret }}">購入する</button>
            </div>
            <p>当サイトでは、支払いにStripeを使用しています。Stripeは世界的に信頼される決済プラットフォームで、高度なセキュリティ対策が施されています。
            お客様の個人情報やクレジットカード情報は、最先端の暗号化技術によって保護されています。</p>

            <p>安心してお買い物をお楽しみください。Stripeを通じた支払いは、迅速かつ安全に処理され、お客様のプライバシーを最大限に守ります。
            何かご不明点がありましたら、お気軽にお問い合わせください。</p>
            </form>
        </div>
        <div id="bank-info" style="display:none;">
        <form action="{{route('bank_submit',['id'=> $total])}}" method="post" id="payment-form">
            @csrf

                <p>振込口座名 llco 竹内 貴代</p>
                <p>銀行名 楽天銀行</p>
                <p>支店名 ポルカ</p>
                <p>口座種類 普通</p>
                <p>口座番号 5014182</p>
                <p>（恐れ入りますが振込手数料はお客様の負担でお願いいたします）</p>
                <p>振込金額{{$total}}円</p>
                <button type="submit" name="action" style="background-color:antiquewhite; border:1.6px orange solid; padding:8px;color:red;">
                    購入するため、振込情報を送信する
                </button>
            </form>
        </div>
   
    <!-- ダウンロードのみの場合 -->
    @else
    <div class="card_container py-3">
        {{-- フォーム部分 --}}
        <form action="{{ route('post_cart_un', ['id' => $total, 'address' => $address ? '1' : '0']) }}" method="post" id="payment-form">
        @csrf

        <div class="address" style="display:none;">{{$address}}</div>        
        @foreach($tempCart as $downloadId => $downloadDetails)
        <div class="each_image">
        @php
            $design = \App\Models\Design::find($downloadDetails['design_id']);
        @endphp
        <td><img src="{{ asset('storage/' . $design->image) }}" alt="image"></td> 
        <td>{{ $downloadDetails['designName'] }}</td>
        <td>{{ $downloadDetails['price'] }}円</td>
        </div>
        @endforeach
        <div class="list-button"><a href="{{ route('empty_cart_un') }}">カートを空にする</a></div>
        <label for="email">メールアドレス</label>
        <input type="text" class="form-control" id="email" name="email" required>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="price">合計金額  {{$total}}円</label>
            <div class="try">
                <button class="btn btn-primary" id="bank-button">銀行振込を選択</button>
                <button class="btn btn-primary" id="credit-button">クレジットカードを選択</button>
                <button class="btn btn-primary" id="cancel-button"><a href="{{ url('design/list') }}">キャンセルする</a></button>
            </div>
        <div id="credit-card-form" style="display:none;">
                <label for="exampleInputEmail1">お名前(クレジットカード上と同じ<span>ローマ字表記</span>でお願いします。)</label>
                <input type="text" class="form-control" id="card-holder-name" name="name" required>
                <label for="exampleInputPassword1"></label>
                <div class="form-group MyCardElement " id="card-element"></div>

                <div id="card-errors" role="alert" style='color:red'></div>

                <div class="pay-button">
                <button class="btn btn-primary" id="card-button" data-secret="{{ $clientSecret }}">購入する</button>
                </div>
                <p>当サイトでは、支払いにStripeを使用しています。Stripeは世界的に信頼される決済プラットフォームで、高度なセキュリティ対策が施されています。
                お客様の個人情報やクレジットカード情報は、最先端の暗号化技術によって保護されています。</p>

                <p>安心してお買い物をお楽しみください。Stripeを通じた支払いは、迅速かつ安全に処理され、お客様のプライバシーを最大限に守ります。
                何かご不明点がありましたら、お気軽にお問い合わせください。</p>
        </div>
    </form>
        <div id="bank-info" style="display:none;">
        <form action="{{route('bank_submit',['id'=> $total])}}" method="post" id="payment-form">
                @csrf

                    <p>振込口座名 llco 竹内 貴代</p>
                    <p>銀行名 楽天銀行</p>
                    <p>支店名 ポルカ</p>
                    <p>口座種類 普通</p>
                    <p>口座番号 5014182</p>
                    <p>（恐れ入りますが振込手数料はお客様の負担でお願いいたします）</p>
                    <p>振込金額{{$total}}円</p>
                <button type="submit" name="action" style="background-color:antiquewhite; border:1.6px orange solid; padding:8px;color:red;">
                    購入するため、振込情報を送信する
                </button>
                </form>
        </div>
    @endif
 
@else
<div style="text-align:center;">
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

                // セットアップインテントの確認
        stripe.confirmCardSetup(
        clientSecret,
        {
            payment_method: {
            card: cardElement,
            },
        }
        ).then(function(result) {
        if (result.error) {
            // エラー処理
            console.error(result.error);
        } else {
            // 成功時の処理
            console.log(result.setupIntent);
        }
});


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


