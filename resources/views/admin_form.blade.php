<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>年額プラン申込画面 ”VS4視覚支援ツール”</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">





</head>
<div class="contact">
    <h2>申し込み</h2>
    <form method="POST" action="{{ route('admin_confirm') }}">
        @csrf
        <ul>
            <li class="year">
                <label>メールアドレス</label>
                <input name="email" value="{{ old('email') }}" type="text">
                @if ($errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
                @endif
            </li>
            <li class="year">
                <label>お名前</label>
                <input name="name" value="{{ old('name') }}" type="text">
                @if ($errors->has('name'))
                <p class="error-message">{{ $errors->first('name') }}</p>
                @endif
            </li>
            <li class="year">
                <label>電話番号</label>
                <input name="phone" value="{{ old('phone') }}" type="text">
                @if ($errors->has('phone'))
                <p class="error-message">{{ $errors->first('phone') }}</p>
                @endif
            </li>
            <li class="year">
                <label>ご質問等あれば</label><br>
                <textarea name="body" style="height: 200px; width:80%;">{{ old('body') }}</textarea>
            </li>

            <button type="submit">
                入力内容確認
            </button>
    </form>
    </ul>
    <p>申込後24時間以内に支払い案内メールが送られます。</p>
</div>
<div class="button">

    <a href="{{ url('/') }}">VS4トップページに戻る</a>
</div>

</html>