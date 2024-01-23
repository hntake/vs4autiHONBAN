<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>障がい者アート 作品登録ページ</title>
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
        <h1>障がい者アート作品登録ページ</h1>
    </header>

    <section class="profile">
    <form method="POST" action="{{ route('design_post') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
        <div class="card-body">
        <div class="card">
                <div class="card-header" style="display:flex; flex-direction: column; border:solid 1px gray; width:fit-content;">
                    <div class="r-box">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('作品名 ※必須') }}</label>

                            <div>
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div>
                    <div class="r-box">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('金額 ※必須') }}</label>

                            <div>
                                <input id="price" type="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>  
                        <input type="file" name="image" id="image" class="form-control">
                        <div class="create-button">
                            <div class="button">
                                <button type="submit">
                                    <i class="fa fa-plus"></i> 作品登録する
                                </button>
                            </div>
                        </div>
    </form>
                       

                        </tr>
                    </table>
                </div>
        </div>
       
    </section>
  
    <section>
       
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
