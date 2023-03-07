@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/independence.css') }}"> <!-- home.cssと連携 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> <!-- jQueryのライブラリを読み込み -->
    <script src="{{ asset('/js/home.js') }}"></script> <!-- home.jsと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>自立支援写真画面 VS4</title>
</head>
<div class="picture">
        <img src="{{ asset('storage/' . $schedule->image2) }}" alt="image" >
            <ul class="icon">
                    <li>
                        <button class="back" onClick="history.back();"><img src="{{ asset('img/left-arrow.png')}}"></button>
                    </li>
                    @if(isset($schedule->image3))
                    <li>
                        <button class="img_button3" style="float:unset;"><a href="{{ route('independence_three',['id'=> $schedule->id]) }}"><img src="{{ asset('img/right-arrow.png')}}"></a></button>
                        @endif
                    </li>
            </ul>
            <ul class="icon">
                <li>
                @if(isset($schedule->explain1))
                    <button onclick="readAloud1()" id="text" style="color:red;font-weight:bold;font-size:25px; padding:7px;" > <img src="{{ asset('img/ear.png') }}" alt="image"  ></button>
                    @endif

                </li>
                <li>
                @if(isset($schedule->caution1))

                    <button onclick="readAloud2()" id="text" style="color:red;font-weight:bold;font-size:25px; padding:7px;" > <img src="{{ asset('img/caution-sign.png') }}" alt="image" ></button>
                    @endif

                </li>
            </ul>
    </div>

<script>
        function readAloud1() {
          // 発言を作成
        const uttr = new SpeechSynthesisUtterance("{{$schedule->explain2}}")
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
        const uttr = new SpeechSynthesisUtterance("{{$schedule->caution2}}")
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
@endsection
