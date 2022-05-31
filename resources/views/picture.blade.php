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
    <title>選択画像</title>
</head>
@section('content')

<div class="container">
            <div class="card">
            <td><img src="{{ asset('storage/' . $image->image) }}" alt="image" style="width: 100px; height: auto;"/><td>

                    <div class="delete_button">
                        <div  class="button"><a href="{{ route('delete_picture',['id'=> $image->id]) }}" >削除</a></div>
                    </div>
                </div>


</div>
@endsection
