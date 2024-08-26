<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プリペイドカード購入ページ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .container {
            max-width: 300px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
        .hidden {
            display: none;
        }
    </style>
    <script>
        function showForm(paymentMethod) {
            document.getElementById('credit-card-form').classList.add('hidden');
            document.getElementById('bank-transfer-form').classList.add('hidden');
            
            if (paymentMethod === 'credit-card') {
                document.getElementById('credit-card-form').classList.remove('hidden');
            } else if (paymentMethod === 'bank-transfer') {
                document.getElementById('bank-transfer-form').classList.remove('hidden');
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h3>プリペイド残高: {{$buyer->balance}}円</h3>
        <h1>プリペイドカード購入</h1>
        
        <div class="form-group">
            <button onclick="showForm('credit-card')">クレジットカードで購入する</button>
            <button onclick="showForm('bank-transfer')">銀行振り込みを利用する</button>
        </div>

        <form method="GET" action="{{ route('prepaid_purchase_card') }}" id="credit-card-form" class="hidden">
            @csrf
            <!-- <div class="form-group">
                <label for="amount">金額を入力:</label>
                <input type="number" id="amount" name="amount" placeholder="金額を入力" min="1000" max="100000" required>
                @error('amount')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div> -->
            <div class="form-group">
                <button type="submit">クレジットカード払いを選択する</button>
            </div>
        </form>

        <form action="{{ route('prepaid_bank') }}" method="post" id="bank-transfer-form" class="hidden">
            @csrf
            <div class="form-group">
                <label for="amount">金額を入力:</label>
                <input type="number" id="amount" name="amount" placeholder="金額を入力" min="500" max="100000" required>
                @error('amount')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <p>振込口座名 llco 竹内 貴代</p>
            <p>銀行名 楽天銀行</p>
            <p>支店名 ポルカ</p>
            <p>口座種類 普通</p>
            <p>口座番号 5014182</p>
            <p>（恐れ入りますが振込手数料はお客様の負担でお願いいたします）</p>
            <button type="submit" name="action" style="background-color:antiquewhite; border:1.6px orange solid; padding:8px;color:red;">
                銀行振り込みを利用して購入するため、振込情報を送信する
            </button>
        </form>
    </div>
</body>
</html>