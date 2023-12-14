<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>自閉症・発達障害専門掲示板違反報告ページ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.5,maximum-scale=2.0,user-scalable=yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta content="出雲のボランティア団体IT2Uによる掲示板コミュニティサイト。自閉症や、発達障害などの障がいを持つ方、家族に持つ方向けの専門掲示板 育児や暮らしの中の悩み・情報を共有してみませんか？会員登録なしで利用できます。" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/thread.css') }}">
</head>
<body>
    <div class="wrap">
    <main>
        <div class="top">
            <a href="{{route('bbs_list')}}"><h1>自閉症・発達障害専門掲示板</h1></a>

           @if(isset($thread))
           <h5>対象スレッド名：{{$thread->title}}</h5>
            <form class="form-inline" action="{{route('thread_alert_post',['id'=>$thread->id])}}" method="POST">
                @csrf
                <div class="check">
                    <button type="submit" style="padding:10px;">
                        <i class="fa fa-plus"></i> 通報する
                    </button>
                </div>
            </form>
            @elseif(isset($comment))
            <h5>対象投稿コメント：{{$comment->comment}}</h5>
            <form class="form-inline" action="{{route('comment_alert_post',['id'=>$comment->id])}}" method="POST">
                    @csrf
                    <div class="check">
                        <button type="submit" style="padding:10px;">
                            <i class="fa fa-plus"></i> 通報する
                        </button>
                    </div>
                </form>
            @else
            <h5>対象返信コメント：{{$reply->comment}}</h5>
            <form class="form-inline" action="{{route('reply_alert_post',['id'=>$reply->id])}}" method="POST">
                    @csrf
                    <div class="check">
                        <button type="submit" style="padding:10px;">
                            <i class="fa fa-plus"></i> 通報する
                        </button>
                    </div>
                </form>
            @endif
        </div>
         
          
            
        </main>
    </div>
</body>
</html>
