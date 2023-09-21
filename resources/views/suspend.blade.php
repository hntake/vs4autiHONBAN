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
                        ご協力ありがとうございます。<br>
                        <br>
                        現在支援者は機能を停止しており、支援者へ直接電話をつなぐことが出来ません。<br>
                        <br>
                        貴方様が今、支援が必要と感じられたなら、お手数ですが110番して頂けると支援者も助かると思います。<br>
                        <br>
                        また、何かご不明点等ございましたら、以下のメールアドレスまでお気軽にお問い合わせください。私たちは迅速かつ丁寧に対応いたします。<br>


                    </p>
                    <form method="GET" action="{{ route('verify_index',['id'=>$user->id,'to_call'=>$to_call])}}">
                        @csrf
                        <button class="c-button" type="submit">
                            <i class="fas fa-phone"></i>警察専用</a>
                        </button>
                    </form>
                    <div class="it2u">
                        <h6>
                            ボランティア団体 IT2U
                            <br>
                            (アイティートゥーユー)
                            <br>
                            <a href="mailto:info@itcha50.com">メールはこちらへ</a>
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
