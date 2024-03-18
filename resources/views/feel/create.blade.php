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
    <meta name="description" content="自閉症や発達障害などの障がいのために自分の要望がうまく伝えることができない人向けの無料アプリ・マイリク" name="description">

    <link rel="stylesheet" href="{{ asset('css/feel.css') }}"> <!-- word.cssと連携 -->
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/favicon2.ico') }}">


</head>
<body>
    
    <div class="wrap">
        <div class="catch">
            <h2>Your Feeling作成画面<br></h2>
        </div>
        <div class="description">
                <h4>表情アイコンと一緒に表示したいメッセージを入力しましょう<h4>
                <h4>下部にある<span style="color:red;">保存ボタン</span>を必ず押して下さい<h4>
                <h4>※入力しなくても表情アイコンだけで利用できます<h4>
        </div>
        <div class="input">
            <form id="myForm" method="POST" action="{{ route('feel_create') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if(isset($feel))
                <div class="box">
                    <div class="feel">
                        <p><img src="{{ asset('img/angry.png') }}" alt="angry"></p>
                        <p>一行目</p>
                        @if (isset($feel->message1))
                        <p><input type="text"size="35" name="message1" value="{{$feel->message1}}"></p>
                        @else
                        <p><input type="text"size="35" name="message1" ></p>
                        @endif
                        <p>二行目</p>
                        @if (isset($feel->message2))
                        <p><input type="text"size="35" name="message2" value="{{$feel->message2}}"></p>
                        @else
                        <p><input type="text"size="35" name="message2" ></p>
                        @endif 
                       
                        <input type="checkbox" name="img1"  value="1" class="form-control">表示しない 
                        
                    </div>
                    <div class="feel">
                        <p><img src="{{ asset('img/pain.png') }}" alt="pain"></p>
                        <p>一行目</p>
                        @if (isset($feel->message3))
                        <p><input type="text"size="35" name="message3" value="{{$feel->message3}}"></p>
                        @else
                        <p><input type="text"size="35" name="message3" ></p>
                        @endif
                        <p>二行目</p>
                        @if (isset($feel->message4))
                        <p><input type="text"size="35" name="message4" value="{{$feel->message4}}"></p>
                        @else
                        <p><input type="text"size="35" name="message4" ></p>
                        @endif 
                       
                        <input type="checkbox" name="img2"  value="1" class="form-control">表示しない 
                        
                    </div>
                    <div class="feel">
                        <p><img src="{{ asset('img/sad.png') }}" alt="sad"></p>
                        <p>一行目</p>
                        @if (isset($feel->message5))
                        <p><input type="text"size="35" name="message5" value="{{$feel->message5}}"></p>
                        @else
                        <p><input type="text"size="35" name="message5" ></p>
                        @endif
                        <p>二行目</p>
                        @if (isset($feel->message6))
                        <p><input type="text"size="35" name="message6" value="{{$feel->message6}}"></p>
                        @else
                        <p><input type="text"size="35" name="message6" ></p>
                        @endif 
                      
                        <input type="checkbox" name="img3"  value="1" class="form-control">表示しない 
                        
                    </div>
                    <div class="feel">
                        <p><img src="{{ asset('img/scare.png') }}" alt="scare"></p>
                        <p>一行目</p>
                        @if (isset($feel->message7))
                        <p><input type="text"size="35" name="message7" value="{{$feel->message7}}"></p>
                        @else
                        <p><input type="text"size="35" name="message7" ></p>
                        @endif
                        <p>二行目</p>
                        @if (isset($feel->message8))
                        <p><input type="text"size="35" name="message8" value="{{$feel->message8}}"></p>
                        @else
                        <p><input type="text"size="35" name="message8" ></p>
                        @endif 
                        
                        <input type="checkbox" name="img4"  value="1" class="form-control">表示しない 
                        
                    </div>
                </div>
                @else
                <div class="box">
                    <div class="feel">
                        <p><img src="{{ asset('img/angry.png') }}" alt="angry"></p>
                        <p>一行目</p>
                        <p><input type="text"size="35" name="message1" ></p>
                        <p>二行目</p>
                        <p><input type="text"size="35" name="message2" ></p>
                        <input type="checkbox" name="img1"  value="1" class="form-control">表示しない 
                        </div>
                    <div class="feel">
                        <p><img src="{{ asset('img/pain.png') }}" alt="pain"></p>
                        <p>一行目</p>
                        <p><input type="text"size="35" name="message3" ></p>
                        <p>二行目</p>
                        <p><input type="text"size="35" name="message4" ></p>
                        <input type="checkbox" name="img2"  value="1" class="form-control"> 表示しない 
                        </div>
                    <div class="feel">
                        <p><img src="{{ asset('img/sad.png') }}" alt="sad"></p>
                        <p>一行目</p>
                        <p><input type="text"size="35" name="message5" ></p>
                        <p>二行目</p>
                        <p><input type="text"size="35" name="message6" ></p>
                        <input type="checkbox" name="img3"  value="1" class="form-control"> 表示しない   
                        </div>
                    <div class="feel">
                        <p><img src="{{ asset('img/scare.png') }}" alt="scare"></p>
                        <p>一行目</p>
                        <p><input type="text"size="35" name="message7" ></p>
                        <p>二行目</p>
                        <p><input type="text"size="35" name="message8" ></p>
                        <input type="checkbox" name="img4"  value="1" class="form-control"> 表示しない   
                        </div>
                </div>
                @endif
                <input type="submit" value="保存">
            </form>
            
        </div>
  
      
    </div>
<footer class="site-footer">>
    <a href="https://www.freepik.com/search?format=search&last_filter=query&last_value=mad&query=mad&type=icon">Icon by Vitaly Gorbachev</a>
    <a href="https://www.freepik.com/search?format=search&last_filter=query&last_value=mad&query=mad&type=icon">Icon by Freepik</a>
</footer>
</body>
</html>