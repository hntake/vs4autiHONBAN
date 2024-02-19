@extends('layouts.app')
@section('content')
<link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">
<link rel="stylesheet" href="{{ asset('css/design.css') }}"> <!-- home.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/artist.css') }}"> <!-- home.cssと連携 -->

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="{{ route('design_download_each',['id'=> $download->id]) }}">
                @csrf
                <div class="">
                            <button type="submit" onclick="showPopupMessage()">
                                <i class="fa fa-plus"></i> ダウンロードする
                            </button>
                    <h2>ダウンロード画面</h2>
                    <div class="card-body" style="text-align:start;">
                        <th >作品名</th>
                            <tr>
                                <td>{{ $download->name}}</td>
                            </tr>
                
                        <div class="">
                                <img src="{{ asset('storage/' . $download->Design->real_image) }}" alt="image" >
                            </div>
                        </div>
                        <div class="attribution">
                            <h5>この画像を使用する場合は、作成者と出典を忘れずに記載してください。 以下の帰属の詳細をコピーして、プロジェクトまたはウェブサイトに含めてください</h5>
                            <p id="textToCopy">Image by {{$artist}} on IT2U</p>
                            <button onclick="copyToClipboard()">コピー</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <td><a href="{{route('design_list')}}">障がい者アートトップページへ</a></td>
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
        content.innerHTML = "この画像を使用する場合は、作成者と出典を忘れずに記載してください。以下の帰属の詳細をコピーして、プロジェクトまたはウェブサイトに含めてください<p id=\"textToCopy\">Image by {{$artist}} on IT2U</p><button onclick=\"copyToClipboard()\">コピー</button>";
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

@endsection
