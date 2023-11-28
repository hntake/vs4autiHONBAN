<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="ボランティア団体IT2Uによるサイト。自閉症、知的障害、発達障害を持つ人の中には聴覚入力よりも視覚的サポートを利用することで、より良く理解できる傾向がある人がいます。VS4は視覚支援ツールをスマホで作れます。迷子対策のお守りバッジも販売中" name="description">
    <meta content="webサービス会社llco そして、ITの力で助けたいボランティア団体IT2Uについて" name="description">

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
                <img src="img/nagi.png" alt="Placeholder">
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
                <p>プログラマーとして他にも英語学習について活動をしています</p>
                <button class="button" style="margin-top:0px;" id="card-button"><a style="font-size: 1.0rem;" href=https://eng50cha.com>英単語強化サイトエイゴメ</a></button>
        </div>
       
       
    <div class="top">
        <button class="button" id="card-button"><a style="font-size: 1.0rem;" href="{{ url('/') }}">トップページに<br>戻る</a></button>
    </div>
</body>
