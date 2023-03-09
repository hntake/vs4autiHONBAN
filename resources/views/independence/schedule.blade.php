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
    <title>自立支援スケジュール画面 VS4</title>
</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display:flex; flex-direction: column;">
                    <tr>
                        <td>{{ $schedule->schedule_name }}</td><br>
                        <td>
                            <div id="img_button1">
                                <button style="float:unset;"><a href="{{ route('independence_one',['id'=> $schedule->id]) }}"><img src="{{asset('storage/' . $schedule->image1)}}" alt="image" name="area1"></a></button>
                            </div>
                            <input type="button" onclick="showimg1()" value="完了">
                        </td>
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td>
                            <div id="img_button2">
                                <button class="img_button2" style="float:unset;"><a href="{{ route('independence_two',['id'=> $schedule->id]) }}"><img src="{{asset('storage/' . $schedule->image2)}}" alt="image" name="area2"></a></button>
                            </div>
                            <input type="button" onclick="showimg2()" value="完了">
                        </td>
                        @if(isset($schedule->image3))
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td>
                            <div id="img_button3">
                                <button class="img_button3" style="float:unset;"><a href="{{ route('independence_three',['id'=> $schedule->id]) }}"><img src="{{asset('storage/' . $schedule->image3)}}" alt="image" name="area3"></a></button>
                            </div>
                            <input type="button" onclick="showimg3()" value="完了">
                        </td>
                        @endif
                        @if(isset($schedule->image4))
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td>
                            <div id="img_button4">
                                <button class="img_button4" style="float:unset;"><a href="{{ route('independence_four',['id'=> $schedule->id]) }}"><img src="{{asset('storage/' . $schedule->image4)}}" alt="image" name="area4"></a></button>
                            </div>
                            <input type="button" onclick="showimg4()" value="完了">
                        </td>
                        @endif
                        @if(isset($schedule->image5))
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td>
                            <div id="img_button5">
                                <button class="img_button5" style="float:unset;"><a href="{{ route('independence_five',['id'=> $schedule->id]) }}"><img src="{{asset('storage/' . $schedule->image5)}}" alt="image" name="area5"></a></button>
                            </div>
                            <input type="button" onclick="showimg5()" value="完了">
                        </td>
                        @endif
                    </tr>
                </div>

                <div class="route">
                    <div class="submit_button">
                        <a href="{{ url('independence/create') }}">新規作成</a>

                    </div>
                    <div class="submit_button">
                        <a href="{{ url('dashboard') }}">リストに戻る</a>

                    </div>
                </div>
                <div class="bottom">
                    <a href="{{url('/')}}" class=""><img src="/img/vs4auti2.png" style="width:30%; height:auto;">トップページに戻る</a>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<script>
    function showimg1() {
        document.area1.src = "/img/check.png";
    }
</script>
<script>
    function showimg2() {
        document.area2.src = "/img/check.png";
    }
</script>
<script>
    function showimg3() {
        document.area3.src = "/img/check.png";
    }
</script>
<script>
    function showimg4() {
        document.area4.src = "/img/check.png";
    }
</script>
<script>
    function showimg5() {
        document.area5.src = "/img/check.png";
    }
</script>

@endsection
