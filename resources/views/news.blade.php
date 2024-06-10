<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>おしらせ｜webアプリ制作会社llco</title>
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


                    <ul class="header_nav_list">
                        <li class="header_nav_itm">
                            <a href="{{url('/aboutus')}}" class=""><img src="../img/favicon.png" style="width:30%; height:auto;"></a>
                        </li>

                    
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
                                    <h3>使い方</h3>
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
                            アップデートやメンテナンスに関する情報をお知らせします。
                        </div>
                    </div>
                </div>
                <!--  <div class="sidebar">
                <a href="https://itcha50.com"><p>視覚支援ツールVS4</p></a>
            </div> -->
                <div class="area">

                    <input type="radio" name="tab_name" id="tab2" checked>
                    <label class="tab_class" for="tab2">サービス</label>
                    <div class="content_class">
                        <div class="allBlogs">
                            <div class="allBlogs_list">
                                @foreach($service as $services)
                                <div class="all_blogs_item">

                                    <a href="{{ route('blog.page',['id'=>$services->id]) }}">
                                        <h1>{{$services->title}}</h1>
                                    </a>
                                    <ul class="category_title">
                                        <li>
                                            <h5>{{\Carbon\Carbon::parse($services->updated_at)->toDateString() }}</h5>
                                        </li>
                                        <li>
                                            <h5 style="color:black;">{{$services->Category->category}}</h5>

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

                                    <a href="{{ route('blog.page',['id'=>$mentes->id]) }}">
                                        <h1>{{$mentes->title}}</h1>
                                    </a>
                                    <ul class="category_title">
                                        <li>
                                            <h5>{{\Carbon\Carbon::parse($mentes->updated_at)->toDateString() }}</h5>
                                        </li>
                                        <li>
                                            <h5 style="color:black;">{{$mentes->Category->category}}</h5>

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

                                    <a href="{{ route('blog.page',['id'=>$leleases->id]) }}">
                                        <h1>{{$leleases->title}}</h1>
                                    </a>
                                    <ul class="category_title">
                                        <li>
                                            <h5>{{\Carbon\Carbon::parse($leleases->updated_at)->toDateString() }}</h5>
                                        </li>
                                        <li>
                                            <h5 style="color:black;">{{$leleases->Category->category}}</h5>

                                        </li>
                                    </ul>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <input type="radio" name="tab_name" id="tab4" checked>
                    <label class="tab_class" for="tab4">その他</label>
                    <div class="content_class">
                        <div class="allBlogs">
                            <div class="allBlogs_list">
                                @foreach($etc as $etcs)
                                <div class="all_blogs_item">

                                    <a href="{{ route('blog.page',['id'=>$etcs->id]) }}">
                                        <h1>{{$etcs->title}}</h1>
                                    </a>
                                    <ul class="category_title">
                                        <li>
                                            <h5>{{\Carbon\Carbon::parse($etcs->updated_at)->toDateString() }}</h5>
                                        </li>
                                        <li>
                                            <h5 style="color:black;">{{$etcs->Category->category}}</h5>

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
                                    <a href="{{ route('blog.page',['id'=>$datas->id]) }}">
                                        <h1>{{$datas->title}}</h1>
                                    </a>
                                    <ul class="category_title">
                                        <li>
                                            <h5>{{\Carbon\Carbon::parse($datas->updated_at)->toDateString() }}</h5>
                                        </li>
                                        <li>
                                            <h5 style="color:black;">{{$datas->Category->category}}</h5>

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
                                </ul>
                            </div>
                        </div>
                        <div id="nav_menu2" class="widget_nav_menu">
                            <h2 class="widget-title">関連情報</h2>
                            <div class="menu-site-map-1-container">
                                <ul id="menu-site-map-1" class="menu">
                                    <li><a href="https://eng50cha.com/blog/index">ブログ</a></li>
                                    <l><a href="{{ url('news')}}">お知らせ</a></li>
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
                                    <span class="copu-right-text">© All rights reserved by IT2U</span>
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
