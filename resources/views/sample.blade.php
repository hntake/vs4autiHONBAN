<!DOCTYPE html>
<html lang="ja">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VS4視覚支援ツール</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- home.cssと連携 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> <!-- jQueryのライブラリを読み込み -->
    <script src="{{ asset('/js/home.js') }}"></script> <!-- home.jsと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サンプル画面</title>
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
                        <!-- <td>{{ $schedule->id }}</td><br>
                                <td>{{ $schedule->schedule_name }}</td><br> -->
                        <td><a href="{{ asset('storage/' . $schedule->image0) }}" target="_blank"></a>
                            <img src="{{ asset('storage/' . $schedule->image0) }}" alt="image" style="width: 160px; height: auto;">
                        </td>
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td><a href="{{ asset('storage/' . $schedule->image1) }}" target="_blank"></a>
                            <img src="{{ asset('storage/' . $schedule->image1) }}" alt="image" style="width: 160px; height: auto;">
                        </td>
                        @if(isset($schedule->image2))
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td><a href="{{ asset('storage/' . $schedule->image2) }}" target="_blank"></a>
                            <img src="{{ asset('storage/' . $schedule->image2) }}" alt="image" style="width: 160px; height: auto;">
                        </td>
                        @endif
                        @if(isset($schedule->image3))
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td><a href="{{ asset('storage/' . $schedule->image3) }}" target="_blank"></a>
                            <img src="{{ asset('storage/' . $schedule->image3) }}" alt="image" style="width: 160px; height: auto;">
                        </td>
                        @endif
                        @if(isset($schedule->image4))
                        <td>
                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                        </td>
                        <td><a href="{{ asset('storage/' . $schedule->image4) }}" target="_blank"></a>
                            <img src="{{ asset('storage/' . $schedule->image4) }}" alt="image" style="width: 160px; height: auto;">
                        </td>
                        @endif
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
            マンスリープラン！<br>
            <span style="font:bold;">(月額100円)</span>で可能になります。<br>
            ※保存したスケジュールは登録したユーザーのみ閲覧・利用できます（個人情報保護）<br>
            申し込みはこちらから！<button class="submit_button" style="float:unset;"><a href="{{ route('register') }}">新規登録</a></button>
        </p>
    </div>
</div>

</html>