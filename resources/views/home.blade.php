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
    <title>ホーム画面 VS4  視覚支援ツール</title>
</head>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <!-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif ログイン機能停止-->
                    <div class="card-header">
                        @csrf
                        <!-- CSRF保護 -->
                        <tr>
                            <td>{{ $schedule->id }}</td><br>
                            <td>{{ $schedule->schedule_name }}</td><br>
                            <td><img src="{{ asset('storage/' . $schedule->image0) }}" alt="image" style="width: 80px; height: auto;"></td>
                            <td>
                                <p>
                                <div class="arrow"></div>
                                </p>
                            </td>
                            <td><img src="{{ asset('storage/' . $schedule->image1) }}" alt="image" style="width: 80px; height: auto;"></td>
                            @if(isset($schedule->image2))
                            <td>
                                <p>
                                <div class="arrow"></div>
                                </p>
                            </td>
                            <td><img src="{{ asset('storage/' . $schedule->image2) }}" alt="image" style="width: 80px; height: auto;"></td>
                            @endif
                            @if(isset($schedule->image3))
                            <td>
                                <p>
                                <div class="arrow"></div>
                                </p>
                            </td>
                            <td><img src="{{ asset('storage/' . $schedule->image3) }}" alt="image" style="width: 80px; height: auto;"></td>
                            @endif
                            @if(isset($schedule->image4))
                            <td>
                                <p>
                                <div class="arrow"></div>
                                </p>
                            </td>
                            <td><img src="{{ asset('storage/' . $schedule->image4) }}" alt="image" style="width: 80px; height: auto;"></td>
                            @endif
                        </tr>

                    </div>

                    <div class="route">
                        <div class="submit_button">
                            <a href="{{ route('create') }}">新規作成</a>
                        </div>
                        <div class="route">
                            <div class="submit_button">
                                <a href="{{ route('dashboard') }}">マイリストへ</a>
                            </div>

                            <!--要望出るまでコメントアウト
                            <div class="submit_button">
                            <a href="{{ route('search') }}">スケジュール検索</a>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
