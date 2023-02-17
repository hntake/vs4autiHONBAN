@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- schedule.cssと連携 -->
<link rel="icon" href="{{ asset('favicon.ico') }}" id="favicon">

<title>新規作成画面 "VS4”</title>
@section('content')
<!--ハンバーガーメニュー-->
<div class="header-logo-menu">
    <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
            <ul>
                <li><a href="{{ url('/') }}">
                        <h3>トップページに戻る</h3>
                    </a></li>
                <li><a href="{{ url('list') }}">
                        <h3>保存リスト</h3>
                    </a></li>
                <li><a href="{{ url('dentist/list') }}">
                        <h3>保存リスト（歯科）</h3>
                    </a></li>
                    <li><a href="{{ url('medical/list') }}">
                        <h3>保存リスト（医療）</h3>
                    </a></li>
                <li><a href="{{ url('list_sort') }}">
                        <h3 style="font-size: 1.50rem;">保存リスト（イラスト）</h3>
                    </a></li>
                <li><a href="{{ url('create') }}">
                        <h3>新規作成</h3>
                    </a></li>
                <li><a href="{{ url('dentist/create') }}">
                        <h3>新規作成（歯科）</h3>
                    </a></li>
                    <li><a href="{{ url('medical/create') }}">
                        <h3>新規作成（医療）</h3>
                    </a></li>
                <li><a href="{{ url('create_sort') }}">
                        <h3>新規作成（イラスト）</h3>
                    </a></li>
                <li><a href="{{ url('account') }}">
                        <h3>支払い情報</h3>
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

<!-- 新規スケジュール作成パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')


    <h1>新規スケジュール作成</h1>
    <p>画像は最低でも2枚以上は選んでください</p>
    <p>画像のサイズは可能なら<span style="color:red;"> 小サイズ</span>を選択してください。</p>
    <h6>※画像は暗号化されて保存されるので、ログインしたユーザーのみしか写真を見ることはできません</h6>
    <form action="{{ url('create') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class='create-group'>
            <div class="create_schedule">
                <input type="text" name="schedule_name" id="schedule_name" class="form-control" size="15" placeholder="スケジュール名を入力">
            </div>

            <div class='create'>
                <input type="file" name="image0" id="image" class="form-control">
            </div>
            <div class='create'>
                <input type="file" name="image1" id="image" class="form-control">
            </div>
            <div class='create'>
                <input type="file" name="image2" id="image" class="form-control">
            </div>
            <div class='create'>
                <input type="file" name="image3" id="image" class="form-control">
            </div>
            <div class='create'>
                <input type="file" name="image4" id="image" class="form-control">
            </div>


            <div class="create-button">
                <div class="button">
                    <button type="submit">
                        <i class="fa fa-plus"></i> 作成する
                    </button>
                </div>
            </div>
            <!--    @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif -->
        </div>
    </form>

</div>
@endsection
