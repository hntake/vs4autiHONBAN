<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>パートナープログラム 視覚支援ツールVS4 </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Dirt&display=swap" rel="stylesheet">
    <!--mordal-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">
    <link rel="stylesheet" type="text/css" href="css/9-6-2.css">
    <!-- Styles -->
    <!--    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/feature.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/partner.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Homemade+Apple rel=" stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="https://kit.fontawesome.com/8eb7c95a34.js" crossorigin="anonymous"></script>


    <!-- <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style> -->
    <div class="line-it-button" data-lang="ja" data-type="share-a" data-env="REAL" data-url="https://eng50cha.com" data-color="default" data-size="small" data-count="false" data-ver="3" style="display: none;"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/jquery.bxslider.js"></script>
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <script type="text/javascript">
        jQuery(document).ready(function($) {
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
                    <nav id="menu" class="header_nav js-menu">


                        <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> -->
                        <ul class="header_nav_list">
                            <li class="header_nav_itm">
                                <a href="{{url('/')}}" class="header_nav_itm_link"><img src="img/vs4auti2.png" style="width:60%; height:auto;"></a>
                            </li>
                            <li class="header_nav_itm">
                                <a href="#paid" class="header_nav_itm_link">ディストリビュータープログラム</a>
                                <div class="description1">普及のお願い</div>
                            </li>

                            <li class="header_nav_itm">
                                <a href="#monitor" class="header_nav_itm_link">サポータープログラム</a>
                                <div class="description1">広告のお願い</div>
                            </li>


                        </ul>
                    </nav>
                </div>
                <div class="mobile">
                    <ul>
                        <li class="header_nav_itm">
                            <a href="{{url('/')}}" class=""><img src="img/vs4auti2.png" style="width:30%; height:auto;"></a>
                        </li>
                        <li class="header_nav_itm">
                            <a href="#paid" class="header_nav_itm_link">ディストリビュータープログラム</a>
                            <div class="description1">普及のお願い</div>
                        </li>

                        <li class="header_nav_itm">
                            <a href="#monitor" class="header_nav_itm_link">サポータ―プログラム</a>
                            <div class="description1">広告のお願い</div>
                        </li>
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
                                <li><a href="#paid">
                                        ディストリビュータープログラム
                                    </a></li>
                                <li><a href="#monitor">
                                        サポータープログラム
                                    </a>
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
            <div class="partner_kv">
                <div class="elementor-widget">
                    <img src="img/partner_wide.png" style="width:100%; height:auto;">
                    <div class="post_title1">
                        <h2 class="post_title">
                            Your smile makes me happy
                        </h2>
                    </div>
                </div>
                <div class="elementor-widget-mobile">
                    <img src="img/partner.jpg" style="width:100%; height:auto;">
                    <div class="post_title1">
                        <h2 class="post_title">
                            Your smile makes me happy
                        </h2>
                    </div>
                </div>
                <div class="elementor-bottom">
                    <div class="elementor-bottom-nest">
                        <div class="elementor-heading-title">
                            " みんなを笑顔に！"<br>
                            そのモットーに賛同して<br>
                            国内での普及のお手伝いをして下さる方を<br>
                            募集しております。
                        </div>

                    </div>
                </div>
            </div>
            <section>
                <div class="partner_logo">
                    <h2>VS4<br>
                        パートナープログラム</h2>
                    <div class="partner_image">
                        <img src="img/partner2.png" alt="partner" style="width:100%; height:auto;">
                    </div>
                    <div class="sales_discription">
                        VS4パートナープログラムは、福祉や医療機関にVS4を普及していただくパートナーを対象とした「ディストリビューターパートナープログラム」と、広告を掲載をしたいパートナーを対象とした『サポートプログラム』の２つのプログラムで構成されます。<br>
                        VS4がより多くの人たちに活用され、障がいによる支障を一つでも減らせる、そんな未来を作っていきます。
                    </div>
                </div>
                <div class="middle-partner">
                    <a name="paid">
                        <div class="partner_logo">
                            <h2>VS4 <br>ディストリビュータープログラム</h2>
                        </div>
                        <div class="sales">
                            <div class="sales_image">
                                <a href="img/partner_price2.png" data-lightbox="group">
                                    <img src="img/partner_price2.png" alt="price"></a>
                            </div>
                            <div class="sales_discription">
                                VS4の作成による利用自体は完全無料ですが、ご自身の画像を保存する有償プランがあります。この有償プランの普及をして頂けるディストリビューターパートナーを募集しています。<br>
                                詳しくはこちらからお問い合わせください。
                                <div class="admin_button"><a href="{{ route('contact.index') }}" style="background-color:none; color:#7791DE;">お問い合わせページへ</a></div>
                            </div>
                        </div>
                </div>
                <div class="middle-partner">
                    <a name="monitor">
                        <div class="partner_logo">
                            <h2>VS4 <br>サポータープログラム</h2>
                        </div>
                        <div class="sales">
                            <div class="item">
                                <p>広告掲載費</p>
                                <table class="company">
                                    <tbody>
                                        <tr>
                                            <th class="arrow_box">トップページ上部</th>
                                            <td>月額￥10,000</td>
                                        </tr>
                                        <tr>
                                            <th class="arrow_box">福祉・医療向けトップページ上部</th>
                                            <td> 月額￥8,000<br>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="sponsor_discription">
                                VS4は視覚支援ツールです。広告は、視覚支援の妨げになりますので、限られたページでのみの広告となりますが、運営するためのサポートをして下さる広告スポンサーを募集しています。<br>
                                詳しくはこちらからお問い合わせください。
                                <div class="admin_button"><a href="{{ route('contact.index') }}" style="background-color:none; color:#7791DE;">お問い合わせページへ</a></div>
                            </div>
                        </div>
                </div>
            </section>

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
                            <li><a href="{{ url('blog/index')}}">ブログ</a></li>
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
