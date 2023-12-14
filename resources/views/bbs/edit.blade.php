<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>自閉症・発達障害専門掲示板編集ページ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.5,maximum-scale=2.0,user-scalable=yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta content="ボランティア団体IT2Uによる掲示板サイト。自閉症や、発達障害などの障がいを持つ方、家族に持つ方向けの専門掲示板 育児や暮らしの中の悩みを共有してみませんか？" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
</head>
<body>
    <div class="wrap">
        <div class="top">
        <a href="{{route('bbs_list')}}">トップページに戻る</a>

            <h1>自閉症・発達障害専門掲示板スレッド編集ページ</h1>
        </div>
        <!--  -->
            <div class="list">
                <table>
                    <thead>
                            <th>カテゴリ</th>
                            <th>スレッド名</th>
                    </thead>
                @foreach ($threads as $thread)

                            <tr>
                                <td>{{ $thread->title }}</td>
                                <td>
                                <div class="list_button"><a href="{{ route('bbs_delete',['id'=> $thread->id]) }}">削除</a></div>
                            </td>
                            </tr>
                                @endforeach
                </table>
            
                {{ $threads->links() }}
            </div>
    </div>
</body>
</html>
