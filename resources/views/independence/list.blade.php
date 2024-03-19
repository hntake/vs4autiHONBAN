@extends('layouts.app')
<meta name="description" content="。自閉症、知的障害、発達障害を持つ人の中には聴覚入力よりも視覚的サポート(絵カード)を利用することで、より良く理解できる傾向がある人がいます。
自立支援視覚支援ツール（絵カード）をスマホで作れるアプリです。音声も入力できる、絵カードアプリを作成して利用して、視覚的サポートを体験しましょう。" >
<link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- schedule.cssと連携 -->
<title>自立支援保存リスト画面 VS4</title>

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
                <li><a href="{{ url('dashboard') }}">
                        <h3>保存リスト</h3>
                    </a></li>

                <li><a href="{{ url('hair/schedule') }}">
                        <h3 style="font-size: 1.50rem;">ヘアカット</h3>
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
                <li><a href="{{ url('independence/create') }}">
                        <h3>新規作成（自立支援）</h3>
                    </a></li>
                <li><a href="{{ url('account') }}">
                        <h3>支払い情報</h3>
                    </a></li>
            </ul>
            <div class="logout_buttom">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <!-- CSRF保護 -->
                    <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
                </form>
            </div>
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


    <div class="list-area">

        <h1>スケジュールリスト(自立支援)</h1>
        <div class="list">
            <!--  sort button
                    <form action="{{ route('sort') }}" method="GET">
                        @csrf
                        <select name="narabi">
                            <option value="asc">昇順</option>
                            <option value="desc">降順</option>
                        </select>
                        <div class="form-group">
                            <div class="button">
                                <input type="submit" value="並び替え">
                                <i class="fa fa-plus">並び替え</i>
                            </input>
                        </div>
                    </div>
                </form> -->

            <table class="result">
                <tbody id="tbl">
                    <!--スケジュール一覧 -->
                    @foreach ($schedules as $schedule)
                    <tr>
                        @if($schedule->public==0)
                        <td>{{ $schedule->schedule_name }}(個人用)</td>
                        @else
                        <td>{{ $schedule->schedule_name }}(一般公開)</td>
                        @endif
                        <td>
                            <div class="list_button"><a href="{{ route('independence_schedule',['id'=>$schedule->id]) }}">表示</a></div>
                        </td>
                        <td>
                            <div class="list_button"><a href="{{ route('independence_delete',['id'=> $schedule->id]) }}">削除</a></div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </tbody>
    </div>
    @endsection