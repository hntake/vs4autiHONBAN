@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/inspect.css') }}"> <!-- products.cssと連携 -->
@section('content')
<title>発注先リストページ</title>
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
納入表
    </div>
    <div class="store">
        <table class="design09" style="width:100%;">
            <tr>
                <th>商品番号</th>
                <th>事業所名</th>
            </tr>
            @foreach ($losts as $lost)
                    <tr>
                        <td>{{ $lost->id }}</td>
                        <td>{{ $lost->office }}</td>

                    </tr>
                    @endforeach
            </table>
    </div>
    <a href="{{ url('inspect_list') }}">
                    <h3>発注表へ</h3>
                </a>
</div>
@endsection
