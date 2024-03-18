@extends('layouts.app')
<meta name="description" content="。自閉症、知的障害、発達障害を持つ人の中には聴覚入力よりも視覚的サポート(絵カード)を利用することで、より良く理解できる傾向がある人がいます
医療時視覚支援ツール（絵カード）をスマホで作れるアプリです。医療時に役立つ絵カードを利用してスケジュールを作成し、視覚的サポートを体験しましょう。無料でダウンロードもなく利用できます。" >

<title>医療スケジュール新規作成画面 "VS4視覚支援ツール”</title>
@section('content')
<link rel="stylesheet" href="{{ asset('css/dentist.css') }}"> <!-- schedule.cssと連携 -->
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

<!-- 新規スケジュール作成パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')


    <h1>新規スケジュール作成</h1>
    <div class="register-button">
        <a href="https://youtube.com/embed/pnJWbZraq10" class="header_nav_itm_link">歯科スケジュール作成VS4説明動画を見る</a>
    </div>
    <form action="{{ url('medical/create') }}" method="post">
        {{ csrf_field() }}
        <div class='create-group'>
            <div class="create_schedule">
                <input type="text" name="schedule_name" id="schedule_name" class="form-control" size="15" placeholder="スケジュール名を入力">
            </div>
            <div class="col-sm-6">
                <input type="text" name="image0" id="image0" class="form-control" size="15" placeholder="正しい画像番号を入力">
            </div>
            <div class="col-sm-6">
                <input type="text" name="image1" id="image1" class="form-control" size="15" placeholder="正しい画像番号を入力">
            </div>
            <div class="col-sm-6">
                <input type="text" name="image2" id="image2" class="form-control" size="15" placeholder="正しい画像番号を入力">
            </div>
            <div class="col-sm-6">
                <input type="text" name="image3" id="image3" class="form-control" size="15" placeholder="正しい画像番号を入力">
            </div>
            <div class="col-sm-6">
                <input type="text" name="image4" id="image4" class="form-control" size="15" placeholder="正しい画像番号を入力">
            </div>
        </div>
        <div class="form-group">
            <div class="button">
                <button type="submit">
                    <i class="fa fa-plus"></i> 作成する
                </button>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </form>
    <h2>保存画面一覧</h2>
    <div class="table_main">
        <div class="image-list">
            <table>
                <tbody>
                    <tr class="cell">
                        <div class="img">
                            <ul>
                                <li>1</li>
                                <li>問診</li>
                                <li><img src="{{ asset('img/medical/counsel.jpeg') }}" alt="counsel"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>2</li>
                                <li>耳</li>
                                <li><img src="{{ asset('img/medical/ear.png') }}" alt="ear"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>3</li>
                                <li>病院</li>
                                <li><img src="{{ asset('img/medical/hospital.jpeg') }}" alt="hospital"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>4</li>
                                <li>口を開ける</li>
                                <li><img src="{{ asset('img/medical/mouth.jpeg') }}" alt="mouth"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>5</li>
                                <li>MRI</li>
                                <li><img src="{{ asset('img/medical/mri.jpeg') }}" alt="mri"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>6</li>
                                <li>鼻</li>
                                <li><img src="{{ asset('img/medical/nose.png') }}" alt="nose"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>7</li>
                                <li>血圧</li>
                                <li><img src="{{ asset('img/medical/pressure.jpeg') }}" alt="pressure"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>8</li>
                                <li>計測</li>
                                <li><img src="{{ asset('img/medical/scale.jpeg') }}" alt="scale"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>9</li>
                                <li>注射</li>
                                <li><img src="{{ asset('img/medical/shot.jpeg') }}" alt="shot"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>10</li>
                                <li>静かにする</li>
                                <li><img src="{{ asset('img/sort/pose_silent_boy.png') }}" alt="silent"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>11</li>
                                <li>トイレ</li>
                                <li><img src="{{ asset('img/sort/toilet_benki.png') }}" alt="toilet"></li>
                            </ul>
                        </div>


                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection