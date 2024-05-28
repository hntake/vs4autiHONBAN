<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="障がいのある家族を持ったプログラマーによる、ボランティア団体IT2Uについて。お問い合わせはお気軽にどうぞ! Xアカウントも是非フォローしてください!!" name="description">
    <meta content="IT2U,webサービス会社llco,障がいサポート,自閉症,発達障害" name="keywords">

    <title>IT2U about us</title>

    <link rel="icon" href="{{ asset('favicon2.ico') }}" id="favicon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aboutus.css') }}" rel="stylesheet">

</head>

<body >
        <!-- <div class="banner">
            <a target="_blank" href=https://play.google.com/store/apps/details?id=com.llco.hair_cut><img src="img/hair_banner.png" alt="banner" ></a>
            <a target="_blank" href=https://play.google.com/store/apps/details?id=com.may_protect><img src="img/protect_banner.png" alt="banner" ></a>
            <a target="_blank" href=https://play.google.com/store/apps/details?id=com.llco.my_request><img src="img/request_banner.png" alt="banner" ></a>
            <a target="_blank" href=https://eng50cha.com><img src="img/banner_eng_sm.png" alt="banner" ></a>
        </div> -->
        <div class="video-box overlay">
                <video class="pc"src="img/nagi_movie.mp4" autoplay loop muted playsinline></video>
                <video class="sp" src="img/nagi_small.mp4" autoplay loop muted playsinline></video>
                <!-- <img src="img/nagi.png" alt="Placeholder"> -->
                </video>
        </div>
        <div class="aboutus">
                <h2>About us</h2>
                <h1>IT2U</h1>
                <h2>ITの力で、<br>
                障がいを持つあなたを
                <br>障がいを持つ人を支えるあなたをサポートしたい</h2>
                <p>障がいと長らく向き合ってきた経験を生かしたい</p>
                <h3>そんな思いから始めた活動をしています。</h3>

                <p>お問い合わせは、下記の窓口までお願い致します。</p>
                <button class="button" style="margin-top:0px;"><a href="{{ route('contact.index') }}">Contact us</a></button><br>
                <p>他にも英語学習や選挙啓発について活動をしています</p>
                <button class="button" style="margin-top:0px;" id="card-button"><a style="font-size: 1.0rem;" href=https://eng50cha.com>英単語強化サイトエイゴメ</a></button>
                <br>
                <button class="button" style="margin-top:0px;" id="card-button"><a style="font-size: 1.0rem;" href=https://eng50cha.com/diet/vote>選挙に行こう！ 不祥事議員を避け、清廉な議員を選ぶための情報サイト </a></button>

        </div>
        <div class="twitter">
            <a href="https://twitter.com//LLco1118"> <img src="img/x_follow.png" alt="x"></a>
        </div>
    <div class="top">
        <button class="button" id="card-button"><a style="font-size: 1.0rem;" href="{{ url('/') }}">トップページに<br>戻る</a></button>
    </div>
</body>
