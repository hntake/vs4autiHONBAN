@extends('layouts.app')
<title>前髪カット画面 "VS4視覚支援ツール”</title>
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
    <title>タイマー画面 VS4</title>
    <link rel="stylesheet" href="{{ asset('css/hair.css') }}"> <!-- schedule.cssと連携 -->

</head>

<div class="container">
    @if($user==null)

    <img src="{{asset('img/front.webp')}}" alt="front" style="width:55%; height:auto;">
    @elseif($user->gender=="boy")

    <img src="{{asset('img/front.webp')}}" alt="front" style="width:55%; height:auto;">
    @else
    <img src="{{asset('img/g_front.webp')}}" alt="front" style="width:55%; height:auto;">
    @endif
    <div class="pie"></div>
</div>
<script>
    setTimeout(function() {
        window.location.href = '/hair/cut';
    }, 60 * 1000);
</script>
@endsection