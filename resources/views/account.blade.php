@extends('layouts.app')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IT2U視覚支援ツール</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>支払い情報 IT2U</title>
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
                <li><a href="{{ url('/') }}">
                        <h3>トップページに戻る</h3>
                    </a></li>
                <li><a href="{{ url('dashboard') }}">
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

<body>
    <div class="portal">
        <form method="GET" action="{{route('profile_edit')}}">

            @if($trial < $now) <div>
                <p>お客様利用開始日</p>
                <span> {{ $date}} </span><br>
    </div>
    @else
    <div>
        <p>無料トライアル終了日</p>
        <span> {{ $trial}} </span><br>
    </div>
    <button class="btn btn-primary mb-3">登録情報の変更</button>
    @endif
    </form>
    </div>
    <script>
        function confirm_test() { // 問い合わせるボタンをクリックした場合
            document.getElementById('popup').style.display = 'block';
            return false;
        }

        function okfunc() { // OKをクリックした場合
            document.contactform.submit();
        }

        function nofunc() { // キャンセルをクリックした場合
            document.getElementById('popup').style.display = 'none';
        }
    </script>
    <div class="cancel">
        <form method="POST" name="contactform" action="{{route('stripe.cancel', $user) }}">
            @csrf
            <p>キャンセルは必ずこちらからお願いいたします。</p>
            <p>キャンセルするとこれまで保存されていたデータは<span>全て削除されます</span>のでご注意ください！</p>
            <p>※解約を行う場合は、契約期間終了日の24時間以上前に、自動更新の解除をしてください。</p>
            <!--             <button class="btn btn-success mt-2" id="mybtn">キャンセルする</button>
--> <input type="submit" value='キャンセルする' class='btn btn-success mt-2' onClick="return confirm_test()">
        </form>
        <div id="popup" style="width: 200px;display: none;padding: 30px 20px;border: 2px solid #000;margin: auto;background-color:aliceblue;">
            本当にキャンセルしますか？<br />
            <button id="ok" onclick="okfunc()">OK</button>
            <button id="no" onclick="nofunc()">キャンセル</button>
        </div>

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