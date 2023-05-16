@extends('layouts.app')
<title>お守りバッジ購入先一覧</title>
@section('content')
<link rel="stylesheet" href="{{ asset('css/list.css') }}"> <!-- products.cssと連携 -->

<div class="header-logo-menu">
    <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
            <ul>
                <li><a href="{{ url('/') }}">
                        <h3>ホーム画面に戻る</h3>
                    </a></li>
                <li><a href="{{ url('dashboard') }}">
                        <h3>保存リストへ</h3>
                    </a></li>
                <li><a href="{{ url('search') }}">
                        <h3>リスト検索へ</h3>
                    </a></li>
                <li><a href="{{ url('store') }}">
                        <h3>画像保存＆一覧</h3>
                    </a></li>
                <li><a href="{{ url('create') }}">
                        <h3>新規作成</h3>
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
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')

    <h1>お守りバッジ取り扱い先一覧</h1>
    <div class="store-list">
        @foreach($shops as $shop)
        @if($shop->area=='北海道')
        <h3>北海道エリア</h3>

        <table>
            <thead>
                <tr>
                    <th style="width:10%">県</th>
                    <th style="width:20%">施設・店舗名</th>
                    <th style="width:20%">電話番号</th>
                    <th style="width:20%">メールアドレス</th>
                </tr>
            </thead>
            @break
            @endif
            @endforeach
            <tbody>
                @foreach($shops as $shop)
                @if($shop->area=='北海道')
                @continue($shop->area !=='北海道')
                <tr>
                    <td>{{ $shop->place }}</td>
                    <td>{{ $shop->name }}</td>
                    @if(isset($shop->tel))
                    <td>{{ $shop->tel }}</td>
                    @endif
                    @if(isset($shop->email))
                    <td>{{ $shop->email }}</td>
                    @endif
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        @foreach($shops as $shop)
        @if($shop->area=='東北地方')
        <h3>東北エリア</h3>

        <table>
            <thead>
                <tr>
                    <th style="width:10%">県</th>
                    <th style="width:20%">施設・店舗名</th>
                    <th style="width:20%">電話番号</th>
                    <th style="width:20%">メールアドレス</th>
                </tr>
            </thead>
            @break
            @endif
            @endforeach
            <tbody>
                @foreach($shops as $shop)
                @if($shop->area=='東北地方')
                @continue($shop->area !=='東北地方')
                <tr>
                    <td>{{ $shop->place }}</td>
                    <td>{{ $shop->name }}</td>
                    @if(isset($shop->tel))
                    <td>{{ $shop->tel }}</td>
                    @endif
                    @if(isset($shop->email))
                    <td>{{ $shop->email }}</td>
                    @endif
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        @foreach($shops as $shop)
        @if($shop->area=='関東地方')
        <h3>関東エリア</h3>

        <table>
            <thead>
                <tr>
                    <th style="width:10%">県</th>
                    <th style="width:20%">施設・店舗名</th>
                    <th style="width:20%">電話番号</th>
                    <th style="width:20%">メールアドレス</th>
                </tr>
            </thead>
            @break
            @endif
            @endforeach
            <tbody>
                @foreach($shops as $shop)
                @if($shop->area=='関東地方')
                @continue($shop->area !=='関東地方')
                <tr>
                    <td>{{ $shop->place }}</td>
                    <td>{{ $shop->name }}</td>
                    @if(isset($shop->tel))
                    <td>{{ $shop->tel }}</td>
                    @endif
                    @if(isset($shop->email))
                    <td>{{ $shop->email }}</td>
                    @endif
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        @foreach($shops as $shop)
        @if($shop->area=='中部地方')
        <h3>中部エリア</h3>

        <table>
            <thead>
                <tr>
                    <th style="width:10%">県</th>
                    <th style="width:20%">施設・店舗名</th>
                    <th style="width:20%">電話番号</th>
                    <th style="width:20%">メールアドレス</th>
                </tr>
            </thead>
            @break
            @endif
            @endforeach
            <tbody>
                @foreach($shops as $shop)
                @if($shop->area=='中部地方')
                @continue($shop->area !=='中部地方')
                <tr>
                    <td>{{ $shop->place }}</td>
                    <td>{{ $shop->name }}</td>
                    @if(isset($shop->tel))
                    <td>{{ $shop->tel }}</td>
                    @endif
                    @if(isset($shop->email))
                    <td>{{ $shop->email }}</td>
                    @endif
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        @foreach($shops as $shop)
        @if($shop->area=='近畿地方')
        <h3>近畿エリア</h3>

        <table>
            <thead>
                <tr>
                    <th style="width:10%">県</th>
                    <th style="width:20%">施設・店舗名</th>
                    <th style="width:20%">電話番号</th>
                    <th style="width:20%">メールアドレス</th>
                </tr>
            </thead>
            @break
            @endif
            @endforeach
            <tbody>
                @foreach($shops as $shop)
                @if($shop->area=='近畿地方')
                @continue($shop->area !=='近畿地方')
                <tr>
                    <td>{{ $shop->place }}</td>
                    <td>{{ $shop->name }}</td>
                    @if(isset($shop->tel))
                    <td>{{ $shop->tel }}</td>
                    @endif
                    @if(isset($shop->email))
                    <td>{{ $shop->email }}</td>
                    @endif
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        @foreach($shops as $shop)
        @if($shop->area=='中国地方')
        <h3>中国エリア</h3>

        <table>
            <thead>
                <tr>
                    <th style="width:10%">県</th>
                    <th style="width:20%">施設・店舗名</th>
                    <th style="width:20%">電話番号</th>
                    <th style="width:20%">メールアドレス</th>
                </tr>
            </thead>
            @break
            @endif
            @endforeach
            <tbody>
                @foreach($shops as $shop)
                @if($shop->area=='中国地方')
                @continue($shop->area !=='中国地方')
                <tr>
                    <td>{{ $shop->place }}</td>
                    <td>{{ $shop->name }}</td>
                    @if(isset($shop->tel))
                    <td>{{ $shop->tel }}</td>
                    @endif
                    @if(isset($shop->email))
                    <td>{{ $shop->email }}</td>
                    @endif
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        @foreach($shops as $shop)
        @if($shop->area=='四国地方')
        <h3>四国エリア</h3>

        <table>
            <thead>
                <tr>
                    <th style="width:10%">県</th>
                    <th style="width:20%">施設・店舗名</th>
                    <th style="width:20%">電話番号</th>
                    <th style="width:20%">メールアドレス</th>
                </tr>
            </thead>
            @break
            @endif
            @endforeach
            <tbody>
                @foreach($shops as $shop)
                @if($shop->area=='四国地方')
                @continue($shop->area !=='四国地方')
                <tr>
                    <td>{{ $shop->place }}</td>
                    <td>{{ $shop->name }}</td>
                    @if(isset($shop->tel))
                    <td>{{ $shop->tel }}</td>
                    @endif
                    @if(isset($shop->email))
                    <td>{{ $shop->email }}</td>
                    @endif
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        @foreach($shops as $shop)
        @if($shop->area=='九州沖縄地方')
        <h3>九州沖縄エリア</h3>

        <table>
            <thead>
                <tr>
                    <th style="width:10%">県</th>
                    <th style="width:20%">施設・店舗名</th>
                    <th style="width:20%">電話番号</th>
                    <th style="width:20%">メールアドレス</th>
                </tr>
            </thead>
            @break
            @endif
            @endforeach
            <tbody>
                @foreach($shops as $shop)
                @if($shop->area=='九州沖縄地方')
                @continue($shop->area !=='九州沖縄地方')
                <tr>
                    <td>{{ $shop->place }}</td>
                    <td>{{ $shop->name }}</td>
                    <td>{{ $shop->tel }}</td>
                    <td>{{ $shop->email }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>


    </div>
</div>
@endsection
