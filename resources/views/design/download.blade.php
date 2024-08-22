<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{$design->name}} {{$design->name_en}} 選択作品詳細ページ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$design->name}}, {{$design->name_en}}のイラストです。障がい者の方によるアート作品です。ダウンロードして、障がい者アート活動を支援しよう！">
    <meta name="keywords" content="{{$design->name}} ,{{$design->name_en}},イラスト,ダウンロード,素材,download,障がい者アート,アートプロジェクト,アートコミュニティ,多様性,創造性,イラスト,
    {{$design->Genre1->genre}}, @if($design->genre2==!0),{{$design->Genre2->genre}},
    @endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif">
    <meta name="author" content="IT2U">
    <meta name="robots" content="index, follow">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@LLco1118">
    <meta name="twitter:title" content="ITの力で障がいのある人をサポートしたい!IT2Uのアカウントです">
    <meta name="twitter:description" content="障がい者アートの魅力を広めるプラットフォーム。">
    <meta name="twitter:image" content="https://itcha50.com/storage/{{$design->image}}">

    <link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/artist.css') }}">

    <script>
    function showText() {
    document.getElementById('infoText').style.display = 'block';
    }
    </script>
    <!-- 構造化データのコード -->
    <script type="application/ld+json">
    {
    "@context": "http://schema.org",
    "@type": "CreativeWork",
    "name": "障がい者アート作品",
    "description": "障がい者が制作したアート作品のダウンロードサイトです。",
    "provider": {
        "@type": "Organization",
        "name": "{{$design->artist_name}}"
    },
    "offers": {
        "@type": "Offer",
        "availability": "http://schema.org/InStock",
        "price": "{{ $design->price}}",
        "priceCurrency": "JPY",
        "url": "https://itcha50.com/design/download/{{$design->id}}",
        "seller": {
            "@type": "Organization",
            "name": "{{$design->artist_name}}"
            }
        }
    }
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
    crossorigin="anonymous"></script>
