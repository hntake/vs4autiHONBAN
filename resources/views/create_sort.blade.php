@extends('layouts.app')
<meta name="description" content="。自閉症、知的障害、発達障害を持つ人の中には聴覚入力よりも視覚的サポート(絵カード)を利用することで、より良く理解できる傾向がある人がいます。VS4は視覚支援ツール（絵カード）をスマホで作れるアプリです。絵カードアプリを利用して、視覚的サポートを体験しましょう。" >

<title>イラストスケジュール新規作成画面 "VS4視覚支援ツール”</title>
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
        <a href="https://youtube.com/embed/-ZzFDSP-vTU" class="header_nav_itm_link">利用VS4説明動画を見る</a>
    </div>
    <form action="{{ url('create_sort') }}" method="post">
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
        <h2>あそび</h2>
        <div class="image-list">
            <table>
                <tbody>
                    <tr class="cell">
                        <div class="img">
                            <ul>
                                <li>1</li>
                                <li>バランスボール</li>
                                <li><img src="{{ asset('img/sort/balance.jpg') }}" alt="apron"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>2</li>
                                <li>サッカーボール</li>
                                <li><img src="{{ asset('img/sort/ball.jpeg') }}" alt="d_anes"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>3</li>
                                <li>つみき</li>
                                <li><img src="{{ asset('img/sort/block.jpeg') }}" alt="d_bite2"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>4</li>
                                <li>おままごと</li>
                                <li><img src="{{ asset('img/sort/cooking.jpeg') }}" alt="d_cotton"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>5</li>
                                <li>クレヨン</li>
                                <li><img src="{{ asset('img/sort/crayon.jpg') }}" alt="d_dy"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>6</li>
                                <li>レゴ</li>
                                <li><img src="{{ asset('img/sort/lego.jpeg') }}" alt="d_impress"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>7</li>
                                <li>ミニカー</li>
                                <li><img src="{{ asset('img/sort/minicar.jpg') }}" alt="d_impress2"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>8</li>
                                <li>おりがみ</li>
                                <li><img src="{{ asset('img/sort/origami.jpg') }}" alt="d_liedownjpg"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>9</li>
                                <li>パズル</li>
                                <li><img src="{{ asset('img/sort/puzzle.webp') }}" alt="d_light2"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>10</li>
                                <li>砂遊び</li>
                                <li><img src="{{ asset('img/sort/sand.jpeg') }}" alt="d_metal"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>11</li>
                                <li>ブランコ</li>
                                <li><img src="{{ asset('img/sort/swing.jpeg') }}" alt="d_openmouth"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>12</li>
                                <li>ゲーム</li>
                                <li><img src="{{ asset('img/sort/game_friends_kids_sueoki.png') }}" alt="d_ee"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>13</li>
                                <li>滑り台</li>
                                <li><img src="{{ asset('img/sort/slide.jpeg') }}" alt="d_off"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>14</li>
                                <li>ドールハウス</li>
                                <li><img src="{{ asset('img/sort/toy_doll_house.png') }}" alt="d_polish"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>15</li>
                                <li>三輪車</li>
                                <li><img src="{{ asset('img/sort/trike.jpeg') }}" alt="d_polish2"></li>
                            </ul>
                        </div>
                    </tr>
                </tbody>
            </table>
        </div>
        <h2>おやくそく</h2>
        <div class="image-list">
            <table>
                <tbody>
                    <tr class="cell">
                        <div class="img">
                            <ul>
                                <li>16</li>
                                <li>歯磨き</li>
                                <li><img src="{{ asset('img/sort/ha_hamigaki_boy.png') }}" alt="d_emr"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>17</li>
                                <li>着替え１</li>
                                <li><img src="{{ asset('img/sort/kid_kigae_boy.png') }}" alt="d_engine"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>18</li>
                                <li>着替え２</li>
                                <li><img src="{{ asset('img/sort/kid_kigae_girl.png') }}" alt="d_gutta"></li>
                            </ul>
                        </div>

                        <div class="img">
                            <ul>
                                <li>19</li>
                                <li>静かに</li>
                                <li><img src="{{ asset('img/sort/pose_silent_boy.png') }}" alt="d_light"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>20</li>
                                <li>並ぶ</li>
                                <li><img src="{{ asset('img/sort/virus_hanareru_gyouretsu.png') }}" alt="d_probe"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>21</li>
                                <li>手洗い</li>
                                <li><img src="{{ asset('img/sort/wash.png') }}" alt="d_reamer"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>22</li>
                                <li>かたづけ</li>
                                <li><img src="{{ asset('img/sort/omocha_kataduke.png') }}" alt="d_reamer"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>23</li>
                                <li>食事１</li>
                                <li><img src="{{ asset('img/sort/syokuji_boy.png') }}" alt="d_opentool"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>24</li>
                                <li>食事２</li>
                                <li><img src="{{ asset('img/sort/syokuji_girl.png') }}" alt="d_plug"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>25</li>
                                <li>お風呂</li>
                                <li><img src="{{ asset('img/sort/family_ofuro.png') }}" alt="d_redpaper"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>26</li>
                                <li>ねる</li>
                                <li><img src="{{ asset('img/sort/sleep_bed_woman.png') }}" alt="d_mirror"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>27</li>
                                <li>トイレ</li>
                                <li><img src="{{ asset('img/sort/toilet_benki.png') }}" alt="d_mirror"></li>
                            </ul>
                        </div>
                    </tr>
                </tbody>
            </table>
        </div>
        <h2>ばしょ</h2>
        <div class="image-list">
            <table>
                <tbody>
                    <tr class="cell">
                    </tr>
                    <div class="img">
                        <ul>
                            <li>28</li>
                            <li>学校</li>
                            <li><img src="{{ asset('img/sort/bg_school.jpg') }}" alt="d_bite"></li>
                        </ul>
                    </div>
                    <div class="img">
                        <ul>
                            <li>29</li>
                            <li>幼稚園</li>
                            <li><img src="{{ asset('img/sort/youchien_tatemono.png') }}" alt="d_redpaper"></li>
                        </ul>
                    </div>

                    <div class="img">
                        <ul>
                            <li>30</li>
                            <li>バス</li>
                            <li><img src="{{ asset('img/sort/bus_red_white.png') }}" alt="d_cement"></li>
                        </ul>
                    </div>
                    <div class="img">
                        <ul>
                            <li>31</li>
                            <li>車</li>
                            <li><img src="{{ asset('img/sort/car_green.png') }}" alt="d_compress"></li>
                        </ul>
                    </div>


                    <div class="img">
                        <ul>
                            <li>32</li>
                            <li>散歩</li>
                            <li><img src="{{ asset('img/sort/yagai_kyoushitsu_casual_walk.png') }}" alt="d_redbrush"></li>
                        </ul>
                    </div>
                    <div class="img">
                        <ul>
                            <li>33</li>
                            <li>歯医者</li>
                            <li><img src="{{ asset('img/sort/haisya.png') }}" alt="d_redbrush"></li>
                        </ul>
                    </div>
                    <div class="img">
                        <ul>
                            <li>34</li>
                            <li>病院</li>
                            <li><img src="{{ asset('img/sort/tatemono_byouin2.png') }}" alt="d_redbrush"></li>
                        </ul>
                    </div>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection