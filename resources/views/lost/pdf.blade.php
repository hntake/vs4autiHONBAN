<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お守りシールPDF</title>
    <style type="text/css">
    @font-face {
      font-family: ipaexg;
      font-style: normal;
      font-weight: normal;
      src: url('{{ storage_path('fonts/ipaexg.ttf') }}') format('truetype');
    }
    @font-face {
      font-family: ipaexg;
      font-style: bold;
      font-weight: bold;
      src: url('{{ storage_path('fonts/ipaexg.ttf') }}') format('truetype');
    }
    body {
      font-family: ipaexg !important;
    }
/* スタイル全般 */
body {
    margin: 0;
    padding: 0;
}

/* グリッドコンテナ */
.grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2列 */
            grid-template-rows: repeat(4, 1fr);    /* 4行 */
            gap: 10px; /* グリッドアイテム間の間隔（お好みで調整） */
            margin-top:15px;
        }

/* グリッドアイテム */
.grid-item {
        text-align: center;
        padding: 10px;
        width: 48%; /* 2列に並べるために幅を48%に設定 */
        box-sizing: border-box;
        margin: 0;
        float: left;
        page-break-after: auto; /* 自動的にページ分割しないように設定 */
    }
    
    /* 2行目の左端の要素をクリアして、次の行に配置 */
    .grid-item:nth-child(2n+1) {
        clear: left;
    }

/* QRコードとテキストのスタイル */
.qr_code img {
    max-width: 40%;
    height: auto;
    display: block;
    margin: 0 auto;
}

h2 {
    text-align: center;
    margin: 15px 0;
    font-size: 16px;
}
.box{
    margin:10px 0;
    border:1px solid black;
}
/* A4サイズの設定 */
@page {
    size: A4;
    margin: 0;
}

/* 2列4行に並べるためのスタイル */
@media print {
    .grid-item {
        width: 40%; /* 2列に並べるために幅を48%に設定 */
        box-sizing: border-box;
        margin: 0;
        float: left;
        page-break-after: auto; /* 自動的にページ分割しないように設定 */
    }
      /* 2行目の左端の要素をクリアして、次の行に配置 */
      .grid-item:nth-child(2n+1) {
        clear: left;
    }
    /* グリッド全体の幅を調整 */
    .grid-container {
        width: 96%; /* 2行4列にするために幅を96%に設定 */
        margin: 0 auto;
        
    }
}
   </style>
</head>
<body>
<div class="grid-container">
        <div class="grid-item">
            <div class="box">
                <h2>
                    私は支援が必要です。
                </h2>
                <div class="qr_code">
                    <img src="data:image/png;base64,{{ $image_data }}">
                </div>
                <h2>
                    迷子だと思ったらスキャンして下さい
                </h2>
            </div>
            <div class="box">
                <h2>
                    私は支援が必要です。
                </h2>
                <div class="qr_code">
                    <img src="data:image/png;base64,{{ $image_data }}">
                </div>
                <h2>
                    迷子だと思ったらスキャンして下さい
                </h2>
            </div>
        
            <div class="box">
                <h2>
                    私は支援が必要です。
                </h2>
                <div class="qr_code">
                    <img src="data:image/png;base64,{{ $image_data }}">
                </div>
                <h2>
                    迷子だと思ったらスキャンして下さい
                </h2>
            </div>
    
            <div class="box">
                <h2>
                    私は支援が必要です。
                </h2>
                <div class="qr_code">
                    <img src="data:image/png;base64,{{ $image_data }}">
                </div>
                <h2>
                    迷子だと思ったらスキャンして下さい
                </h2>
            </div>
            </div>
        <div class="grid-item">
        <div class="box">
                <h2>
                    私は支援が必要です。
                </h2>
                <div class="qr_code">
                    <img src="data:image/png;base64,{{ $image_data }}">
                </div>
                <h2>
                    迷子だと思ったらスキャンして下さい
                </h2>
            </div>
    
            <div class="box">
                <h2>
                    私は支援が必要です。
                </h2>
                <div class="qr_code">
                    <img src="data:image/png;base64,{{ $image_data }}">
                </div>
                <h2>
                    迷子だと思ったらスキャンして下さい
                </h2>
            </div>
        
            <div class="box">
                <h2>
                    私は支援が必要です。
                </h2>
                <div class="qr_code">
                    <img src="data:image/png;base64,{{ $image_data }}">
                </div>
                <h2>
                    迷子だと思ったらスキャンして下さい
                </h2>
            </div>
        
            <div class="box">
                <h2>
                    私は支援が必要です。
                </h2>
                <div class="qr_code">
                    <img src="data:image/png;base64,{{ $image_data }}">
                </div>
                <h2>
                    迷子だと思ったらスキャンして下さい
                </h2>
            </div>
        </div>
    </div>
</body>

</html>
