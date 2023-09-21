@extends('layouts.app')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
@section('content')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}"> <!-- schedule.cssと連携 -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ボランティア団体 IT2U</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="thank">
                        <img src="{{asset('img/lost_ad.jpg')}}">
                    </div>
                    <p>
                        警察関係者様<br>
                        <br>
                        現在支援者は個人情報を危惧して機能を停止しております。<br>
                        ただ、<span style="font:bold;">警察関係者</span>のみ連絡を取れるように、専用パスコードを<span style="font:bold;">警察関係者</span>にのみ配布しております。
                        <br>
                        <span style="font:bold;">警察関係者</span>でパスコードをお持ちでない場合は、お手数ですが、当社までご連絡ください。折り返し担当部署に電話させて頂き確認後パスコードをお伝えいたします。
                        <br><br>
                        また、何かご不明点等ございましたら、以下のメールアドレスまでお気軽にお問い合わせください。私たちは迅速かつ丁寧に対応いたします。<br>

                    </p>
                  
                    <div class="it2u">
                        <h6>
                            ボランティア団体 IT2U
                            <br>
                            (アイティートゥーユー)
                            <br>
                            <a href="tel:07042250615">直通電話はこちら</a><br>
                            <a href="mailto:info@itcha50.com">メールはこちら</a>
                            <br>
                            <a href="{{ url('/') }}"> https://itcha50.com</a>
                        </h6>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
