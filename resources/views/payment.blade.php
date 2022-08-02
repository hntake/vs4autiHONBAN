<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
<title>有料プランについて</title>
<body style="background-image: url(../img/grad.jpg); position: relative;">
    <div class="detail">
        <div class="payment">
                <h2>有料プランについて</h2>
                    <img src="img/compare.png" alt="compare" style="width:50%;">
                    <h2 style="font-family: 'Noto Sans JP', sans-serif;">料金プラン</h3>
                  <ul>
                    <li>月額プラン:100円（申込はこちらから↓）<br>
                        <div  class="button" ><a href="{{ route('register') }}" style="background-color:none;">新規登録画面へ移動する</a></div></li>
                    <li>年額プラン:<span style="color:red;">500円</span></li>
                  </ul>
                    <div class="caution">
                    <h4>保証期間：登録から一年間</h4>
                    <h4>※サーバートラブルなど一時的な停止を除く長期の利用不可が生じた場合は<span style="color:red;">全額返金致します。</span></h4>
                    </div>
                  <div class="llco" style="background-color:unset;">
                    <div  class="button" ><a href="{{ route('admin_form') }}" style="background-color:none;">年額プラン申込ページへ移動する</a></div>
                </div>

            </div>
                <p>お問い合わせは、下記の窓口までお願い致します。</p>
                <button class="button" style="margin-top:0px;"><a href="{{ route('contact.index') }}" >Contact us</a></button><br>
        </div>
        <div class="top">
            <button class="button" id="card-button"><a style="font-size: 1.0rem;" href="{{ url('/') }}">トップページに<br>戻る</a></button>
         </div>
</body>
