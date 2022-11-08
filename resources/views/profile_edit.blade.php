@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/stripe.css') }}">
<title>プロフィール編集画面 自閉症支援ツール VS4Auti”</title>

@section('content')


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
                <li><a href="{{ url('list') }}">
                        <h3>保存リストへ</h3>
                    </a></li>
                <li><a href="{{ url('account') }}">
                        <h3>支払い情報</h3>
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
<div class="test">
    <form method="POST" action="{{route('update_profile')}}">
        @csrf
        @method('patch')
        <table class="table-hover">
            <thead>
                <tr>
                    <!-- <th style="width:20%">ユーザー名</th> -->
                    <th style="width:20%">メールアドレス</th>
                </tr>
            </thead>
            <tbody id="tbl">
                <!--  <td><input type="text" name="name" value="{{ $user->name}}" class="form-control"></td> -->
                <td><input type="text" name="email" value="{{ $user->email}}" class="form-control"></td>
            </tbody>
        </table>

        <div class="button"><input type="submit" value="更新">
            <p>更新ボタンを押さないと変更されません</p>
        </div>

</div>
@endsection
