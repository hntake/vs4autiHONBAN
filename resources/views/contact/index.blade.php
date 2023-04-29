<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VS4視覚支援ツール</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" id="favicon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
    <!--         <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
 -->




</head>
<div class="contact">

    <form method="POST" action="{{ route('contact.confirm') }}">
        @csrf
        <ul>
            <li>
                <label>メールアドレス</label>
                <input name="email" value="{{ old('email') }}" type="text">
                @if ($errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
                @endif
            </li>
            <li>
                <label>タイトル</label>
                <input name="title" value="{{ old('title') }}" type="text">
                @if ($errors->has('title'))
                <p class="error-message">{{ $errors->first('title') }}</p>
                @endif
            </li>
            <li>
                <label>お問い合わせ内容</label><br>
                <textarea name="body" style="height: 200px; width:80%;">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                <p class="error-message">{{ $errors->first('body') }}</p>
                @endif
            </li>

            <button type="submit">
                入力内容確認
            </button>
    </form>
    </ul>
</div>

</html>