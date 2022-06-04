<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">



        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">





    </head>
    <body class="antialiased">
        <div class="status">
            @if (Route::has('login'))
                <div class="login_button">
                    @auth
                        <h3>
                            保存リストを見る
                        </h3>
                        <button class="button"><a href="{{ url('/home') }}" >Home</a></button>
                    @else
                        <h3>
                            ログインする
                        </h3>
                        <button class="button"><a href="{{ route('login') }}" >ログイン</a></button>
                </div>

                <div class="register_button">
                    @if (Route::has('register'))
                        <h3>
                            マンスリープランで始める
                        </h3>
                        <button class="button"><a href="{{ route('register') }}" >新規登録</a></button>
                    @endif
                    @endauth
                </div>
            @endif

            <div class="contact">
                <h3>
                    お問い合わせ・ご質問はこちら迄
                </h3>
                <button class="button"><a href="{{ route('contact.index') }}" >Contact us</a></button>

            </div>
        </div>
        <div class="content">
            <div class="explain">
            <h1>
                自閉症支援ツール<br>
                VS4Autiとは？
            </h1>
            <h2>
            自閉症スペクトラムの人々は、聴覚入力ではなく視覚的サポートを利用よりよく理解できる傾向があります。<br>
            視覚的なサポート（以下、ビジュアルサポート）は、自閉症の人が使用できるコミュニケーションツールです。<br>
            </h2>
            <h3 style="background-color:darkturquoise">
            ビジュアルサポートを使用すると、次のことができます。
            <ul>
                <li>
                   1. 時間の視覚的なブロックを使用して、毎日/毎週のスケジュールを作成します
                </li>
                <li>
                   2. 就寝時のルーチンや着替えなどのタスクの連続したステップを表示する
                </li>
                <li>
                    3.時間の単位を示す
                </li>
                <li>
                    4.「やること」リストを作成する
                </li>
                <li>
                    5.非言語的または非言語的である人々のためのコミュニケーションを支援する
                </li>
                <li>
                   6.選択肢を提供する
                </li>
            </ul>
            </h3>
            </div>
            <div class="vs4auti">
                <h3>
                    <span style="color:mediumblue">VS4Auti</span>はスケジュール作成に特化したアプリケーションです<br>
                </h3>
                <h3>
                    <p>使い方は簡単！<br>
                    ご自分のスマホやPCに保存された画像をアップロードするだけで、<br>
                    自分だけのスケジュールが作成できます！<br>
                    <p>
                </h3>
                <div class="sample">
                    <p>サンプル画像(クリックすると拡大した画像が見れます)</p>
                    <a href="img/sample3.png" target="_blank">
                        <img src="img/sample3.png" alt="sample" style="width:20%;height: 500px;">
                    </a>
                    <a href="img/sample2.png" target="_blank">
                        <img src="img/sample2.png" alt="sample2" style="width:20%;height:500px;">
                    </a>
                </div>
                <p>※画像は暗号化して保存されるため、ログインできるユーザー以外は見ることが出来ないので安心してください。</p>
            </div>
        </div>
            <div class="rule">

                <h3>
                   登録せずに試すことも出来ます<br>
                   ここをクリックしてスケジュールを作ってみよう！
                   <button class="button"><a href="{{ url('create') }}" >スケジュール作成</a></button>
                </h3>
            </div>

    </body>
</html>
