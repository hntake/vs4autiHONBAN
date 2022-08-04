@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- schedule.cssと連携 -->
@section('content')
<!--ハンバーガーメニュー-->
<div class="header-logo-menu">
  <div id="nav-drawer">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input"><span></span></label>
      <label class="nav-unshown" id="nav-close" for="nav-input"></label>
      <div id="nav-content">
          <ul>
          <li><a href="{{ url('/') }}"><h3>トップページに戻る</h3></a></li>
              <li><a href="{{ url('list') }}"><h3>保存リストへ</h3></a></li>
              <li><a href="{{ url('account') }}"><h3>ユーザー情報</h3></a></li>
             <li><a href="{{ url('create') }}"><h3>新規作成</h3></a></li>
          </ul>
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
                        <input type="text" name="image3" id="image3" class="form-control"  size="15"placeholder="正しい画像番号を入力">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="image4" id="image4" class="form-control" size="15" placeholder="正しい画像番号を入力">
                    </div>
            </div>
            <div class="form-group">
                    <div class="button">
                        <button type="submit" >
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
                <tbody >
                <tr class="cell">
                    <td >1</td>
                    <td >エプロン<img src="{{ asset('img/dentist/d_apron.jpg') }}" alt="apron" ></td>
                    <td >2</td>
                    <td >麻酔<img src="{{ asset('img/dentist/d_anes.jpg') }}" alt="anes" ></td>
                    <td >3</td>
                    <td >噛み合わせ１<img src="{{ asset('img/dentist/d_bite.jpg') }}" alt="bite" ></td>
                    <td >4</td>
                    <td >噛み合わせ２<img src="{{ asset('img/dentist/d_bite2.jpg') }}" alt="bite2" ></td>
                    <td >5</td>
                    <td >セメント<img src="{{ asset('img/dentist/d_cement.jpg') }}" alt="cement" ></td>
                    <td >6</td>
                    <td >圧排<img src="{{ asset('img/dentist/d_compress.jpg') }}" alt="ccompress" ></td>
                    <td >7</td>
                    <td >綿詰め<img src="{{ asset('img/dentist/d_cotton.jpg') }}" alt="cotton" ></td>
                    <td >8</td>
                    <td >染色<img src="{{ asset('img/dentist/d_dy.jpg') }}" alt="dy" ></td>
                    <td >9</td>
                    <td >EE作業<img src="{{ asset('img/dentist/d_ee.jpg') }}" alt="ee" ></td>
                    <td >10</td>
                    <td >EMR作業<img src="{{ asset('img/dentist/d_emr.jpg') }}" alt="emr" ></td>
                    <td >11</td>
                    <td >エンジン<img src="{{ asset('img/dentist/d_engine.jpg') }}" alt="engine" ></td>
                    <td >12</td>
                    <td >ガッタ<img src="{{ asset('img/dentist/d_gutta.jpg') }}" alt="gutta" ></td>
                    <td >13</td>
                    <td >印象<img src="{{ asset('img/dentist/d_impress.jpg') }}" alt="impress" ></td>
                    <td >14</td>
                    <td >印象２<img src="{{ asset('img/dentist/d_impress2.jpg') }}" alt="impress2" ></td>
                    <td >15</td>
                    <td >寝る<img src="{{ asset('img/dentist/d_liedownjpg.jpg') }}" alt="liedown" ></td>
                    <td >16</td>
                    <td >光照射<img src="{{ asset('img/dentist/d_light.jpg') }}" alt="light" ></td>
                    <td >17</td>
                    <td >光照射２<img src="{{ asset('img/dentist/d_light2.jpg') }}" alt="light2" ></td>
                    <td >18</td>
                    <td >合着<img src="{{ asset('img/dentist/d_metal.jpg') }}" alt="metal" ></td>
                    <td >19</td>
                    <td >ミラー<img src="{{ asset('img/dentist/d_mirror.jpg') }}" alt="mirror" ></td>
                    <td >20</td>
                    <td >抜歯<img src="{{ asset('img/dentist/d_off.jpg') }}" alt="off" ></td>
                    <td >21</td>
                    <td >口を開ける<img src="{{ asset('img/dentist/d_openmouth.jpg') }}" alt="open" ></td>
                    <td >22</td>
                    <td >開口器<img src="{{ asset('img/dentist/d_opentool.jpg') }}" alt="opentool" ></td>
                    <td >23</td>
                    <td >プラガー<img src="{{ asset('img/dentist/d_plug.jpg') }}" alt="plug" ></td>
                    <td >24</td>
                    <td >PMTC作業<img src="{{ asset('img/dentist/d_pmtc.jpg') }}" alt="pmtc" ></td>
                    <td >25</td>
                    <td >研摩<img src="{{ asset('img/dentist/d_polish.jpg') }}" alt="polish" ></td>
                    <td >26</td>
                    <td >研摩２<img src="{{ asset('img/dentist/d_polish2.jpg') }}" alt="polish2" ></td>
                    <td >27</td>
                    <td >探針<img src="{{ asset('img/dentist/d_probe.jpg') }}" alt="probe" ></td>
                    <td >28</td>
                    <td >リーマー<img src="{{ asset('img/dentist/d_reamer.jpg') }}" alt="reamer" ></td>
                    <td >29</td>
                    <td >染色はみがき<img src="{{ asset('img/dentist/d_redbrush.jpg') }}" alt="d_redbrush" ></td>
                    <td >30</td>
                    <td >噛合紙<img src="{{ asset('img/dentist/d_redpaper.jpg') }}" alt="d_redpaper" ></td>
                    <td >31</td>
                    <td >噛合紙２<img src="{{ asset('img/dentist/d_redpaper2.jpg') }}" alt="d_redpaper2" ></td>
                    <td >32</td>
                    <td >レジン<img src="{{ asset('img/dentist/d_resin.jpg') }}" alt="d_resin" ></td>
                    <td >33</td>
                    <td >根管洗浄<img src="{{ asset('img/dentist/d_root_clean.jpg') }}" alt="d_root_clean" ></td>
                    <td >34</td>
                    <td >スプレッド―<img src="{{ asset('img/dentist/d_root_spread.jpg') }}" alt="d_root_spread" ></td>
                    <td >35</td>
                    <td >ラバーダム<img src="{{ asset('img/dentist/d_rubberdum.jpg') }}" alt="d_rubberdum" ></td>
                    <td >36</td>
                    <td >フロス<img src="{{ asset('img/dentist/floth.jpg') }}" alt="floth" ></td>
                    <td >37</td>
                    <td >スケーリング<img src="{{ asset('img/dentist/d_scaling.jpg') }}" alt="d_scaling" ></td>
                    <td >38</td>
                    <td >座る<img src="{{ asset('img/dentist/d_sit.jpg') }}" alt="d_sit" ></td>
                    <td >39</td>
                    <td >フッ素（綿）<img src="{{ asset('img/dentist/d_spread.jpg') }}" alt="d_spread" ></td>
                    <td >40</td>
                    <td >表面麻酔<img src="{{ asset('img/dentist/d_spread_anes.jpg') }}" alt="d_spread_anes" ></td>
                    <td >41</td>
                    <td >タービン<img src="{{ asset('img/dentist/d_tarbin.jpg') }}" alt="d_tarbin" ></td>
                    <td >42</td>
                    <td >TEK作業<img src="{{ asset('img/dentist/d_tek.jpg') }}" alt="d_tek" ></td>
                    <td >43</td>
                    <td >TEK作業2<img src="{{ asset('img/dentist/d_tek2.jpg') }}" alt="d_tek2" ></td>
                    <td >44</td>
                    <td >トッフル<img src="{{ asset('img/dentist/d_toffle.jpg') }}" alt="d_toffle" ></td>
                    <td >45</td>
                    <td >バキューム<img src="{{ asset('img/dentist/d_vacume.jpg') }}" alt="d_vacume" ></td>
                    <td >46</td>
                    <td >バキューム+水<img src="{{ asset('img/dentist/d_vacume_water.jpg') }}" alt="d_vacume_water" ></td>
                    <td >47</td>
                    <td >ワッテ<img src="{{ asset('img/dentist/d_watte.jpg') }}" alt="d_watte" ></td>
                    <td >48</td>
                    <td >Ｘ線<img src="{{ asset('img/dentist/d_xray1.jpg') }}" alt="d_xray1" ></td>
                    <td >49</td>
                    <td >Ｘ線２<img src="{{ asset('img/dentist/d_xray2.jpg') }}" alt="d_xray2" ></td>
                    <td >50</td>
                    <td >ヨード<img src="{{ asset('img/dentist/d_yodo.jpg') }}" alt="d_yodo" ></td>
                    <td >51</td>
                    <td >フッ素歯ブラシ<img src="{{ asset('img/dentist/flouride.jpg') }}" alt="flouride" ></td>
                    <td >52</td>
                    <td >うがい<img src="{{ asset('img/dentist/poo.jpg') }}" alt="poo" ></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
