<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="幼児や高齢者、そして自閉症などの発達障害を持っているなど、携帯も持てない、電話番号も伝えれない方向けの迷子対策にお守りバッジをどうでしょう？ヘルプマークとの連携も出来ます。" name="description">

    <title>お守りバッジとは？迷子対策 </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Dirt&display=swap" rel="stylesheet">
    <!--mordal_youtube-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">
    <link rel="stylesheet" type="text/css" href="css/9-6-2.css">
    <!-- Styles -->
    <!--  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/feature.css') }}">
    <link rel="stylesheet" href="{{ asset('css/protect.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="https://kit.fontawesome.com/8eb7c95a34.js" crossorigin="anonymous"></script>


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <div class="line-it-button" data-lang="ja" data-type="share-a" data-env="REAL" data-url="https://eng50cha.com" data-color="default" data-size="small" data-count="false" data-ver="3" style="display: none;"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/jquery.bxslider.js"></script>
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <script type="text/javascript">
        jQuery(document).on('load', function($) {
            $('.bxslider').bxSlider({
                auto: true,
                captions: true,
                pagerCustom: '#bx-pager',
                adaptiveHeight: true,
                slideWidth: 1500
            });
        });
    </script>
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
                            <li class="title_image">
                                <a href="{{url('/')}}" class=""><img src="img/vs4auti2.png" style="width:60%; height:auto;"></a>
                            </li>
                            <li class="header_nav_itm">
                                <a href="#use" class="header_nav_itm_link">お守りバッジとは</a>
                                <div class="description1">の万が一の時の為の準備</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="#free" class="header_nav_itm_link">お守りバッジの購入方法</a>
                                <div class="description1">購入方法は色々あります！</div>
                            </li>

                            <li class="header_nav_itm">
                                <a href="#free" class="header_nav_itm_link">料金</a>
                                <div class="description1">300円～</div>
                            </li>
                            <!--     <li class="header_nav_itm">
                                <a href="#useful" class="header_nav_itm_link">登録のメリット</a>
                                <div class="description1">無料登録してみよう！</div>
                            </li> -->
                            <!--    <li class="header_nav_itm">
                                    @auth
                                        <a href="{{ url('//') }}" class=" header_nav_itm_link">Home</a>
                                        <div class="description1">Myホーム画面へ移動する </div>
                                </li>
                                <li class="header_nav_itm">
                                        <a href="{{ url('/dentist/list') }}" class=" header_nav_itm_link">歯科</a>
                                        <div class="description1">歯科リストへ移動する</div>
                                </li>
                                <li class="header_nav_itm">
                                    @else
                                    <div class="login-button">
                                        <a href="{{ route('login') }}" class="header_nav_itm_link">ログイン</a>
                                        <div class="description1">ログイン画面へ移動する </div>
                                    </div>
                                </li> -->
                            <li class="header_nav_itm">
                                <div class="register-button">
                                    @if (Route::has('register'))
                                    <a target="_blank" href="{{ route('register') }}" class="header_nav_itm_link">新規登録</a>
                                    <div class="description1">簡単登録！</div>

                                </div>
                            </li>
                            <!--                                     @endif
 -->
                            <!--     @endauth -->
                            @endif
                            <li class="header_nav_itm">
                                <div class="register-button">
                                    <a href="https://www.tiktok.com/@llcovs4/video/7220301301597408513?is_from_webapp=1&sender_device=pc&web_id=7203241249292224001" class="header_nav_itm_link">説明動画</a>
                                    <div class="description1">マニュアル動画ページへ</div>
                                </div>
                            </li>
                        </ul>

                    </nav>
                </div>
                <div class="mobile">
                    <ul>
                        <li class="header_nav_itm">
                            <a href="{{url('/')}}" class=""><img src="img/vs4auti2.png" style="width:80%;"></a>
                        </li>
                        <!--  @if (Route::has('login'))
                            <li class="header_nav_itm">
                                @auth
                                    <div class="home-button">
                                        <a href="{{ url('//') }}" class=" header_nav_itm_link">Home</a>
                                        <div class="description1">Myホーム画面へ移動する </div>
                                    </div>
                            </li>
                            <li>
                                <div class="home-button">
                                        <a href="{{ url('/dental/list') }}" class=" header_nav_itm_link">歯科</a>
                                        <div class="description1">歯科リストへ移動する</div>
                                </div>
                            </li>
                            <li class="header_nav_itm">
                                    @else
                                    <div class="login-button">
                                        <a href="{{ route('login') }}" class="header_nav_itm_link">ログイン</a>
                                        <div class="description1">ログイン画面へ移動する </div>
                                    </div>
                            </li> -->
                        <li class="header_nav_itm">
                            <div class="register-button">
                                @if (Route::has('register'))
                                <a target="_blank" href="{{ route('register') }}" class="header_nav_itm_link">新規登録</a>
                                <!--   <div class="description1">30日間無料トライアルを試してみる</div> -->
                            </div>
                        </li>

                        <!--   @endif
                                @endauth -->
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
                                <li class="title_image">
                                    <a href="{{url('/')}}" class=""><img src="img/vs4auti2.png" style="width:30%; height:auto;"></a>
                                </li>
                                <li>
                                    <a href="#use" class="header_nav_itm_link">
                                        お守りバッジとは
                                    </a>
                                </li>
                                <li>
                                    <a href="#free" class="header_nav_itm_link">
                                        お守りバッジの購入方法
                                    </a>
                                </li>

                                <li>
                                    <a href="#free" class="header_nav_itm_link">
                                        料金
                                    </a>
                                </li>
                                <li>
                                    <div class="register-button">
                                        <a href="https://www.tiktok.com/@llcovs4/video/7220301301597408513?is_from_webapp=1&sender_device=pc&web_id=7203241249292224001" class="header_nav_itm_link">説明動画</a>

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

            <div class="youtube">
                <div class="elementor-image">
                    <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@llcovs4/video/7220301301597408513" data-video-id="7220301301597408513" style="max-width: 605px;min-width: 325px;">
                        <section> <a target="_blank" title="@llcovs4" href="https://www.tiktok.com/@llcovs4?refer=embed">@llcovs4</a> <a title="迷子対策" target="_blank" href="https://www.tiktok.com/tag/%E8%BF%B7%E5%AD%90%E5%AF%BE%E7%AD%96?refer=embed">#迷子対策</a> <a title="自閉症" target="_blank" href="https://www.tiktok.com/tag/%E8%87%AA%E9%96%89%E7%97%87?refer=embed">#自閉症</a> <a title="発達障害" target="_blank" href="https://www.tiktok.com/tag/%E7%99%BA%E9%81%94%E9%9A%9C%E5%AE%B3?refer=embed">#発達障害</a> <a title="お守りバッジ" target="_blank" href="https://www.tiktok.com/tag/%E3%81%8A%E5%AE%88%E3%82%8A%E3%83%90%E3%83%83%E3%82%B8?refer=embed">#お守りバッジ</a> <a target="_blank" title="♬ Chu,Tayousei. - ano" href="https://www.tiktok.com/music/ChuTayousei-7158336575057692673?refer=embed">♬ Chu,Tayousei. - ano</a> </section>
                    </blockquote>
                    <script async src="https://www.tiktok.com/embed.js"></script>
                </div>
            </div>
            <div class="youtube">
                <div class="elementor-image">
                    <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@llcovs4/video/7230404897911377154" data-video-id="7230404897911377154" style="max-width: 605px;min-width: 325px;">
                        <section> <a target="_blank" title="@llcovs4" href="https://www.tiktok.com/@llcovs4?refer=embed">@llcovs4</a> <a title="迷子対策" target="_blank" href="https://www.tiktok.com/tag/%E8%BF%B7%E5%AD%90%E5%AF%BE%E7%AD%96?refer=embed">#迷子対策</a> <a title="自閉症" target="_blank" href="https://www.tiktok.com/tag/%E8%87%AA%E9%96%89%E7%97%87?refer=embed">#自閉症</a> <a title="発達障害" target="_blank" href="https://www.tiktok.com/tag/%E7%99%BA%E9%81%94%E9%9A%9C%E5%AE%B3?refer=embed">#発達障害</a> <a title="お守りバッジ" target="_blank" href="https://www.tiktok.com/tag/%E3%81%8A%E5%AE%88%E3%82%8A%E3%83%90%E3%83%83%E3%82%B8?refer=embed">#お守りバッジ</a> <a target="_blank" title="♬ funky house - Close-Wu" href="https://www.tiktok.com/music/funky-house-6963841260792645668?refer=embed">♬ funky house - Close-Wu</a> </section>
                    </blockquote>
                    <script async src="https://www.tiktok.com/embed.js"></script>
                </div>
            </div>

        </div>
        <!--       <div class="youtube_kv">
                <div class="movie_cap">
                    <div class="elementor-widget">
                        <a name="monitor-apply">
                            <img src="img/protect.png">
                        </a>
                    </div>
                    <div class="youtube">
                        <div class="elementor-image">
                            <a href="https://youtube.com/embed/" class="video-open"><img src="img/play.png"></a>
                        </div>
                    </div>

                </div>
            </div> -->
        <section>
            <a name="use" class="use">
                <div class="element">
                    <div class="use">
                        <!-- リンク内移動-->
                        <br>万が一の時の準備に
                        <br>お守りバッジ
            </a>
            <div class="tab_wrap">
                <input id="tab1" type="radio" name="tab_btn" checked>
                <input id="tab2" type="radio" name="tab_btn">
                <input id="tab3" type="radio" name="tab_btn">
                <input id="tab7" type="radio" name="tab_btn">
                <div class="nav-wrap">
                    <div class="scroll-nav">
                        <div class="tab_area">
                            <label class="tab1_label" for="tab1">お守りバッジとは？</label>
                            <label class="tab2_label" for="tab2">個人情報</label>
                            <label class="tab3_label" for="tab3">連絡先は二か所</label>
                            <label class="tab7_label" for="tab7">ヘルプマークに</label>
                        </div>
                    </div>
                    <div class="next-btn"></div>
                </div>
                <div class="panel_area">
                    <div id="panel1" class="tab_panel">
                        <a href="img/turtle-orange.png" data-lightbox="group"> <img src="img/turtle-orange.png" alt="create" style="width:30%;"></a>
                        <div class="sright">
                            <div class="slide-head">万が一の時の準備</div>
                            <div class="slide-description">
                                <b>お守り代わりに</b>携帯電話を常備できなかったり、ご家族の連絡先を伝えることができない、小さなお子様や障がいのある方が、
                                万が一迷子になった時…気付いてくれた方がバッジのQRコードを
                                スキャンする事で登録した電話番号につないでくれます。<br>
                                また、同時に登録したメールアドレスに通知が届きます。

                                <div class="admin_button"><a href="{{ route('register') }}" style="background-color:none; color:#7791DE;">登録ページへ</a></div>

                            </div>
                        </div>

                    </div>
                    <div id="panel2" class="tab_panel">
                        <a href="img/protect-regi16.png" data-lightbox="group"> <img src="img/protect-regi16.png" alt="" style="width:30%;"></a>
                        <a href="img/stop_explain.webp" data-lightbox="group"> <img src="img/stop_explain.webp" alt="" style="width:50%;"></a>
                        <div class="sright">
                            <div class="slide-head">QRコードで</div>
                            <div class="slide-description">
                                <b>個人情報を最小限に</b>
                                気付いてくれた方がQRコードをスキャンしない限り、情報は見られません。
                                <br>
                                電話を掛ければその方の電話番号も表示されます（非通知設定されてなければ）<br>
                                また、その電話を掛けてくれた方のIPアドレスが自動取得されているので、万が一の際の位置情報確保も出来ます。<br>
                                そして、サービス一時停止機能を使えば、万が一のそのとき迄、連絡先を隠しておくことも出来ます。<br>
                                ※詳細は画像をクリックして拡大してみてください
                                <div class="admin_button"><a href="{{ route('register') }}" style="background-color:none; color:#7791DE;">登録ページへ</a></div>
                            </div>
                        </div>
                    </div>
                    <div id="panel3" class="tab_panel">
                        <a href="img/protect-regi11.png" data-lightbox="group"> <img src="img/protect-regi11.png" alt="" style="width:30%;"></a>
                        <div class="sright">
                            <div class="slide-head">時間帯で</div>
                            <div class="slide-description">
                                <b>連絡先をカスタマイズ</b>
                                登録できる電話番号は二種類<br>
                                日中は学校や事業所、夜は自宅など事前にかかってくる連絡先を決めておくことが出来ます。<br>
                                そして、登録情報はマイページでいつでも変更できるので、万が一のとき迄自分の電話番号を登録しない方法も可能です。<br>
                                ※詳細は画像をクリックして拡大してみてください
                                <div class="admin_button"><a href="{{ route('register') }}" style="background-color:none; color:#7791DE;">登録ページへ</a></div>
                            </div>
                        </div>
                    </div>
                    <div id="panel7" class="tab_panel">
                         <img src="img/qr.png" alt="phone" style="width:30%;">
                            <div class="sright">
                            <div class="slide-head">一度の登録で</div>
                            <div class="slide-description">
                        <b>QRコードは無料提供</b>
                        バッジに記載されたあなた用のQRコードは、
                        ダウンロードや印刷できます。
                        ヘルプマークやシールなど、
                        ご自由にお使いください。
                        <br>
                    </div>
                </div>
            </div>


                </div>
            </div>
    </div>
    <a name="free" class="use">
        <div class="element">
            <div class="use">
                <!-- リンク内移動-->
                <br>購入方法は
                <br>オンライン、メルカリ、直営店舗
    </a>
    <div class="tab_wrap">
        <input id="tab4" type="radio" name="tab_btn2" checked>
        <input id="tab5" type="radio" name="tab_btn2">
        <input id="tab6" type="radio" name="tab_btn2">
        <div class="nav-wrap">
            <div class="scroll-nav">
                <div class="tab_area">
                    <label class="tab4_label" for="tab4">オンライン購入</label>
                    <label class="tab5_label" for="tab5">メルカリで購入</label>
                    <label class="tab6_label" for="tab6">直営店舗</label>
                </div>
            </div>
            <div class="next-btn"></div>
        </div>
        <div class="panel_area">
            <div id="panel4" class="tab_panel">
                <a href="img/flow.png" data-lightbox="group"><img src="img/flow.png" alt="list" style="width:40%;"></a>
                <div class="sright">
                    <div class="slide-head">自分だけのデザインでも作れます</div>
                    <div class="slide-description">
                        <b>登録は10分程度</b>
                        オンライン購入の場合<br>
                        1.仮登録はメールアドレスとパスワードのみ入力<br>
                        2.メール認証<br>3.本登録は名前、住所、連絡先、連絡先の時間帯選択<br>4.デザイン選択<br>(オリジナルデザインは追加料金300円)<br>5.支払い<br>料金:<span style="color:red; font-weight:bold;">500円</span>（送料・税金込）<br>5.郵送<br>6.受取<br>
                        <div class="method" style="background-color:#c7fecb;">
                            支払い方法
                            <br>1.クレジットカード
                            <br>2.電子マネー(ApplePay、GooglePay)
                            <br>3.振込<br>
                            → 本登録完了後、支払い選択ページに移動してください。そちらでお支払方法を選び、支払いを済ませてください。<br>お支払いを確認後、作成、発送の流れとなります。
                            ※詳細は画像をクリックして拡大してみてください
                        </div>
                        <h6>※バッジ製品の素材は、アクリルや缶など、その時点で入手可能な素材に変更させていただく場合がございます。お客様にはご迷惑をおかけいたしますが、可能な限り商品の品質や外観に影響のないように配慮し、最高品質の商品を提供できるよう努めてまいります。<br><br>

                            何かご不明な点がございましたら、弊社までお気軽にお問い合わせくださいませ。</h6>
                        <div class="admin_button"><a href="{{ route('register') }}" style="background-color:none; color:#7791DE;">登録ページへ</a></div>
                    </div>
                </div>
            </div>
            <div id="panel5" class="tab_panel">
                <a href="img/dog-blue.png" data-lightbox="group"> <img src="img/dog-blue.png" alt="check" style="width:30%;"></a>
                <div class="sright">
                    <div class="slide-head">ご自分のアカウントで</div>
                    <div class="slide-description">
                        <b>気軽に購入</b>
                        料金はメルカリ側の手数料・配送料により変動することをご了承ください。
                        <br>
                        <br>
                        <div class="admin_button"><a href="https://mercari-shops.com/shops/ZPUvvAy3oftwnEyEc9SmYU?source=shared_link&utm_source=shared_link" style="background-color:none; color:#7791DE;"> メルカリ商品ページへ </a></div>
                    </div>
                </div>

            </div>
            <div id="panel6" class="tab_panel">
                <a href="img/store.png" data-lightbox="group"> <img src="img/store.png" alt="check" style="width:30%;"></a>
                <div class="sright">
                    <div class="slide-head">最寄りにあるなら</div>
                    <div class="slide-description">
                        <b>直営店で購入</b>
                        直営店で購入したら送料無しの<span style="color:red; font-weight:bold;">300円</span>(税込み)で購入できます。
                        <br>※現在、全国各地で販売してくれる施設や店舗を募集しております。

                        <div class="admin_button"><a href="{{url('/shop_list') }}" style="background-color:none; color:#7791DE;">取り扱い先一覧</a></div>
                    </div>

                </div>
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
                            <li><a href="{{ url('contact')}}">お問い合わせ</a></li>
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
                        <span class="copu-right-text">© All rights reserved by llco</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <p></p>

        <a href="#" class="gotop">トップへ</a>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <!--自作のJS-->
    <script src="js/9-6-2.js"></script>
</body>

</html>
