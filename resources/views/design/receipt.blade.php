<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>支払い完了</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/stripe.css') }}" rel="stylesheet">

</head>
<body>
<form method="GET" action="{{ route('design_download',['id'=> $email]) }}">
@csrf
    <p class="text-center mt-5"> 決済が完了しました！</p>
    <div class="text-center mt-5">
        <button type="submit_button" name="action" value="submit" >
                画像をダウンロードする
        </button>
    </div>
</form>
    <div class="lets_start">
        <p>
            <br>
        </p>
    </div>
</body>
</html>
