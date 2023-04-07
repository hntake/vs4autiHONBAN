@extends('layouts.app')
<title>仮登録画面 VS4</title>

@section('content')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<div class="top">
    <a href="{{ url('/') }}">
        <h3>トップページに戻る</h3>
    </a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- フラッシュメッセージ -->
            @if (session('flash_message'))
            <div class="flash_message">
                {{ session('flash_message') }}
            </div>
            @endif
            <div class="card-header">{{ __('仮登録画面') }}</div>
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register.pre_check') }}" enctype="multipart/form-data">
                        @csrf

                        <!--      <div >
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('名前 ※必須') }}</label>

                            <div >
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->






                        <div class="r-box">
                        ※申込サービスを選択してください<br><br>
                            <label for="type">
                                絵スケジュール<input id="type" type="radio" name="type" value="0" ><br>
                            </label>
                            <label for="type">
                                見守りグッズ<input id="type" type="radio" name="type" value="1"><br>
                            </label>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="r-box">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address ※必須') }}</label>

                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="r-box">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード ※必須 8桁以上') }}</label>

                            <div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="r-box">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('パスワードの確認入力 ※必須') }}</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="margin-top:30px">
                                    {{ __('登録する') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <p>
                        <a href="https://www.freepik.com/free-vector/mixed-emoji-set_4159931.htm#query=smile&position=14&from_view=search&track=sph">Image by rawpixel.com</a> on Freepik
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<div class="line-it-button" data-lang="ja" data-type="share-a" data-env="REAL" data-url="https://eng50cha.com/register" data-color="default" data-size="small" data-count="false" data-ver="3" style="display: none;"></div>
<script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="英単語強化サイト・エーゴメ登録無料！" data-show-count="false">Tweet</a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
