{{-- ヘッダー部分の設定 --}}
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/stripe.css') }}"> <!-- schedule.cssと連携 -->
<title>ダウンロード完了画面 </title>


@section('content')
<header id="header">
    <div class="wrapper">
        <div class="back">
            <button class="button"><a href="{{ url('/design/list') }}">トップページに戻る</a></button>
        </div>
    </div>
    <script>
       document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('card-button').addEventListener('click', function () {
                // ボタンの表示を「処理中...」に変更
                this.innerHTML = 'ダウンロード完了しました';

                 // フォームをサブミット
                downloadForm.submit();

            });
        });
    </script>
</header>

    <div>
    @if(session()->has('zipFilePath'))

    <form id="downloadForm" action="{{ route('executeDownload') }}" method="post">
        @csrf
        <button  id="card-button" type="submit">ダウンロード実行</button>
    </form>
  
    @else
            <p>ダウンロード完了しました！</p>
    @endif
</div>
