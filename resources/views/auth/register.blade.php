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
                            ※申込サービスを選択してください Choose your type<br><br>
                            <label for="type" style="margin-bottom: 10px; background-color:#87CEFA ;padding: 0 20px;">
                                絵スケジュール Visual Schedule<input id="type" type="radio" name="type" value="0" required><br>
                            </label>
                            <label for="type" style="margin-bottom: 10px; background-color:#87CEFA ;padding: 0 20px;">
                                お守りバッジ may_protect<input id="type" type="radio" name="type" value="1"><br>
                            </label>
                            <label for="type" style="margin-bottom: 10px; background-color:#87CEFA ;padding: 0 20px;">
                                マイリク my_request<input id="type" type="radio" name="type" value="2"><br>
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
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード password ※必須 8桁以上 required  at least 8 characters ') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('パスワードの確認入力 confirm password ※必須 required') }}</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="margin-top:30px">
                                    {{ __('登録する Register') }}
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

