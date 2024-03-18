<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>障がい者アート募集ページ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="障がい者アートの魅力を探求するプラットフォーム。当サイトでご自身の作品を共有してみませんか？作品をダウンロード販売できます。">
    <meta name="keywords" content="障がい者アート, アートプロジェクト, アートコミュニティ, 多様性, 創造性">
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

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
     crossorigin="anonymous"></script>
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
        <p>障がいを抱える方々のアート作品を募集しています。ご応募お待ちしています！</p>

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
            <img src="{{asset('img/sample.png')}}" alt="copy_license"  style="width:200px; height:auto;">
            <img src="{{asset('img/sample_2.png')}}" alt="copy_license"  style="width:200px; height:auto;">
    </section>
    <section>
        <p>登録された作品は、当ダウンロードサイトで有償または無料でダウンロードされることとなります
            <span style="font-weight:bold;">(有償・無料の選択はご自身でお決めください。有償の場合の各々の<span style="color:red;">価格</span>もご自身でお決めください)</span>
            有償の場合、販売価格からクレジットカード利用手数料(3.6%)、サーバー利用料(<span style="font-weight:bold;">サイトオープンプロモーションとして2025年3月まで<span style="color:red;">1%</span>。以降変更の可能性有り</span>)と振込手数料を差し引いた金額が支払われます。(以下の画像でお金の流れを説明しています)</p>
            <a href="../img/pay_flow1.png" data-lightbox="group"><img src="{{asset('img/pay_flow1.png')}}" alt="pay_flow"  style="width:200px; height:auto;" ></a>
            <a href="../img/pay_flow2.png" data-lightbox="group"><img src="{{asset('img/pay_flow2.png')}}" alt="pay_flow"  style="width:200px; height:auto;" ></a>
        
        <p>また、当サイトで販売されているグッズ(<a href="{{url('protect')}}">お守りバッジ</a>)へのデザイン提供にご参加いただくと、売り上げごとに50円が支払われるシステムとなっております。</p>  
        <a href="{{asset('img/turtle-orange.png')}}" data-lightbox="group"><img src="{{asset('img/turtle-orange.png')}}" alt="お守りバッジ 亀 黄色" style="width:20%;"></a>

        <a href="{{asset('img/fryer.png')}}" data-lightbox="group"><img src="{{asset('img/fryer.png')}}" alt="お守りバッジ 説明" style="width:20%;"></a>

    </section>

    <section>
        <h2>募集要項</h2>
        <ol>
            <li>応募資格：障がいをお持ちの方々</li>
            <li>アーティストページにてご自身の障がいを<span style="font-weight:bold;">公表する</span></li>
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
            <a href="{{url('register')}}" target="_blank" rel="noopener noreferrer"><p>アーティスト登録画面</p></a>
            <li>作品をデジタルデータに変換する(ファイル形式:JPEG,PNG 容量5MBまで)</li>
            <li>作品をサイトにアップロードする</li>
            <!-- フォームのコードや応募手順の詳細を追加 -->
        </ol>
        <div class="youtube_box">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/8YhNQRpVhxw?si=KGzfYXQfDLL4urd8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
        <p>&copy; IT2U 障がい者アート共有サイト</p>
    </footer>

</body>
</html>
