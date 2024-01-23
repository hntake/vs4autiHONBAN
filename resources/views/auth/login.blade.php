@extends('layouts.app')
<link rel="icon" href="{{ asset('favicon2.ico') }}" id="favicon">
<title>ログイン画面 </title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font:bold; color:darkgray;">{{ __('ログインする login') }}</div>

                <div class="card-body">
                    @if(isset($design->id))
                    <form method="POST" action="{{ route('buyer_login',['id'=> $design->id]) }}">

                    @else
                    <form method="POST" action="{{ route('login') }}">
                    @endif
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div class="error">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <div class="error">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div>
                                <div class="form-check" style="margin-left:150px" ;>
                                    <input class="form-check-input" style="margin-left: -180px;" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('←ログイン状態を維持する Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 " style="margin-top:30px">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ログインする login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('パスワードを忘れましたか? forgot your password?') }}
                                </a>
                                @endif
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="register-button" style="margin-top:10px;border-radius:unset;padding-top:0px;padding-bottom:10px;">
                <p>登録して全ての機能を使おう！</p>
                <ul>
                    <li style="list-style: none;">
                        <a href="{{ route('register') }}" class="button">新規登録(無料プラン）Register</a>
                    </li>
                    <li style="list-style: none;">
                        <a href="{{ url('plan') }}" class="button">無料プランとは？About free plan</a>
                    </li>
                    <li style="list-style: none;">
                        <a href="{{ route('admin_form') }}" class="button">年額プラン500円を申し込む Apply subscribe</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
@endsection
