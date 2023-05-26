@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- products.cssと連携 -->
@section('content')
<title>取扱店登録画面</title>
<div class="header-logo-menu">
    <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
            <ul>
                <li><a href="{{ url('/') }}">
                        <h3>ホーム画面に戻る</h3>
                    </a></li>
                <li><a href="{{ url('dashboard') }}">
                        <h3>保存リストへ</h3>
                    </a></li>
                <li><a href="{{ url('search') }}">
                        <h3>リスト検索へ</h3>
                    </a></li>
                <li><a href="{{ url('store') }}">
                        <h3>画像保存＆一覧</h3>
                    </a></li>
                <li><a href="{{ url('create') }}">
                        <h3>新規作成</h3>
                    </a></li>
            </ul>
        </div>
        <script>
            $(function() {
                $('#nav-content li a').on('click', function(event) {
                    $('#nav-input').prop('checked', false);
                });
            });
        </script>
    </div>
</div>
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')


    <h1>購入先登録</h1>

    <!--入力エリア-->
    <div class="store">
        <form action="{{ route('shop_post') }}" method="post">
            {{ csrf_field() }}
            <div class='form-group'>
                <label for="name" class="col-md-4 col-form-label text-md-right">名前 ※必須</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="r-box">
                <label for="area" class="col-md-4 col-form-label text-md-end">{{ __('エリア') }}</label>

                <div class="col-md-6">
                    <select name="area">
                        @foreach(config('japan') as $key => $value)
                        <option value="{{ $value}}" {{ old('area') === $value ? "selected" : ""}}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="r-box">
                <label for="place" class="col-md-4 col-form-label text-md-end">{{ __('県') }}</label>

                <div class="col-md-6">
                    <select name="place">
                        @foreach(config('pref') as $key => $value)
                        <option value="{{ $value}}" {{ old('place') === $value ? "selected" : ""}}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tel" class="col-md-4 col-form-label text-md-right">tel </label>


                <div class="col-md-6">
                    <input id="tel" type="text" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}">

                    @if ($errors->has('tel'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tel') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">email</label>


                <div class="col-md-6">
                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
    </div>
    <div class="form-group">
        <div class="button">
            <button type="submit">
                <i class="fa fa-plus"></i> 保存する
            </button>
        </div>
    </div>
    </form>
</div>
</div>
@endsection
