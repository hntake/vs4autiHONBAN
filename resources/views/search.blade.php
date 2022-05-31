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
              <li><a href="{{ url('home') }}"><h3>ホーム画面に戻る</h3></a></li>
<!--               <li><a href="{{ url('list') }}"><h3>保存リストへ</h3></a></li>
 -->              <li><a href="{{ url('search') }}"><h3>リスト検索へ</h3></a></li>
<!--               <li><a href="{{ url('store') }}"><h3>画像一覧</h3></a></li>
 -->              <li><a href="{{ url('create') }}"><h3>新規作成</h3></a></li>
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
        <div class="container-fluid">
            <div class="row">

            <!--↓↓ 検索フォーム ↓↓-->
            <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
                <form class="form-inline" action="{{url('/result')}}" method="GET">
                    <div class="form-group">
                    <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="スケジュール名を入力してください">
                    </div>
                    <input type="submit" value="検索" class="btn btn-info">
                </form>
            </div>
            <!--↑↑ 検索フォーム ↑↑-->

            @if($schedules->count())

                <table class="result" border="1">
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->schedule_name}}</td>
                        <td style="width:20%"><a href="schedule/{{ $schedule->id }}" class="button">表示</a></td>
                    </tr>
                    @endforeach
                </table>

            @else
            <p>見つかりませんでした。</p>
            @endif


        </div>
    </div>
</div>
@endsection
