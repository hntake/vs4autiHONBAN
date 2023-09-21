@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- schedule.cssと連携 -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

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

                <li><a href="{{ url('hair/schedule') }}">
                        <h3 style="font-size: 1.50rem;">ヘアカット</h3>
                    </a></li>
                <li><a href="{{ url('account') }}">
                        <h3>支払い情報</h3>
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
                <li><a href="{{ url('my_page') }}">
                        <h3>マイページ</h3>
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
<!-- 新規スケジュール作成パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')


    <div class="dashboard-area">
     <!-- VS4のみ -->
    @if($user->type==0)
            @if($user->type==0)
            <div class="admin_button"style="margin-bottom:10px;"><a href="{{ route('lost.register') }}" style="background-color:none; color:#7791DE;">お守りバッジを申込む</a></div>
            @endif
        <h1>保存リスト</h1>
        <!--   並び変えは一時保留
       <div class="list">
            <form action="{{ route('sort') }}" method="GET">
                @csrf
                <select name="narabi">
                    <option value="asc">昇順</option>
                    <option value="desc">降順</option>
                </select>
                <div class="form-group">
                    <div class="button">
                        <input type="submit" value="並び替え">
                        </input>
                    </div>
                </div>
            </form>
        </div> -->
        <div class="box">
            <table class="result">
                <tbody id="tbl">
                    <!--スケジュール一覧 -->
                    <h2>写真スケジュール</h2>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td><img src="{{ asset('storage/' . $schedule->image0) }}" alt="image"></td>
                        <td><a href="{{ route('schedule',['id'=>$schedule->id]) }}">{{ $schedule->schedule_name }}</a></td>
                        <td>
                            <div class="relative" x-data="{ isOpen:false }">
                                <button class="text-black" @click="isOpen = !isOpen"> ︙</button>
                                <div class="open" x-show="isOpen">
                                    <a href="{{ route('delete',['id'=> $schedule->id]) }}">削除</a>
                                    <a href="{{ route('edit',['id'=> $schedule->id]) }}">修正</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box">
            <table class="result">
                <tbody id="tbl">
                    <!--スケジュール一覧 -->
                    <h2>歯科スケジュール</h2>
                    @foreach ($dentists as $dentist)
                    <tr>
                        <td><img src="{{asset('img/dentist/'.$dentist->imageOne->pic_name)}}" alt="image"></td>
                        <td><a href="{{ route('dentist_schedule',['id'=>$dentist->id]) }}">{{ $dentist->schedule_name }}</a></td>
                        <td>
                            <div class="relative" x-data="{ isOpen:false }">
                                <button class="text-black" @click="isOpen = !isOpen"> ︙</button>
                                <div class="open" x-show="isOpen">
                                    <a href="{{ route('dentist_delete',['id'=> $dentist->id]) }}">削除</a>
                                    <a href="{{ route('dentist_edit',['id'=> $dentist->id]) }}">修正</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box">
            <table class="result">
                <tbody id="tbl">
                    <!--スケジュール一覧 -->
                    <h2>イラストスケジュール</h2>
                    @foreach ($illusts as $illust)
                    <tr>
                        <td><img src="{{asset('img/sort/'.$illust->illustOne->pic_name)}}" alt="image"></td>
                        <td><a href="{{ route('schedule_sort',['id'=>$illust->id]) }}">{{ $illust->schedule_name }}</a></td>
                        <td>
                            <div class="relative" x-data="{ isOpen:false }">
                                <button class="text-black" @click="isOpen = !isOpen"> ︙</button>
                                <div class="open" x-show="isOpen">
                                    <a href="{{ route('sort_delete',['id'=> $illust->id]) }}">削除</a>
                                    <a href="{{ route('sort_edit',['id'=> $illust->id]) }}">修正</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box">
            <table class="result">
                <tbody id="tbl">
                    <!--スケジュール一覧 -->
                    <h2>医療スケジュール</h2>
                    @foreach ($medicals as $medical)
                    <tr>
                        <td><img src="{{asset('img/medical/'.$medical->MedOne->pic_name)}}" alt="image"></td>
                        <td><a href="{{ route('medical_schedule',['id'=>$medical->id]) }}">{{ $medical->schedule_name }}</a></td>
                        <td>
                            <div class="relative" x-data="{ isOpen:false }">
                                <button class="text-black" @click="isOpen = !isOpen"> ︙</button>
                                <div class="open" x-show="isOpen">
                                    <a href="{{ route('medical_delete',['id'=> $medical->id]) }}">削除</a>
                                    <a href="{{ route('medical_edit',['id'=> $medical->id]) }}">修正</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box">
            <table class="result">
                <tbody id="tbl">
                    <!--スケジュール一覧 -->
                    <h2>自立支援スケジュール</h2>
                    @foreach ($supports as $support)
                    <tr>
                        <td><img src="{{asset('storage/' . $support->image1)}}" alt="image" name="area1"></td>
                        <td><a href="{{ route('independence_schedule',['id'=>$support->id]) }}">{{ $support->schedule_name }}</a></td>
                        <td>
                            <div class="relative" x-data="{ isOpen:false }">
                                <button class="text-black" @click="isOpen = !isOpen"> ︙</button>
                                <div class="open" x-show="isOpen">
                                    <a href="{{ route('independence_delete',['id'=> $support->id]) }}">削除</a>
                                    <a href="{{ route('independence_edit',['id'=> $support->id]) }}">修正</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- お守りのみ -->
        @elseif($user->type == 1)
        @if($lost->mode==0)
                <div class="pro_button"><a href="{{ route('suspend') }}">サービスを一時停止する（個人情報対策）</a></div>
                <div class="pro_button"><a href="{{ route('stop') }}">紛失等の為にサービスを停止する</a></div>
                @else
                <div class="pro_button"><a href="{{ route('again') }}">サービスを再開する</a></div>
                @endif
        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
                            <div class="col-md-6">
                                <span class="">{{$lost->name}}</span>
                                <input type="hidden" name="name" value="{{$lost->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_pronunciation" class="col-md-4 col-form-label text-md-right">フリガナ</label>
                            <div class="col-md-6">
                                <span class="">{{$lost->name_pronunciation}}</span>
                                <input type="hidden" name="name_pronunciation" value="{{$lost->name_pronunciation}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">住所</label>
                            <div class="col-md-6">
                                <span class="">{{$lost->address}}</span>
                                <input type="hidden" name="address" value="{{$lost->address}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel1" class="col-md-4 col-form-label text-md-right">連絡先①</label>
                            <div class="col-md-6">
                                <span class="">{{$lost->tel1}}</span>
                                <input type="hidden" name="tel1" value="{{$lost->tel1}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel2" class="col-md-4 col-form-label text-md-right">連絡先②</label>
                            <div class="col-md-6">
                                <span class="">{{$lost->tel2}}</span>
                                <input type="hidden" name="tel2" value="{{$lost->tel2}}">
                            </div>
                        </div>
                        <div class="box" style="margin-bottom: 10px; background-color:#87CEFA ;padding: 0 20px;">
                            <table class="0">
                                <thead>
                                    <tr>
                                    <th style="width:20%">曜日</th>
                                    <th style="width:20%">朝6～12時</th>
                                    <th style="width:20%">昼12~19時</th>
                                    <th style="width:20%">夜19～6時</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                        <label >月曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->mon1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="mon1" value="{{$lost->mon1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->mon2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="mon2" value="{{$lost->mon2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->mon3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="mon3" value="{{$lost->mon3}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >火曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->tue1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="tue1" value="{{$lost->tue1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->tue2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="tue2" value="{{$lost->tue2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->tue3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="tue3" value="{{$lost->tue3}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >水曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->wed1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="wed1" value="{{$lost->wed1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->wed2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="wed2" value="{{$lost->wed2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->wed3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="wed3" value="{{$lost->wed3}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >木曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->thu1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="thu1" value="{{$lost->thu1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->thu2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="thu2" value="{{$lost->thu2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->thu3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="thu3" value="{{$lost->thu3}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >金曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->fri1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="fri1" value="{{$lost->fri1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->fri2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="fri2" value="{{$lost->fri2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->fri3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="fri3" value="{{$lost->fri3}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >土曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->sat1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="sat1" value="{{$lost->sat1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->sat2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="sat2" value="{{$lost->sat2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->sat3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="sat3" value="{{$lost->sat3}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >日曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->sun1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="sun1" value="{{$lost->sun1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->sun2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="sun2" value="{{$lost->sun2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->sun3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="sun3" value="{{$lost->sun3}}">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        <div>
                          @if(isset($picture))
                        <div class="qr_code">
                        <h5>貴方のQRコード</h5>
                        <a href="{{ asset('storage/' . $picture->image) }}"><img src="{{ asset('storage/' . $picture->image) }}" alt="image" ></a>
                        <div class="print">
                            <h6 >印刷したい方はQRコードをクリックし、画像画面で各デバイスに沿った印刷方法で印刷して下さい。<br>ヘルプカードに利用する場合はA4サイズを10～20%に設定してください</h6>
                        </div>
                    @endif
                    </div>
                        </div>
                        <div class="pro_button"><a href="{{ route('edit_user',['id'=> $user->id]) }}">登録情報編集画面へ</a>
                    </div>
                    <div class="pro_button"><a href="{{ route('vs4')}}">VS4を申込む</a></div>

                @else
                        <a href="{{ url('my_page') }}">
                        <h5>登録情報確認ページへ移動</h5>
                    </a>     

                        <h1>保存リスト</h1>
        <!--   並び変えは一時保留
       <div class="list">
            <form action="{{ route('sort') }}" method="GET">
                @csrf
                <select name="narabi">
                    <option value="asc">昇順</option>
                    <option value="desc">降順</option>
                </select>
                <div class="form-group">
                    <div class="button">
                        <input type="submit" value="並び替え">
                        </input>
                    </div>
                </div>
            </form>
        </div> -->
        <div class="box">
            <table class="result">
                <tbody id="tbl">
                    <!--スケジュール一覧 -->
                    <h2>写真スケジュール</h2>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td><img src="{{ asset('storage/' . $schedule->image0) }}" alt="image"></td>
                        <td><a href="{{ route('schedule',['id'=>$schedule->id]) }}">{{ $schedule->schedule_name }}</a></td>
                        <td>
                            <div class="relative" x-data="{ isOpen:false }">
                                <button class="text-black" @click="isOpen = !isOpen"> ︙</button>
                                <div class="open" x-show="isOpen">
                                    <a href="{{ route('delete',['id'=> $schedule->id]) }}">削除</a>
                                    <a href="{{ route('edit',['id'=> $schedule->id]) }}">修正</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box">
            <table class="result">
                <tbody id="tbl">
                    <!--スケジュール一覧 -->
                    <h2>歯科スケジュール</h2>
                    @foreach ($dentists as $dentist)
                    <tr>
                        <td><img src="{{asset('img/dentist/'.$dentist->imageOne->pic_name)}}" alt="image"></td>
                        <td><a href="{{ route('dentist_schedule',['id'=>$dentist->id]) }}">{{ $dentist->schedule_name }}</a></td>
                        <td>
                            <div class="relative" x-data="{ isOpen:false }">
                                <button class="text-black" @click="isOpen = !isOpen"> ︙</button>
                                <div class="open" x-show="isOpen">
                                    <a href="{{ route('dentist_delete',['id'=> $dentist->id]) }}">削除</a>
                                    <a href="{{ route('dentist_edit',['id'=> $dentist->id]) }}">修正</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box">
            <table class="result">
                <tbody id="tbl">
                    <!--スケジュール一覧 -->
                    <h2>イラストスケジュール</h2>
                    @foreach ($illusts as $illust)
                    <tr>
                        <td><img src="{{asset('img/sort/'.$illust->illustOne->pic_name)}}" alt="image"></td>
                        <td><a href="{{ route('schedule_sort',['id'=>$illust->id]) }}">{{ $illust->schedule_name }}</a></td>
                        <td>
                            <div class="relative" x-data="{ isOpen:false }">
                                <button class="text-black" @click="isOpen = !isOpen"> ︙</button>
                                <div class="open" x-show="isOpen">
                                    <a href="{{ route('sort_delete',['id'=> $illust->id]) }}">削除</a>
                                    <a href="{{ route('sort_edit',['id'=> $illust->id]) }}">修正</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box">
            <table class="result">
                <tbody id="tbl">
                    <!--スケジュール一覧 -->
                    <h2>医療スケジュール</h2>
                    @foreach ($medicals as $medical)
                    <tr>
                        <td><img src="{{asset('img/medical/'.$medical->MedOne->pic_name)}}" alt="image"></td>
                        <td><a href="{{ route('medical_schedule',['id'=>$medical->id]) }}">{{ $medical->schedule_name }}</a></td>
                        <td>
                            <div class="relative" x-data="{ isOpen:false }">
                                <button class="text-black" @click="isOpen = !isOpen"> ︙</button>
                                <div class="open" x-show="isOpen">
                                    <a href="{{ route('medical_delete',['id'=> $medical->id]) }}">削除</a>
                                    <a href="{{ route('medical_edit',['id'=> $medical->id]) }}">修正</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box">
            <table class="result">
                <tbody id="tbl">
                    <!--スケジュール一覧 -->
                    <h2>自立支援スケジュール</h2>
                    @foreach ($supports as $support)
                    <tr>
                        <td><img src="{{asset('storage/' . $support->image1)}}" alt="image" name="area1"></td>
                        <td><a href="{{ route('independence_schedule',['id'=>$support->id]) }}">{{ $support->schedule_name }}</a></td>
                        <td>
                            <div class="relative" x-data="{ isOpen:false }">
                                <button class="text-black" @click="isOpen = !isOpen"> ︙</button>
                                <div class="open" x-show="isOpen">
                                    <a href="{{ route('independence_delete',['id'=> $support->id]) }}">削除</a>
                                    <a href="{{ route('independence_edit',['id'=> $support->id]) }}">修正</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    </tbody>
</div>
@endsection
