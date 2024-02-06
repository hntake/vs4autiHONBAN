{{-- ヘッダー部分の設定 --}}
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/stripe.css') }}"> <!-- schedule.cssと連携 -->
<title>ダウンロード失敗画面 </title>


@section('content')
<header id="header">
    <div class="wrapper">
        <div class="back">
            <button class="button"><a href="{{ url('/design/list') }}">トップページに戻る</a></button>
        </div>
    </div>
</header>

    <div>
        ダウンロードエラーです。
    </div>
    @auth
        <p>ご利用環境などが原因でダウンロードができない場合は、<a href="{{route('my_page')}}">マイページ</a>にて購入から３ヶ月以内のものは再度ダウンロードが出来ますので、お手数ですが再度ダウンロードをお試し下さい</p>
    @else
        <p>ご利用環境などが原因でダウンロードができない場合は、ダウンロードした際に利用したメールアドレスを使って、<a href="{{url('contact')}}">こちら</a>までお問いお合わせ下さい。</p>
    @endauth
