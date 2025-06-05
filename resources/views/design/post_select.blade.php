<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>障がい者アート 作品タイプ選択ページ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="障がい者アートの魅力を探求するプラットフォーム。アーティストの感動的な作品やストーリーを通じて、多様性と創造性を称賛します。">
    <meta name="keywords" content="障がい者アート, アートプロジェクト, アートコミュニティ, 多様性, 創造性">
    <meta name="author" content="IT2U">
    <meta name="robots" content="index, follow">

    <link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/design.css') }}">
    <link rel="stylesheet" href="{{ asset('css/artist.css') }}">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962" crossorigin="anonymous"></script>

</head>
<body>

    <header>
        <h1>障がい者アート 作品タイプ選択ページ</h1>
    </header>

    <section class="select_button">
        <h3>アップロードする作品の販売タイプをお選びください</h3>
        <button><a href="{{url('design/post')}}">ダウンロード販売を選択</a></button>
        <button><a href="{{url('design/post_ad')}}">現物販売を選択</a></button>
    </section>
    <section>
    </section>
    
    <section>
        <h2>お問い合わせ</h2>
        <p>ご質問やお問い合わせがあれば、以下の連絡先までお気軽にご連絡ください。</p>
        <address>
            ボランティア団体IT2U<br>
            電話：[連絡先電話番号070-4225-0615]<br>
            メール：[info@itcha50.com]
        </address>
    </section>

    <footer>
        <p><a href="https://itcha50.com/design/list">&copy; IT2U 障がい者アート共有サイト</a></p>
    </footer>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="genre[]"]');
        let checkedCount = 0;
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    checkedCount++;
                } else {
                    checkedCount--;
                }
                if (checkedCount > 3) {
                    alert('最大3つまで選択できます');
                    this.checked = false;
                    checkedCount--;
                }
            });
        });
    });
</script>
</html>
