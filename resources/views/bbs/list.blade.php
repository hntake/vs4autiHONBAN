<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>自閉症・発達障害専門掲示板トップページ</title>
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
                <h6>※不適切と思われるスレッド・コメントは管理人の判断で削除いたします。</h6>
                <h6>※個人情報を特定する恐れがある書き込みは避けてください。そのように判断された場合は削除いたします。</h6>
                <h4>スレッド一覧</h4>
                <div class="button">
                    <li class="header_nav_itm">
                        <a href="{{ url('bbs/create') }}" class="header_nav_itm_link">新規スレッドを作成する</a>
                        <div class="description">気楽にどうぞ！</div>
                    </li>
                </div>
                <div>
                        <form action="{{ route('bbs_search') }}" method="GET">
                            <input type="text" name="keyword" >
                            <input type="submit" value="検索">
                        </form>
                </div>
            </div>
                <div class="list">
                    <div class="sort">
                        <form action="{{ route('bbs_sort') }}" method="GET">
                                    @csrf
                                    <select name="narabi">
                                        <option value="asc">古い順</option>
                                        <option value="desc">最新順</option>
                                        <option value="up">コメント多い順</option>
                                        <option value="down">コメント少ない順</option>
                                    </select>
                                    <div class="form-group">
                                        <div class="button">
                                            <input type="submit" value="並び替え">
                                            <i class="fa fa-plus"></i>
                                        </input>
                                    </div>
                                </div>
                            </form>
                    </div>
                    <table>
                        <thead>
                                <th>カテゴリ</th>
                                <th>スレッド名</th>
                                <th>最終更新日</th>
                                <th>コメント数</th>
                                <th></th>
                        </thead>
                        @if(isset($threads))
                            @foreach ($threads as $thread)

                                <tr>
                                    <td>{{ $thread->Category->category }}</td>
                                    <td style="width:50%; word-break: break-all;"><a style="font-size:larger;" href="{{route('bbs_index',['id'=>$thread->id])}}">{{ $thread->title }}</a></td>
                                    <td class="number">{{ $thread->updated_at }}</td>
                                    <td class="number">{{ $thread->count}}</td>
                                    @if($thread->alert==0)
                                    <td><a href="{{route('thread_alert',['id'=>$thread->id])}}" class="header_nav_itm_link">違反報告する</a></td>
                                    @else
                                    <td>違反報告済み</td>
                                    @endif
                                    @if($role==1)
                                    <td class="list_button"><a href="{{ route('bbs_delete',['id'=> $thread->id]) }}">削除</a></td>
                                    @endif
                                    <tr>
                                            <td colspan="5"><hr></td> <!-- 水平線を挿入 -->
                                        </tr>
                                </tr>
                            @endforeach
                    

                    </table>
                
                    {{ $threads->appends(request()->query())->links() }}
                    @endif
                </div>
        </main>
        <footer class="site-footer">
            <div class="bc-sitemap-wrapper">
                <div class="sitemap clearfix">
                    <div class="site-info">
                        <div class="widget">
                            <div class="copy-right">
                                <span class="copy-right-text">© All rights reserved by llco</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" class="gotop">トップへ</a>
        </footer>
        <div class="all_banner">
            <div class="left-banner">
                <a target="_blank" href=https://itcha50.com><img src="../img/itcha50white.png" alt="banner" style="width:100%;"></a>
            </div>
            <div class="right-banner">
                <a target="_blank" href=https://eng50cha.com><img src="../img/banner.png" alt="banner" style="width:100%;"></a>
            </div>
            <div class="banner">
                <a target="_blank" href=https://play.google.com/store/apps/details?id=com.llco.hair_cut><img src="../img/hair_banner.png" alt="banner" style="width:100%;"></a>
                <!-- <a target="_blank" href=https://play.google.com/store/apps/details?id=com.may_protect><img src="../img/protect_banner.png" alt="banner" style="width:30%;"></a> -->
                <a target="_blank" href=https://play.google.com/store/apps/details?id=com.tmp.my_request&pcampaignid=web_share><img src="../img/request_banner.png" alt="banner" style="width:100%;"></a>

            </div> 
        </div>
    </div>
</body>
</html>
