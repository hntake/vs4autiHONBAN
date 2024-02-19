{{-- ヘッダー部分の設定 --}}
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/stripe.css') }}"> <!-- schedule.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/artist.css') }}"> <!-- schedule.cssと連携 -->
<link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">

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
        <button  id="card-button" type="submit" onclick="showPopupMessage()">ダウンロード実行</button>
    </form>
  
    @else
            <p>ダウンロード完了しました！</p>
            
            <p>この画像を使用する場合は、作成者と出典を忘れずに記載してください。 以下の帰属の詳細をコピーして、プロジェクトまたはウェブサイトに含めてください</p>
            @foreach($downloads as $download)
            <p id="textToCopy">Image by {{$download->Design->artist_name}} on IT2U</p>
            <button onclick="copyToClipboard()">コピー</button>
            @endforeach
    @endif
</div>
<script>
        function copyToClipboard() {
            var text = document.getElementById('textToCopy').innerText;
            navigator.clipboard.writeText(text)
                .then(() => alert('テキストがコピーされました'))
                .catch(err => console.error('コピーに失敗しました', err));
        }
    </script>
<script>
    function showPopupMessage() {
        var overlay = document.createElement('div');
        overlay.className = 'popup-overlay';

        var content = document.createElement('div');
        content.className = 'popup-content';
        content.innerHTML = "この画像を使用する場合は、作成者と出典(IT2U)を忘れずに記載してください。 作成者の詳細は添付の領収書pdfを参照して、プロジェクトまたはウェブサイトに含めてください";
        overlay.appendChild(content);
        document.body.appendChild(overlay);

        // ポップアップ外のクリックやキー入力を無効にするためのイベントリスナー
        overlay.addEventListener('click', function(event) {
            if (event.target === overlay) {
                hidePopupMessage();
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                hidePopupMessage();
            }
        });
    }

    function hidePopupMessage() {
        var overlay = document.querySelector('.popup-overlay');
        if (overlay) {
            overlay.remove();
        }
    }
</script>