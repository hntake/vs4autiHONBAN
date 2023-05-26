@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- products.cssと連携 -->
@section('content')
<title>検品表作成ページ</title>
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


    <div class="store-list">

    </div>
    <div class="store">
        <form action="{{ url('inspect_create') }}" method="post" >
            {{ csrf_field() }}

            <div class='form-group'>
                <div class="col-sm-6">
                    name
                    <input type="text" name="name" id="name">
                </div>
            </div>
            <div class='form-group'>
                <div class="col-sm-6">
                    from
                    <input type="text" name="start" id="start">
                </div>
            </div>
            <div class='form-group'>
                <div class="col-sm-6">
                    to
                    <input type="text" name="end" id="end">
                </div>
            </div>
            <div class="form-group">
                <div class="button">
                    <button type="submit">
                        <i class="fa fa-plus"></i> 送信する
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
