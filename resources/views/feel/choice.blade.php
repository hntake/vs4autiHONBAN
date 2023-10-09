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
      
      
        <div class="input">
        
                <table>
                    @if($feel->img1==0)
                        @if(!empty($feel->message1)&&!empty($feel->message2))
                        <tr>
                            <td><a href="{{ route('index1')}}" onclick="readAloud1()"><img src="{{ asset('img/angry.png') }}" alt="angry" style="width:30%;"></a></td>
                        </tr>
                        @elseif(!empty($feel->message1)||!empty($feel->message2))
                        <tr>
                            <td><a href="{{ route('index1')}}" onclick="readAloud1()"><img src="{{ asset('img/angry.png') }}" alt="angry" style="width:30%;"></a></td>
                        </tr>
                        @else
                        <tr>
                            <td><a href="{{ route('index1')}}" ><img src="{{ asset('img/angry.png') }}" alt="angry" style="width:30%;"></a></td>
                        </tr>
                        @endif
                    @endif
                    @if($feel->img2==0)

                    @if(!empty($feel->message3)&&!empty($feel->message4))
                        <tr>
                            <td><a href="{{ route('index2')}}" onclick="readAloud2()"><img src="{{ asset('img/pain.png') }}" alt="pain" style="width:30%;"></a></td>
                        </tr>
                        @elseif(!empty($feel->message3)||!empty($feel->message4))
                        <tr>
                            <td><a href="{{ route('index2')}}" onclick="readAloud2()"><img src="{{ asset('img/pain.png') }}" alt="pain" style="width:30%;"></a></td>
                        </tr>
                        @else
                        <tr>
                            <td><a href="{{ route('index2')}}" ><img src="{{ asset('img/pain.png') }}" alt="pain" style="width:30%;"></a></td>
                        </tr>
                        @endif
                    @endif
                    @if($feel->img3==0)

                    @if(!empty($feel->message5)&&!empty($feel->message6))
                        <tr>
                            <td><a href="{{ route('index3')}}" onclick="readAloud3()"><img src="{{ asset('img/sad.png') }}" alt="sad" style="width:30%;"></a></td>
                        </tr>
                        @elseif(!empty($feel->message5)||!empty($feel->message6))
                        <tr>
                            <td><a href="{{ route('index3')}}" onclick="readAloud3()"><img src="{{ asset('img/sad.png') }}" alt="sad" style="width:30%;"></a></td>
                        </tr>
                        @else
                        <tr>
                            <td><a href="{{ route('index3')}}" ><img src="{{ asset('img/sad.png') }}" alt="sad" style="width:30%;"></a></td>
                        </tr>
                        @endif
                    @endif
                    @if($feel->img4==0)

                    @if(!empty($feel->message7)&&!empty($feel->message8))
                        <tr>
                            <td><a href="{{ route('index4')}}" onclick="readAloud4()"><img src="{{ asset('img/scare.png') }}" alt="scare" style="width:30%;"></a></td>
                        </tr>
                        @elseif(!empty($feel->message7)||!empty($feel->message8))
                        <tr>
                            <td><a href="{{ route('index4')}}" onclick="readAloud4()"><img src="{{ asset('img/scare.png') }}" alt="scare" style="width:30%;"></a></td>
                        </tr>
                        @else
                        <tr>
                            <td><a href="{{ route('index4')}}" ><img src="{{ asset('img/scare.png') }}" alt="scare" style="width:30%;"></a></td>
                        </tr>
                        @endif
                @endif
                </table>
                <div class="submit_button">
                        <a href="{{ route('feel_input') }}">作成・変更画面へ</a>
                    </div>
            
        </div>
  
      
    </div>
    <script>
        function readAloud1() {
          // 発言を作成
        const uttr = new SpeechSynthesisUtterance("{{$feel->message1}} {{$feel->message2}}")
        // 発言を再生 (発言キューに発言を追加)
        speechSynthesis.speak(uttr)


            // 言語を設定
            uttr.lang = "ja-JP"

              // 速度を設定
            uttr.rate = 1

            // 高さを設定
            uttr.pitch = 1

            // 音量を設定
            uttr.volume = 1



            }
    </script>
    <script>
        function readAloud2() {
          // 発言を作成
        const uttr = new SpeechSynthesisUtterance("{{$feel->message3}} {{$feel->message4}}")
        // 発言を再生 (発言キューに発言を追加)
        speechSynthesis.speak(uttr)


            // 言語を設定
            uttr.lang = "ja-JP"

              // 速度を設定
            uttr.rate = 1

            // 高さを設定
            uttr.pitch = 1

            // 音量を設定
            uttr.volume = 1



            }
    </script><script>
        function readAloud3() {
          // 発言を作成
        const uttr = new SpeechSynthesisUtterance("{{$feel->message5}} {{$feel->message6}}")
        // 発言を再生 (発言キューに発言を追加)
        speechSynthesis.speak(uttr)


            // 言語を設定
            uttr.lang = "ja-JP"

              // 速度を設定
            uttr.rate = 1

            // 高さを設定
            uttr.pitch = 1

            // 音量を設定
            uttr.volume = 1



            }
    </script><script>
        function readAloud4() {
          // 発言を作成
        const uttr = new SpeechSynthesisUtterance("{{$feel->message7}} {{$feel->message8}}")
        // 発言を再生 (発言キューに発言を追加)
        speechSynthesis.speak(uttr)


            // 言語を設定
            uttr.lang = "ja-JP"

              // 速度を設定
            uttr.rate = 1

            // 高さを設定
            uttr.pitch = 1

            // 音量を設定
            uttr.volume = 1



            }
    </script>


<a href="https://www.freepik.com/search?format=search&last_filter=query&last_value=mad&query=mad&type=icon">Icon by Vitaly Gorbachev</a>
<a href="https://www.freepik.com/search?format=search&last_filter=query&last_value=mad&query=mad&type=icon">Icon by Freepik</a>
</body>
</html>