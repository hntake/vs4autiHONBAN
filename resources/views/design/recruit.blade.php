<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>障がい者アート募集ページ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="障がい者アートの作品を募集しています。当サイトでご自身の作品を共有してみませんか？障がい者アーティストの皆様、ぜひご応募ください。
    作品をダウンロード販売することもできます。障がい者アーティスト登録しませんか？障がい者アーティストの皆様、ぜひご応募ください。">
    <meta name="keywords" content="障がい者アート,アート募集,アートプロジェクト,アートコミュニティ,アート募集,障がい者アート作品応募 ">
    <meta name="author" content="IT2U">
    <meta name="robots" content="index, follow">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@LLco1118">
    <meta name="twitter:title" content="ITの力で障がいのある人をサポートしたい!IT2Uのアカウントです">
    <meta name="twitter:description" content="障がい者アートの魅力を広めるプラットフォーム。">
    <meta name="twitter:image" content="https://itcha50.com/img/design_top_icon.png?4937523">

    <link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/design.css') }}">
    <link rel="stylesheet" href="{{ asset('css/artist.css') }}">

</head>
<body>
    <!-- Twitterシェアボタン -->

    <blockquote class="twitter-tweet"><p lang="en" dir="ltr"> 
        <!-- <a href="https://t.co/ffKnsVKwG4"></a> -->
        <!-- <a href="https://twitter.com/SpaceX/status/1732824684683784516?ref_src=twsrc%5Etfw"></a> -->
        <a href="https://twitter.com/share" class="twitter-share-button" data-text="【障がい者アート普及・共有サイト】にて障がい者アート募集中です！登録無料 障がい者アートの普及にご協力ください" data-url="{{url('design/recruit/')}}" data-hashtags="IT2U">X</a>
    </blockquote>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <header>
        <img src="{{asset('img/design_banner.png')}}" alt="障がい者アート募集" >
        <h1>障がい者アート募集</h1>
        <p>障がいを抱える方々のアート作品を募集しています。あなたの創造力と才能を、私たちと共有しませんか？作品はデジタル形式でのダウンロード販売から、
            実際のアート作品として現物の販売まで、さまざまな方法でお客様に提供することが可能です。自分の作品が多くの人に喜ばれ、支持される喜びをぜひ体験してください。</p>
        <p>たくさんのご応募を心よりお待ちしております！</p>

    </header>
    <nav>
        <button><a href="{{url('design/list')}}">障がいアート共有サイト</a></button>
        <button><a href="{{url('design/artist_list')}}">障がい者アーティスト一覧</a></button>
        <button><a href="{{url('design/policy')}}">利用規約</a></button>
        <button><a href="{{url('aboutus')}}">AboutUs</a></button>
    </nav>
    <section>
        <h2>著作権について</h2>
            <p>ダウンロードする利用者には、画像利用の際には、<span style="font-weight:bold;">有償であろうと無償であろうと、ダウンロードした作品を利用する際には、コピーライセンスの表記または併記を義務付けています</span></p>
            <p>登録された作品は、IT2Uのスタンプが加工されたものがサイトに記載されます。ユーザーが作品を選択すると、その加工が外されたオリジナルの作品がダウンロードされます。
                (画像①参照)</p>
            <p>また、アーティスト名をコピーライセンスとして表記した作品のみしかダウンロードできない選択も可能です。(画像②参照)</p>
            <div class="center">
                <img src="{{asset('img/sample.png')}}" alt="copy_license"  style="width:200px; height:auto;">
                <img src="{{asset('img/sample_2.png')}}" alt="copy_license"  style="width:200px; height:auto;">
            </div>
    </section>
    <section>
        <h2>ダウンロード販売について</h2>
            <p>登録された作品は、当ダウンロードサイトで有償または無料でダウンロードされることとなります。</p>
            <p><span style="font-weight:bold;">(有償・無料の選択はご自身でお決めください。有償の場合の各々の<span style="color:red;">価格</span>もご自身でお決めください)</span></p>
            <p>有償の場合、販売価格からクレジットカード利用手数料(3.6%)、サーバー利用料(<span style="font-weight:bold;">サイトオープンプロモーションとして2025年3月まで<span style="color:red;">1%</span>。
                以降変更の可能性有り</span>)と振込手数料を差し引いた金額が支払われます。</p>
                <p>(以下の画像でお金の流れを説明しています)</p>
                <div class="center">
                    <a href="../img/pay_flow1.png" data-lightbox="group"><img src="{{asset('img/pay_flow1.png')}}" alt="pay_flow"  style="width:200px; height:auto;" ></a>
                    <a href="../img/pay_flow2.png" data-lightbox="group"><img src="{{asset('img/pay_flow2.png')}}" alt="pay_flow"  style="width:200px; height:auto;" ></a>
                </div>
    </section>
    <section>
        <h2>現物販売について</h2>
            <p>現物の販売をご希望される場合、梱包および配送は全てデザイナー様にお願い申し上げます。そのため、販売価格にはこれらの費用を含めた金額を設定していただきますようお願い致します。</p>
            <a href="{{url('design/packing')}}"><h3>梱包・発送について詳しく見る</h3></a>

    </section>
    <section>
        <h2>当サイトグッズへのデザイン提供について</h2>
            <p>また、当サイトで販売されているグッズ(<a href="{{url('protect')}}">お守りバッジ</a>)へのデザイン提供にご参加いただくと、売り上げごとに<span style="font-weight:bold;">50円</span>が支払われるシステムとなっております。</p>
            <div class="center">
                <a href="{{asset('img/bird-black_elder.png')}}" data-lightbox="group"><img src="{{asset('img/bird-black_elder.png')}}" alt="お守りバッジ 鳥" style="width:20%;"></a>
                <a href="{{asset('img/fryer.png')}}" data-lightbox="group"><img src="{{asset('img/fryer.png')}}" alt="お守りバッジ 説明" style="width:20%;"></a>
            </div>
    </section>

    <section>
        <h2>募集要項</h2>
        <ol>
            <li>応募資格：障がいをお持ちの方々もしくは障がい者就労施設</li>
            <li>個人の場合:アーティストページにてご自身の障がいを<span style="font-weight:bold;">公表する</span><br>
            事業所の場合:事業所情報を<span style="font-weight:bold;">公表する</span></li>
            <li>以下の規約に同意していただける方</li>
            <a href="{{url('design/policy')}}" target="_blank" rel="noopener noreferrer"><p>利用規約</p></a>
            <!-- その他の募集要項を追加 -->
        </ol>
    </section>

    <section>
        <h2>作品登録方法</h2>
        <p>アート作品を応募する際は、以下の手順に従ってください。</p>
        <ol>
            <li>以下のページからアーティスト登録</li>
            <a href="{{url('register')}}" target="_blank" rel="noopener noreferrer"><p>障がい者アーティスト登録画面</p></a>
            <li>作品をデジタルデータに変換する(ファイル形式:JPEG,PNG 容量2MBまで)</li>
            <li>作品をサイトにアップロードする</li>
            <!-- フォームのコードや応募手順の詳細を追加 -->
        </ol>
        <div class="form">
            <h4>始め方や登録方法などに不慣れな方には、無料でサポートさせていただきます。ご予約は以下からお願いいたします。</h4>
            <button>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfAzOWgu7ryt8Xeir8W9SlvTacqeCebV6tw2iGSK7qkJxT33A/viewform?usp=sf_link">無料登録サポートを予約する
            </button>
        </div>
    </section>
    <section>
        <a href="https://www.youtube.com/embed/8YhNQRpVhxw?si=KGzfYXQfDLL4urd8"><h2>会員登録から作品登録、支払申請までの説明動画</h2></a>
        <div class="youtube_box">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/8YhNQRpVhxw?si=KGzfYXQfDLL4urd8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </section>
    <section>
        <h2>お問い合わせ</h2>
        <p>ご質問やお問い合わせがあれば、以下の連絡先までお気軽にご連絡ください。</p>
        <address>
            ボランティア団体IT2U<br>
            電話：[連絡先電話番号070-4225-0615]<br>
            メール：[info@itcha50.com]
        </address>
    </section>

    <footer>
    <p><a href="https://itcha50.com/design/list">&copy; IT2U 障がい者アート共有サイト</a></p>
    </footer>

</body>
</html>
