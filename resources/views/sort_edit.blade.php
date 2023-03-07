@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- home.cssと連携 -->
    <link rel="stylesheet" href="{{ asset('css/dentist.css') }}"> <!-- home.cssと連携 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> <!-- jQueryのライブラリを読み込み -->
    <script src="{{ asset('/js/home.js') }}"></script> <!-- home.jsと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>イラストスケジュール編集画面 VS4</title>
</head>

<div class="container">
<div class="edit">
    <form method="POST" action="{{route('sort_update',['id'=> $schedule->id])}}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <table class="table-hover">
            <thead>
                <tr>
                    <th >スケジュール名</th>
                    <td><input type="text" name="schedule_name" value="{{ $schedule->schedule_name}}" class="form-control"></td>
                </tr>
                <tr>
                    <th >一番目画像</th>
                    <td><img src="{{asset('img/sort/'.$schedule->illustOne->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image0" value="{{ $schedule->image0}}" class="form-control"></td>
                </tr>
                <tr>
                    <th >二番目画像</th>
                    <td><img src="{{asset('img/sort/'.$schedule->illustTwo->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image1" value="{{ $schedule->image1}}" class="form-control"></td>
                </tr>
                @if(isset($schedule->image2))
                <tr>
                    <th >三番目画像</th>
                    <td><img src="{{asset('img/sort/'.$schedule->illustThree->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image2" value="{{ $schedule->image2}}" class="form-control"></td>
                </tr>
                @endif
                @if(isset($schedule->image3))
                <tr>
                    <th >四番目画像</th>
                    <td><img src="{{asset('img/sort/'.$schedule->illustFour->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image3" value="{{ $schedule->image3}}" class="form-control"></td>
                </tr>
                @endif
                @if(isset($schedule->image4))
                <tr>
                    <th >五番目画像</th>
                    <td><img src="{{asset('img/sort/'.$schedule->illustFive->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image4" value="{{ $schedule->image4}}" class="form-control"></td>
                </tr>
                @endif
            </thead>
        </table>

                <div class="button"><input type="submit" value="更新">
                    <h6>更新ボタンを押さないと変更されません</h6>
                   <!--  <h4>!!空欄のままだとエラーになります。クラス番号を削除するときは<span style="color:red;">000</span>を入力してください!!</h4> -->
                </div>
    </form>
</div>
<div class="table_main" style="background-color:lightsteelblue;">
        <h4>保存画面一覧</h4>
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
