@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- home.cssと連携 -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- home.cssと連携 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> <!-- jQueryのライブラリを読み込み -->
    <script src="{{ asset('/js/home.js') }}"></script> <!-- home.jsと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>写真スケジュール編集画面 VS4</title>
</head>

<div class="container">
<div class="edit">
    <form method="POST" action="{{route('update',['id'=> $schedule->id])}}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <table class="table-hover">
            <thead>
                <tr>
                    <th >スケジュール名</th>
                    <td><input type="text" name="schedule_name" value="{{ $schedule->schedule_name}}" class="form-control"></td>
                </tr>
                <tr>
                    <th rowspan="2">一番目画像</th>
                    <td rowspan="2"><img src="{{asset('storage/' . $schedule->image0)}}" alt="image" name="area1"></td>
                    <td style="border: 3px solid gray;">変更しない<input id="ask" type="radio" name="ask1" value="1" checked></td>
                    <td style="border: 3px solid gray;">変更する<input id="ask" type="radio" name="ask1" value="2" ><input type="file" name="image0" value="{{ $schedule->image0}}" class="form-control"></td>
                    <td></td>
                        </div>
                    </div>
                </tr>
                <tr>
                    <th rowspan="2">二番目画像</th>
                    <td rowspan="2"><img src="{{asset('storage/' . $schedule->image1)}}" alt="image" ></td>
                    <td style="border: 3px solid gray;">変更しない<input id="ask" type="radio" name="ask2" value="1" checked></td>
                    <td style="border: 3px solid gray;">変更する<input id="ask" type="radio" name="ask2" value="2" ><input type="file" name="image1" value="{{ $schedule->image1}}" class="form-control"></td>
                </tr>
                @if(isset($schedule->image2))
                <tr>
                    <th rowspan="2">三番目画像</th>
                    <td rowspan="2"><img src="{{asset('storage/' . $schedule->image2)}}" alt="image" ></td>
                    <td style="border: 3px solid gray;">変更しない<input id="ask" type="radio" name="ask3" value="1" checked></td>
                    <td style="border: 3px solid gray;">変更する<input id="ask" type="radio" name="ask3" value="2" ><input type="file" name="image2" value="{{ $schedule->image2}}" class="form-control"></td>
                </tr>
                @endif
                @if(isset($schedule->image3))
                <tr>
                    <th rowspan="2">四番目画像</th>
                    <td rowspan="2"><img src="{{asset('storage/' . $schedule->image3)}}" alt="image" ></td>
                    <td style="border: 3px solid gray;">変更しない<input id="ask" type="radio" name="ask4" value="1" checked></td>
                    <td style="border: 3px solid gray;">変更する<input id="ask" type="radio" name="ask4" value="2" ><input type="file" name="image3" value="{{ $schedule->image3}}" class="form-control"></td>
                </tr>
                @endif
                @if(isset($schedule->image4))
                <tr>
                    <th rowspan="2" >五番目画像</th>
                    <td rowspan="2"><img src="{{asset('storage/' .$schedule->image4)}}" alt="image" ></td>
                    <td style="border: 3px solid gray;">変更しない<input id="ask" type="radio" name="ask5" value="1" checked></td>
                    <td style="border: 3px solid gray;">変更する<input id="ask" type="radio" name="ask5" value="2" ><input type="file" name="image4" value="{{ $schedule->image4}}" class="form-control"></td>
                </tr>
                @endif
            </thead>
        </table>

                <div class="button"><input type="submit" value="更新">
                    <h6>更新ボタンを押さないと変更されません</h6>
                   <!--  <h4>!!空欄のままだとエラーになります。クラス番号を削除するときは<span style="color:red;">000</span>を入力してください!!</h4> -->
                </div>
    </form>

</div>

@endsection
