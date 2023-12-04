<!DOCTYPE html>
<html>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# prefix属性: http://ogp.me/ns/ prefix属性#">
    <meta charset="UTF-8">
    <title>マイフィーリング</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.5,maximum-scale=2.0,user-scalable=yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/feel.css') }}"> <!-- word.cssと連携 -->
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/favicon2.ico') }}">


</head>
<body>
    
    <div class="wrap">
      
      
        <div class="show">
        
                <table>
                    @if(isset($feel->message3))
                    <tr>
                        <h2>{{ $feel->message3 }}</h2>
                    </tr>
                    @endif
                    <tr>
                        <td><img src="{{ asset('img/pain.png') }}" alt="pain" style="width:30%;"></td>
                    </tr>
                    @if(isset($feel->message4))

                    <tr>
                    <h2>{{ $feel->message4 }}</h2>
                    </tr>
                    @endif

                
                </table>
              
            
        </div>
  
        <a href="javascript:history.back();">アイコン選択に戻る</a>
    </div>
    <footer class="site-footer">
            <a href="https://www.freepik.com/search?format=search&last_filter=query&last_value=mad&query=mad&type=icon">Icon by Vitaly Gorbachev</a>
            <a href="https://www.freepik.com/search?format=search&last_filter=query&last_value=mad&query=mad&type=icon">Icon by Freepik</a>
        </footer>
</body>
</html>