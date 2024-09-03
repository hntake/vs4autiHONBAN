<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>プリペイド登録完了</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/stripe.css') }}" rel="stylesheet">

</head>
<body>

    <p class="text-center mt-5"> 残高が更新されました！</p>
    <div class="text-center mt-5">
        <h4>残高:{{$buyer->balance}}円</h4>
        <a href="{{ route('my_page') }}">マイページへ</a>
        <a href="{{ route('index_cart') }}">マイカートへ</a>
        <button onclick="goBack()">前のページに戻る</button>
    </div>
    <script>
    function goBack() {
        window.history.back();
    }
    </script>
</body>
</html>
