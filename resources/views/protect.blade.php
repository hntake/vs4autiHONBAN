<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>見守りバッジとは？ </title>

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
                                <a href="#use" class="header_nav_itm_link">見守りバッジとは</a>
                                <div class="description1">携帯も持てない、電話番号も伝えれない方の万が一の時の為の準備</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="#free" class="header_nav_itm_link">見守りバッジの申込方法</a>
                                <div class="description1">申込は簡単です！</div>
                            </li>

                            <li class="header_nav_itm">
                                <a href="#monitor-apply" class="header_nav_itm_link">料金</a>
                                <div class="description1">送料込みで500円～</div>
                            </li>
                        <!--     <li class="header_nav_itm">
                                <a href="#useful" class="header_nav_itm_link">登録のメリット</a>
                                <div class="description1">無料登録してみよう！</div>
                            </li> -->
                            <!--    <li class="header_nav_itm">
                                    @auth
                                        <a href="{{ url('/home') }}" class=" header_nav_itm_link">Home</a>
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
                                    <a href="https://youtube.com/embed/" class="header_nav_itm_link">説明動画</a>
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
                                        <a href="{{ url('/home') }}" class=" header_nav_itm_link">Home</a>
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
                                    見守りバッジとは
                                    </a>
                                </li>
                                <li>
                                    <a href="#free" class="header_nav_itm_link">
                                    見守りバッジの申込方法
                                    </a>
                                </li>

                                <li>
                                    <a href="#monitor-apply" class="header_nav_itm_link">
                                    料金
                                    </a>
                                </li>
                                <li>
                                    <div class="register-button">
                                        <a href="https://youtube.com/embed/" class="header_nav_itm_link">説明動画</a>

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
            <div class="youtube_kv">
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
            </div>
            <section>
                <a name="use" class="use">
                    <div class="element">
                        <div class="use">
                            <!-- リンク内移動-->
                            <br>万が一の時の準備に
                            <br>見守りバッジ
                </a>
                <div class="tab_wrap">
                    <input id="tab1" type="radio" name="tab_btn" checked>
                    <input id="tab2" type="radio" name="tab_btn">
                    <input id="tab3" type="radio" name="tab_btn">
                    <div class="nav-wrap">
                        <div class="scroll-nav">
                            <div class="tab_area">
                                <label class="tab1_label" for="tab1">見守りバッジとは？</label>
                                <label class="tab2_label" for="tab2">個人情報</label>
                                <label class="tab3_label" for="tab3">連絡先は二か所</label>
                            </div>
                        </div>
                        <div class="next-btn">＞</div>
                    </div>
                    <div class="panel_area">
                        <div id="panel1" class="tab_panel">
                            <a href="img/create.png" data-lightbox="group"> <img src="img/create.png" alt="create" style="width:30%;"></a>
                            <div class="sright">
                                <div class="slide-head">万が一の時の準備</div>
                                <div class="slide-description">
                                    <b>お守り代わりに</b>携帯を常備できなかったり、ご家族の連絡先が伝えれない小さなお子様や、障がいの為に方が、
                                    万が一迷子になった時に、気付いてくれた方がバッジのQRコードを
                                    スキャンすると登録した電話番号につないでくれます。<br>
                                    ※詳細は画像をクリックして拡大してみてください
                                    <div class="admin_button"><a href="{{ route('register') }}" style="background-color:none; color:#7791DE;">登録ページへ</a></div>

                                </div>
                            </div>

                        </div>
                        <div id="panel2" class="tab_panel">
                            <a href="img/.png" data-lightbox="group"> <img src="img/.png" alt="" style="width:30%;"></a>
                            <div class="sright">
                                <div class="slide-head">QRコードで</div>
                                <div class="slide-description">
                                    <b>個人情報を最小限に</b>
                                    気付いてくれた方がQRコードをスキャンしない限り、情報は見られません。
                                    <br>
                                    電話を掛ければその方のの電話番号も表示されます（非通知設定でなければ）。<br>
                                    また、その電話を掛けてくれた方のIPアドレスが自動取得されているので、万が一の際の位置情報確保も出来ます。
                                    ※詳細は画像をクリックして拡大してみてください
                                    <div class="admin_button"><a href="{{ route('register') }}" style="background-color:none; color:#7791DE;">登録ページへ</a></div>
                                </div>
                            </div>
                        </div>
                        <div id="panel3" class="tab_panel">
                            <a href="img/.png" data-lightbox="group"> <img src="img/.png" alt="" style="width:30%;"></a>
                            <div class="sright">
                                <div class="slide-head">時間帯で</div>
                                <div class="slide-description">
                                    <b>連絡先で変えれる</b>
                                    登録できる電話番号は二種類<br>
                                    日中は携帯、夜は自宅など事前にかかってくる連絡先を決めておくことが出来ます。<br>
                                    登録情報はマイページでいつでも変更できます。<br>
                                    ※詳細は画像をクリックして拡大してみてください
                                    <div class="admin_button"><a href="{{ route('register') }}" style="background-color:none; color:#7791DE;">登録ページへ</a></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
        </div>
        <a name="useful" class="use">
            <div class="element">
                <div class="use">
                    <!-- リンク内移動-->
                    <br>登録から
                    <br>受け取りまで
        </a>
        <div class="tab_wrap">
            <input id="tab4" type="radio" name="tab_btn2" checked>
            <input id="tab5" type="radio" name="tab_btn2">
            <input id="tab6" type="radio" name="tab_btn2">
            <input id="tab7" type="radio" name="tab_btn2">
            <div class="nav-wrap">
                <div class="scroll-nav">
                    <div class="tab_area">
                        <label class="tab4_label" for="tab4">登録方法</label>
                        <label class="tab5_label" for="tab5">料金</label>
                        <label class="tab6_label" for="tab6">支払い方法</label>
                        <label class="tab7_label" for="tab7"></label>
                    </div>
                </div>
                <div class="next-btn"></div>
            </div>
            <div class="panel_area">
                <div id="panel4" class="tab_panel">
                    <a href="img/list.png" data-lightbox="group"><img src="img/list.png" alt="list" style="width:30%;"></a>
                    <div class="sright">
                        <div class="slide-head">仮登録から本登録まで</div>
                        <div class="slide-description">
                            <b>10分程度</b>
                            1.仮登録はメールアドレスとパスワードのみ入力<br>
                            2.メール認証<br>3.本登録は名前、住所、連絡先、連絡先の時間帯選択<br>4.支払い<br>5.受取
                            <br>
                            ※詳細は画像をクリックして拡大してみてください
                            <div class="admin_button"><a href="{{ route('register') }}" style="background-color:none; color:#7791DE;">登録ページへ</a></div>
                        </div>
                    </div>
                </div>
                <div id="panel5" class="tab_panel">
                    <a href="img/check_sk.png" data-lightbox="group"> <img src="img/check_sk.png" alt="check" style="width:30%;"></a>
                    <div class="sright">
                        <div class="slide-head"></div>
                        <div class="slide-description">
                            <b>料金体系</b>
                            登録料:100円<br>
                            バッジ本体:200円/個<br>
                            送料:200円～/個数による<br>
                            <br>
                            <br>
                            ※詳細は画像をクリックして拡大してみてください
                            <div class="admin_button"><a href="{{ route('register') }}" style="background-color:none; color:#7791DE;">登録ページへ</a></div>
                        </div>
                    </div>

                </div>
                <div id="panel6" class="tab_panel">
                    <a href="img/independence2.png" data-lightbox="group"> <img src="img/independence2.png" alt="check" style="width:30%;"></a>
                    <div class="sright">
                        <div class="slide-head">3種類の</div>
                        <div class="slide-description">
                            <b>支払い方法</b>
                          1.クレジットカード
                            <br>2.電子マネー(ApplePay,GooglePay,Paypay)
                            <br>3.振込<br>
                          → 本登録完了後、支払い選択ページに移動してください。そちらでお支払方法を選んで、支払いを済ませてください。<br>お支払いを確認後、作成、発送の流れとなります。
                            ※詳細は画像をクリックして拡大してみてください
                            <div class="admin_button"><a href="{{url('/paypay') }}" style="background-color:none; color:#7791DE;">登録ページへ</a></div>
                        </div>

                    </div>
                </div>
                <div id="panel7" class="tab_panel">
                    <img src="img/smafo.png" alt="phone" style="width:30%;">
                    <div class="sright">
                        <div class="slide-head">自分にあった使い方</div>
                        <div class="slide-description">
                            <b>PC、スマホ、タブレット</b>
                            いずれのデバイスでも<br>
                            利用できます<br>
                            <br>
                            ダウンロードもなくアクセスすれば
                            <br>
                            どこでも使えます。
                            <br>
                            移動のお手伝いにぜひご利用ください
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
                <br>登録なしでも使える
                <br>便利な機能
    </a>
    <div class="tab_wrap">
        <input id="tab8" type="radio" name="tab_btn3" checked>
        <input id="tab9" type="radio" name="tab_btn3">
        <input id="tab10" type="radio" name="tab_btn3">
        <div class="nav-wrap">
            <div class="scroll-nav">
                <div class="tab_area">
                    <label class="tab8_label" for="tab8">ヘアカット</label>
                    <label class="tab9_label" for="tab9">自立支援</label>
                    <label class="tab10_label" for="tab10">サンプル作成</label>
                </div>
            </div>
            <div class="next-btn">＞</div>
        </div>
        <div class="panel_area">
            <div id="panel8" class="tab_panel">
                <a href="img/hair.png" data-lightbox="group"><img src="img/hair.png" alt="list" style="width:30%;"></a>
                <div class="sright">
                    <div class="slide-head">視覚タイマー付き</div>
                    <div class="slide-description">
                        <b>ヘアカットスケジュール</b>
                        理美容室やご自宅でのヘアカットに便利なヘアカットスケジュールは、視覚タイマー付きで誰でも使えます
                        <br>
                        ※詳細は画像をクリックして拡大してみてください
                        <div class="llco" style="background-color:unset;">
                            <div class="admin_button"><a href="{{ route('cut_schedule') }}" style="background-color:none; color:#7791DE;">ヘアカットスケジュール</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel_area">
            <div id="panel9" class="tab_panel">
                <a href="img/independence2.png" data-lightbox="group"><img src="img/independence2.png" alt="list" style="width:30%;"></a>
                <div class="sright">
                    <div class="slide-head">みんなで共有できる</div>
                    <div class="slide-description">
                        <b>自立支援スケジュール</b>
                        登録会員が作った自立支援スケジュールは個人用だけでなく一般公開も出来るので、公開されたものは誰でも利用することが出来ます
                        <br>
                        ※詳細は画像をクリックして拡大してみてください
                        <div class="llco" style="background-color:unset;">
                            <div class="admin_button"><a href="{{ route('independence_public') }}" style="background-color:none; color:#7791DE;">自立支援スケジュール一般公開リスト</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel_area">
            <div id="panel10" class="tab_panel">
                <a href="img/list.png" data-lightbox="group"><img src="img/create.png" alt="list" style="width:30%;"></a>
                <div class="sright">
                    <div class="slide-head">登録しなくても</div>
                    <div class="slide-description">
                        <b>簡単にスケジュールは作れます</b>
                        登録しないと保存はできませんが、自立支援スケジュール以外は全て作成できます。
                        <br>
                        ※詳細は画像をクリックして拡大してみてください
                        <div class="admin_button"><a href="{{ route('create') }}" style="background-color:none; color:#7791DE;">スケジュール作成ページへ</a></div>
                        <div class="admin_button"><a href="{{ route('dentist_create') }}" style="background-color:none; color:#7791DE;">歯科スケジュール作成ページへ</a></div>
                        <div class="admin_button"><a href="{{ route('medical_create') }}" style="background-color:none; color:#7791DE;">医療スケジュール作成ページへ</a></div>
                        <div class="admin_button"><a href="{{ route('create_sort') }}" style="background-color:none; color:#7791DE;">イラストスケジュール作成ページへ</a></div>
                    </div>
                </div>
            </div>
        </div>
        </section>
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
                                <span class="elementor-button">スケジュールを作る</span>
                            </a>
                        </div>
                        <div class="bottom-right">
                            <a href="{{route('register')}}" target="_blank" class="bottom-right-button">
                                <span class="elementor-button">無料登録</span>
                            </a>
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