@extends('layouts.app')
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VS4auti') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/schedule.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stripe.css') }}" rel="stylesheet">

</head>
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
              <li><a href="{{ url('list') }}"><h3>保存リストへ</h3></a></li>
              <li><a href="{{ url('account') }}"><h3>ユーザー情報</h3></a></li>
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
<body>
    <div class="portal">
        <form method="GET" action="{{route('profile_edit')}}">
                    <p>お客様利用開始日</p>
                  <span>  {{ $date}} </span><br>
                  <button class="btn btn-primary mb-3">登録情報の変更</button>
        </form>
    </div>
    <div class="cancel">
        <form method="POST" action="{{route('stripe.cancel', $user) }}">
                @csrf
                <p>キャンセルは必ずこちらからお願いいたします。</p>
                <p>キャンセルするとこれまで保存されていたデータは<span>全て削除されます</span>のでご注意ください！</p>
                <p>※解約を行う場合は、契約期間終了日の24時間以上前に、自動更新の解除をしてください。</p>
            <button class="btn btn-success mt-2">キャンセルする</button>
        </form>
    </div>
    <div class="portal">
                <p>お客様の請求情報はこちらで確認できます。支払い変更の際の、登録情報の変更もこちらでお願いいたします。</p>
               <a class="text" href="https://dashboard.stripe.com/settings/billing/portal" target="_blank" rel="noopener noreferrer">Stripeポータルサイトへ</a>
    </div>
    <div class="portal">
        <form action="{{ route('logout') }}" method="post">
        @csrf
        <input type="submit" value="ログアウト">
        </form>
    </div>


</body>
</html>
<script src="https://js.stripe.com/v3/"></script>

