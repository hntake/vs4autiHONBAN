@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- home.cssと連携 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> <!-- jQueryのライブラリを読み込み -->
    <script src="{{ asset('/js/home.js') }}"></script> <!-- home.jsと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ヘアカットパート画面 VS4</title>
    <link rel="stylesheet" href="{{ asset('css/hair.css') }}"> <!-- schedule.cssと連携 -->

</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p>クリックするとタイマーが表示されます</p>
            <div class="card">
                <ul class="one_box_list" style="display:flex; flex-direction: row;margin: 10px 30px 10px 0;">

                    <li>
                        <td>
                            @if($user==null)
                            <div class="one_box" style="padding-top:10px; background-color:lightgoldenrodyellow; margin-bottom:10px;" onclick="location.href='{{ url('hair/timer1')}}'"><img src="{{asset('img/front.webp')}}" alt="front" style="width:85%;"></div>
                            @elseif($user->gender=="boy")
                            <div class="one_box" style="padding-top:10px; background-color:lightgoldenrodyellow; margin-bottom:10px;" onclick="location.href='{{ url('hair/timer1')}}'"><img src="{{asset('img/front.webp')}}" alt="front" style="width:85%;"></div>
                            @else
                            <div class="one_box" style="padding-top:10px; background-color:lightgoldenrodyellow; margin-bottom:10px;" onclick="location.href='{{ url('hair/timer1')}}'"><img src="{{asset('img/g_front.webp')}}" alt="front" style="width:65%;"></div>
                            @endif
                        </td>
                        <td>
                            @if($user==null)
                            <div class="one_box" style="padding-top:10px;background-color: lightpink;" onclick="location.href='{{ url('hair/timer2') }}'"><img src="{{asset('img/back.webp')}}" alt="back" style="width:85%;"></div>
                            @elseif($user->gender=="boy")
                            <div class="one_box" style="padding-top:10px;background-color: lightpink;" onclick="location.href='{{ url('hair/timer2') }}'"><img src="{{asset('img/back.webp')}}" alt="back" style="width:85%;"></div>
                            @else
                            <div class="one_box" style="padding-top:10px;background-color: lightpink;" onclick="location.href='{{ url('hair/timer2') }}'"><img src="{{asset('img/g_back.webp')}}" alt="back" style="width:65%;"></div>
                            @endif
                        </td>
                    </li>
                    <li>
                        <td>
                            @if($user==null)
                            <div class="one_box" style="background-color: lightblue;margin-bottom:10px; width:85%;" onclick="location.href='{{ url('hair/timer3') }}'"><img src="{{asset('img/boy_r.webp')}}" alt="right"></div>
                            @elseif($user->gender=="boy")
                            <div class="one_box" style="background-color: lightblue;margin-bottom:10px; width:85%;" onclick="location.href='{{ url('hair/timer3') }}'"><img src="{{asset('img/boy_r.webp')}}" alt="right"></div>
                            @else
                            <div class="one_box" style="background-color: lightblue;margin-bottom:10px; width:85%;" onclick="location.href='{{ url('hair/timer3') }}'"><img src="{{asset('img/g_right.webp')}}" alt="right"></div>
                            @endif
                        </td>
                        <td>
                            @if($user==null)
                            <div class="one_box" style="background-color: lightgreen; width:85%;" onclick="location.href='{{ url('hair/timer4') }}'"><img src="{{asset('img/boy_l.webp')}}" alt="left"></div>
                            @elseif($user->gender=="boy")
                            <div class="one_box" style="background-color: lightgreen; width:85%;" onclick="location.href='{{ url('hair/timer4') }}'"><img src="{{asset('img/boy_l.webp')}}" alt="left"></div>
                            @else
                            <div class="one_box" style="background-color: lightgreen; width:85%;" onclick="location.href='{{ url('hair/timer4') }}'"><img src="{{asset('img/g_left.webp')}}" alt="left"></div>
                            @endif
                        </td>
                    </li>
                </ul>
                <ul class="one_box_list" style="display:flex; flex-direction: row;margin: 10px 30px 10px 0;">
                    <li style="margin-right:20px;">
                        <td>
                            @if($user==null)
                            <div class="one_box" style="padding:5px 0; border-radius: 10px; background-color: lightgray;" onclick="location.href='{{ url('hair/clipper') }}'"><img src="{{asset('img/b_clipper.webp')}}" alt="clipper" style="width:65%;"></div>
                            @elseif($user->gender=="boy")
                            <div class="one_box" style="padding:5px 0; border-radius: 10px; background-color: lightgray;" onclick="location.href='{{ url('hair/clipper') }}'"><img src="{{asset('img/b_clipper.webp')}}" alt="clipper" style="width:65%;"></div>
                            @else
                            @endif
                        </td>
                    </li>
                    <li class="button" style="width:80%;">
                        <td>
                            <div class="one_box" style="padding:5px; border-radius: 10px;width:120px;"><button class="done" onClick="location.href='/hair/schedule';">カット終了！</button></div>
                            <div class="description1">カットスケジュールに戻る</div>
                        </td>
                    </li>

                </ul>


                <!--  <div class="route">
                    <div class="submit_button">
                        <a href="{{ url('hair/create') }}">新規作成</a>
                    </div>
                    <div class="submit_button">
                                                <button><a href="{{ url('dashboard') }}">リストに戻る</a></button>

                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
</div>
@endsection