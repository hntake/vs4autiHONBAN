<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>自閉症・発達障害専門掲示板コメント削除ページ </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.5,maximum-scale=2.0,user-scalable=yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta content="ボランティア団体IT2Uによる掲示板サイト。自閉症や、発達障害などの障がいを持つ方、家族に持つ方向けの専門掲示板 育児や暮らしの中の悩みを共有してみませんか？" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/thread.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        function toggleReplies(commentId) {
            $('#replies_' + commentId).collapse('toggle');
        }
    </script>
</head>
<body>
    <div class="wrap">
        <main style="max-width:100%;">
            <div class="top">
                <a href="{{route('bbs_list')}}"><h1>自閉症・発達障害専門掲示板</h1></a>
                <p></p>

                
            </div>
           
            <div class="list">
                <table style="border:0px; width:100%;">
                    <thead>
                        <th>id</th>
                        <th>投稿日時</th>
                        <th>ハンドルネーム</th>
                        <th>コメント</th>
                        <th></th>
                        <th></th>

                    </thead>
                @foreach ($comments as $comment)

                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->created_at }}</td>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->comment }}</td>
                                <div class="list_button"><a href="{{ route('bbs_delete',['id'=> $thread->id]) }}">削除</a></div>

                                @if($comment->reply!==0)
                                <td><a href="javascript:void(0);" onclick="toggleReplies({{ $comment->id }})">返信を見る</a></td>
                                <tr id="replies_{{ $comment->id }}" class="collapse">
                                <td colspan="5">
                                        @foreach ($posts as $post)
                                            <td class="reply">{{ $post->name }}</td>
                                            <td class="reply">{{ $post->created_at }}</td>
                                            <td class="reply">{{ $post->comment }}</td>
                                            <div class="list_button"><a href="{{ route('bbs_delete',['id'=> $thread->id]) }}">削除</a></div>


                                        @endforeach
                                @endif

                            </tr>
                @endforeach
                            
            

                {{ $comments->links() }}
            </div>
        </main>
    </div>
 
</body>
</html>
