<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>自閉症・発達障害専門掲示板新規スレッド作成ページ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.5,maximum-scale=2.0,user-scalable=yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta content="ボランティア団体IT2Uによる掲示板サイト。自閉症や、発達障害などの障がいを持つ方、家族に持つ方向けの専門掲示板 育児や暮らしの中の悩みを共有してみませんか？" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/favicon_bbs.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/thread.css') }}">
</head>
<body>
    <div class="wrap">
        <main>
            <div class="top">
                <a href="{{route('bbs_list')}}">トップページに戻る</a>
                <h1>自閉症・発達障害専門掲示板新規スレッド作成</h1>
                <form method="POST" action="{{route('bbs_create')}}" enctype="multipart/form-data">
                @csrf           
                <div class="category"> 
                   <h5>カテゴリーを一つ選んでください</h5>
                   <p>
                        <label for="inq1"><input type="radio" id="inq1" name="category" value="7" checked>自閉症全般</label>
                        <label for="inq2"><input type="radio" id="inq2" name="category" value="8">発達障害全般</label>
                        <label for="inq3"><input type="radio" id="inq4" name="category" value="10">就学・学校関係</label>
                        <label for="inq3"><input type="radio" id="inq5" name="category" value="11">医療・行政関係</label>
                        <label for="inq3"><input type="radio" id="inq6" name="category" value="12">家庭・生活関係</label>
                        <label for="inq3"><input type="radio" id="inq7" name="category" value="13">おすすめ本・リンク・グッズ</label>
                        <label for="inq4"><input type="radio" id="inq8" name="category" value="14">その他</label>
                        <label for="inq3"><input type="radio" id="inq3" name="category" value="9">管理人への要望</label>
                    </p>
                </div>
                
                    <label for="name">ハンドルネーム:</label>
                    <input type="text"size="35" name="name" value="名無し">
                    <br>
                    <label for="thread_title">スレッドタイトル:</label>
                    <input type="text" size="40"name="title" required>
                    <br>
                    <label for="thread_content">コメント１:</label>
                    <textarea name="comment" rows="5" required></textarea>
                    <br>



                <p>&nbsp;</p>
                <input type="submit" class="submitbtn" name="subbtn" value="スレッド作成">
                </form>
                
            </div>
        </main>
        <footer class="site-footer">
            <div class="bc-sitemap-wrapper">
                <div class="sitemap clearfix">
                    <div class="site-info">
                        <div class="widget">
                            <div class="copy-right">
                                <span class="copy-right-text">© All rights reserved by IT2U</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
        </footer>
    </div>
</body>
</html>
