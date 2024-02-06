<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.5,maximum-scale=2.0,user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/policy.css') }}"> <!-- word.cssと連携 -->

    <title>特定商取引 ”IT2U視覚支援ツール”</title>
</head>

<body>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                <h1>特定商取引法に基づく表示</h1>
                <h2>サービス名</h2>
                <p>VS4</p>

                <h2>販売価格</h2>
                <p>購入手続きの際に画面に表示されます。消費税は内税として表示しております。</p>
                <h2>販売価格以外でお客様に発生する金銭</h2>
                <p>通信時に発生するパケット通信料</p>
                <h2>お支払方法</h2>
                <p>以下のいずれかのお支払方法をご利用いただけます。</p>
                <p>各種クレジットカード
                    <br />銀行口座振込
                </p>
                <h2>商品購入方法</h2>
                <p>支払いシステムはStripeを使用しております。StripeはAmazonやGoogle、マイクロソフト、Salesforce、Spotifyのような誰もが知る大企業から中小企業、個人事業主まで、世界の120カ国以上の数百万社に導入されているオンライン決済システムです<br />銀行口座振込は別途メールで連絡致します。</p>
                <h2>デジタルアイテム等の利用が可能となる時期</h2>
                <p>お支払い手続き完了後24時間以内にご利用いただけます。</p>
                <h2>対応機種</h2>
                <p>対象のサービスが動作する端末（スマートフォン、タブレットなど）が必要です。</p>
                <h2>返品・キャンセル</h2>
                <p>１.お客様のご都合による返品・キャンセル
                    商品の性質上、各アプリケーションご購入後の返金・返品はできかねます。あらかじめ利用環境・対応機種および各アプリケーションの利用環境・対応機種をよくお確かめの上、お申込み、もしくはご購入願います。２.アプリケーションの瑕疵に基づく返品（キャンセル）
                    アプリケーションに瑕疵が発見されたときは、瑕疵を修補したアプリケーションをアプリケーションのバージョンアップ又はその他適切な方法で提供いたします。</p>
                <h2>対応機種</h2>
                <p>対象のサービスが動作する端末（スマートフォン、タブレットなど）が必要です。</p>
                <h2>対応機種</h2>
                <p>対象のサービスが動作する端末（スマートフォン、タブレットなど）が必要です。</p>
                <h2>販売事業者名</h2>
                <p>Webサービス会社llco(エルエルコ)</p>
                <h2>販売責任者名</h2>
                <p>八木はるよ</p>
                <h2>所在地</h2>
                <p>〒411-0917 静岡県駿東郡清水町徳倉1484-11</p>
                <h2>お問い合わせ</h2>
                <p>こちらまで→
                    <button class="button"><a href="{{ route('contact.index') }}">Contact us</a></button>
                </p>

                <div class="back">
                    <button class="btn btn-primary" id="card-button"><a href="{{ url('/') }}">IT2Uトップページに戻る</a></button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>