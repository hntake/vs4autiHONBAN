{{-- ヘッダー部分の設定 --}}
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/stripe.css') }}"> <!-- schedule.cssと連携 -->
<title>支払い案内画面 VS4”</title>


@section('content')
<header id="header">
    <div class="wrapper">
        <div class="back">
            <button class="button"><a href="{{ url('my_page') }}">マイページに戻る</a></button>
        </div>
    </div>
</header>
<div class="card_container py-3">
    <h3 class="mb-3">支払い方法</h3>
    <div class="explain">
        <p style="margin-bottom:0;">以下から支払い方法を選んでください。</p><br>
        <div class="month">
          <a href="https://buy.stripe.com/8wM4hv9EpduMaE8007" style="background-color:none;"> 1.クレジットカード、ApplePay、GooglePay</a>
        </div>
        <div class="month">
          <a href="{{ route('admin_form') }}" style="background-color:none;"> 2.paypay（利用申請中の為、現在はまだ利用できません）</a>
        </div>
        <div class="month">
            <section style="display:flex;">

            <h2 class="title">3.振込</h2>
            <div class="box">
                <p>【振込先】</p>
                <p>振込口座名 竹内貴代</p>
                <p>銀行名 ゆうちょ銀行</p>
                <p>支店名 五三八</p>
                <p>口座種類 普通</p>
                <p>口座番号 1569554</p>
                <p>（恐れ入りますが振込手数料はお客様の負担でお願いいたします）</p>
            </div>

            </section>
        </div>
        <h4>支払い確認後、２週間以内に発送されます</h4>
        <p>もし何かご心配な点がございましたら、遠慮なくお知らせください。当社のスタッフが丁寧に対応いたします。お客様のご満足を最優先に考え、より良いサービスを提供するために努めてまいります。何かお困りのことがございましたら、いつでもお気軽にご相談ください。</p>
            <button class="button" style="margin-top:0px;"><a href="{{ route('contact.index') }}">Contact us</a></button>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/9-2-1/js/9-2-1.js"></script>
    <script src="{{asset('js/according.js')}}"></script>
