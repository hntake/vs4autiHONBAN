@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- home.cssと連携 -->
    <link rel="stylesheet" href="{{ asset('css/dentist.css') }}"> <!-- home.cssと連携 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> <!-- jQueryのライブラリを読み込み -->
    <script src="{{ asset('/js/home.js') }}"></script> <!-- home.jsと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>医療スケジュール編集画面 VS4</title>
</head>

<div class="container">
<div class="edit">
    <form method="POST" action="{{route('medical_update',['id'=> $schedule->id])}}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <table class="table-hover">
            <thead>
                <tr>
                    <th >スケジュール名</th>
                    <td><input type="text" name="schedule_name" value="{{ $schedule->schedule_name}}" class="form-control"></td>
                </tr>
                <tr>
                    <th >一番目画像</th>
                    <td><img src="{{asset('img/sort/'.$schedule->illustOne->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image0" value="{{ $schedule->image0}}" class="form-control"></td>
                </tr>
                <tr>
                    <th >二番目画像</th>
                    <td><img src="{{asset('img/sort/'.$schedule->illustTwo->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image1" value="{{ $schedule->image1}}" class="form-control"></td>
                </tr>
                @if(isset($schedule->image2))
                <tr>
                    <th >三番目画像</th>
                    <td><img src="{{asset('img/sort/'.$schedule->illustThree->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image2" value="{{ $schedule->image2}}" class="form-control"></td>
                </tr>
                @endif
                @if(isset($schedule->image3))
                <tr>
                    <th >四番目画像</th>
                    <td><img src="{{asset('img/sort/'.$schedule->illustFour->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image3" value="{{ $schedule->image3}}" class="form-control"></td>
                </tr>
                @endif
                @if(isset($schedule->image4))
                <tr>
                    <th >五番目画像</th>
                    <td><img src="{{asset('img/sort/'.$schedule->illustFive->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image4" value="{{ $schedule->image4}}" class="form-control"></td>
                </tr>
                @endif
            </thead>
        </table>

                <div class="button"><input type="submit" value="更新">
                    <h6>更新ボタンを押さないと変更されません</h6>
                   <!--  <h4>!!空欄のままだとエラーになります。クラス番号を削除するときは<span style="color:red;">000</span>を入力してください!!</h4> -->
                </div>
    </form>
    <div class="table_main"  style="background-color:lightsteelblue;">
        <h2>保存画面一覧</h2>
        <div class="image-list">
            <table>
                <tbody>
                    <tr class="cell">
                        <div class="img">
                            <ul>
                                <li>1</li>
                                <li>問診</li>
                                <li><img src="{{ asset('img/medical/counsel.jpeg') }}" alt="counsel"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>2</li>
                                <li>耳</li>
                                <li><img src="{{ asset('img/medical/ear.png') }}" alt="ear"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>3</li>
                                <li>病院</li>
                                <li><img src="{{ asset('img/medical/hospital.jpeg') }}" alt="hospital"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>4</li>
                                <li>口を開ける</li>
                                <li><img src="{{ asset('img/medical/mouth.jpeg') }}" alt="mouth"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>5</li>
                                <li>MRI</li>
                                <li><img src="{{ asset('img/medical/mri.jpeg') }}" alt="mri"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>6</li>
                                <li>鼻</li>
                                <li><img src="{{ asset('img/medical/nose.png') }}" alt="nose"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>7</li>
                                <li>血圧</li>
                                <li><img src="{{ asset('img/medical/pressure.jpeg') }}" alt="pressure"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>8</li>
                                <li>計測</li>
                                <li><img src="{{ asset('img/medical/scale.jpeg') }}" alt="scale"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>9</li>
                                <li>注射</li>
                                <li><img src="{{ asset('img/medical/shot.jpeg') }}" alt="shot"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>10</li>
                                <li>静かにする</li>
                                <li><img src="{{ asset('img/sort/pose_silent_boy.png') }}" alt="silent"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>11</li>
                                <li>トイレ</li>
                                <li><img src="{{ asset('img/sort/toilet_benki.png') }}" alt="toilet"></li>
                            </ul>
                        </div>


                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
