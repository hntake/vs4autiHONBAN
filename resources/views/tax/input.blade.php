<!DOCTYPE html>
<html>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# prefix属性: http://ogp.me/ns/ prefix属性#">
    <meta charset="UTF-8">
    <title>とっとと減税！〜私達の買い控えリスト</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.5,maximum-scale=2.0,user-scalable=yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <meta name="twitter:card" content="summary_large_image"> -->
    <meta property="og:title" content="とっとと減税！" />
    <meta property="og:description" content="〜私達の買い控えリスト" />
    <meta property="og:image" content="https://itcha50.com/img/tax.JPG" />

    <link rel="stylesheet" href="{{ asset('css/tax.css') }}"> <!-- word.cssと連携 -->
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">

</head>
<body>
    
    <div class="wrap">
        <div class="catch">
            <h2>とっとと減税！<br></h2>
            <h3>私達の買い控えリスト</h3>
        </div>
        <div class="description">
                <h4>一時的に消費税が廃止されたり消費税が減税されたら、どれだけ景気が良くなるのでしょうか？<h4>
        </div>
        <div class="ask">
            <h2>買いびかえしているものを入力してみましょう！</h2>
        </div>

        <div class="input">
            <form id="myForm" method="POST" action="{{ route('tax') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <table>
                    <tr>
                        <td>ハンドルネーム</td>
                        <td><input type="text"size="35" name="name" value="名無し"></td>
                    </tr>
                    <tr>
                        <td>商品名</td>
                        <td><input type="text"size="35" name="goods"></td>
                    </tr>
                        <td>金額</td>
                        <td><input type="text"size="35" name="price" id="price"></td>
                    </tr>
                </table>
                <input type="submit" value="送信">
            </form>
            <div class="itm">
                                <a href="{{ url('tax/list') }}" class="itm_link">入力せずにみんなの買い控えリストを見る</a>
            <div class="description1">いますぐ減税！</div>
            </div>
        </div>
  
        <div class="google">
            <h3>価格がわからなかったらこちらで検索</h3>
            <h5>Google検索</h5>
            <form action="https://www.google.com/search" method="GET" target="_blank">
                <!-- <label for="query">検索語:</label> -->
                <input type="text" id="query" name="q" value="価格">
                <input type="submit" value="検索" >
            </form>
        </div>
    </div>
        <script>
            document.getElementById("myForm").addEventListener("submit", function(event) {
            event.preventDefault(); // フォームのデフォルトの送信を防止

            // 入力値を取得
            var input = document.getElementById("price").value;

            // 正規表現を使用して半角数字以外の文字を検索
            var pattern = /[^0-9]/;
            if (pattern.test(input)) {
                alert("半角数字以外が入力されました。");
            } else {
                // 半角数字が入力された場合はフォームを送信
                this.submit();
            }
            });
        </script>
        <!-- Twitterシェアボタン -->
        <a href="https://twitter.com/share" class="twitter-share-button" data-text="とっとと減税！〜私達の買い控えリスト" data-url="https://itcha50.com/tax/input">Tweet</a>

        <!-- TwitterのJavaScriptライブラリを読み込む -->
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

</body>
</html>
