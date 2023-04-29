@extends('layouts.app')
<title>ヘアカットスケジュール画面 "VS4視覚支援ツール”</title>
@section('content')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- home.cssと連携 -->
    <link rel="stylesheet" href="{{ asset('css/hair.css') }}"> <!-- home.cssと連携 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> <!-- jQueryのライブラリを読み込み -->
    <script src="{{ asset('/js/home.js') }}"></script> <!-- home.jsと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ヘアカットスケジュール画面 VS4</title>
</head>

<body>
    <!--ハンバーガーメニュー-->
    <div class="header-logo-menu">
        <div id="nav-drawer">
            <input id="nav-input" type="checkbox" class="nav-unshown">
            <label id="nav-open" for="nav-input"><span></span></label>
            <label class="nav-unshown" id="nav-close" for="nav-input"></label>
            <div id="nav-content">
                <ul>
                    <li><a href="{{ url('/') }}">
                            <h3>トップページに戻る</h3>
                        </a></li>
                    <li><a href="{{ url('dashboard') }}">
                            <h3>保存リスト</h3>
                        </a></li>

                    <li><a href="{{ url('hair/schedule') }}">
                            <h3 style="font-size: 1.50rem;">ヘアカット</h3>
                        </a></li>
                    <li><a href="{{ url('create') }}">
                            <h3>新規作成</h3>
                        </a></li>
                    <li><a href="{{ url('dentist/create') }}">
                            <h3>新規作成（歯科）</h3>
                        </a></li>
                    <li><a href="{{ url('medical/create') }}">
                            <h3>新規作成（医療）</h3>
                        </a></li>
                    <li><a href="{{ url('create_sort') }}">
                            <h3>新規作成（イラスト）</h3>
                        </a></li>
                    <li><a href="{{ url('independence/create') }}">
                            <h3>新規作成（自立支援）</h3>
                        </a></li>
                    <li><a href="{{ url('account') }}">
                            <h3>支払い情報</h3>
                        </a></li>
                </ul>
                <div class="logout_buttom">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <!-- CSRF保護 -->
                        <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
                    </form>
                </div>
            </div>
            <script>
                $(function() {
                    $('#nav-content li a').on('click', function(event) {
                        $('#nav-input').prop('checked', false);
                    });
                });
            </script>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="display:flex; flex-direction: column;">
                        <tr>
                            <td>ヘアカットスケジュール</td><br>
                            <div class="foo">
                                <ul style="display:flex; flex-direction: row;">
                                    <li>
                                        @if($user_img==1 || $user_img==null)
                                        <td><img src="{{asset('img/shampoo.jpeg')}}" alt="image" onclick="this.src='/img/check.png'" style="margin-top:20px;width:100%"></td>
                                        @elseif($user_img==2)
                                        <td><img src="{{asset('img/shampoo.jpeg')}}" alt="image" onclick="this.src='/img/hana.png'"></td>
                                        @else
                                        <td><img src="{{asset('img/shampoo.jpeg')}}" alt="image" onclick="this.src='/img/smile.png'"></td>
                                        @endif
                                    </li>
                                    <li>
                                        <button id="btn" class="button-4">外す</button>
                                    </li>
                                </ul>
                                <td>
                                    <p>
                                    <div class="arrow">&#9660;</div>
                                    </p>
                                </td>
                            </div>
                            @if($user==null || $user=="boy")
                            @if($user_img==1 || $user_img==null)
                            <td><img src="{{asset('img/b_cape.webp')}}" alt="image" onclick="this.src='/img/check.png'"></td>
                            @elseif($user_img==2)
                            <td><img src="{{asset('img/b_cape.webp')}}" alt="image" onclick="this.src='/img/hana.png'"></td>
                            @else
                            <td><img src="{{asset('img/b_cape.webp')}}" alt="image" onclick="this.src='/img/smile.png'"></td>
                            @endif
                            @else
                            @if($user_img==1 || $user_img==null)
                            <td><img src="{{asset('img/g_cape.webp')}}" alt="image" onclick="this.src='/img/check.png'"></td>
                            @elseif($user_img==2)
                            <td><img src="{{asset('img/g_cape.webp')}}" alt="image" onclick="this.src='/img/hana.png'"></td>
                            @else
                            <td><img src="{{asset('img/g_cape.webp')}}" alt="image" onclick="this.src='/img/smile.png'"></td>
                            @endif
                            @endif
                            <td>
                                <p>
                                <div class="arrow">&#9660;</div>
                                </p>
                            </td>
                            <ul style="margin:0 30px 0 0;">
                                <li>
                                    @if($user_img==1 || $user_img==null)
                                    <td><img src="{{asset('img/seizer.webp')}}" alt="image" onclick="this.src='/img/check.png'"></td>
                                    @elseif($user_img==2)
                                    <td><img src="{{asset('img/seizer.webp')}}" alt="image" onclick="this.src='/img/hana.png'"></td>
                                    @else
                                    <td><img src="{{asset('img/seizer.webp')}}" alt="image" onclick="this.src='/img/smile.png'"></td>
                                    @endif
                                    <td>
                                </li>
                                <li>
                                    <a href="{{route('cut')}}" class="btn_blue">カット詳細ページへ</a>
                                </li>
                            </ul>

                            <p>
                            <div class="arrow">&#9660;</div>
                            </p>
                            </td>
                            <div class="foo2">
                                <ul style="display:flex; flex-direction: row;">
                                    <li>
                                        @if($user_img==1 || $user_img==null)
                                        <td><img src="{{asset('img/shampoo.jpeg')}}" alt="image" onclick="this.src='/img/check.png'"></td>
                                        @elseif($user_img==2)
                                        <td><img src="{{asset('img/shampoo.jpeg')}}" alt="image" onclick="this.src='/img/hana.png'"></td>
                                        @else
                                        <td><img src="{{asset('img/shampoo.jpeg')}}" alt="image" onclick="this.src='/img/smile.png'"></td>
                                        @endif
                                    </li>
                                    <li>
                                        <button id="btn2" class="button-4">外す</button>
                                    </li>
                                </ul>
                                <td>
                                    <p>
                                    <div class="arrow">&#9660;</div>
                                    </p>
                                </td>
                            </div>
                            <div class="foo3">
                                <ul style="display:flex; flex-direction: row;">
                                    <li>
                                        @if($user_img==1 || $user_img==null)
                                        <td><img src="{{asset('img/dry.jpeg')}}" alt="image" onclick="this.src='/img/check.png'"></td>
                                        @elseif($user_img==2)
                                        <td><img src="{{asset('img/dry.jpeg')}}" alt="image" onclick="this.src='/img/hana.png'"></td>
                                        @else
                                        <td><img src="{{asset('img/dry.jpeg')}}" alt="image" onclick="this.src='/img/smile.png'"></td>
                                        @endif
                                    </li>
                                    <li>
                                        <button id="btn3" class="button-4">外す</button>
                                    </li>
                                </ul>
                            </div>
                        </tr>
                    </div>

                    <!--  <div class="route">
                    <div class="submit_button">
                        <a href="{{ url('hair/create') }}">新規作成</a>
                    </div>
                    <div class="submit_button">
                                                <button><a href="{{ url('dashboard') }}">リストに戻る</a></button>

                    </div>
                </div> -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(function() {
            $('#btn').click(function() {
                //fooクラスの要素を削除
                $('.foo').remove();
            });
        });
    </script>
    <script>
        $(function() {
            $('#btn2').click(function() {
                //fooクラスの要素を削除
                $('.foo2').remove();
            });
        });
    </script>
    <script>
        $(function() {
            $('#btn3').click(function() {
                //fooクラスの要素を削除
                $('.foo3').remove();
            });
        });
    </script>

</body>

</html>
@endsection