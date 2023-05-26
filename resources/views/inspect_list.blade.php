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
発注表
    </div>
    <div class="store">
        <table class="design09" style="width:100%;">
            <tr>
                <th>事業所名</th>
                <th>発注日</th>
                <th>開始番号</th>
                <th>終了番号</th>
                <th>発注数</th>
            </tr>
            @foreach ($offices as $office)
                    <tr>
                        <td>{{ $office->name }}</td>
                    <td>{{ $office->created_at->format('Y/m/d') }}</td>
                    <td>{{ $office->start }}</td>
                    <td>{{ $office->end }}</td>
                    <td>{{ $office->count }}</td>
                    <td>
                        <div class="test_button">
                            <a href="{{ route('inspect_delete',['id'=> $office->id]) }}" >削除する</a>

                        </div>
                    </td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <a href="{{ url('inspect_complete') }}">
                    <h3>納入表へ</h3>
                </a>
</div>
@endsection
