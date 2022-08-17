@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- schedule.cssと連携 -->
@section('content')

<!--ハンバーガーメニュー-->
<div class="header-logo-menu">
  <div id="nav-drawer">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input"><span></span></label>
      <label class="nav-unshown" id="nav-close" for="nav-input"></label>
      <div id="nav-content">
      <ul>
          <li><a href="{{ url('/') }}"><h3>トップページに戻る</h3></a></li>
              <li><a href="{{ url('list') }}"><h3>保存リスト</h3></a></li>
              <li><a href="{{ url('dentist/list') }}"><h3>保存リスト（歯科）</h3></a></li>
              <li><a href="{{ url('account') }}"><h3>ユーザー情報</h3></a></li>
             <li><a href="{{ url('create') }}"><h3>新規作成</h3></a></li>
             <li><a href="{{ url('dentist/create') }}"><h3>新規作成（歯科）</h3></a></li>
          </ul>
          <div class="logout_buttom">
                <form action="{{ route('logout') }}" method="post">
                    @csrf <!-- CSRF保護 -->
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

                <h1>スケジュールリスト</h1>
                <div class="list">
                    <!--sort button-->
                    <form action="{{ route('sort') }}" method="GET">
                        @csrf
                        <select name="narabi">
                            <option value="asc">昇順</option>
                            <option value="desc">降順</option>
                        </select>
                        <div class="form-group">
                            <div class="button">
                                <input type="submit" value="並び替え">
                               <!--  <i class="fa fa-plus">並び替え</i> -->
                            </input>
                        </div>
                    </div>
                </form>

                <table class="result">
                    <tbody id="tbl">
                            <!--スケジュール一覧 -->
                                    @foreach ($schedules as $schedule)
                                        <tr >
                                            <td >{{ $schedule->schedule_name }}</td>
                                            <td ><div  class="button"><a href="{{ route('schedule',['id'=>$schedule->id]) }}">表示</a></div></td>
<!--                                             <td ><div  class="button"><a href="{{ route('delete_list',['id'=> $schedule->id]) }}" >削除</a></div></td>
 -->
                                        </tr>
                                    @endforeach
                        </tbody>
                    </table>
                </div>
            </tbody>
        </div>
@endsection
