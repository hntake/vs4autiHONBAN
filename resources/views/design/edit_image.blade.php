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
    <link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/design.css') }}">
    <link rel="stylesheet" href="{{ asset('css/artist.css') }}">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
     crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <h1>障がい者アーティスト <br>プロフィール画像編集ページ</h1>
    </header>
    <section class="profile">
        <div class="my_image">
                @if(isset($image))
                <img src="{{asset('storage/' . $image)}}">
                @else
                <img src="{{asset('img/icon_man.png')}}">
                @endif
        </div>
    </section>
    <section>
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
        <button><a href="{{ url('/design/my_sheet') }}">プロフィール画像登録・変更をやめる</a></button>
    </section>
</body>