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
<form action="{{route('bank_submit',['id'=> $design->id])}}" method="post" id="payment-form">
        @csrf
    <div class="card_container py-3">
        <div class="explain">
            <div class="month">
                <section style="display:flex;">

                    <div class="pay_box">
                    <p>【振込先】</p>
                        <p>振込口座名 llco 竹内 貴代</p>
                        <p>銀行名 楽天銀行</p>
                        <p>支店名 ポルカ</p>
                        <p>口座種類 普通</p>
                        <p>口座番号 5014182</p>
                        <p>（恐れ入りますが振込手数料はお客様の負担でお願いいたします）</p>
                        <p>振込金額{{$download->price}}円</p>
                    </div>

                </section>
            </div>
            <h4>ダウンロード作品：支払い確認後、ダウンロードページが登録メールアドレスへメールされます。</h4>
            <h4>現物販売作品：支払い確認後、２週間以内に発送されます</h4>
            <p>もし何かご心配な点がございましたら、遠慮なくお知らせください。当社のスタッフが丁寧に対応いたします。お客様のご満足を最優先に考え、より良いサービスを提供するために努めてまいります。何かお困りのことがございましたら、いつでもお気軽にご相談ください。</p>
            <button class="button" style="margin-top:0px;"><a href="{{ route('contact.index') }}">Contact us</a></button>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/9-2-1/js/9-2-1.js"></script>
<script src="{{asset('js/according.js')}}"></script>
