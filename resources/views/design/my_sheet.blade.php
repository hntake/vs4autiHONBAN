<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>障がい者アーティストページ｜編集ページ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="障がい者アートの魅力を探求するプラットフォーム。アーティストの感動的な作品やストーリーを通じて、多様性と創造性を称賛します。">
    <meta name="keywords" content="障がい者アート, アートプロジェクト, アートコミュニティ, 多様性, 創造性">
    <meta name="author" content="IT2U">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="ITの力で障がいのある人をサポートしたい!IT2Uのアカウントです">
    <meta property="og:description" content="アーティストの感動的な作品やストーリーを通じて、障がい者アートの魅力を広めるプラットフォーム。">
    <meta property="og:image" content="https://itcha50.com/img/design_poster.png">
    <meta property="og:url" content="https://itcha50.com/design/poster">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@LLco1118">
    <meta name="twitter:title" content="ITの力で障がいのある人をサポートしたい!IT2Uのアカウントです">
    <meta name="twitter:description" content="障がい者アートの魅力を広めるプラットフォーム。">
    <meta name="twitter:image" content="https://itcha50.com/img/design_poster.png">

    <link rel="shortcut icon" href="{{ asset('/favicon_bbs.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/design.css') }}">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
     crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <h1>障がい者アーティストページ｜編集ページ</h1>
    </header>

    <section class="profile">
        <h2>個人情報（編集可能）</h2>
        <div class="card-body">
                    <div class="form-group row">

                        <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                        <div class="col-md-6">
                            <span class="">{{$user->email}}</span>
                            <input type="hidden" name="email" value="{{$user->email}}">
                        </div>
                    </div>
                     
                    
                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
                            <div class="col-md-6">
                                <span class="">{{$artist->name}}</span>
                                <input type="hidden" name="name" value="{{$artist->name}}">
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="name_pronunciation" class="col-md-4 col-form-label text-md-right">フリガナ</label>
                            <div class="col-md-6">
                                <span class="">{{$artist->name_pronunciation}}</span>
                                <input type="hidden" name="name_pronunciation" value="{{$artist->name_pronunciation}}">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">住所</label>
                        <div class="col-md-6">
                            <span class="">{{$artist->address}}</span>
                            <input type="hidden" name="address" value="{{$artist->address}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tel1" class="col-md-4 col-form-label text-md-right">連絡先①</label>
                        <div class="col-md-6">
                            <span class="">{{$artist->tel1}}</span>
                            <input type="hidden" name="tel1" value="{{$artist->tel1}}">
                        </div>
                    </div>
                </div>
        <div class="my_image">
            プロフィール画像
            @if(isset($artist->image))
            <img src="{{asset('storage/' . $artist->image)}}">
            @else
            <img src="{{asset('img/icon_man.png')}}">
            @endif
        </div>
    </section>
    <div class="pro_button"><a href="{{ route('edit_user',['id'=> $user->id]) }}">登録情報編集画面へ</a></div>
    <div class="pro_button"><a href="{{ route('edit_image') }}">プロフィール画像編集画面へ</a></div>
    <div class="pro_button"><a href="{{ route('password') }}">パスワード変更画面へ</a></div>
    <div class="pro_button"><a href="{{ url('delete') }}">登録削除画面へ</a></div>
    <section>
        <h2>作品一覧</h2>
        <div class="card">
        @foreach ($designs as $design)
                <div class="card-header" style="display:flex; flex-direction: column; border:solid 1px gray; width:fit-content;">
                    <tr>
                    <td><img src="{{ asset('storage/' . $design->image) }}" alt="image" ></td>
                    <td>ダウンロード数:{{$design->downloaded}}</td>
                    <td><a href="{{ route('design_delete_index',['id'=>$design->id]) }}">画像削除</a></td>
                    <td></td>

                    </tr>
                </div>
        @endforeach
    </section>
    <section>
        <h2>ダウンロード情報</h2>
        <div class="card">
                <div class="card-header" style="display:flex; flex-direction: column; border:solid 1px gray; width:fit-content;">
                <table>

                    <thead>
                            <th>作品名</th>
                            <th>金額</th>
                            <th>日時</th>
                    </thead>
                    @foreach ($downloads as $download)

                        <tr>
                            <td>{{ $download->designName }}</td>
                            <td>{{ $download->price }}</td>
                            <td>{{ $download->created_at }}</td>
                        </tr>
                    @endforeach
                    {{ $downloads->links() }}
                    <tr>
                    <td>事務手数料{{ $total[0]->total_price * 0.05 }}円</td>
                    <td>総額{{ $total[0]->total_price * 0.95 }}円</td>
                    @if($artist->unpaid >0)
                    <td>残高{{ $artist->unpaid }}円</td>
                    @else
                    <td>残高0円</td>
                    @endif
                    <td><a href="{{route('design_pay')}}">送金申込</a></td>
                    </tr>
                </table>
            </div>
    </section>
    <section>
    <div class="button"><a href="{{ url('design/post') }}">作品アップロード画面へ</a></div>

    </section>

    <section>
        <h2>お問い合わせ</h2>
        <p>ご質問やお問い合わせがあれば、以下の連絡先までお気軽にご連絡ください。</p>
        <address>
            ボランティア団体IT2U<br>
            電話：[連絡先電話番号070-4225-0615]<br>
            メール：[info@itcha50.com]
        </address>
    </section>

    <footer>
        <p>&copy; IT2U 障がい者アート募集</p>
    </footer>

</body>
</html>
