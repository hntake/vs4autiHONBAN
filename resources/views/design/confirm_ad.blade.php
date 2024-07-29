@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <title>障がい者アート作品確認ページ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="障がい者アートの魅力を探求するプラットフォーム。アーティストの感動的な作品やストーリーを通じて、多様性と創造性を称賛します。">
    <meta name="keywords" content="障がい者アート,アートプロジェクト,アートコミュニティ,多様性,創造性,{{$design_genre}},{{$design_genre1}},{{$design_genre2}},">
    <meta name="author" content="IT2U">
    <meta name="robots" content="index, follow">

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
                @if($new_image)
                <form method="POST" action="{{ route('design_upload_ad',['id'=> $new_image]) }}" enctype="multipart/form-data">
                @csrf
                    <h2>作品確認画面</h2>

                    <div class="card-body" style="text-align:start;">
                    <th >作品名</th>
                        <td><input type="text" name="name" value="{{ $design_name}}" class="form-control"></td>
                    <th >金額</th>
                        <td><input type="text" name="price" value="{{ $design_price}}" class="form-control"></td>
                    <div class="category">
                        <th >カテゴリー</th>
                        <th >{{$genreName1}}</th>
                            <td><input type="hidden" id="checkbox" name="genre1" value="{{ $design_genre}}" checked></td>
                        @if(isset($design_genre1))    
                        <th >{{$genreName2}}</th>
                            <td><input type="hidden" id="checkbox" name="genre2" value="{{ $design_genre1}}" checked></td>
                        @endif
                        @if(isset($design_genre2))    
                        <th >{{$genreName3}}</th>
                            <td><input type="hidden" id="checkbox" name="genre3" value="{{ $design_genre2}}" checked></td>
                        @endif
                        </tr>
                    </div>
                    <div class="confirm">
                        <p>こちらのイメージで宜しいですか？</p>
                        <div class="">
                            <div class="">
                                <img src="{{ asset('storage/' . $new_image) }}" alt="image" >
                            </div>
                        </div>
                        <button type="button"onclick="history.back()">
                            変更する
                        </button>
                        <button type="button" id="addImageButton">
                            画像やサイズを追加する
                        </button>
                        <h6>クリックするとページ下に追加欄が開きます</h6>
                        <button type="submit" name="action" value="submit">
                            追加しない
                        </button>
                    </div>
                    <p style="color:red; font-weight:bold;">画像はあと3枚追加できます。作品イメージがわかるように複数の画像をアップロードしましょう!</p>
                    <div id="additionalImage" style="display:none;">
                        <label for="image1">追加画像1を選択:</label>
                        <input type="file" name="image1" id="image1" class="form-control">
                        
                        <label for="image2">追加画像2を選択:</label>
                        <input type="file" name="image2" id="image2" class="form-control">
                        
                        <label for="image3">追加画像3を選択:</label>
                        <input type="file" name="image3" id="image3" class="form-control">

                        <label for="width">幅(単位も記入して下さい):</label>
                        <input id="width" type="width" class="form-control @error('width') is-invalid @enderror" name="width" value="{{ old('width') }}" >
                        <label for="height">高さ(単位も記入して下さい):</label>
                        <input id="height" type="height" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" >
                        <label for="depth">奥行き(単位も記入して下さい):</label>
                        <input id="depth" type="depth" class="form-control @error('depth') is-invalid @enderror" name="depth" value="{{ old('depth') }}" >
                        <label for="weight">重さ(単位も記入して下さい):</label>
                        <input id="weight" type="weight" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}">
                        
                        <button type="submit" name="action" value="submit_with_images">
                            送信する
                        </button>
                    </div>
                </form>
                @else

                    <a href="{{url('design_post')}}">
                    <h5>作品<br>アップロードページへ戻る</h5>
                    </a>
            
                @endif
            </div>
            <div class="policy">
                アップロードした画像が<a href="{{url('design/policy')}}">利用規約</a>に反している場合は事前の通告なしに削除することがありますことをご了承ください。
            </div>
        </div>
</div>
<script>
    document.getElementById('addImageButton').addEventListener('click', function() {
        document.getElementById('additionalImage').style.display = 'block';
    });
</script>
@endsection
