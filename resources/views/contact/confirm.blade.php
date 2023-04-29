<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VS4視覚支援ツール お問い合わせページ</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">





</head>
<div class="contact">

    <form method="POST" action="{{ route('contact.send') }}">
        @csrf
        <ul>
            <li>
                <label style="font-weight:bold;">メールアドレス</label><br>
                {{ $inputs['email'] }}
                <input name="email" value="{{ $inputs['email'] }}" type="hidden">
            </li>
            <li>
                <label style="font-weight:bold;">タイトル</label><br>
                {{ $inputs['title'] }}
                <input name="title" value="{{ $inputs['title'] }}" type="hidden">
            </li>
            <li>
                <label style="font-weight:bold;">お問い合わせ内容</label><br>
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

</html>
