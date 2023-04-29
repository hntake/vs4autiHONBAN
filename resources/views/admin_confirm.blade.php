<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>年額プラン申込確認画面 ”VS4視覚支援ツール”</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">





</head>
<div class="contact">

    <form method="POST" action="{{ route('admin_send') }}">
        @csrf
        <ul>
            <li>
                <label>メールアドレス</label><br>
                {{ $inputs['email'] }}
                <input name="email" value="{{ $inputs['email'] }}" type="hidden">
            </li>
            <li>
                <label>お名前</label><br>
                {{ $inputs['name'] }}
                <input name="name" value="{{ $inputs['name'] }}" type="hidden">
            </li>
            <li>
                <label>電話番号</label><br>
                {{ $inputs['phone'] }}
                <input name="phone" value="{{ $inputs['phone'] }}" type="hidden">
            </li>
            <li>
                <label>ご質問内容</label><br>
                {!! nl2br(e($inputs['body'])) !!}
                <input name="body" value="{{ $inputs['body'] }}" type="hidden">
            </li>
        </ul>
        <button type="submit_button" name="action" value="back">
            入力内容修正
        </button>
        <button type="submit_button" name="action" value="submit">
            送信する
        </button>
    </form>
    <p>申込後24時間以内に支払い案内メールが送られます。</p>
    <div class="top">

        <a href="{{ url('/') }}">
            <h3>VS4トップページに戻る</h3>
        </a>
    </div>

</html>