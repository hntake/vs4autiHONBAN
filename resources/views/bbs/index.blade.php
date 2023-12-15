<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>自閉症・発達障害専門掲示板 {{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta content="出雲のボランティア団体IT2Uによる掲示板サイト。自閉症や、発達障害などの障がいを持つ方、家族に持つ方向けの専門掲示板 育児や暮らしの中の悩みを共有してみませんか？" name="description">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
  
</head>
<body>
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
                                <td class="number" style="text-align:start;">{{ $comment->id }}</td>
                                <td class="number">{{ $comment->created_at }}</td>
                                <td class="number">{{ $comment->name }}</td>
                            </tr>
                            <tr >
                                <td style="width:80%; word-break: break-all;">{{ $comment->comment }}</td>
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
                                                    <td class="reply">{{ $post->comment }}</td>
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
