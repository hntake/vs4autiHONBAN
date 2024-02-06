<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>障がい者アートトップページ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="障がい者アートの魅力を探求するプラットフォーム。アーティストの感動的な作品やストーリーを通じて、多様性と創造性を称賛します。">
    <meta name="keywords" content="障がい者アート, アートプロジェクト, アートコミュニティ, 多様性, 創造性">
    <meta name="author" content="IT2U">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="ITの力で障がいのある人をサポートしたい!IT2Uのアカウントです">
    <meta property="og:description" content="アーティストの感動的な作品やストーリーを通じて、障がい者アートの魅力を広めるプラットフォーム。">
    <meta property="og:image" content="https://itcha50.com/img/design_poster.png">
    <meta property="og:url" content="https://itcha50.com/design/poster">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@LLco1118">
    <meta name="twitter:title" content="ITの力で障がいのある人をサポートしたい!IT2Uのアカウントです">
    <meta name="twitter:description" content="障がい者アートの魅力を広めるプラットフォーム。">
    <meta name="twitter:image" content="https://itcha50.com/img/design_poster.png">

    <link rel="shortcut icon" href="{{ asset('/favicon_bbs.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/design.css') }}">
    <link rel="stylesheet" href="{{ asset('css/artist.css') }}">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
     crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <h1>障がい者アートトップページ</h1>
    </header>

    <section class="profile">
        <h2>障がい者アートの世界へようこそ！</h2>
        <h3>当サイトにある作品は全てダウンロード可能です。</h3>
        <h3>価格は全て、障がい者アーティストが決めた金額です。</h3>
        <h3>当サイトの主な目的は、障がい者アートの普及です。したがって、
            有償であろうと無償であろうと、ダウンロードした作品を利用する際には、コピーライセンスの表記または併記が義務付けられます。</h3>
            <h3>上記の内容に同意いただいた上で、ダウンロードしてください。</h3>

        <div class="card-body">
        @auth
        <td><a href="{{ route('index_cart') }}">マイカート</a></td>
        @elseif(isset($tempCart))
        <td><a href="{{ route('index_cart_un') }}">マイカート</a></td>
        @else
        @if($user->type==8)
        <td><a href="{{ route('my_page') }}">マイカート</a></td>
        @endif
        @endauth
        <h2>作品一覧</h2>
        <div class="">
                <div class="card-header" style="display:flex; flex-direction: column; border:solid 1px gray; width:fit-content;">
                    <table>
                        <tr>
                        @foreach ($designs as $design)

                        @if($design->license==0)
                        <td><a href="{{route('design_select',['id'=>$design->id])}}"><img src="{{ asset('storage/' . $design->image) }}" alt="image" ></a></td>
                        @else
                        <td><a href="{{route('design_select',['id'=>$design->id])}}"><img src="{{ asset('storage/' . $design->image_with_artist_name) }}" alt="image" ></a></td>
                        @endif
                        </tr>
                        @endforeach

                    </table>
                </div>
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
        <p>&copy; IT2U 障がい者アート募集</p>
    </footer>

</body>
</html>
