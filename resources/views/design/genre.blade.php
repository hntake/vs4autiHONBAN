<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>障がい者アート カテゴリー:{{$genre}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$genre}} イラスト 障がい者アートの魅力を探求するプラットフォーム。アーティストの感動的な作品やストーリーを通じて、多様性と創造性を称賛します。">
    <meta name="keywords" content="イラスト、ダウンロード download 障がい者アート, アートプロジェクト, アートコミュニティ, 多様性, 創造性">
    <meta name="author" content="IT2U">
    <meta name="robots" content="index, follow">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@LLco1118">
    <meta name="twitter:title" content="ITの力で障がいのある人をサポートしたい!IT2Uのアカウントです">
    <meta name="twitter:description" content="障がい者アートの魅力を広めるプラットフォーム。">
    <meta name="twitter:image" content="https://itcha50.com/img/design_top_icon.png?4362984378">
    @if($preload)
    <link rel="preload" href="https://itcha50.com/storage/{{$preload->image}}.png" as="image">
    @endif
    <link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/design.css') }}">
    <link rel="stylesheet" href="{{ asset('css/artist.css') }}">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
     crossorigin="anonymous"></script>
</head>
<body>
    <!-- Twitterシェアボタン -->

    <blockquote class="twitter-tweet"><p lang="en" dir="ltr"> 
        <!-- <a href="https://t.co/ffKnsVKwG4"></a> -->
        <!-- <a href="https://twitter.com/SpaceX/status/1732824684683784516?ref_src=twsrc%5Etfw"></a> -->
        <a href="https://twitter.com/share" class="twitter-share-button" data-text="障がい者アート使って支援!買って支援! 【障がい者アート普及・共有サイト】" data-url="{{url('design/list/')}}" data-hashtags="IT2U">X</a>
    </blockquote>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <header>
        <img src="{{asset('img/design_top_banner.png')}}" alt="artist" >
        <h1>障がい者アート カテゴリー:{{$genre}}</h1>
    </header>
    <nav id="menu" class="header_nav">

        @if (Route::has('login'))
        <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> -->
        @auth
                @else
                <button><a href="{{ route('login') }}" class="header_nav_itm_link">ログイン</a></button>
                @if (Route::has('register'))
                <button><a target="_blank" href="{{ route('register') }}" class="header_nav_itm_link">新規登録</a></button>

            @endif
            @endauth
            @endif
            <div class="racoon">
                <button><a href="{{route('design_list')}}">障がい者アートトップページへ</a></button>
                <button><a target="_blank" href="{{ url('design/artist_list') }}" class="header_nav_itm_link">障がい者アーティスト一覧</a></button>
                <button><a target="_blank" href="{{ url('design/recruit') }}" class="header_nav_itm_link">障がい者アーティスト募集ページ</a></button>
                <button><a href="{{url('design/policy')}}">利用規約</a></button>
                <button><a target="_blank" href="{{ url('aboutus') }}" class="header_nav_itm_link"><img src="{{asset('img/racoon_square.png')}}" alt="racoon"  ></a></button>
            </div>
    </nav>
    <!-- <section class="">
        <h2>障がい者アートの世界へようこそ！</h2>
        <p>当サイトにある作品は全てダウンロード可能です。
        価格は全て、障がい者アーティストが決めた金額です。
        当サイトの主な目的は、障がい者アートの普及です。したがって、
        <span style="color:red;">有償であろうと無償であろうと、ダウンロードした作品を利用する際には、コピーライセンスの表記または併記が義務付けられます。</span>
        作品によってはアーティスト名が表示された作品のみしかダウンロードができないものもあります。
        上記の内容に同意いただいた上で、ダウンロードしてください。</p>

        <p>All works on this site can be downloaded.
        All prices are determined by disabled artists.
        The main purpose of this site is to popularize art by people with disabilities.
        <span style="color:red;">Therefore, regardless of whether it is paid or free, when using a downloaded work, it is mandatory to include or include a copy license.</span>
        Depending on the work, you may only be able to download works that display the artist's name.
        Please agree to the above before downloading.</p>

    </section> -->
    <section>
        <div class="mine">
            @auth
            <td><a href="{{ route('index_cart') }}">マイカート</a></td>
            @elseif(isset($tempCart))
            <td><a href="{{ route('index_cart_un') }}">マイカート</a></td>
            @else
        
            @endauth
            @auth
            @if($user->type==8)
            <td><a href="{{ route('my_page') }}">マイページへ</a></td>
            @elseif($user->type==10)
            <td><a href="{{ route('design_my_sheet') }}">マイページへ</a></td>
            @endif
            @endauth
        </div>
        <div>
            <form action="{{ route('art_search') }}" method="GET">
                <input type="text" name="keyword" >
                <input type="submit" value="検索">
            </form>
        </div>

        <!-- カテゴリボタン -->
        <button id="categoryButton">カテゴリ選択</button>

        <!-- カテゴリリスト -->
        <div class="category-list" id="categoryList">
            <a class="category-item" href="{{ route('genre',['id' => '1']) }}">花・植物 flower plant</a>  
            <a class="category-item" href="{{ route('genre',['id' => '2']) }}">ビジネス business</a>               
            <a class="category-item" href="{{ route('genre',['id' => '3']) }}">人物 people</a>               
            <a class="category-item" href="{{ route('genre',['id' => '4']) }}">動物・生き物 animal </a>               
            <a class="category-item" href="{{ route('genre',['id' => '5']) }}">乗り物 vehicle</a>               
            <a class="category-item" href="{{ route('genre',['id' => '6']) }}">生活 life</a>               
            <a class="category-item" href="{{ route('genre',['id' => '7']) }}">食べ物 food</a>               
            <a class="category-item" href="{{ route('genre',['id' => '8']) }}">春 spring</a>               
            <a class="category-item" href="{{ route('genre',['id' => '9']) }}">夏 summer</a>               
            <a class="category-item" href="{{ route('genre',['id' => '10']) }}">秋 fall</a>               
            <a class="category-item" href="{{ route('genre',['id' => '11']) }}">冬 winter</a>               
            <a class="category-item" href="{{ route('genre',['id' => '12']) }}">背景・壁紙 wallpaper</a>               
            <a class="category-item" href="{{ route('genre',['id' => '13']) }}">アイコン icon</a>               
            <a class="category-item" href="{{ route('genre',['id' => '14']) }}">文字 letter</a>               
            <a class="category-item" href="{{ route('genre',['id' => '15']) }}">犬 dog</a>               
            <a class="category-item" href="{{ route('genre',['id' => '16']) }}">猫 cat</a>               
            <a class="category-item" href="{{ route('genre',['id' => '17']) }}">可愛い動物 cute animals</a>               
            <a class="category-item" href="{{ route('genre',['id' => '18']) }}">鳥 bird</a>               
            <a class="category-item" href="{{ route('genre',['id' => '19']) }}">学校 school</a>               
            <a class="category-item" href="{{ route('genre',['id' => '20']) }}">おやつ snack candy</a>               
            <a class="category-item" href="{{ route('genre',['id' => '21']) }}">家庭 home</a>               
            <a class="category-item" href="{{ route('genre',['id' => '22']) }}">家族 family</a>               
            <a class="category-item" href="{{ route('genre',['id' => '23']) }}">桜 cherryblossom</a>               
            <a class="category-item" href="{{ route('genre',['id' => '24']) }}">車 car</a>               
            <a class="category-item" href="{{ route('genre',['id' => '25']) }}">電車 train</a>               
            <a class="category-item" href="{{ route('genre',['id' => '26']) }}">船 ship</a>               
            <a class="category-item" href="{{ route('genre',['id' => '27']) }}">顔 face</a>               
            <a class="category-item" href="{{ route('genre',['id' => '28']) }}">笑顔 smile</a>               
            <a class="category-item" href="{{ route('genre',['id' => '29']) }}">怒る angry</a>               
            <a class="category-item" href="{{ route('genre',['id' => '30']) }}">泣く cry</a>     
            <a class="category-item" href="{{ route('genre',['id' => '31']) }}">その他 etc</a>               
            <a class="category-item" href="{{ route('genre',['id' => '32']) }}">行事 event</a>               
        </div>
        @if(isset($keyword))
        <h2>検索結果</h2>
        <td><a href="{{route('design_list')}}">障がい者アートトップページへ</a></td>
        @else
        <h2>作品一覧</h2>
            @if(isset($select))
                @if($select == 'desc')
                <h2>最新順</h2>
                @elseif($select == 'up')
                <h2>人気順</h2>
                @elseif($select == 'down')
                <h2>価格が高い順</h2>
                @elseif($select == 'asc')
                <h2>古い順</h2>
                @else
                @endif
            @endif
        @endif
        <div class="sort">
                <form action="{{ route('design_list_sort') }}" method="GET">
                            @csrf
                            <select name="narabi">
                                <option value="desc">最新順</option>
                                <option value="asc">古い順</option>
                                <option value="up">人気順</option>
                                <option value="down">価格が高い順</option>
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
        <div class="list">
                <div class="card-header">
                @if ($designs->isEmpty())
                    <p>お探しの条件に該当する素材は見つかりませんでした。</p>
                    @else
                    <table>
                        <tr>
                        @foreach ($designs as $design)

                        @if($design->license==0)
                        <td><a href="{{route('design_select',['id'=>$design->id])}}" >
                            <div class="free-mark">
                                <img src="{{ asset('storage/' . $design->image) }}" alt="image" onclick="openPopup()">
                            </div>
                            @if($design->price==0)
                            <div class="free-icon">
                                <img src="{{ asset('img/free.png') }}" alt="image" >
                            </div>
                            @endif
                            </a>
                        </td>
                        @else
                        <td><a href="{{route('design_select',['id'=>$design->id])}}" >
                            <div class="free-mark">
                                <img src="{{ asset('storage/' . $design->image_with_artist_name) }}" alt="image" onclick="openPopup()">
                            </div>
                            @if($design->price==0)
                            <div class="free-icon">
                                <img src="{{ asset('img/free.png') }}" alt="image" >
                            </div>
                            @endif
                            </a>
                        </td>
                        @endif
                        </tr>
                        @endforeach
                    </table>
                    @endif
                </div>
        </div>
        <div class="pagination">
        {{ $designs->links('pagination::simple-bootstrap-4', ['prev_text' => '前へ', 'next_text' => '次へ']) }}
        {{ $designs->links() }}
        </div>
    </section>
    <section>
        <h2>お問い合わせ</h2>
        <p>ご質問やお問い合わせがあれば、以下の連絡先までお気軽にご連絡ください。</p>
        <address>
            ボランティア団体IT2U<br>
            メール：[info@itcha50.com]
        </address>
    </section>

    <footer>
        <p>&copy; IT2U 障がい者アート募集</p>
    </footer>
    <div class="popup-container" id="popupContainer">
        <div class="popup-content" id="popupContent">
            <p>有償であろうと無償であろうと、ダウンロードした作品を利用する際には、コピーライセンスの表記または併記が義務付けられます。</p>
            <div class="popup-buttons">
                <button onclick="closePopup(event)">了解する</button>
            </div>
        </div>
    </div>
    <script>
        // カテゴリボタンの要素を取得
        const categoryButton = document.getElementById('categoryButton');
        // カテゴリリストの要素を取得
        const categoryList = document.getElementById('categoryList');

        // カテゴリボタンがクリックされたときの処理
        categoryButton.addEventListener('click', function() {
            // カテゴリリストが表示されている場合
            if (categoryList.style.display === 'block') {
                // リストを非表示にする
                categoryList.style.display = 'none';
            } else {
                // リストを表示する
                categoryList.style.display = 'block';
            }
        });
    </script>
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

</body>
</html>
