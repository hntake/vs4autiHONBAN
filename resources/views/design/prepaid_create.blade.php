<!-- resources/views/prepaid.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プリペイド生成ページ</title>
    <script>
        let fieldCount = 1;

        function addAmountField() {
            if (fieldCount < 10) {
                fieldCount++;
                const newField = document.createElement('div');
                newField.innerHTML = `
                    <label for="price${fieldCount}">金額${fieldCount}:</label>
                    <input type="number" id="price${fieldCount}" name="price[]" min="1" required>
                `;
                document.getElementById('priceFields').appendChild(newField);
            }
        }
    </script>
</head>
<body>
    <h1>プリペイド生成</h1>
    <form action="{{ route('prepaid_create') }}" method="POST">
        @csrf
        <div id="priceFields">
            <label for="price1">金額1:</label>
            <input type="number" id="price1" name="price[]" min="1" required>
        </div>
        <button type="button" onclick="addAmountField()">金額を追加 (最大10)</button>
        <button type="submit">送信</button>
    </form>

    @if (session('prepaid_codes'))
        <h2>生成されたプリペイドコード:</h2>
        <ul>
            @foreach (session('prepaid_codes') as $code)
                <li>{{ $code }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>