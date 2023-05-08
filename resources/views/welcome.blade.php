<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="自閉症、知的障害、発達障害を持つ人の中には聴覚入力よりも視覚的サポートを利用することで、より良く理解できる傾向がある人がいます。VS4は視覚支援ツールをスマホで作れるサイトです。迷子対策のお守りバッジも販売中" name="description">

    <title>{{ config('app.name', 'VS4') }} スマホで作る絵スケジュールサイトVS4 トップページ</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Dirt&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/welcome2.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>
    <script src="https://kit.fontawesome.com/8eb7c95a34.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <div class="line-it-button" data-lang="ja" data-type="share-a" data-env="REAL" data-url="https://eng50cha.com" data-color="default" data-size="small" data-count="false" data-ver="3" style="display: none;"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrap">
        <div class="container">
            <header id="header" class="header is-open">

                <div class="header_inner">
                    <nav id="menu" class="header_nav">


                        @if (Route::has('login'))
                        <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> -->
                        <ul class="header_nav_list">

                            <li class="header_nav_itm">
                                <a href="{{ url('protect') }}" class="header_nav_itm_link">お守りバッジ</a>
                                <div class="description1">迷子対策に！</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="{{ url('create') }}" class="header_nav_itm_link">スケジュール作成</a>
                                <div class="description1">スケジュールを作ってみる</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="{{ url('create_sort') }}" class="header_nav_itm_link">イラストケジュール作成</a>
                                <div class="description1">イラストスケジュールを作ってみる</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="{{ url('dentist/create') }}" class="header_nav_itm_link">歯科スケジュール作成</a>
                                <div class="description1">歯科スケジュールを作ってみる</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="{{ url('medical/create') }}" class="header_nav_itm_link">医療スケジュール作成</a>
                                <div class="description1">医療スケジュールを作ってみる</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="{{ url('hair/schedule') }}" class=" header_nav_itm_link">ヘアカット</a>
                                <div class="description1">ヘアカットスケジュールへ移動する</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="{{ url('independence/public') }}" class=" header_nav_itm_link">自立支援ツール一覧</a>
                                <div class="description1">一般公開されている自立支援リストへ</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="{{ url('feature') }}" class="header_nav_itm_link">使い方</a>
                                <div class="description1">VS4の使い方</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="{{ url('plan') }}" class="header_nav_itm_link">有料サービス</a>
                                <div class="description1">保存するなら</div>
                            </li>
                            <li class="header_nav_itm">
                                @auth
                                <a href="{{ url('/dashboard') }}" class=" header_nav_itm_link">Home</a>
                                @if($user->type==0)
                                <div class="description1">自分の保存リスト画面へ移動する </div>
                                @else
                                <div class="description1">自分の登録情報画面へ移動する </div>
                                @endif
                            </li>

                            <li class="header_nav_itm">
                                <a href="{{ url('hair/schedule') }}" class=" header_nav_itm_link">ヘアカット</a>
                                <div class="description1">ヘアカットスケジュールへ移動する</div>
                            </li>
                            <li>
                                <div class="logout_buttom">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <!-- CSRF保護 -->
                                        <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
                                    </form>
                                </div>
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
                                    <div class="description1">無料登録をする </div>

                                </div>
                            </li>

                            @endif
                            @endauth
                            @endif
                        </ul>
                        <div class="news">
                            <ul>
                                <p style="font-weight:bold;">お知らせ</p>
                                <li>
                                    <a href="{{ url('news/index')}}">
                                        {{$new->created_at}}
                                    </a>
                                </li>
                                <li>
                                    {!!$new->title!!}
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="mobile-login">
                    <ul style="list-style: none;">
                        <li class="header_nav_itm">
                            @if (Route::has('login'))
                            @auth
                            <div class="home-button">
                                <a href="{{ url('/dashboard') }}" class=" header_nav_itm_link">Home</a>
                                <div class="description1">Myホーム画面へ移動する </div>
                            </div>
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
                                <!--   <div class="description1">30日間無料トライアルを試してみる</div>
 -->
                            </div>
                        </li>
                        <li>
                                <div class="logout_buttom">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <!-- CSRF保護 -->
                                        <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
                                    </form>
                                </div>
                            </li>
                        @endif
                        @endauth
                        @endif
                    </ul>
                </div>
                <!--  ハンバーガーメニュー -->
                <div class="mobile-menu">
                    <div id="nav-drawer">
                        <input id="nav-input" type="checkbox" class="nav-unshown">
                        <label id="nav-open" for="nav-input"><span></span></label>
                        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                        <div id="nav-content">
                            <ul class="header_nav_list">
                                <li>
                                    <div class="home-button">
                                        <a href="{{ url('dashboard') }}">
                                            <h3 ontouchstart="">保存リスト</h3>
                                        </a>
                                        <div class="description1">保存リストへ移動する</div>
                                    </div>
                                </li>

                                <li>
                                    <div class="home-button">
                                        <a href="{{ url('hair/schedule') }}">
                                            <h3 ontouchstart="">ヘアカット</h3>
                                        </a>
                                        <div class="description1">ヘアカットスケジュールへ移動する</div>
                                </li>
                                <li>
                                    <a href="{{ url('create') }}">
                                        <h3 ontouchstart="">
                                            スケジュール作成</h3>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('create_sort') }}">
                                        <h3 ontouchstart="">
                                            イラストスケジュール作成</h3>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('dentist/create') }}">
                                        <h3 ontouchstart="">歯科スケジュール作成</h3>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('medical/create') }}">
                                        <h3 ontouchstart="">医療スケジュール作成</h3>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('independence/public') }}">
                                        <h3 ontouchstart="">自立支援ツール一覧</h3>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('feature') }}">
                                        <h3 ontouchstart="">
                                            使い方 申込み方法</h3>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('protect') }}">
                                        <h3 ontouchstart="">
                                            お守りバッジ（迷子対策）</h3>
                                    </a>
                                </li>
                                <li>
                                    <div class="register-button" style="margin-bottom:10px;">
                                        <a href="https://youtube.com/embed/7HUQzYWZe7M" class="header_nav_itm_link" ontouchstart="">VS4説明動画</a>
                                        <div class="description1">マニュアル動画ページへ</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="register-button">
                                        <a href="https://www.tiktok.com/@llcovs4/video/7230404897911377154?is_from_webapp=1&sender_device=pc&web_id=7203241249292224001"
                                        class="header_nav_itm_link" ontouchstart="">お守りバッジ説明動画</a>
                                        <div class="description1">マニュアル動画ページへ</div>
                                    </div>
                                </li>
                                <li>
                                <div class="logout_buttom">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <!-- CSRF保護 -->
                                        <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
                                    </form>
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
            <div class="main-column">
                <div class="mobile-login-news">
                    <div class="news">
                        <ul>
                            <p style="font-weight:bold;">お知らせ</p>
                            <li>
                                <a href="{{ url('news/index')}}">
                                    {{$new->created_at}}
                                </a>
                            </li>
                            <li>
                                {!!$new->title!!}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="hero">
                    <div class="hero__pad">
                        <div class="pin-spacer">
                            <div class="kv">
                                <div class="catch-copy">
                                    <picture>
                                        <source media="(max-width:800px)" srcset="img/VS_white2.png">
                                        <img class="title" src="img/VS_white2.png" alt="">
                                    </picture>

                                </div>
                                <div class="hero__cover"></div>
                            </div>
                            <div class="video">
                                <video class="pc" src="img/nagi2.mp4" autoplay loop muted playsinline></video>
                                <video class="sp" src="img/nagi_sp_short.mp4" autoplay loop muted playsinline></video>
                            </div>
                        </div>
                    </div>
                    <div class="hero__lead-container">
                        <picture>
                            <source media="(max-width:800px)" srcset="img/vs4_top3.png">
                            <img class="hero__lead" src="img/vs4_top3.png" alt="" loading="lazy">
                        </picture>
                    </div>
                    <!--     <div class="youtube">
                        <div class="elementor-image">
                            <a href="https://youtube.com/embed/7HUQzYWZe7M" class="video-open"><img src="img/movie_button.png"></a>
                        </div>
                    </div> -->
                </div>
                <div class="vs4">
                    <div class="vs4nest">
                        <div class="vs4left">
                            <div class="vs4Up">
                                <p>VS4はスケジュール作成に特化した<br>サイトです</p>
                            </div>
                        </div>
                        <div class="vs4right">
                            <div class="vs4Down">
                                <p>
                                    使い方は簡単！<br>
                                    ご自分のスマホやPCに保存された画像をアップロードするだけで、<br>
                                    自分だけのスケジュールが作成できます！
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="bottom">

                    <div class="bottom-container">
                        <div class="bottom-element">
                            <div class="bottom-element-top">
                                <h2 class="bottom-element-top">
                                    今すぐはじめてみよう！
                                </h2>
                            </div>
                            <div class="bottom-inner">
                                <div class="bottom-left">
                                    <a href="{{route('create')}}" target="_blanlk" class="bottom_button">
                                        <span class="elementor-button">無料でスケジュールを作る</span>
                                    </a>
                                </div>
                                <div class="bottom-right">
                                    <a href="{{route('register')}}" target="_blank" class="bottom-right-button">
                                        <span class="elementor-button">無料登録をする</span>
                                    </a>
                                </div>
                            </div>

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
                                <li><a href="{{ url('admin')}}">管理者画面</a></li>
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
</body>

</html>
