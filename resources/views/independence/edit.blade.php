@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- home.cssと連携 -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- home.cssと連携 -->
    <link rel="stylesheet" href="{{ asset('css/independence.css') }}"> <!-- home.cssと連携 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> <!-- jQueryのライブラリを読み込み -->
    <script src="{{ asset('/js/home.js') }}"></script> <!-- home.jsと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>自立支援スケジュール編集画面 VS4</title>
</head>

<div class="container">
<div class="edit">
    <form method="POST" action="{{route('independence_update',['id'=> $schedule->id])}}" enctype="multipart/form-data">
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
                    <td rowspan="2"><img src="{{asset('storage/' . $schedule->image1)}}" alt="image" name="area1"></td>
                    <td style="border: 3px solid lightgray;">変更しない<input id="ask" type="radio" name="ask1" value="1" checked></td>
                    <td style="border: 3px solid lightgray;">変更する<input id="ask" type="radio" name="ask1" value="2" ><input type="file" name="image1" value="{{ $schedule->image1}}" class="form-control"></td>
                    <td>
                        <input type="text" name="explain1" class="form-control"  value="{{ $schedule->explain1}}" >
                    </td>
                    <td>
                        <input type="text" name="caution1" class="form-control"  value="{{ $schedule->caution1}}" >
                    </td>
                </tr>
                <tr>
                    <th rowspan="2">二番目画像</th>
                    <td rowspan="2"><img src="{{asset('storage/' . $schedule->image2)}}" alt="image" name="area2"></td>
                    <td style="border: 3px solid lightgray;">変更しない<input id="ask" type="radio" name="ask2" value="1" checked></td>
                    <td style="border: 3px solid lightgray;">変更する<input id="ask" type="radio" name="ask2" value="2" ><input type="file" name="image2" value="{{ $schedule->image2}}" class="form-control"></td>
                    <td>
                        <input type="text" name="explain2" class="form-control"  value="{{ $schedule->explain2}}" >
                    </td>
                    <td>
                        <input type="text" name="caution2" class="form-control"  value="{{ $schedule->caution2}}" >
                    </td>
                </tr>
                @if(isset($schedule->image3))
                <tr>
                    <th rowspan="2">三番目画像</th>
                    <td rowspan="2"><img src="{{asset('storage/' . $schedule->image3)}}" alt="image" name="area3"></td>
                    <td style="border: 3px solid lightgray;">変更しない<input id="ask" type="radio" name="ask3" value="1" checked></td>
                    <td style="border: 3px solid lightgray;">変更する<input id="ask" type="radio" name="ask3" value="2" ><input type="file" name="image3" value="{{ $schedule->image3}}" class="form-control"></td>
                    <td>
                        <input type="text" name="explain3" class="form-control"  value="{{ $schedule->explain3}}" >
                    </td>
                    <td>
                        <input type="text" name="caution3" class="form-control"  value="{{ $schedule->caution3}}" >
                    </td>
                </tr>
                @endif
                @if(isset($schedule->image4))
                <tr>
                    <th rowspan="2">四番目画像</th>
                    <td rowspan="2"><img src="{{asset('storage/' . $schedule->image4)}}" alt="image" name="area4"></td>
                    <td style="border: 3px solid lightgray;">変更しない<input id="ask" type="radio" name="ask4" value="1" checked></td>
                    <td style="border: 3px solid lightgray;">変更する<input id="ask" type="radio" name="ask4" value="2" ><input type="file" name="image4" value="{{ $schedule->image4}}" class="form-control"></td>
                    <td>
                        <input type="text" name="explain4" class="form-control"  value="{{ $schedule->explain4}}" >
                    </td>
                    <td>
                        <input type="text" name="caution4" class="form-control"  value="{{ $schedule->caution4}}" >
                    </td>
                </tr>
                @endif
                @if(isset($schedule->image5))
                <tr>
                    <th rowspan="2">五番目画像</th>
                    <td rowspan="2"><img src="{{asset('storage/' . $schedule->image5)}}" alt="image" name="area5"></td>
                    <td style="border: 3px solid lightgray;">変更しない<input id="ask" type="radio" name="ask5" value="1" checked></td>
                    <td style="border: 3px solid lightgray;">変更する<input id="ask" type="radio" name="ask5" value="2" ><input type="file" name="image5" value="{{ $schedule->image5}}" class="form-control"></td>
                    <td>
                        <input type="text" name="explain5" class="form-control"  value="{{ $schedule->explain5}}" >
                    </td>
                    <td>
                        <input type="text" name="caution5" class="form-control"  value="{{ $schedule->caution5}}" >
                    </td>
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