</head>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @auth
                @if($design->price>0)
                <form method="GET" action="{{ route('design_stripe',['id'=> $design->id]) }}">
                @else
                <form method="GET" action="{{ route('design_download_free',['id'=> $design->id]) }}">
                @endif
                @csrf
                <h1 style="text-align:center;">作品詳細<br>{{$design->name}}</h1>
                        <div class="card-body" >
                            @if($design->original==1)
                            <img src="{{ asset('storage/' . $design->image) }}" alt="{{$design->name}} {{$design->Genre1->genre}} @if($design->genre2==!0),{{$design->Genre2->genre}}@endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif" >
                            @if(isset($design->image1))
                            <img src="{{ asset('storage/' . $design->image1) }}" alt="{{$design->name}} {{$design->Genre1->genre}} @if($design->genre2==!0),{{$design->Genre2->genre}}@endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif" >
                            @endif
                            @if(isset($design->image2))
                            <img src="{{ asset('storage/' . $design->image2) }}" alt="{{$design->name}} {{$design->Genre1->genre}} @if($design->genre2==!0),{{$design->Genre2->genre}}@endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif" >
                            @endif
                            @if(isset($design->image3))
                            <img src="{{ asset('storage/' . $design->image3) }}" alt="{{$design->name}} {{$design->Genre1->genre}} @if($design->genre2==!0),{{$design->Genre2->genre}}@endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif" >
                            @endif
                            @else
                                @if($design->license==0)
                                <img src="{{ asset('storage/' . $design->image) }}" alt="{{$design->name}} {{$design->Genre1->genre}} @if($design->genre2==!0),{{$design->Genre2->genre}}@endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif" >
                                @else
                                <img src="{{ asset('storage/' . $design->image_with_artist_name) }}" alt="{{$design->name}} {{$design->Genre1->genre}} @if($design->genre2==!0),{{$design->Genre2->genre}}@endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif" >
                                <p>こちらの作品はコピーライセンス(©アーティスト名)を右下に表記した作品のみのダウンロードとなります。</p>
                                @endif
                                <p>IT2Uのマークはダウンロード時には消えます。</p>
                            @endif
                        </div>
                            <table class="horizontal-table">
                                <thead style="flex: 1;">
                                    <th>アーティスト名</th>
                                </thead>
                                <tr style="display: flex;">
                                    <td><a href="{{url('design/artist', $design->artist_id)}}">{{$design->artist_name}}</a></td>
                                </tr>
                                <thead style="flex: 1;">
                                    <th>作品名</th>
                                </thead>
                                <tr style="display: flex;">
                                    <td>{{ $design->name}}</td>
                                </tr>
                                <thead style="flex: 1;">
                                    <th>金額(税込)@if($design->original==1)(送料込み)@endif</th>
                                </thead>
                                <tr style="display: flex;">
                                    <td>¥{{ $design->price}}</td>
                                </tr>
                                @if(isset($design->width) || isset($design->height) || isset($design->depth) || isset($design->weight))
                                <thead style="flex: 1;">
                                    <th>詳細情報</th>
                                </thead>
                                <tr style="display: flex;">
                                    @if(isset($design->width))
                                    <td>幅:{{ $design->width}}</td>
                                    @endif
                                    @if(isset($design->height))
                                    <td>高さ:{{ $design->height}}</td>
                                    @endif
                                    @if(isset($design->depth))
                                    <td>奥行き:{{ $design->depth}}</td>
                                    @endif
                                    @if(isset($design->weight))
                                    <td>重さ:{{ $design->weight}}</td>
                                    @endif
                                </tr>
                                @endif
                                <thead style="flex: 1;">
                                    <th>カテゴリ</th>
                                </thead>
                                <tr style="display: flex;">
                                    <td>{{ $design->Genre1->genre}}
                                            @if($design->genre2==!0)
                                            ,{{ $design->Genre2->genre}}
                                            @endif
                                            @if($design->genre3==!0)
                                            ,{{ $design->Genre3->genre}}
                                            @endif
                                    </td>
                                </tr>
                            </table>
            </div>
                    <!-- 一回ダウンロード -->
                    <div class="permission">
                    @if($design->original==0)
                    <div class="">
                        <p>こちらの作品をダウンロードしますか？</p>
                        <button type="button"onclick="history.back()">
                                キャンセルする
                            </button>
                            <div class="consent">
                                <p><a href="{{ url('design/policy') }}" >利用規約</a>に同意して</p>
                                <input type="checkbox" id="agreement-checkbox" onchange="toggleDownloadButton()">
                            </div>
                            <button type="submit" id="download-button" disabled>
                                <i class="fa fa-plus"></i> ダウンロードする
                            </button>
                        </form>
                    </div>
                    @elseif($design->original==2)
                    <div class="">
                        <p>こちらの作品をダウンロードしますか？</p>
                        <button type="button"onclick="history.back()">
                                キャンセルする
                            </button>
                            <div class="consent">
                                <p><a href="{{ url('design/policy') }}" >利用規約</a>に同意して</p>
                                <input type="checkbox" id="agreement-checkbox" onchange="toggleDownloadButton()">
                            </div>
                            <button type="submit" id="download-button" disabled>
                                <i class="fa fa-plus"></i> ダウンロードする
                            </button>
                        </form>
                    </div>
                    <div class="">
                        <p>こちらの作品の現物を購入しますか？</p>
                        <button type="button"onclick="history.back()">
                                キャンセルする
                            </button>
                            <div class="consent">
                                <p><a href="{{ url('design/policy') }}" >利用規約</a>に同意して</p>
                                <input type="checkbox" id="accept-checkbox" onchange="toggleAddressButton()">
                            </div>
                            <form method="GET" action="{{ route('buyer_address',['id'=> $design->id]) }}">
                                <button type="submit" id="address-button" disabled>
                                お届け先情報を入力して購入する
                                </button>
                            </form>
                    </div>
                    @else
                    </form>
                    <div class="">
                        <p>こちらの作品の現物を購入しますか？</p>
                        <button type="button"onclick="history.back()">
                                キャンセルする
                            </button>
                            <div class="consent">
                                <p><a href="{{ url('design/policy') }}" >利用規約</a>に同意して</p>
                                <input type="checkbox" id="accept-checkbox" onchange="toggleAddressButton()">
                            </div>
                            <form method="GET" action="{{ route('buyer_address',['id'=> $design->id]) }}">
                                <button type="submit" id="address-button" disabled>
                                お届け先情報を入力して購入する
                                </button>
                            </form>
                    </div>
                    @endif
                </form>
                <!-- cartに入れる -->
                <form method="POST" action="{{ route('design_cart',['id'=> $design->id]) }}">
                @csrf
                @if($design->price>0)
                <div class="consent">
                    <p><a href="{{ url('design/policy') }}" >利用規約</a>に同意して</p>
                    <input type="checkbox" id="okay-checkbox" onchange="toggleCartButton()">
                </div>
                <button type="submit"id="cart-button" disabled>
                    <i class="fa fa-plus"></i> カートに入れる
                </button>
                @endif
                </form>
                <!-- 非ログインユーザー -->
                @else
                @if($design->price>0)
                <form method="GET" action="{{ route('design_once',['id'=> $design->id]) }}">
                @else
                <form method="GET" action="{{ route('design_download_free',['id'=> $design->id]) }}">
                @endif
                    @csrf
                    <h1 style="text-align:center;">作品詳細<br>{{$design->name}}</h1>
                        <div class="card-body" >
                            @if($design->original==1)
                            <img src="{{ asset('storage/' . $design->image) }}" alt="{{$design->name}} {{$design->Genre1->genre}} @if($design->genre2==!0),{{$design->Genre2->genre}}@endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif" >
                            @if(isset($design->image1))
                            <img src="{{ asset('storage/' . $design->image1) }}" alt="{{$design->name}} {{$design->Genre1->genre}} @if($design->genre2==!0),{{$design->Genre2->genre}}@endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif" >
                            @endif
                            @if(isset($design->image2))
                            <img src="{{ asset('storage/' . $design->image2) }}" alt="{{$design->name}} {{$design->Genre1->genre}} @if($design->genre2==!0),{{$design->Genre2->genre}}@endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif" >
                            @endif
                            @if(isset($design->image3))
                            <img src="{{ asset('storage/' . $design->image3) }}" alt="{{$design->name}} {{$design->Genre1->genre}} @if($design->genre2==!0),{{$design->Genre2->genre}}@endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif" >
                            @endif
                            @else
                                @if($design->license==0)
                                <img src="{{ asset('storage/' . $design->image) }}" alt="{{$design->name}} {{$design->Genre1->genre}} @if($design->genre2==!0),{{$design->Genre2->genre}}@endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif" >
                                @else
                                <img src="{{ asset('storage/' . $design->image_with_artist_name) }}" alt="{{$design->name}} {{$design->Genre1->genre}} @if($design->genre2==!0),{{$design->Genre2->genre}}@endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif" >
                                <p>こちらの作品はコピーライセンス(©アーティスト名)を右下に表記した作品のみのダウンロードとなります。</p>
                                @endif
                                <p>※IT2Uのマークはダウンロード時には消えます。</p>
                            @endif
                        </div>
                    <table class="horizontal-table">
                                <thead style="flex: 1;">
                                    <th>アーティスト名</th>
                                </thead>
                                <tr style="display: flex;">
                                    <td><a href="{{url('design/artist', $design->artist_id)}}">{{$design->artist_name}}</a></td>
                                </tr>
                                <thead style="flex: 1;">
                                    <th>作品名</th>
                                </thead>
                                <tr style="display: flex;">
                                    <td>{{ $design->name}}</td>
                                </tr>
                                <thead style="flex: 1;">
                                    <th>金額(税込)</th>
                                </thead>
                                <tr style="display: flex;">
                                    <td>¥{{ $design->price}}</td>
                                </tr>
                                @if(isset($design->width) || isset($design->height) || isset($design->depth) || isset($design->weight))
                                <thead style="flex: 1;">
                                    <th>詳細情報</th>
                                </thead>
                                <tr style="display: flex;">
                                    @if(isset($design->width))
                                    <td>幅:{{ $design->width}}</td>
                                    @endif
                                    @if(isset($design->height))
                                    <td>高さ:{{ $design->height}}</td>
                                    @endif
                                    @if(isset($design->depth))
                                    <td>奥行き:{{ $design->depth}}</td>
                                    @endif
                                    @if(isset($design->weight))
                                    <td>重さ:{{ $design->weight}}</td>
                                    @endif
                                </tr>
                                @endif
                                <thead style="flex: 1;">
                                    <th>カテゴリ</th>
                                </thead>
                                <tr style="display: flex;">
                                    <td>{{ $design->Genre1->genre}}
                                            @if($design->genre2==!0)
                                            ,{{ $design->Genre2->genre}}
                                            @endif
                                            @if($design->genre3==!0)
                                            ,{{ $design->Genre3->genre}}
                                            @endif
                                    </td>
                                </tr>
                    </table>
            </div>
                    <div class="permission">
                    @if($design->original==0)
                        <p>登録せずにダウンロードしますか？</p>
                            <button type="button"onclick="history.back()">
                                キャンセルする
                            </button>
                            <div class="consent">
                                <p><a href="{{ url('design/policy') }}" >利用規約</a>に同意して</p>
                                <input type="checkbox" id="agreement-checkbox" onchange="toggleDownloadButton()">
                            </div>
                            <button type="submit" id="download-button" disabled>
                                <i class="fa fa-plus"></i> ダウンロードする
                            </button>
                        </form>
                    </div>
                    @elseif($design->original==2)
                        <p>登録せずに,ダウンロードしますか？</p>
                            <button type="button"onclick="history.back()">
                                キャンセルする
                            </button>
                            <div class="consent">
                                <p><a href="{{ url('design/policy') }}" >利用規約</a>に同意して</p>
                                <input type="checkbox" id="agreement-checkbox" onchange="toggleDownloadButton()">
                            </div>
                            <button type="submit" id="download-button" disabled>
                                <i class="fa fa-plus"></i> ダウンロードする
                            </button>
                    </div>
                </form>
                    <div class="permission">
                        <p>登録せずに,こちらの作品の現物を購入しますか？</p>
                            <button type="button"onclick="history.back()">
                                キャンセルする
                            </button>
                            <div class="consent">
                                <p><a href="{{ url('design/policy') }}" >利用規約</a>に同意して</p>
                                <input type="checkbox" id="accept-checkbox" onchange="toggleAddressButton()">
                            </div>
                            <form method="GET" action="{{ route('buyer_address',['id'=> $design->id]) }}">
                                <button type="submit" id="address-button" disabled>
                                お届け先情報を入力して購入する
                                </button>
                            </form>
                    </div>
                    @else
                </form>
                    <div class="permission">
                        <p>登録せずに,こちらの作品の現物を購入しますか？</p>
                            <button type="button"onclick="history.back()">
                                キャンセルする
                            </button>
                            <div class="consent">
                                <p><a href="{{ url('design/policy') }}" >利用規約</a>に同意して</p>
                                <input type="checkbox" id="accept-checkbox" onchange="toggleAddressButton()">
                            </div>
                            <form method="GET" action="{{ route('buyer_address',['id'=> $design->id]) }}">
                                <button type="submit" id="address-button" disabled>
                                お届け先情報を入力して購入する
                                </button>
                            </form>
                    </div>
                    @endif
                    <div class="permission">
                        <form method="POST" action="{{ route('design_cart',['id'=> $design->id]) }}">
                            @csrf
                            @if($design->price>0)
                            <div class="consent">
                                <p><a href="{{ url('design/policy') }}" >利用規約</a>に同意して</p>
                                <input type="checkbox" id="okay-checkbox" onchange="toggleCartButton()">
                            </div>
                            <button type="submit"id="cart-button" disabled>
                                <i class="fa fa-plus"></i> カートに入れる
                            </button>
                        </form>
                        @endif
                    </div>
                    <div class="permission">
                        <p>ログインしてから購入しますか？</p>
                        <p>(基本情報の入力の必要がなくなります)</p>
                        <a href="{{ route('login') }}" class="header_nav_itm_link">ログイン</a>
                    </div>
                    <div class="permission">
                        <p>バイヤー登録してから購入しますか？</p>
                        <p>(基本情報の入力の必要がなくなります)</p>
                        <a href="{{ route('register') }}" class="header_nav_itm_link" target="_blank" >登録する</a>
                    </div>
                    @endauth
                    <section class="">
        <h6>
        価格は全て、障がい者アーティストが決めた金額です。アーティストが決めた金額から<span style="color:red;">手数料4.6%</span>を引いた金額がアーティストに支払われます。(この作品の場合¥{{round($design->price* 0.954)}}がアーティストの受取額です)
        当サイトの主な目的は、障がい者アートの普及です。したがって、
        <span style="color:red;">有償であろうと無償であろうと、ダウンロードした作品を利用する際には、コピーライセンスの表記または併記が義務付けられます。</span>
        作品によってはアーティスト名が表示された作品のみしかダウンロードができないものもあります。
        上記の内容に同意いただいた上で、ダウンロードしてください。</h6>
        <div class="english">
            <button onclick="showText()">For English speaker</button>
        </div>
        <div id="infoText" style="display:none;">
            <h6>All works on this site can be downloaded.<br>
            All prices are determined by disabled artists.<br>
            The main purpose of this site is to popularize art by people with disabilities.<br>
            <span style="color:red;">Therefore, regardless of whether it is paid or free, when using a downloaded work, it is mandatory to include or include a copy license.</span><br>
            Depending on the work, you may only be able to download works that display the artist's name.<br>
            Please agree to the above before downloading.</h6>
        </div>

    </section>

            </div>
        </div>
        <section>
        <h2>お問い合わせ</h2>
        <p>ご質問やお問い合わせがあれば、以下の連絡先までお気軽にご連絡ください。</p>
        <address>
            ボランティア団体IT2U<br>
            電話：[連絡先電話番号070-4225-0615]<br>
            メール：[info@itcha50.com]
            <a href="{{route('design_list')}}">障がい者アートトップページへ</a>
        </address>
    </section>

    <footer>
        <p><a href="https://itcha50.com/design/list">&copy; IT2U 障がい者アート共有サイト</a></p>
    </footer>

        </body>
        <div class="popup-container" id="popupContainer">
        <div class="popup-content" id="popupContent">
            <p>有償であろうと無償であろうと、ダウンロードした作品を利用する際には、コピーライセンスの表記または併記が義務付けられます。</p>
            <div class="popup-buttons">
                <button onclick="closePopup(event)">了解する</button>
            </div>
        </div>
    </div>
