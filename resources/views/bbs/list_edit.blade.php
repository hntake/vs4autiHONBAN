<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>自閉症・発達障害専門掲示板トップページ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.5,maximum-scale=2.0,user-scalable=yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta content="ボランティア団体IT2Uによる掲示板サイト。自閉症や、発達障害などの障がいを持つ方、家族に持つ方向けの専門掲示板 育児や暮らしの中の悩みを共有してみませんか？" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/thread.css') }}">
</head>
<body>
    <div class="wrap">
        <div class="top">
        <a href="{{route('bbs_list')}}">トップページに戻る</a>

            <h1>自閉症・発達障害専門掲示板</h1>
            <h4>スレッド一覧</h4>
            <div class="button">
                                <a href="{{ url('bbs/thread') }}" class="header_nav_itm_link">新規スレッドを作成する</a>
                                <div class="description1">気楽にどうぞ！</div>
            </div>
        </div>
        <main>
            <div class="list">
                <table>
                    <thead>
                            <th>カテゴリ</th>
                            <th>スレッド名</th>
                    </thead>
                    @if(isset($threads))
                        @foreach ($threads as $thread)

                            <tr>
                                <td>{{ $thread->Category->category }}</td>
                                <td>{{ $thread->title }}</td>
                                @if($user->role==1)
                                <div class="button">
                                <a href="{{ url('bbs/edit') }}" class="header_nav_itm_link">修正する</a>
                                <a href="{{ url('bbs/delete') }}" class="header_nav_itm_link">削除する</a>
                                </div>  
                                @endif
                            </tr>
                        @endforeach
                

                </table>
            
                {{ $threads->links() }}
                @endif
            </div>
        </main>
    </div>
</body>
</html>
