@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- schedule.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- schedule.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/independence.css') }}"> <!-- schedule.cssと連携 -->
<title>自立支援一般公開リスト画面 VS4</title>


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


    <div class="dashboard-area">

        <h3>スケジュールリスト(自立支援)</h3>

        <div class="box">
            <table class="result">
                <tbody id="tbl">
                    <!--スケジュール一覧 -->
                    @foreach ($schedules as $schedule)
                    <form method="POST" action="{{route('pv',['id'=> $schedule->id])}}" >
                     @csrf
                    <tr>
                        <td><img src="{{asset('storage/' . $schedule->image1)}}" alt="image" name="area1"></td>
                          <input type="submit" value="{{ $schedule->schedule_name }}">

                    </tr>
                </form>
                @endforeach
                </tbody>
            </table>
        </div>
        </tbody>
    </div>
    @endsection
