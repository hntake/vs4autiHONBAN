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
                <th>振込確認</th>
                <th >ID</th>
                <th>Order Email</th>
                <th>Design ID</th>
                <th>Tel</th>
                <th>Postal</th>
                <th>Address</th>
                <th>発送依頼メール発送</th>
                <th>業者</th>
                <th>受付番号</th>
                <th>発送済み通知メール発送</th>
                <th>作品到着確認</th>
                <th>支払い確認</th>
                <th>支払い・発送期限</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ships as $ship)
                <tr>
                    <td>
                        @if($ship->paid==0)
                        <form method="POST" action="{{ route('ship_paid',['id'=>$ship->id]) }}">
                            @csrf
                            <input type="hidden" name="ship_id" value="{{ $ship->id }}">
                            <button type="submit" name="action" value="submit">
                                振込確認
                            </button>
                        </form>
                        @endif
                    </td>
                    <td>{{ $ship->id }}</td>
                    <td>{{ $ship->order_email }}</td>
                    <td>{{ $ship->design_id }}</td>
                    <td>{{ $ship->tel }}</td>
                    <td>{{ $ship->postal }}</td>
                    <td>{{ $ship->address }}</td>
                    <td>{{ $ship->ship ? '完了' : '未' }}</td>
                    @if($ship->carrier==null)
                    <td colspan="3">
                    <form id="shipShippedForm-{{ $ship->id }}" method="POST" action="{{ route('ship_shipped',['id'=>$ship->id]) }}">
                    @csrf
                    <input type="radio" id="option1" name="carrier" value="1">
                    <label for="option1">日本郵便</label><br>
                    
                    <input type="radio" id="option2" name="carrier" value="2">
                    <label for="option2">ヤマト</label><br>
                    
                    <input type="radio" id="option3" name="carrier" value="3">
                    <label for="option3">佐川</label><br>
                    </td>
                    <td>
                    <label for="quantity">受付番号</label>
                    <input type="text" id="quantity" name="number"  required>
                    <input type="hidden" name="ship_id" value="{{ $ship->id }}">
                    <button type="submit" name="action" value="submit">
                        発送確認
                    </button>
                    </form>
                    </td>
                    @else
                    @if($ship->carrier==1)
                    <td>日本郵便</td>
                    @elseif($ship->carrier==2)
                    <td>ヤマト</td>
                    @else
                    <td>佐川</td>
                    @endif
                    <td>{{ $ship->number }}</td>
                    @endif
                    <td>{{ $ship->shipped ? '完了' : '未' }}</td>
                    <td>{{ $ship->arrive ? '完了' : '未' }}</td>
                    <td>{{ $ship->paid ? '完了' : '未' }}</td>
                    <td>{{ $ship->due_date }}</td>
                
                    <td>
                    @if($ship->carrier==!null && $ship->arrive==1)
                    終了
                    @elseif($ship->carrier==!null)
                    <form id="shipArriveForm-{{ $ship->id }}" method="POST" action="{{ route('ship_arrive',['id'=>$ship->id]) }}" style="margin-top: 5px;">
                    @csrf
                        <input type="hidden" name="ship_id" value="{{ $ship->id }}">
                        <button type="submit" name="action" value="submit" id="arriveButton">
                        到着を確認
                        </button>
                    </form>
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<h3>一連の流れ</h3>
<p>1.現物販売があるとテーブルに表示</p>
<p>2.クレジット購入の場合→アーティストから発送の確認を受けたら配送業者と受付番号を登録して発送確認ボタンをクリック→追跡サービスを利用して到着を確認したら到着確認ボタンをクリック→完了</p>
<p>3.銀行振込購入の場合→振り込みを確認したら振り込み確認をクリック→アーティストから発送の確認を受けたら配送業者と受付番号を登録して発送確認ボタンをクリック→追跡サービスを利用して到着を確認したら到着確認ボタンをクリック→完了</p>

</body>

</html>