<script>
    function agreeToUseCookies() {
    document.getElementById("popupContainer").style.display = "none";
    }
    window.addEventListener("load", function () {
    setTimeout(function () {
        document.getElementById("popupContainer").style.display = "block";
    }, 1000);
    });
    function closePopup(event) {
    // ボタンクリックのイベント伝播を阻止
    event.stopPropagation();
    // ポップアップを非表示にする
    document.getElementById("popupContainer").style.display = "none";
}

</script>

        <script>
            function toggleDownloadButton() {
                var agreementCheckbox = document.getElementById("agreement-checkbox");
                var downloadButton = document.getElementById("download-button");

                if (agreementCheckbox.checked) {
                    downloadButton.disabled = false;
                } else {
                    downloadButton.disabled = true;
                } 
            }
        </script>
        <script>
            function toggleCartButton() {
                var okayCheckbox = document.getElementById("okay-checkbox");
                var cartButton = document.getElementById("cart-button");

                if (okayCheckbox.checked) {
                    cartButton.disabled = false;
                } else {
                    cartButton.disabled = true;
                }
            }
        </script>
        <script>
            function toggleAddressButton() {
                var acceptCheckbox = document.getElementById("accept-checkbox");
                var addressButton = document.getElementById("address-button");

                if (acceptCheckbox.checked) {
                    addressButton.disabled = false;
                } else {
                    addressButton.disabled = true;
                }
            }
        </script>
</html>
