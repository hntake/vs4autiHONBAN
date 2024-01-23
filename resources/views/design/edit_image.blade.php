<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>障がい者アーティストページ｜プロフィール画像編集ページ</title>
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
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
     crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <h1>障がい者アーティストページ｜プロフィール画像編集ページ</h1>
    </header>

    <div class="my_image">
            プロフィール画像
            @if(isset($image))
            <img src="{{asset('storage/' . $image)}}">
            @else
            <img src="{{asset('img/icon_man.png')}}">
            @endif
    </div>
    <form method="POST" action="{{ route('update_image') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="image" id="image" class="form-control">
                <div class="create-button">
                    <div class="button">
                        <button type="submit">
                            <i class="fa fa-plus"></i> 送信する
                        </button>
                    </div>
                </div>
    </form>
                <button style="width:40%;"><a href="{{ url('/design/my_sheet') }}">プロフィール画像登録・変更をやめる</a></button>
   
</body>