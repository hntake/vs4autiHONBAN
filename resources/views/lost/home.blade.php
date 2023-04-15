@extends('layouts.app')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
@section('content')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}"> <!-- schedule.cssと連携 -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">お守りページ</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="thank">
                        <img src="{{asset('img/lost_ad.jpg')}}">
                    </div>
                    <form method="POST" action="{{ route('to_call',['id'=>$user->id,'to_call'=>$to_call])}}">
                        @csrf
                        <button class="c-button" type="submit">
                            <i class="fas fa-phone"></i>支援者に電話する</a>
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