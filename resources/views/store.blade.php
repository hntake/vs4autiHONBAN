@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- products.cssと連携 -->
@section('content')

<div class="header-logo-menu">
  <div id="nav-drawer">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input"><span></span></label>
      <label class="nav-unshown" id="nav-close" for="nav-input"></label>
      <div id="nav-content">
          <ul>
              <li><a href="{{ url('home') }}"><h3>ホーム画面に戻る</h3></a></li>
              <li><a href="{{ url('list') }}"><h3>保存リストへ</h3></a></li>
              <li><a href="{{ url('search') }}"><h3>リスト検索へ</h3></a></li>
              <li><a href="{{ url('store') }}"><h3>画像保存＆一覧</h3></a></li>
              <li><a href="{{ url('create') }}"><h3>新規作成</h3></a></li>
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


<h1>画像を保存する</h1>
  <h4>※画像をクリックしたら削除画面に飛びます</h4>
    <div class="store-list">
        @foreach($images as $image)
        <tr>
            <td><a href="{{ route('select_picture', $image->id) }}"><img src="{{ asset('storage/' . $image->image) }}" alt="image" style="width: 100px; height: auto;"/></a><td>
        </tr>
        @endforeach
    </div>
    <!--写真アップロード入力エリア-->
    <div class="store">
        <form action="{{ url('store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class='form-group'>
                <div class="col-sm-6">
                    <input type="file" name="image" id="image" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="button">
                    <button type="submit" >
                        <i class="fa fa-plus"></i> 保存する
                    </button>
                </div>
           </div>
        </form>
    </div>
</div>
@endsection
