@extends('layouts.app')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- home.cssと連携 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> <!-- jQueryのライブラリを読み込み -->
    <script src="{{ asset('/js/home.js') }}"></script> <!-- home.jsと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>歯科スケジュール画面 VS4</title>
</head>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display:flex; flex-direction: column;">
                    <tr>
                        <td>{{ $schedule->schedule_name }}</td><br>
                        <td><img src="{{asset('img/dentist/'.$schedule->imageOne->pic_name)}}" alt="image" onclick="this.src='/img/check.png'"></td>
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td><img src="{{asset('img/dentist/'.$schedule->imageTwo->pic_name)}}" alt="image" onclick="this.src='/img/check.png'"></td>
                        @if(isset($schedule->image2))
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td><img src="{{asset('img/dentist/'.$schedule->imageThree->pic_name)}}" alt="image" onclick="this.src='/img/check.png'"></td>
                        @endif
                        @if(isset($schedule->image3))
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td><img src="{{asset('img/dentist/'.$schedule->imageFour->pic_name)}}" alt="image" onclick="this.src='/img/check.png'"></td>
                        @endif
                        @if(isset($schedule->image4))
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td><img src="{{asset('img/dentist/'.$schedule->imageFive->pic_name)}}" alt="image" onclick="this.src='/img/check.png'"></td>
                        @endif
                    </tr>
                </div>

                <div class="route">
                    <div class="submit_button">
                        <a href="{{ route('create') }}">新規作成</a>
                    </div>
                    <div class="submit_button">
                        <button onclick="history.back()">リストに戻る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
