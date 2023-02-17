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
    <title>医療スケジュール画面 VS4</title>
</head>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display:flex; flex-direction: column;">
                    <tr>
                        <td>{{ $schedule->schedule_name }}</td><br>
                        @if($user_img==1)
                        <td><img src="{{asset('img/medical/'.$schedule->MedOne->pic_name)}}" alt="image" onclick="this.src='/img/check.png'"></td>
                        @elseif($user_img==2)
                        <td><img src="{{asset('img/medical/'.$schedule->MedOne->pic_name)}}" alt="image" onclick="this.src='/img/hana.png'"></td>
                        @else
                        <td><img src="{{asset('img/medical/'.$schedule->MedOne->pic_name)}}" alt="image" onclick="this.src='/img/smile.png'"></td>
                        @endif
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        @if($user_img==1)
                        <td><img src="{{asset('img/medical/'.$schedule->MedTwo->pic_name)}}" alt="image" onclick="this.src='/img/check.png'"></td>
                        @elseif($user_img==2)
                        <td><img src="{{asset('img/medical/'.$schedule->MedTwo->pic_name)}}" alt="image" onclick="this.src='/img/hana.png'"></td>
                        @else
                        <td><img src="{{asset('img/medical/'.$schedule->MedTwo->pic_name)}}" alt="image" onclick="this.src='/img/smile.png'"></td>
                        @endif                        
                        @if(isset($schedule->image2))
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        @if($user_img==1)
                        <td><img src="{{asset('img/medical/'.$schedule->MedThree->pic_name)}}" alt="image" onclick="this.src='/img/check.png'"></td>
                        @elseif($user_img==2)
                        <td><img src="{{asset('img/medical/'.$schedule->MedThree->pic_name)}}" alt="image" onclick="this.src='/img/hana.png'"></td>
                        @else
                        <td><img src="{{asset('img/medical/'.$schedule->MedThree->pic_name)}}" alt="image" onclick="this.src='/img/smile.png'"></td>
                        @endif                        @endif
                        @if(isset($schedule->image3))
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        @if($user_img==1)
                        <td><img src="{{asset('img/medical/'.$schedule->MedFour->pic_name)}}" alt="image" onclick="this.src='/img/check.png'"></td>
                        @elseif($user_img==2)
                        <td><img src="{{asset('img/medical/'.$schedule->MedFour->pic_name)}}" alt="image" onclick="this.src='/img/hana.png'"></td>
                        @else
                        <td><img src="{{asset('img/medical/'.$schedule->MedFour->pic_name)}}" alt="image" onclick="this.src='/img/smile.png'"></td>
                        @endif                        @endif
                        @if(isset($schedule->image4))
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        @if($user_img==1)
                        <td><img src="{{asset('img/medical/'.$schedule->MedFive->pic_name)}}" alt="image" onclick="this.src='/img/check.png'"></td>
                        @elseif($user_img==2)
                        <td><img src="{{asset('img/medical/'.$schedule->MedFive->pic_name)}}" alt="image" onclick="this.src='/img/hana.png'"></td>
                        @else
                        <td><img src="{{asset('img/medical/'.$schedule->MedFive->pic_name)}}" alt="image" onclick="this.src='/img/smile.png'"></td>
                        @endif                        @endif
                    </tr>
                </div>

                <div class="route">
                    <div class="submit_button">
                        <a href="{{ url('medical/create') }}">新規作成</a>
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
