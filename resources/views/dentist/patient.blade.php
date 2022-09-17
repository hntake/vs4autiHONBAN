@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- schedule.cssと連携 -->
<title>歯科保存リスト画面  VS4Auti</title>

@section('content')


<!-- 新規スケジュール作成パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')


        <div class="list-area">

                <h1>スケジュールリスト(歯科)</h1>
                <div class="list">
                   <!--  sort button
                    <form action="{{ route('sort') }}" method="GET">
                        @csrf
                        <select name="narabi">
                            <option value="asc">昇順</option>
                            <option value="desc">降順</option>
                        </select>
                        <div class="form-group">
                            <div class="button">
                                <input type="submit" value="並び替え">
                                <i class="fa fa-plus">並び替え</i>
                            </input>
                        </div>
                    </div>
                </form> -->

                <table class="result">
                    <tbody id="tbl">
                            <!--スケジュール一覧 -->
                                    @foreach ($schedules as $schedule)
                                        <tr >
                                            <td >{{ $schedule->schedule_name }}</td>
                                            <td ><div  class="list_button"><a href="{{ route('dentist_schedule',['id'=>$schedule->id]) }}">表示</a></div></td>
                                        </tr>
                                    @endforeach
                        </tbody>
                    </table>
                </div>
            </tbody>
        </div>
@endsection
