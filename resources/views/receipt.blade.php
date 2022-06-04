<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stripeテスト - 完了</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/stripe.css') }}" rel="stylesheet">
</head>
<body>
    <p class="text-center mt-5">決済が完了しました！</p>

    <div class="lets_start">
        <p>
            利用はこちらから<br>
            <a href="{{ url('create') }}"class="btn btn-success mt-2">新しいスケジュールを作成する</a>
        </p>
    </div>
    <div class="portal">
        <p>お客様の請求情報はこちらで確認できます</p>
        <form action="{{route('stripe.portalsubscription', $user) }}">
            <button class="btn btn-primary mb-3">Stripeポータルサイト</button>
        </form>
    </div>
    <div class="cancel">
        <form method="POST" action="{{route('stripe.cancel', $user) }}">
            @csrf
            <p>キャンセルはこちらから</p>
            <button class="btn btn-success mt-2">キャンセルする</button>
        </form>
    </div>
</body>
</html>
