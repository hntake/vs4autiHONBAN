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
              <li><a href="{{ url('list') }}"><h3>保存リストへ</h3></a></li>
<!--               <li><a href="{{ url('search') }}"><h3>リスト検索へ</h3></a></li>
 --><!--               <li><a href="{{ url('store') }}"><h3>画像一覧</h3></a></li>
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


  <h1>新規スケジュール作成</h1>
     <form action="{{ url('create') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class='form-group'>
                    <div class="schedule">
                        <input type="text" name="schedule_name" id="schedule_name" class="form-control" size="15" placeholder="スケジュール名を入力">
                    </div>

                    <div class='form-group'>
                        <div class="col-sm-6">
                            <input type="file" name="image0" id="image" class="form-control">
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="col-sm-6">
                            <input type="file" name="image1" id="image" class="form-control">
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="col-sm-6">
                            <input type="file" name="image2" id="image" class="form-control">
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="col-sm-6">
                            <input type="file" name="image3" id="image" class="form-control">
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="col-sm-6">
                            <input type="file" name="image4" id="image" class="form-control">
                        </div>
                    </div>


            </div>
            <div class="form-group">
                    <div class="button">
                        <button type="submit" >
                            <i class="fa fa-plus"></i> 作成する
                        </button>
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
