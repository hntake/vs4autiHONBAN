@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <title>障がい者アート作品確認ページ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="IT2Uは障がい者アートの魅力を探求するプラットフォーム。アーティストの感動的な作品やストーリーを通じて、多様性と創造性を称賛します。">
    <meta name="keywords" content="障がい者アート, アートプロジェクト, アートコミュニティ, 多様性, 創造性,{{$design_genre}},{{$design_genre1}},{{$design_genre2}},">
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
                <form method="POST" action="{{ route('design_upload',['id'=> $new_image]) }}">
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
                    <div class="copy">
                        @if(isset($isChecked))
                        <th >コピーライトを表記する</th>
                            <td><input type="checkbox" id="checkbox" name="checkbox" value="1" checked></td>
                        @endif
                    </div>
                    <div class="protect">
                        @if(isset($isProtect))
                        <th >お守りバッジのデザイン提供を許可する</th>
                            <td><input type="checkbox" id="protect" name="protect" value="1" checked></td>
                        @endif
                    </div>
                        <button type="button"onclick="history.back()">
                            変更する
                        </button>
                        <button type="submit_button" name="action" value="submit">
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
@endsection
