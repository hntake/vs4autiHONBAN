<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>領収書PDF</title>
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
      display: flex;
      justify-content: left;
      align-items: left;
      min-height: 100vh;
      margin: 0;
    }
    .grid-container {
      text-align: left;
    }


/* A4サイズの設定 */
@page {
    size: A4;
    margin: 24px;
}


  </style>
</head>
<body>
<div class="grid-container">
        <div class="grid-item">
            <div class="box">
                <h2>
                    領収書
                </h2>

                <div class="qr_code">
                @if(isset($downloads))
                  @foreach($downloads as $key => $download)
                  @if($key === 0) <!-- 最初の要素のみ表示 -->
                    <p>発行日：{{$download->updated_at->format('Y-m-d')}} </p>
                    <p>お名前:{{$download->name}}様</p>
                  @endif
                    <p>作品名{{$key + 1}}:{{$download->designName}} </p>
                    <p>アーティスト名:{{$download->Design->artist_name}}</p>
                  @endforeach
                @else
                      <p>発行日：{{$download->updated_at->format('Y-m-d')}} </p>
                      <p>{{$download->name}} 様</p>
                      <p>作品名:{{$download->designName}} </p>
                      <p>アーティスト名:{{$download->Design->artist_name}}</p>
                @endif
                      <p>領収金額(税込) ￥{{$total}}-</p>
                </div>
                <p>障がい者アートデザインダウンロード費用として<br>上記の金額を収いたしました。</p>
            <div class="company">
              IT2U 障がい者アート共有サイト
              <br>
              〒699-0702<br>
              島根県出雲市大社町杵築北2729<br>
              TEL070-4225-0615
            </div>
        </div>
    </div>
</body>

</html>
