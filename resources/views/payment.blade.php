<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'VS4auti') }}有料プランについて 自閉症支援ツール </title>
        <link rel="icon" href="{{ asset('favicon.ico') }}" id="favicon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    </head>
<body>
    <div class="detail">
        <div class="payment">
                <h2>有料プランについて</h2>
                    <img src="img/compare.png" alt="compare" >
                <h2 style="font-family: 'Noto Sans JP', sans-serif;">料金プラン</h3>
                  <ul>
                    <li style="border:1px solid black; margin-bottom:10px; list-style: none;  background-color: aqua; font-weight: 800; padding-left:10px; ">月額プラン:<span style="color:red;">100円</span>（申込はこちらから↓）<br>
                        <div  class="button" ><a href="{{ route('register') }}" style="background-color:none;">新規登録画面へ移動する</a></div></li>
                    <li style="border:1px solid black; list-style: none; background-color: aqua; font-weight: 800; padding-left:10px; ">年額プラン:<span style="color:red;">500円</span>
                    <div >
                        <h4>保証期間：登録から一年間</h4>
                        <h4>※サーバートラブルなど一時的な停止を除く長期の利用不可が生じた場合は<span style="color:red;">全額返金致します。</span></h4>
                    </div>
                    <div class="llco" style="background-color:unset;">
                        <div  class="button" ><a href="{{ route('admin_form') }}" style="background-color:none;">年額プラン申込ページへ移動する</a></div>
                    </div>
                    </li>
                </ul>

                <h2 style="font-family: 'Noto Sans JP', sans-serif;">登録の流れ</h3>
                    <div>
                        <ul>
                            <li style="list-style: none;">
                                ①メールアドレスとパスワードを入力して仮登録します
                            </li>
                            <li style="list-style: none;">
                               ②入力されたメールアドレスに認証メールが送信されます。メールボックスに移動して認証します。
                            </li>
                            <li style="list-style: none;">
                                ③月額登録フォームでクレジットカード情報を入力＆送信します。<span style="color:red;">（年額プランの方は申し込みが異なります!）</span>
                            </li>
                            <li style="list-style: none;">
                                ④登録完了です！
                            </li>
                        </ul>
                    </div>

            </div>
                <p>お問い合わせは、下記の窓口までお願い致します。</p>
                <button class="button" style="margin-top:0px;"><a href="{{ route('contact.index') }}" >Contact us</a></button><br>
        </div>
        <div class="top">
            <button class="button" id="card-button"><a style="font-size: 1.0rem;" href="{{ url('/') }}">トップページに<br>戻る</a></button>
         </div>
</body>
