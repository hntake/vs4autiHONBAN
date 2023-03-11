@extends('layouts.app')
<title>自立支援一般公開リスト画面 VS4</title>
@section('content')
<link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- schedule.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- schedule.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/independence.css') }}"> <!-- schedule.cssと連携 -->


<!--ハンバーガーメニュー-->
<div class="header-logo-menu">
    <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
            <ul class="ham">
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
<div class="container">

    <div class="panel-body">
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')


        <div class="dashboard-area">

            <h4>スケジュールリスト(自立支援)</h4>

            <div class="box">
                <table class="result">
                    <tbody id="tbl">
                        <!--スケジュール一覧 -->
                        @foreach ($schedules as $schedule)
                        <form method="POST" action="{{route('pv',['id'=> $schedule->id])}}">
                            @csrf
                            <tr>
                                <td><img src="{{asset('storage/' . $schedule->image1)}}" alt="image" name="area1"></td>
                                <td>
                                スケジュール名<input class="sk_name" type="submit" value="{{ $schedule->schedule_name }}">
                                </td>
                                <td>利用回数<span style="font-weight:bold;"> {{$schedule->count}}</span>回</td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </tbody>
        </div>
    </div>
    <div class="register-button" style="margin-top:10px;border-radius:unset;padding-top:0px;padding-bottom:10px;">
                    <h4>登録して<br>自分でも作ってみよう！</h4>
                    <ul>
                        <li style="list-style: none;">
                            <a href="{{ route('register') }}" class="button">登録はこちら！（無料です）</a>
                        </li>
                    </ul>
    </div>
</div>
    @endsection
