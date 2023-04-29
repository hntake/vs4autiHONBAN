<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="webサービス会社llco そして、ITの力で助けたいボランティア団体IT2Uについて" name="description">

    <title>VS4視覚支援ツール about us</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" id="favicon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>

<body style="background-image: url(../img/grad.jpg); position: relative;">
    <div class="aboutus">
        <div class="">
            <h2>About us</h2>
            <h1>llco(エルエルコ)は<br>「生きることは学ぶこと」（Living=Learning）を<br>モットーにしています</h1>
            <p>長らく海外で暮らしていました</P>
            <p>英語の楽しさ・大切さを理解しているからこそ出来ることは何かを常に考えています</p>
            <p>そして、遅くにプログラミング学習に目覚めた経験から、学ぶことに年齢は関係ないと思っています。</p>
            <p>また、障がいとも長らく向き合ってきた経験も生かしたい</p>
            <h3>そんな会社です</h3>
            <p>お問い合わせは、下記の窓口までお願い致します。</p>
            <button class="button" style="margin-top:0px;"><a href="{{ route('contact.index') }}">Contact us</a></button><br>
            <p>llco他サービスはこちらから</p>
            <button class="button" style="margin-top:0px;" id="card-button"><a style="font-size: 1.0rem;" href=https://eng50cha.com>英単語強化サイトエーゴメ</a></button>
        </div>
    </div>
    <div class="top">
        <button class="button" id="card-button"><a style="font-size: 1.0rem;" href="{{ url('/') }}">トップページに<br>戻る</a></button>
    </div>
</body>
