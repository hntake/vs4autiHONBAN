<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ボランティア団体IT2Uによるサイト。自閉症、知的障害、発達障害を持つ人の中には聴覚入力よりも視覚的サポート(絵カード)を利用することで、より良く理解できる傾向がある人がいます。VS4は視覚支援ツールをスマホで作れるアプリです。迷子対策のお守りバッジも販売中" >
    <meta name="description" content="障がいのために自分の要望がうまく伝えることができない人向けの無料アプリ・マイリク" name="description">
    <meta name="keywords" content="自閉症, 発達障害, サポートアプリ, 発達障害支援, アプリ紹介, サービス紹介, 特別支援, 生活の質向上, 視覚支援, コミュニケーションツール, 絵スケジュール, 迷子">

    <title>{{ config('app.name', 'VS4') }} ボランティア団体IT2U | 自閉症サポート</title>

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
    <link rel="shortcut icon" href="{{ asset('/favicon2.ico') }}">
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

                <div class="tiktok">
                    <h5 style="margin:0;">
                        Follow us
                    </h5>
                    <h6 style="margin:0;">
                        マニュアル動画や、利用動画投稿中！
                    </h6>
                    <div class="v_content">
                        <a href="https://www.tiktok.com/@llcovs4?lang=ja-JP" target="_blank">
                            <img src="img/tiktok.png" alt="TikTok" width="40" height="auto">
                        </a>
                    </div>
                </div>
                <div class="badge">
                    <a href="{{url('/protect')}}"><img src="img/protect_pop.webp"></a>
                </div>
            
                <div class="header_inner">
                    <nav id="menu" class="header_nav">

                        @if (Route::has('login'))
                        <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> -->
                        <ul class="header_nav_list">

                            <li class="header_nav_itm">
                                <a href="#autism" class="header_nav_itm_link">視覚支援</a>
                                <div class="description1">手持ちの写真、サイトにある絵をを使ってスケジュールを作れます</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="#hair" class="header_nav_itm_link">ヘアカット</a>
                                <div class="description1">ヘアカットのストレスを軽減</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="#request" class="header_nav_itm_link">マイリク</a>
                                <div class="description1">自分のリクエストを画面で表示できます</div>
                            </li>
                            <li class="header_nav_itm">
                            <a href="#protect" class="header_nav_itm_link">お守りバッジ</a>
                                <div class="description1">迷子対策に！</div>
                            </li>
                            <li class="header_nav_itm">
                            <a href="{{ url('/bbs/list') }}" class="header_nav_itm_link">掲示板</a>
                                <div class="description1">悩みや愚痴など自由に書き込もう！</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="{{ route('design_list') }}" class="header_nav_itm_link">障がい者アート普及</a>
                                <div class="description1">障がい者アートを紹介。支援もできます！</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="#volunteer" class="header_nav_itm_link">IT2U</a>
                                <div class="description1">理念・活動内容</div>
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
                                <p style="font-weight:bold; color: white;">IT2Uからのお知らせ</p>
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
                                    <a href="{{ url('feel/choice') }}">
                                        <h3 ontouchstart="">
                                        <img src="{{ asset('img/feel.png') }}" alt="feel" style="width:30%;"></h3>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/bbs/list') }}">
                                        <h3 ontouchstart="">
                                            自閉症発達障害専用掲示板</h3>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/design/list') }}">
                                        <h3 ontouchstart="">
                                            障がい者アート普及・共有サイト</h3>
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
                                        <a href="https://www.tiktok.com/@llcovs4/video/7230404897911377154?is_from_webapp=1&sender_device=pc&web_id=7203241249292224001" class="header_nav_itm_link" ontouchstart="">お守りバッジ説明動画</a>
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
                            <p style="font-weight:bold; color: white;">IT2Uからのお知らせ</p>
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
                <a name="autism" class="autism">

                <div class="hero">
                    <div class="hero__pad">
                        <div class="pin-spacer">
                            <div class="kv">
                            
                                <div class="hero__cover"></div>
                            </div>
                        </div>
                    </div>
                    <div class="hero__lead-container">
                    <a name="hair" class="hair" ></a>

                    <div class="top_four">
                            <h1>VS4 自閉症向き視覚支援</h1>
                                <div class="top_box">
                                    <a href="img/create.png" data-lightbox="group"> <img src="img/create.png" alt="自閉症 絵カード" style="width:90%;"></a>
                                        <div class="slide-description">
                                            <b>簡単作成</b>
                                            オリジナルスケジュール：ご自分でお持ちの画像を順番にアップロードすれば完成<br>
                                            歯科・医療・イラストスケジュール： サイトに保存されている画像をスケジュール順に番号を入力するだけ！<br>
                                            <br>
                                            ※画像は暗号化されて保存されるので、画像が流出することはありません<br>
                                            ※詳細は画像をクリックして拡大してみてください
                                            <div class="admin_button"><a href="{{ route('create') }}" style="background-color:none; color:#7791DE;">スケジュール作成ページへ</a></div>
                                            <div class="admin_button"><a href="{{ route('dentist_create') }}" style="background-color:none; color:#7791DE;">歯科スケジュール作成ページへ</a></div>
                                            <div class="admin_button"><a href="{{ route('medical_create') }}" style="background-color:none; color:#7791DE;">医療スケジュール作成ページへ</a></div>
                                            <div class="admin_button"><a href="{{ route('create_sort') }}" style="background-color:none; color:#7791DE;">イラストスケジュール作成ページへ</a></div>
                                        </div>
                                </div>
                        </div>
                        <a name="protect" class="protect" ></a>

                        <div class="top_four">
                            <h1>自閉症向きヘアカットスケジュール</h1>
                                 <div class="top_box">
                                    <a href="img/hair.png" data-lightbox="group"><img src="img/hair.png" alt="自閉症向きヘアカットスケジュール" style="width:90%;"></a>
                                        <div class="slide-description">
                                            <b>ヘアカットスケジュール</b>
                                            理美容室やご自宅でのヘアカットに便利なヘアカットスケジュールは、視覚タイマー付きで誰でも使えます
                                            <br>
                                            ※詳細は画像をクリックして拡大してみてください
                                                <div class="admin_button">
                                                    <a href="{{ route('cut_schedule') }}" style="background-color:none; color:#7791DE;">ヘアカットスケジュール</a>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <a name="request" class="request" ></a>

                        <div class="top_four">
                            <h1>お守りバッジ</h1>
                                <div class="top_box">

                                    <a href="img/fryer.png" data-lightbox="group"><img src="img/fryer.png" alt="お守りバッジ 迷子" style="width:90%;"></a>
                                        <div class="slide-description">
                                            <b>お守り代わりに</b>携帯電話を常備できなかったり、ご家族の連絡先を伝えることができない、小さなお子様や障がいのある方が、
                                            万が一迷子になった時…気付いてくれた方がバッジのQRコードを
                                            スキャンする事で登録した電話番号につないでくれます。<br>
                                            また、同時に登録したメールアドレスに通知が届きます。
                                            ※詳細は画像をクリックして拡大してみてください
                                            <div class="admin_button">
                                                <a href="{{ url('protect') }}" style="background-color:none; color:#7791DE;">お守りバッジとは？</a><br>
                                            </div>
                                            <div class="admin_button">
                                                <a href="{{ route('register') }}" style="background-color:none; color:#7791DE;">登録ページへ</a>
                                            </div>
                                        </div>
                                </div>
                        </div>
                        <a name="volunteer" class="volunteer">


                        <div class="top_four">
                            <h1>自閉症向き マイリク</h1>
                            <div class="top_box">

                                <a href="img/feel_sample.png" data-lightbox="group"><img src="img/feel_sample.png" alt="自閉症向きマイリクイメージ" style="width:90%;"></a>
                                    <div class="slide-description">
                                自分の要求がうまく伝えれない方向け。自分特有のリクエストを事前に登録しておくとタップでそれが表示され、読み上げられます。
                                    <br>
                                    ※詳細は画像をクリックして拡大してみてください
                                        <div class="admin_button">
                                            <a href="{{ route('register') }}" style="background-color:none; color:#7791DE;">登録ページへ</a>
                                        </div>

                                    </div>
                            </div>
                        </div>
                        <div class="banner">
                            <a target="_blank" href="{{ route('design_list') }}"><img src="img/design_top_icon.png" alt="障がい者アート普及サイト" ></a>
                            <a target="_blank" href=https://play.google.com/store/apps/details?id=com.llco.hair_cut><img src="img/hair_banner.png" alt="ヘアカットスケジュール" ></a>
                            <a target="_blank" href=https://play.google.com/store/apps/details?id=com.llco.my_request><img src="img/request_banner.png" alt="マイリク" ></a>
                            <a target="_blank" href=https://itcha50.com/bbs/list><img src="img/bbs_ad2.png" alt="自閉症発達障害向け掲示板" ></a>
                            <a target="_blank" href=https://eng50cha.com><img src="img/banner.png" alt="エイゴメ" ></a>
                        </div> 
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
                                <h1 style="color:#03C75A;">ボランティア団体<br>IT2U 自閉症サポート</h2>
                            </div>
                        </div>
                        <div class="vs4right">
                            <div class="vs4Down">
                                <p>理念:ITの力で障がいのある人をサポートしたい!<br>
                                    使い方はできるだけシンプルに、<br>
                                    絵スケジュール作成やお守りバッジなど<br>
                                    障がいのある方の手助けを考えます
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
                            <div class="sm-banner">
                                <a target="_blank" href="{{ route('design_list') }}"><img src="img/design_top_icon.png" alt="障がい者アート普及サイト" ></a>
                                <a target="_blank" href=https://play.google.com/store/apps/details?id=com.llco.hair_cut><img src="img/hair_banner.png" alt="ヘアカットスケジュール" ></a>
                                <a target="_blank" href=https://play.google.com/store/apps/details?id=com.llco.my_request><img src="img/request_banner.png" alt="マイリク" ></a>
                                <a target="_blank" href=https://itcha50.com/bbs/list><img src="img/bbs_ad2.png" alt="自閉症発達障害向け掲示板" ></a>
                                <a target="_blank" href=https://eng50cha.com><img src="img/banner.png" alt="エイゴメ" ></a>
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
                                <span class="copy-right-text">© All rights reserved by llco</span>
                            </div>
                            <div class="copy-right">
                                <span class="copy-right-text"><a target="_blank" href="https://icons8.com/icon/fdfLpA6fsXN2/%E3%83%81%E3%82%AF%E3%82%BF%E3%82%AF" style="color:#888888;">tiktok</a> icon by <a target="_blank" href="https://icons8.com" style="color:#888888;">Icons8</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" class="gotop">トップへ</a>
        </footer>
</body>

</html>
