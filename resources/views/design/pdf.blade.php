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
    }

/* A4サイズの設定 */
@page {
    size: A4;
    margin: 0;
}


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
              @foreach($downloads as $download)
                    <p>{{$download->updated_at->format('Y-m-d')}} </p>
                    <p>{{$download->name}} 様</p>
              @endforeach
              @else
                    <p>{{$download->updated_at->format('Y-m-d')}} </p>
                    <p>{{$download->name}} 様</p>
              @endif
                    <p>領収金額 ￥{{$total}}-</p>
            </div>
            
        </div>
    </div>
</body>

</html>
