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

  <!--   <p class="text-center mt-5">{{ $user->name }}様 決済が完了しました！</p> -->

    <div class="lets_start">
        <p>
            利用はこちらから<br>
            <a href="{{ url('create') }}"class="btn btn-success mt-2">新しいスケジュールを作成する</a>
        </p>
    </div>
    <div class="portal">
        <p>お客様の請求情報はこちらで確認できます</p>
               <a class="text" href="https://dashboard.stripe.com/settings/billing/portal" target="_blank" rel="noopener noreferrer">Stripeポータルサイトへ</a>
    </div>
    <script>

function confirm_test() { // 問い合わせるボタンをクリックした場合
    document.getElementById('popup').style.display = 'block';
    return false;
}

function okfunc() { // OKをクリックした場合
    document.contactform.submit();
}

function nofunc() { // キャンセルをクリックした場合
    document.getElementById('popup').style.display = 'none';
}
</script>
<div class="cancel">
<form method="POST" name="contactform" action="{{route('stripe.cancel', $user) }}">
    @csrf
    <p>キャンセルは必ずこちらからお願い致します。</p>
    <p>キャンセルするとこれまで保存されていたデータは<span>全て削除されます</span>のでご注意ください！</p>
    <p>※解約を行う場合は、契約期間終了日の24時間以上前に、自動更新の解除をしてください。</p>
<!--             <button class="btn btn-success mt-2" id="mybtn">キャンセルする</button>
-->            <input type="submit" value='キャンセルする' class='btn btn-success mt-2' onClick="return confirm_test()" >
</form>
<div id="popup" style="width: 200px;display: none;padding: 30px 20px;border: 2px solid #000;margin: auto;background-color:aliceblue;">
本当にキャンセルしますか？<br />
<button id="ok" onclick="okfunc()">OK</button>
<button id="no" onclick="nofunc()">キャンセル</button>
</div>
</body>
</html>
