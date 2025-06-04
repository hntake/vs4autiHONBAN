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

    <link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/design.css') }}">
    <link rel="stylesheet" href="{{ asset('css/artist.css') }}">

    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962" crossorigin="anonymous"></script> -->

</head>
<body>

    <header>
        <h1>障がい者アート作品登録ページ</h1>
    </header>

    <section class="profile">
    <form method="POST" action="{{ route('design_posted') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
        <div class="card-body">
        <div class="card">
                <div class="card-header" style="display:flex; flex-direction: column;  width:fit-content; border-radius:10%">
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
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('金額 ※必須 半角数字') }}</label>
                            <div>
                                <span class="input-group-text">¥</span>
                                <input id="price" type="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div>  
                    <div class="attention">
                        <h5 style="color:red;">無料提供の場合は0を入力、販売したい場合の最低金額は50円からとなります。</h5>
                    </div>
                    <div class="r-box">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('カテゴリ ※必須・複数可・最大三個まで') }}</label>
                                <br>
                                @foreach ($genres as $genre)
                                <input type="checkbox" name="genre[]" value="{{ $genre->id }}" >
                                {{ $genre->genre }} 
                                @endforeach
                                @error('genre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div> 
                    <div class="copy">
                        <input type="file" name="image" id="image" class="form-control">
                        <!-- コピーライセンスの表示方法選択 -->
                        <input type="checkbox" id="checkbox" name="checkbox" value="1">
                        <label for="checkbox">コピーライセンスを画像に表記する</label><br>
                    </div>
                    <div class="protect">
                        <!-- バッジへの利用の有無選択 -->
                        <input type="checkbox" id="protect" name="protect" value="2">
                        <label for="checkbox">お守りバッジへのデザイン付与を許可する</label><br>
                    </div>
                        <div class="create-button">
                            <div class="button">
                                <button type="submit">
                                    <i class="fa fa-plus"></i> 作品登録する
                                </button>
                            </div>
                        </div>
                        <!-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif -->
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
        <p><a href="https://itcha50.com/design/list">&copy; IT2U 障がい者アート共有サイト</a></p>
    </footer>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="genre[]"]');
        let checkedCount = 0;
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    checkedCount++;
                } else {
                    checkedCount--;
                }
                if (checkedCount > 3) {
                    alert('最大3つまで選択できます');
                    this.checked = false;
                    checkedCount--;
                }
            });
        });
    });
</script>
</html>
