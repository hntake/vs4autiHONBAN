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
                    @if(isset($feel->message7))
                    <tr>
                        <td>{{ $feel->message7 }}</td>
                    </tr>
                    @endif
                    
                    <tr>
                        <td><img src="{{ asset('img/scare.png') }}" alt="scare" style="width:30%;"></td>
                    </tr>
                    @if(isset($feel->message8))
                    <tr>
                    <td>{{ $feel->message8 }}</td>
                    </tr>
                    @endif

                    <tr>
                    <a href="javascript:history.back();">アイコン選択に戻る</a>

                    </tr>
                
                </table>
            
            </form>
            
        </div>
  
      
    </div>

<a href="https://www.freepik.com/search?format=search&last_filter=query&last_value=mad&query=mad&type=icon">Icon by Vitaly Gorbachev</a>
<a href="https://www.freepik.com/search?format=search&last_filter=query&last_value=mad&query=mad&type=icon">Icon by Freepik</a>
</body>
</html>