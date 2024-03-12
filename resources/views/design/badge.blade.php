<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/policy.css') }}"> <!-- word.cssと連携 -->
    <link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">

    <title>バッジ売り上げ報告</title>

</head>

<body>
    <div class="wrap">
        <form method="POST" action="{{ route('badge_post') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label>design_id</label>
        <input id="id" type="id" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id">
            <div class="button">
                <button type="submit">
                    <i class="fa fa-plus"></i> 売り上げ報告
                </button>
            </div>
        </form>
    </div>
</body>