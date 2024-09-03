<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>プリペイド発行一覧</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/stripe.css') }}" rel="stylesheet">
</head>
<body>
<h1>プリペイド発行一覧</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>金額</th>
                <th>UUID</th>
                <th>発行日</th>
                <th>状態</th>
            </tr>
        </thead>
        <tbody>
            @foreach($codes as $code)
            <tr>
                <td>{{ $code->price }}</td>
                <td>{{ $code->uuid }}</td>
                <td>{{ $code->created_at }}</td>
                <td>
                    @if($code->valid == 0)
                        有効
                    @else
                        利用済み
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>