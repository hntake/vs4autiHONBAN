<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>自閉症・発達障害専門掲示板 返信入力ページ</title>
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
                <h1>自閉症・発達障害専門掲示板</h1>
                <td><a href="{{route('bbs_index',['id'=>$comment->thread_id])}}">対象スレッド名：{{ $comment->title }}</a></td>
                <h2>対象コメント:{{$comment->comment}}</h2>
                
            </div>
            <h4>返信を入力</h4>

            <div class="list">
                <form id="myForm" method="POST" action="{{ route('bbs_reply_post',['id'=>$comment->id])}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <table>
                

                                <tr>
                                <label for="name">ハンドルネーム:</label>

                                <input type="text"size="35" name="name" value="名無し">
                                <br>
                                <label for="thread_content">コメント:</label>

                                <textarea name="comment" rows="5" required></textarea>

                                </tr>
                    </table>
                    <input type="submit" value="送信">
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
