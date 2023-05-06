@extends('layouts.app')
<title>お守りバッジカスタムデザインリスト</title>
@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- products.cssと連携 -->

<div class="header-logo-menu">
  <div id="nav-drawer">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input"><span></span></label>
      <label class="nav-unshown" id="nav-close" for="nav-input"></label>
      <div id="nav-content">
          <ul>
              <li><a href="{{ url('home') }}"><h3>ホーム画面に戻る</h3></a></li>
              <li><a href="{{ url('dashboard') }}"><h3>保存リストへ</h3></a></li>
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


<h1>カスタムデザイン一覧</h1>
    <div class="store-list">
        @foreach($designs as $design)
        <table>
            <tr>
                <td>{{ $design->id }}</td>
                <td>{{ $design->email }}</td>
                <td><img src="{{ asset('storage/' . $design->image) }}" alt="image" style="width: 100px; height: auto;"/></a><td>
            </tr>
            @endforeach
        </table>
        {{ $designs->links() }}
    </div>
</div>
@endsection
