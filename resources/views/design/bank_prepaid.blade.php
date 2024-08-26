{{-- ヘッダー部分の設定 --}}
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/stripe.css') }}"> <!-- schedule.cssと連携 -->
<title>支払い案内画面 </title>


@section('content')
<header id="header">
    <div class="wrapper">
        <div class="back">
            @auth
            <button class="button"><a href="{{ url('my_page') }}">マイページに戻る</a></button>
            @endauth
            <button class="button"><a href="{{ route('design_list') }}">障がい者アートトップページへ</a></button>
        </div>
    </div>
</header>

    <div class="card_container py-3">
        <div class="explain">
            <h2>振込先の口座番号などを記載したメールが届きますので、内容をご確認のうえお振り込みください。</h3>
        </div>
            <p>もし何かご心配な点がございましたら、遠慮なくお知らせください。当社のスタッフが丁寧に対応いたします。お客様のご満足を最優先に考え、より良いサービスを提供するために努めてまいります。何かお困りのことがございましたら、いつでもお気軽にご相談ください。</p>
            <button class="button" style="margin-top:0px;"><a href="{{ route('contact.index') }}">Contact us</a></button>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/9-2-1/js/9-2-1.js"></script>
<script src="{{asset('js/according.js')}}"></script>
