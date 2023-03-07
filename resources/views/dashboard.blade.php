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
    </div>
    </tbody>
</div>
@endsection
