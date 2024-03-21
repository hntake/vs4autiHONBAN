<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>障がい者アート 支払申請画面</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="障がい者アートの魅力を探求するプラットフォーム。アーティストの感動的な作品やストーリーを通じて、多様性と創造性を称賛します。">
    <meta name="keywords" content="障がい者アート, アートプロジェクト, アートコミュニティ, 多様性, 創造性">
    <meta name="author" content="IT2U">
    <meta name="robots" content="index, follow">

    <link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/design.css') }}">
    <link rel="stylesheet" href="{{ asset('css/artist.css') }}">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
     crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <h1>障がい者アート支払申請ページ</h1>
    </header>

    <section class="profile">
        <div class="card-body">
            <form method="POST" action="{{ route('design_order') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header" style="display:flex; flex-direction: column; border:solid 1px gray; border-radius:10%; padding:8px;">
                    @if($artist->unpaid >0)
                    <p>未払い済み残高:{{$total}}円</p>
                    @else
                    <p>未払い済み残高:0円 </p>
                    @endif
                        @if($artist->unpaid>=2000)
                    <div class="r-box">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('送金希望金額 ※必須') }}</label>

                            <div>
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div>
                    <div class="r-box">
                            <label for="bank_name" class="col-md-4 col-form-label text-md-end">{{ __('銀行名 ※必須') }}</label>

                            <div>
                                <input id="bank_name" type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ old('bank_name') }}" required autocomplete="bank_name">

                                @error('bank_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div>  
                    <div class="r-box">
                            <label for="account_number" class="col-md-4 col-form-label text-md-end">{{ __('口座番号 ※必須') }}</label>

                            <div>
                                <input id="account_number" type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number') }}" required autocomplete="account_number">

                                @error('account_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div> 
                    <div class="r-box">
                            <label for="bank_branch" class="col-md-4 col-form-label text-md-end">{{ __('支店名 ※必須') }}</label>

                            <div>
                                <input id="bank_branch" type="text" class="form-control @error('bank_branch') is-invalid @enderror" name="bank_branch" value="{{ old('bank_branch') }}" required autocomplete="bank_branch">

                                @error('bank_branch')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div> 
                    <div class="r-box">
                            <label for="bank_type" class="col-md-4 col-form-label text-md-end">{{ __('口座の種類 ※必須') }}</label>

                            <div>
                                <input id="bank_type1" type="radio" class="form-control @error('bank_type') is-invalid @enderror" name="bank_type" value="普通預金口座"  checked>
                                <label for="bank_type1">普通預金口座</label><br>
                                <input id="bank_type2" type="radio" class="form-control @error('bank_type') is-invalid @enderror" name="bank_type" value="普通預金口座" >
                                <label for="bank_type2">普通預金口座</label><br>
                            </div>
                    </div> 
                    <div class="r-box">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('口座名義 ※必須') }}</label>

                            <div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div> 
                        <div class="create-button">
                            <div class="button">
                                <button type="submit">
                                    <i class="fa fa-plus"></i> 送金申請する
                                </button>
                            </div>
                        </div>
                        @else
                        <p>売り上げ金額が2000円以上から申請可能です。</p>
                        @endif
                </div>
            </form>
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
