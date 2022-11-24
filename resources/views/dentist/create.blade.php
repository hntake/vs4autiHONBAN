@extends('layouts.app')
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
                <li><a href="{{ url('list') }}">
                        <h3>保存リスト</h3>
                    </a></li>
                <li><a href="{{ url('dentist/list') }}">
                        <h3>保存リスト（歯科）</h3>
                    </a></li>
                <li><a href="{{ url('list_sort') }}">
                        <h3 style="font-size: 1.50rem;">保存リスト（イラスト）</h3>
                    </a></li>
                <li><a href="{{ url('create') }}">
                        <h3>新規作成</h3>
                    </a></li>
                <li><a href="{{ url('dentist/create') }}">
                        <h3>新規作成（歯科）</h3>
                    </a></li>
                <li><a href="{{ url('create_sort') }}">
                        <h3>新規作成（イラスト）</h3>
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
        <a href="https://youtube.com/embed/pnJWbZraq10" class="header_nav_itm_link">歯科スケジュール作成説明動画を見る</a>
    </div>
    <form action="{{ url('dentist/create') }}" method="post">
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
