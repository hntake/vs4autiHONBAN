<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>配達情報入力ページ</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f9f9f9;
}

h1 {
    text-align: center;
}

form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #218838;
}

</style>
<body>
    <h1>配達情報をご確認ください</h1>
    <form method="POST" action="{{ route('address_post',['id'=> $design->id]) }}">
        @csrf
        @auth
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" value="{{ $buyer->name}}" required>

        
        <label for="postalCode">郵便番号:</label>
        <input type="text" id="postal" name="postal" value="{{ $buyer->postal}}" required>
        
        <label for="address">住所:</label>
        <input type="text" id="address" name="address" value="{{ $buyer->address}}" required>

        <label for="phone">電話番号:</label>
        <input type="tel" id="tel" name="tel"  value="{{ $buyer->tel}}" required>
        @else
        <label for="name">メールアドレス:</label>
        <input type="email" id="email" name="email" value="{{ $buyer->email}}" required>

        <label for="name">名前:</label>
        <input type="text" id="name" name="name" value="{{ $buyer->name}}" required>

        <label for="postalCode">郵便番号:</label>
        <input type="text" id="zip"   name="postal" value="{{ $buyer->postal}}" required>

        <label for="address">住所:</label>
        <input type="text" id="address" name="address" value="{{ $buyer->address}}" required>

        <label for="phone">電話番号:</label>
        <input type="tel" id="tel" name="tel" value="{{ $buyer->tel}}" required>

        @endauth
        <button type="submit">送信</button>
    </form>

</body>
</html>
