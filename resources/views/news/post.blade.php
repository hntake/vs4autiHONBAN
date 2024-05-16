<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="出雲のボランティア団体IT2Uによる障がいサポートサイトからのお知らせはこちらから。自閉症や、発達障害などの障がいを持つ方向けに様々なサービスを提供しています。" name="description">
    <meta name="keywords" content="自閉症,発達障害,知的障害,絵カード, 掲示板、障がい者アート,情報共有,発達障害支援,悩み相談,子育て,発達支援,ASD,ADHD,アプリ紹介,
    サービス紹介, 特別支援, 生活の質向上, IT2U">
    <meta name="robots" content="index, follow">

    <title>ニュース ボランティア団体IT2Uからのお知らせです</title>
    <link rel="stylesheet" href="{{asset('../css/news.css')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Dirt&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <header id="header" class="header is-open">

            <div class="header_inner">
                <nav id="menu" class="header_nav">

                    @if (Route::has('login'))
                    <ul class="header_nav_list">
                        <li class="header_nav_itm">
                            <a href="{{url('/')}}" class=""><img src="../img/vs4auti2.png" style="width:30%; height:auto;"></a>
                        </li>

                        <li class="header_nav_itm">
                            @auth
                            <a href="{{ url('/') }}" class=" header_nav_itm_link">Home</a>
                            <div class="description1">Myホーム画面へ移動する </div>
                        </li>
                        <li class="header_nav_itm">
                            @else
                            <div class="login-button">
                                <a href="{{ route('login') }}" class="header_nav_itm_link">ログイン</a>
                                <div class="description1">ログイン画面へ移動する </div>
                            </div>
                        </li>
                        <li class="header_nav_itm">
                            <div class="register-button">
                                @if (Route::has('register'))
                                <a target="_blank" href="{{ route('register') }}" class="header_nav_itm_link">新規登録</a>
                                <div class="description1">登録は無料！全機能を使おう！ </div>

                            </div>
                        </li>
                        @endif
                        @endauth
                        @endif
                   
                    </ul>
                </nav>
            </div>

            <!--  ハンバーガーメニュー -->
            <div class="mobile-menu">
                <div id="nav-drawer">
                    <input id="nav-input" type="checkbox" class="nav-unshown">
                    <label id="nav-open" for="nav-input"><span></span></label>
                    <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                    <div id="nav-content">
                        <ul class="header_nav_list">
                            <li><a href="{{ url('feature') }}">
                                    <h3>便利な機能</h3>
                                </a></li>
                            <li class="header_nav_itm">
                                <div class="register-button">
                                    <a href="{{url('feature')}}" class="header_nav_itm_link">VS4説明動画</a>
                                    <div class="description1">マニュアル動画ページへ</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <script>
                        $(function() {
                            $('#nav-content li a').on('click', function(event) {
                                $('#nav-input').prop('checked', false);
                            });
                        });
                    </script>
                </div>
            </div>
        </header>
        <main>
            <div class="pagecontainer">
                <div class="elementor-column">
                    <div class="elementor-top">
                        <div class="elementor-heading-title">
                            お知らせ
                        </div>
                    </div>
                    <div class="elementor-bottom">
                        <div class="elementor-heading-title">
                            VS4のアップデートやメンテナンスに関する情報をお知らせします。
                        </div>
                    </div>
                </div>
                <!--  <div class="sidebar">
                <a href="https://itcha50.com"><p>視覚支援ツールVS4</p></a>
            </div> -->
                <div class="area">

                    <div class="elementor-container">
                        <div class="elementor-widget">
                            <p>作成日</p>
                        </div>
                        <div class="elementor-widget">
                            <p>カテゴリ</p>
                        </div>
                        <div class="elementor-widget">
                            <p> タイトル</p>
                        </div>
                    </div>
                    <input type="radio" name="tab_name" id="tab2" checked>
                    <label class="tab_class" for="tab2">サービス</label>
                    <div class="content_class">
                        <div class="allBlogs">
                            <div class="allBlogs_list">
                                @foreach($service as $services)
                                <div class="all_blogs_item">

                                    <ul class="category_title">
                                        <li class="notice-date">
                                            {{\Carbon\Carbon::parse($services->updated_at)->toDateString() }}
                                        </li>
                                        <li class="notice-cate" style="color:black;">{{$services->Category->category}}
                                        </li>
                                        <li class="notice-title">
                                            <a href="{{ route('news.page',['id'=>$services->id]) }}">{{$services->title}}</a>
                                        </li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <input type="radio" name="tab_name" id="tab3" checked>
                    <label class="tab_class" for="tab3">メンテナンス</label>
                    <div class="content_class">
                        <div class="allBlogs">
                            <div class="allBlogs_list">
                                @foreach($mente as $mentes)
                                <div class="all_blogs_item">

                                    <ul class="category_title">
                                        <li class="notice-date">
                                            {{\Carbon\Carbon::parse($mentes->updated_at)->toDateString() }}
                                        </li>
                                        <li class="notice-cate" style="color:black;">{{$mentes->Category->category}}
                                        </li>
                                        <li class="notice-title">
                                            <a href="{{ route('news.page',['id'=>$mentes->id]) }}">{{$mentes->title}}</a>
                                        </li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <input type="radio" name="tab_name" id="tab4" checked>
                    <label class="tab_class" for="tab4">リリース</label>
                    <div class="content_class">
                        <div class="allBlogs">
                            <div class="allBlogs_list">
                                @foreach($lelease as $leleases)
                                <div class="all_blogs_item">

                                    <ul class="category_title">
                                        <li class="notice-date">
                                            {{\Carbon\Carbon::parse($leleases->updated_at)->toDateString() }}
                                        </li>
                                        <li class="notice-cate" style="color:black;">{{$leleases->Category->category}}

                                        </li>
                                        <li class="notice-title">
                                            <a href="{{ route('news.page',['id'=>$leleases->id]) }}">{{$leleases->title}}</a>
                                        </li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <input type="radio" name="tab_name" id="tab5" checked>
                    <label class="tab_class" for="tab5">その他</label>
                    <div class="content_class">
                        <div class="allBlogs">
                            <div class="allBlogs_list">
                                @foreach($etc as $etcs)
                                <div class="all_blogs_item">
                                    <ul class="category_title">
                                        <li class="notice-date">
                                            {{\Carbon\Carbon::parse($etcs->updated_at)->toDateString() }}
                                        </li>
                                        <li class="notice-cate" style="color:black;">{{$etcs->Category->category}}

                                        </li>
                                        <li class="notice-title">
                                            <a href="{{ route('news.page',['id'=>$etcs->id]) }}">{{$etcs->title}}</a>
                                        </li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <input type="radio" name="tab_name" id="tab1" checked>
                    <label class="tab_class" for="tab1">全て</label>
                    <div class="content_class">
                        <div class="allBlogs">
                            <div class="allBlogs_list">
                                @foreach($data as $datas)
                                <div class="all_blogs_item">
                                    <ul class="category_title">
                                        <li class="notice-date">
                                            {{\Carbon\Carbon::parse($datas->updated_at)->toDateString() }}
                                        </li>
                                        <li class="notice-cate" style="color:black;">{{$datas->Category->category}}
                                        </li>
                                        <li class="notice-title">
                                            <a href="{{ route('news.page',['id'=>$datas->id]) }}">{{$datas->title}}</a>
                                        </li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="site-footer">
                <div class="bc-sitemap-wrapper">
                    <div class="sitemap clearfix">
                        <div id="nav_menu2" class="widget_nav_menu">
                            <h2 class="widget-title">製品紹介</h2>
                            <div class="menu-site-map-1-container">
                                <ul id="menu-site-map-1" class="menu">
                                    <li><a href="{{ url('feature') }}">機能</a></li>
                                    <li><a href="{{ url('plan') }}">利用料金</a></li>
                                    <li><a href="{{ url('case') }}">導入事例</a></li>
                                    <li><a href="{{ url('/admin/login')}}">管理者画面</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="nav_menu2" class="widget_nav_menu">
                            <h2 class="widget-title">関連情報</h2>
                            <div class="menu-site-map-1-container">
                                <ul id="menu-site-map-1" class="menu">
                                    <li><a href="https://eng50cha.com/blog/index">ブログ</a></li>
                                    <l><a href="{{ url('news/index')}}">お知らせ</a></li>
                                        <li><a href="{{ url('partner')}}">パートナー</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="nav_menu2" class="widget_nav_menu">
                            <h2 class="widget-title">サポート</h2>
                            <div class="menu-site-map-1-container">
                                <ul id="menu-site-map-1" class="menu">
                                    <li><a href="{{ route('contact.index')}}">お問い合わせ</a></li>
                                    <li><a href="{{ url('faq')}}">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="nav_menu2" class="widget_nav_menu">
                            <h2 class="widget-title">会社情報</h2>
                            <div class="menu-site-map-1-container">
                                <ul id="menu-site-map-1" class="menu">
                                    <li><a href="{{ url('policy')}}">プライバシー</a></li>
                                    <li><a href="{{ url('rule')}}">利用規約</a></li>
                                    <li><a href="{{ url('aboutus')}}">About Us</a></li>
                                    <li><a href="{{ url('consumer')}}">特定商取引</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="site-info">
                            <div class="widget">
                                <div class="copy-right">
                                    <span class="copu-right-text">© All rights reserved by llco</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p></p>

                <a href="#" class="gotop">トップへ</a>
            </footer>

        </main>
</body>

</html>
