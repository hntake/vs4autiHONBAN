<!DOCTYPE html>
<html lang="ja">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VS4') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- home.cssと連携 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> <!-- jQueryのライブラリを読み込み -->
    <script src="{{ asset('/js/home.js') }}"></script> <!-- home.jsと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>自立支援サンプル画面</title>
</head>

<div class="container">
    <div class="col-md-8">
        <div class="card">

            <div class="card-body">
                <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif ログイン機能停止-->
                <div class="card-header">
                    @csrf
                    <!-- CSRF保護 -->
                    <tr>
                        <td><button class="img_button" style="float:unset;"><a href="{{ url('independence/one') }}"><img src="{{ asset('img/sample1.png') }}" alt="image" style="width: 160px; height: auto;"></a></button>
                        </td>
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td><button class="img_button" style="float:unset;"><a href="{{ url('independence/two') }}"><img src="{{ asset('img/sample1.png') }}" alt="image" style="width: 160px; height: auto;"></a></button>
                        </td>
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td><button class="img_button" style="float:unset;"><a href="{{ url('independence/three')}}"><img src="{{ asset('img/sample1.png') }}" alt="image" style="width: 160px; height: auto;"></a></button>

                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td><button class="img_button" style="float:unset;"><a href="{{ url('independence/four') }}"><img src="{{ asset('img/sample1.png') }}" alt="image" style="width: 160px; height: auto;"></a></button>

                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td><button class="img_button" style="float:unset;"><a href="{{ url('independence/one') }}"><img src="{{ asset('img/sample1.png') }}" alt="image" style="width: 160px; height: auto;"></a></button>

                    </tr>

                </div>
                <!--要望出るまでコメントアウト
                        <div class="submit_button">
                            <a href="{{ route('search') }}">スケジュール検索</a>
                        </div> -->
            </div>
        </div>
    </div>
    <div class="footer">
        <p>スケジュール保存が必要なら
            会員登録しましょう！<br>
            無制限でなければ無料会員で保存できます。<br>
            申し込みはこちらから！<button class="submit_button" style="float:unset;"><a href="{{ route('register') }}">新規登録</a></button>
        </p>
    </div>
</div>


</html>
