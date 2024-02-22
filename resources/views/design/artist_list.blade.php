<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>障がい者アーティストリスト</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="障がい者アートの魅力を探求するプラットフォーム。アーティストの感動的な作品やストーリーを通じて、多様性と創造性を称賛します。">
    <meta name="keywords" content="障がい者アート, アートプロジェクト, アートコミュニティ, 多様性, 創造性">
    <meta name="author" content="IT2U">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="ITの力で障がいのある人をサポートしたい!IT2Uのアカウントです">
    <meta property="og:description" content="アーティストの感動的な作品やストーリーを通じて、障がい者アートの魅力を広めるプラットフォーム。">
    <meta property="og:image" content="https://itcha50.com/img/design_design_top_icon.pn">
    <meta property="og:url" content="https://itcha50.com/design/recruit">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@LLco1118">
    <meta name="twitter:title" content="ITの力で障がいのある人をサポートしたい!IT2Uのアカウントです">
    <meta name="twitter:description" content="障がい者アートの魅力を広めるプラットフォーム。">
    <meta name="twitter:image" content="https://itcha50.com/img/design_design_top_icon.pn">

    <link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/artist.css') }}">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
    crossorigin="anonymous"></script>
</head>
<body>

<header>
        <h1>障がい者アーティスト一覧</h1>
        <td><a href="{{route('design_list')}}">障がい者アートトップページへ</a></td>
    </header>
    <div>
            <form action="{{ route('artist_search') }}" method="GET">
                <input type="text" name="keyword" >
                <input type="submit" value="検索">
            </form>
        </div>
        @if(isset($keyword))
        <h2>検索結果</h2>
        @else
        @endif
    @foreach ($artists as $artist)
    <section class="profile">
        <div class="artist-body">
        <table>
                <tr style="display: flex;">
                    <thead style="flex: 1;">
                        <th>アーティスト名</th>
                    </thead>
                    <tr style="display: flex;">
                        <td style="flex: 1;"><a href="{{url('design/artist', $artist->id)}}">{{$artist->artist_name}}</a></td>
                    </tr>
                    <thead style="flex: 1;">
                        <th>障がいタイプ</th>
                    </thead>
                    <tr style="display: flex;">
                        <td style="flex: 1;">{{$artist->type}}</td>
                    </tr>
                    <thead style="flex: 1;">
                        <th>作品数</th>
                    </thead>
                    <tr style="display: flex;">
                        <td style="flex: 1;">{{$artist->design}}</td>
                    </tr>
                </tr>
            </table>

                <div class="my_image">
                    @if(isset($artist->image))
                    <img src="{{asset('storage/' . $artist->image)}}">
                    @else
                    <img src="{{asset('img/icon_man.png')}}">
                    @endif
                </div>
        </div>
    </section>

    @endforeach
    <div class="pagination">
        {{ $artists->links() }}
    </div>
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
