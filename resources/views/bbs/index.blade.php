<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>テーマ：{{$title}} 自閉症・発達障害専門掲示板 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta content="テーマ：{{$title}} 出雲のボランティア団体IT2Uによる掲示板サイト。自閉症や、発達障害などの障がいを持つ方、家族に持つ方向けの専門掲示板
    育児や暮らしの中の悩みや情報を共有してみませんか？" name="description">
    <meta name="keywords" content="自閉症,発達障害,知的障害,掲示板情報共有,発達障害支援,悩み相談,子育て,発達支援,ASD,ADHD,アプリ紹介,サービス紹介,特別支援,生活の質向上, 
    IT2U">
    <meta name="robots" content="index, follow">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@LLco1118">
    <meta name="twitter:title" content="ITの力で障がいのある人をサポートしたい!IT2Uのアカウントです">
    <meta name="twitter:description" content="自閉症や、発達障害などの障がいを持つ方、家族に持つ方向けの専門掲示板 育児や暮らしの中の悩みを共有してみませんか？">
    <meta name="twitter:image" content="https://itcha50.com/img/bbs_ad2.png">
    <link rel="shortcut icon" href="{{ asset('/favicon_bbs.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/thread.css') }}">

    <script>
        function toggleReplies(commentId) {
            $('#replies_' + commentId).collapse('toggle');
        }
    </script>
    <script>
                // IE、Safari対応
        // smoothscroll.js読み込み
        // https://github.com/iamdustan/smoothscroll

        // セレクタ名（.pagetop）に一致する要素を取得
        const pagetop_btn = document.querySelector(".pagetop");

        // .pagetopをクリックしたら
        pagetop_btn.addEventListener("click", scroll_top);

        // ページ上部へスムーズに移動
        function scroll_top() {
        window.scroll({ top: 0, behavior: "smooth" });
        }

        // スクロールされたら表示
        window.addEventListener("scroll", scroll_event);
        function scroll_event() {
        if (window.pageYOffset > 100) {
            pagetop_btn.style.opacity = "1";
        } else if (window.pageYOffset < 100) {
            pagetop_btn.style.opacity = "0";
        }
        }
    </script>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962" crossorigin="anonymous"></script>

</head>
<body>
    <!-- Twitterシェアボタン -->

    <blockquote class="twitter-tweet"><p lang="en" dir="ltr"> 
        <!-- <a href="https://t.co/ffKnsVKwG4"></a> -->
        <!-- <a href="https://twitter.com/SpaceX/status/1732824684683784516?ref_src=twsrc%5Etfw"></a> -->
        <a href="https://twitter.com/share" class="twitter-share-button" data-text="新スレッド：{{$title}}" data-url="{{url('bbs/index/'.$thread)}}">Tweet</a>
    </blockquote>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <div class="wrap">
    
        <main style="max-width:100%;">
            <div class="top">
                <a href="{{url('aboutus')}}"><h6>presented by IT2U</h6></a>
                <a href="{{route('bbs_list')}}"><h1>自閉症・発達障害専門掲示板</h1></a>
                <p>スレッド名:</P>
                <a href="{{route('bbs_index',['id'=>$thread]) }}" class="header_nav_itm_link"><h2>{{$title}}</h2></a>
                <div class="button">
                    <li class="header_nav_itm">
                        <a href="{{route('bbs_input',['id'=>$thread]) }}" class="header_nav_itm_link">コメントする</a>
                        <div class="description">気楽にどうぞ！</div>
                    </li>
                </div>
            </div>
           
            <div class="list">
                <table style="border:0px; width:100%;">
                    <!-- <thead>
                        <th>id</th>
                        <th>投稿日時</th>
                        <th>ハンドルネーム</th>
                        <th>コメント</th>
                        <th></th>
                        <th></th>

                    </thead> -->
                @foreach ($comments as $comment)
                            <tr >
                                <td class="number" style="text-align:start;">{{ $loop->iteration }}</td>
                                <td class="number">{{ $comment->created_at }}</td>
                                <td class="number">{{ $comment->name }}</td>
                            </tr>
                            <tr >

                                <td style="width:80%; word-break: break-all;">{!! preg_replace($pattern, $replace, $comment->comment) !!}</td>
                            </tr>
                            <tr>
                                <td><a href="{{route('bbs_reply',['id'=>$comment->id])}}">返信する</a></td>
                                @if($comment->alert==0)
                                <td><a href="{{route('comment_alert',['id'=>$comment->id])}}" class="header_nav_itm_link">違反報告する</a></td>
                                @else
                                <td>違反報告済み</td>
                                @endif
                                @if($role==1)
                                <td class="list_button"><a href="{{ route('bbs_delete_comment',['id'=> $comment->id]) }}">削除</a></td>
                                @endif
                            </tr>
                                @if($comment->reply!==0)
                                <td><a href="javascript:void(0);" onclick="toggleReplies({{ $comment->id }})">返信を見る({{$comment->reply}})</a></td>
                                    <tr id="replies_{{ $comment->id }}" class="collapse reply-container">
                                        <td colspan="5">
                                                @foreach ($posts as $post)
                                                <div class="reply">
                                                    <td class="reply">{{ $loop->iteration }}</td>
                                                    <td class="reply">{{ $post->name }}</td>
                                                    <td class="reply">{{ $post->created_at }}</td>
                                                    <td class="reply">{!! preg_replace($pattern, $replace, $post->comment) !!}</td>
                                                    @if($post->alert==0)
                                                    <td><a href="{{route('reply_alert',['id'=>$post->id])}}" class="header_nav_itm_link">違反報告する</a></td>
                                                    @else
                                                    <td>違反報告済み</td>
                                                    @endif
                                                    @if($role==1)
                                                    <td class="list_button"><a href="{{ route('bbs_delete_reply',['id'=> $post->id]) }}">削除</a></td>
                                                    @endif
                                                </div>
                
                                                @endforeach
                
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td colspan="5"><hr></td> <!-- 水平線を挿入 -->
                                    </tr>
                @endforeach
                {{ $comments->links() }}

            </div>
        </main>
        <div class="pagetop">Top</div>

    </div>
</body>
</html>
