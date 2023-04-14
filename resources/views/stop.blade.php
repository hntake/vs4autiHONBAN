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
                        <img src="{{asset('img/lost_ad.png')}}">
                    </div>
                 <p>
                 拾われた方へ、

                この度は、私たちが提供する<a href="{{url('protect')}}">お守りバッジ</a>を拾っていただき、ありがとうございます。残念ながら、利用者が当バッジを紛失した為、現在はサービスが停止しております。

                可能であれば、拾われた方には最寄りの警察機関に届けていただけますよう、お願い申し上げます。ただし、警察機関への届け出が難しい場合や、適切な処分方法が分からない場合は、あなた様ののご判断により、適切な処分方法をお選びいただけますよう、お願いいたします。

                また、何かご不明点等ございましたら、以下のメールアドレスまでお気軽にお問い合わせください。私たちは迅速かつ丁寧に対応いたします。<br>


                 </p>
                    <div class="it2u">
                        <h6>
                            ボランティア団体 IT2U
                            <br>
                            (アイティートゥーユー)
                            <br>
                            <a href="mailto:info@itcha50.com">メールはこちらへ</a>
                            <br>
                            <a href="{{ url('/') }}"> https://wwww.itcha50.com</a>
                        </h6>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
