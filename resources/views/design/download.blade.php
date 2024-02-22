<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>選択作品詳細ページ{{$design->name}} {{$design->name_en}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="障がい者アートの魅力を探求するプラットフォーム。アーティストの感動的な作品やストーリーを通じて、多様性と創造性を称賛します。">
    <meta name="keywords" content="障がい者アート, アートプロジェクト, アートコミュニティ, 多様性, 創造性,イラスト,{{$design->Genre1->genre}} @if($design->genre2==!0),{{$design->Genre2->genre}}@endif @if($design->genre3==!0),{{$design->Genre3->genre}}@endif">
    <meta name="author" content="IT2U">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="ITの力で障がいのある人をサポートしたい!IT2Uのアカウントです">
    <meta property="og:description" content="アーティストの感動的な作品やストーリーを通じて、障がい者アートの魅力を広めるプラットフォーム。">
    <meta property="og:image" content="https://itcha50.com/img/design_design_top_icon.pn">
    <meta property="og:url" content="https://itcha50.com/design/recruit">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@LLco1118">
    <meta name="twitter:title" content="ITの力で障がいのある人をサポートしたい!IT2Uのアカウントです">
    <meta name="twitter:description" content="障がい者アートの魅力を広めるプラットフォーム。">
    <meta name="twitter:image" content="https://itcha50.com/img/design_design_top_icon.pn">

    <link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/design.css') }}">
    <link rel="stylesheet" href="{{ asset('css/artist.css') }}">

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
                    <h1>作品詳細<br>{{$design->name}}</h1>
                        <div class="card-body" >
                            @if($design->license==0)
                            <img src="{{ asset('storage/' . $design->image) }}" alt="image" >
                            @else
                            <img src="{{ asset('storage/' . $design->image_with_artist_name) }}" alt="image" >
                            <p>こちらの作品はコピーライセンス(©アーティスト名)を右下に表記した作品のみのダウンロードとなります。</p>
                            @endif
                            <p>IT2Uのマークはダウンロード時には消えます。</p>

                        </div>

                    <table class="horizontal-table">
                        <thead>
                        <tr>
                            <th>アーティスト名</th>
                            <td><a href="{{url('design/artist', $design->artist_id)}}">{{$design->artist_name}}</a></td>
                        </tr>
                        <tr>
                            <th>作品名</th>
                            <td>{{ $design->name}}</td>
                        </tr>
                        <tr>
                            <th>金額</th>
                            <td>¥{{ $design->price}}</td>
                        </tr>
                        <tr>
                            <th>カテゴリ</th>
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
                    <div class="">
                        <p>こちらの作品をダウンロードしますか？</p>
                        <button type="button"onclick="history.back()">
                                キャンセルする
                            </button>
                            <button type="submit">
                                <i class="fa fa-plus"></i> ダウンロードする
                            </button>
                    </div>
                </form>
                <form method="POST" action="{{ route('design_cart',['id'=> $design->id]) }}">
                @csrf
                @if($design->price>0)
                <button type="submit">
                                <i class="fa fa-plus"></i> カートに入れる
                </button>
                @endif
                </form>
                @else
                @if($design->price>0)
                <form method="GET" action="{{ route('design_once',['id'=> $design->id]) }}">
                @else
                <form method="GET" action="{{ route('design_download_free',['id'=> $design->id]) }}">
                @endif
                    @csrf
                    <h2>作品詳細</h2>
                    @if($design->license==0)
                            <img src="{{ asset('storage/' . $design->image) }}" alt="image" >
                            @else
                            <img src="{{ asset('storage/' . $design->image_with_artist_name) }}" alt="image" >
                            <p>こちらの作品はコピーライセンス(©アーティスト名)を右下に表記した作品のみのダウンロードとなります。</p>
                            @endif
                            <p>※IT2Uのマークはダウンロード時には消えます。</p>

                    </div>
                    <table>
                            <thead>
                                <th >作品名</th>
                                <th >金額</th>
                                <th>カテゴリ</th>
                            </thead>
                            <td>{{ $design->name}}</td>
                            <td>¥{{ $design->price}}</td>
                            <td>{{ $design->Genre1->genre}}
                                    @if($design->genre2==!0)
                                    ,{{ $design->Genre2->genre}}
                                    @endif
                                    @if($design->genre3==!0)
                                    ,{{ $design->Genre3->genre}}
                                    @endif
                            </td>                        
                    </table>
                    <div class="">
                        <p>登録せずにダウンロードしますか？</p>
                        <button type="button"onclick="history.back()">
                                キャンセルする
                            </button>
                            <button type="submit">
                                <i class="fa fa-plus"></i> ダウンロードする
                            </button>
                    </div>
                </form>
                <form method="POST" action="{{ route('design_cart',['id'=> $design->id]) }}">
                @csrf
                @if($design->price>0)
                <button type="submit">
                                <i class="fa fa-plus"></i> カートに入れる
                </button>
                @endif
                </form>
                    <div class="">
                        <p>ログインしてダウンロードしますか？</p>
                        <a href="{{ route('login') }}" class="header_nav_itm_link">ログイン</a>
                    </div>
                    <div class="">
                        <p>バイヤー登録してダウンロードしますか？</p>
                        <a href="{{ route('register') }}" class="header_nav_itm_link" target="_blank" >登録する</a>
                    </div>
                    @endauth
                    

            </div>
        </div>
        </body>
</html>
