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
    <title>歯科スケジュール編集画面 VS4</title>
</head>

<div class="container">
<div class="edit">
    <form method="POST" action="{{route('dentist_update',['id'=> $schedule->id])}}" enctype="multipart/form-data">
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
                    <td><img src="{{asset('img/dentist/'.$schedule->imageOne->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image0" value="{{ $schedule->image0}}" class="form-control"></td>
                </tr>
                <tr>
                    <th >二番目画像</th>
                    <td><img src="{{asset('img/dentist/'.$schedule->imageTwo->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image1" value="{{ $schedule->image1}}" class="form-control"></td>
                </tr>
                @if(isset($schedule->image2))
                <tr>
                    <th >三番目画像</th>
                    <td><img src="{{asset('img/dentist/'.$schedule->imageThree->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image2" value="{{ $schedule->image2}}" class="form-control"></td>
                </tr>
                @endif
                @if(isset($schedule->image3))
                <tr>
                    <th >四番目画像</th>
                    <td><img src="{{asset('img/dentist/'.$schedule->imageFour->pic_name)}}" alt="image" ></td>
                    <td><input type="text" name="image3" value="{{ $schedule->image3}}" class="form-control"></td>
                </tr>
                @endif
                @if(isset($schedule->image4))
                <tr>
                    <th >五番目画像</th>
                    <td><img src="{{asset('img/dentist/'.$schedule->imageFive->pic_name)}}" alt="image" ></td>
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
    <div class="table_main"  style="background-color:lightsteelblue;">
    <h2>保存画面一覧</h2>
        <div class="image-list">
            <table>
                <tbody>
                    <tr class="cell">
                        <div class="img">
                            <ul>
                                <li>1</li>
                                <li>エプロン</li>
                                <li><img src="{{ asset('img/dentist/d_apron2.jpg') }}" alt="apron"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>2</li>
                                <li>麻酔</li>
                                <li><img src="{{ asset('img/dentist/d_anes.jpg') }}" alt="d_anes"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>3</li>
                                <li>噛み合わせA</li>
                                <li><img src="{{ asset('img/dentist/d_bite.jpg') }}" alt="d_bite"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>4</li>
                                <li>噛み合わせB</li>
                                <li><img src="{{ asset('img/dentist/d_bite2.jpg') }}" alt="d_bite2"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>5</li>
                                <li>セメント</li>
                                <li><img src="{{ asset('img/dentist/d_cement.jpg') }}" alt="d_cement"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>6</li>
                                <li>圧排</li>
                                <li><img src="{{ asset('img/dentist/d_compress.jpg') }}" alt="d_compress"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>7</li>
                                <li>綿詰め</li>
                                <li><img src="{{ asset('img/dentist/d_cotton.jpg') }}" alt="d_cotton"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>8</li>
                                <li>染色</li>
                                <li><img src="{{ asset('img/dentist/d_dy.jpg') }}" alt="d_dy"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>9</li>
                                <li>EE作業</li>
                                <li><img src="{{ asset('img/dentist/d_ee.jpg') }}" alt="d_ee"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>10</li>
                                <li>EMR作業</li>
                                <li><img src="{{ asset('img/dentist/d_emr.jpg') }}" alt="d_emr"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>11</li>
                                <li>エンジン</li>
                                <li><img src="{{ asset('img/dentist/d_engine.jpg') }}" alt="d_engine"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>12</li>
                                <li>ガッタ</li>
                                <li><img src="{{ asset('img/dentist/d_gutta.jpg') }}" alt="d_gutta"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>13</li>
                                <li>印象</li>
                                <li><img src="{{ asset('img/dentist/d_impress.jpg') }}" alt="d_impress"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>14</li>
                                <li>印象２</li>
                                <li><img src="{{ asset('img/dentist/d_impress2.jpg') }}" alt="d_impress2"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>15</li>
                                <li>横になる</li>
                                <li><img src="{{ asset('img/dentist/d_liedownjpg.jpg') }}" alt="d_liedownjpg"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>16</li>
                                <li>光照射</li>
                                <li><img src="{{ asset('img/dentist/d_light.jpg') }}" alt="d_light"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>17</li>
                                <li>光照射B</li>
                                <li><img src="{{ asset('img/dentist/d_light2.jpg') }}" alt="d_light2"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>18</li>
                                <li>合着</li>
                                <li><img src="{{ asset('img/dentist/d_metal.jpg') }}" alt="d_metal"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>19</li>
                                <li>ミラー</li>
                                <li><img src="{{ asset('img/dentist/d_mirror.jpg') }}" alt="d_mirror"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>20</li>
                                <li>抜歯</li>
                                <li><img src="{{ asset('img/dentist/d_off.jpg') }}" alt="d_off"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>21</li>
                                <li>口を開ける</li>
                                <li><img src="{{ asset('img/dentist/d_openmouth.jpg') }}" alt="d_openmouth"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>22</li>
                                <li>開口器</li>
                                <li><img src="{{ asset('img/dentist/d_opentool.jpg') }}" alt="d_opentool"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>23</li>
                                <li>プラガー</li>
                                <li><img src="{{ asset('img/dentist/d_plug.jpg') }}" alt="d_plug"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>24</li>
                                <li>PMTC作業</li>
                                <li><img src="{{ asset('img/dentist/d_pmtc.jpg') }}" alt="d_pmtc"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>25</li>
                                <li>研摩</li>
                                <li><img src="{{ asset('img/dentist/d_polish.jpg') }}" alt="d_polish"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>26</li>
                                <li>研摩B</li>
                                <li><img src="{{ asset('img/dentist/d_polish2.jpg') }}" alt="d_polish2"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>27</li>
                                <li>探針</li>
                                <li><img src="{{ asset('img/dentist/d_probe.jpg') }}" alt="d_probe"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>28</li>
                                <li>リーマー</li>
                                <li><img src="{{ asset('img/dentist/d_reamer.jpg') }}" alt="d_reamer"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>29</li>
                                <li>染色はみがき</li>
                                <li><img src="{{ asset('img/dentist/d_redbrush.jpg') }}" alt="d_redbrush"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>30</li>
                                <li>噛合紙</li>
                                <li><img src="{{ asset('img/dentist/d_redpaper.jpg') }}" alt="d_redpaper"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>31</li>
                                <li>噛合紙B</li>
                                <li><img src="{{ asset('img/dentist/d_redpaper2.jpg') }}" alt="d_redpaper2"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>32</li>
                                <li>レジン</li>
                                <li><img src="{{ asset('img/dentist/d_resin.jpg') }}" alt="d_resin"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>33</li>
                                <li>根管洗浄</li>
                                <li><img src="{{ asset('img/dentist/d_root_clean.jpg') }}" alt="d_root_clean"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>34</li>
                                <li>スプレッド―</li>
                                <li><img src="{{ asset('img/dentist/d_root_spread.jpg') }}" alt="d_root_spread"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>35</li>
                                <li>ラバーダム</li>
                                <li><img src="{{ asset('img/dentist/d_rubberdum.jpg') }}" alt="d_rubberdum"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>36</li>
                                <li>フロス</li>
                                <li><img src="{{ asset('img/dentist/floth.jpg') }}" alt="floth"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>37</li>
                                <li>スケーリング</li>
                                <li><img src="{{ asset('img/dentist/d_scaling.jpg') }}" alt="d_scaling"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>38</li>
                                <li>座る</li>
                                <li><img src="{{ asset('img/dentist/d_sit.jpg') }}" alt="d_sit"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>39</li>
                                <li>フッ素（綿）</li>
                                <li><img src="{{ asset('img/dentist/d_spread.jpg') }}" alt="d_spread"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>40</li>
                                <li>表面麻酔</li>
                                <li><img src="{{ asset('img/dentist/d_spread_anes.jpg') }}" alt="d_spread_anes"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>41</li>
                                <li>タービン</li>
                                <li><img src="{{ asset('img/dentist/d_tarbin.jpg') }}" alt="d_tarbin"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>42</li>
                                <li>TEK作業</li>
                                <li><img src="{{ asset('img/dentist/d_tek.jpg') }}" alt="d_tek"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>43</li>
                                <li>TEK作業B</li>
                                <li><img src="{{ asset('img/dentist/d_tek2.jpg') }}" alt="d_tek2"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>44</li>
                                <li>トッフル</li>
                                <li><img src="{{ asset('img/dentist/d_toffle.jpg') }}" alt="d_toffle"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>45</li>
                                <li>バキューム</li>
                                <li><img src="{{ asset('img/dentist/d_vacume.jpg') }}" alt="d_vacume"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>46</li>
                                <li>バキューム+水</li>
                                <li><img src="{{ asset('img/dentist/d_vacume_water.jpg') }}" alt="d_vacume_water"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>47</li>
                                <li>ワッテ</li>
                                <li><img src="{{ asset('img/dentist/d_watte.jpg') }}" alt="d_watte"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>48</li>
                                <li>Ｘ線</li>
                                <li><img src="{{ asset('img/dentist/d_xray1.jpg') }}" alt="d_xray1"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>49</li>
                                <li>Ｘ線B</li>
                                <li><img src="{{ asset('img/dentist/d_xray2.jpg') }}" alt="d_xray2"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>50</li>
                                <li>ヨード</li>
                                <li><img src="{{ asset('img/dentist/d_yodo.jpg') }}" alt="d_yodo"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>51</li>
                                <li>フッ素歯ブラシ</li>
                                <li><img src="{{ asset('img/dentist/flouride.jpg') }}" alt="flouride"></li>
                            </ul>
                        </div>
                        <div class="img">
                            <ul>
                                <li>52</li>
                                <li>うがい</li>
                                <li><img src="{{ asset('img/dentist/poo.jpg') }}" alt="poo"></li>
                            </ul>
                        </div>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
