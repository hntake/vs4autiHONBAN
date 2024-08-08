<!DOCTYPE html>
<html>
<head>
    <title>Ships</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="my-4">Ships</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order Email</th>
                <th>Design ID</th>
                <th>Tel</th>
                <th>Postal</th>
                <th>Address</th>
                <th>注文受領メール発送</th>
                <th>発送依頼メール発送</th>
                <th>作品到着確認</th>
                <th>支払い確認</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ships as $ship)
                <tr>
                    <td>{{ $ship->id }}</td>
                    <td>{{ $ship->order_email }}</td>
                    <td>{{ $ship->design_id }}</td>
                    <td>{{ $ship->tel }}</td>
                    <td>{{ $ship->postal }}</td>
                    <td>{{ $ship->address }}</td>
                    <td>{{ $ship->order ? 'True' : 'False' }}</td>
                    <td>{{ $ship->ship ? 'True' : 'False' }}</td>
                    <td>{{ $ship->arrive ? 'True' : 'False' }}</td>
                    <td>{{ $ship->paid ? 'True' : 'False' }}</td>
                    <td>{{ $ship->created_at }}</td>
                    <td>{{ $ship->updated_at }}</td>
                    <td>
                        <form method="POST" action="{{ route('ship_paid',['id'=>$ship->id]) }}">
                            @csrf
                            <input type="hidden" name="ship_id" value="{{ $ship->id }}">
                            <button type="submit" name="action" value="submit">
                                振込確認
                            </button>
                        </form>
                        @if($ship->paid==1)
                        <form method="POST" action="{{ route('ship_shipped',['id'=>$ship->id]) }}" style="margin-top: 5px;">
                            @csrf
                            <input type="hidden" name="ship_id" value="{{ $ship->id }}">
                            <button type="submit" name="action" value="submit">
                                発送確認
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>