@extends('layouts.app')
<title>選択作品詳細ページ</title>

@section('content')

<link rel="stylesheet" href="{{ asset('css/design.css') }}"> <!-- home.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/artist.css') }}"> <!-- home.cssと連携 -->


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @auth
                <form method="GET" action="{{ route('design_stripe',['id'=> $design->id]) }}">
                @csrf
                    <h2>作品詳細</h2>
                        <div class="card-body" style="text-align:start;">
                                <div class="">
                                    <img src="{{ asset('storage/' . $design->image) }}" alt="image" >
                                </div>
                        </div>
                    </div>
                    <table>
                            <thead>
                                <th >作品名</th>
                                <th >金額</th>
                                <th>カテゴリ</th>
                            </thead>
                                    <td>{{ $design->name}}</td>
                                    <td>{{ $design->price}}</td>
                                    <td></td>
                        </table>
                    <div class="">
                        <p>こちらの作品をダウンロードしますか？</p>
                        <button type="button"onclick="history.back()">
                                キャンセルする
                            </button>
                            <button type="submit">
                                <i class="fa fa-plus"></i> ダウンロードする
                            </button>
                    </div>
                </form>
                <form method="POST" action="{{ route('design_cart',['id'=> $design->id]) }}">
                @csrf

                <button type="submit">
                                <i class="fa fa-plus"></i> カートに入れる
                            </button>
                </form>
                @else
                <form method="GET" action="{{ route('design_once',['id'=> $design->id]) }}">
                    @csrf
                    <h2>作品詳細</h2>
                        <div class="card-body" style="text-align:start;">
                                <div class="">
                                    <img src="{{ asset('storage/' . $design->image) }}" alt="image" >
                                </div>
                        </div>
                    </div>
                    <table>
                            <thead>
                                <th >作品名</th>
                                <th >金額</th>
                                <th>カテゴリ</th>
                            </thead>
                            <td>{{ $design->name}}</td>
                                    <td>{{ $design->price}}</td>
                                    <td></td>
                        </table>
                    <div class="">
                        <p>登録せずにダウンロードしますか？</p>
                        <button type="button"onclick="history.back()">
                                キャンセルする
                            </button>
                            <button type="submit">
                                <i class="fa fa-plus"></i> ダウンロードする
                            </button>
                    </div>
                </form>
                <form method="POST" action="{{ route('design_cart',['id'=> $design->id]) }}">
                @csrf

                <button type="submit">
                                <i class="fa fa-plus"></i> カートに入れる
                            </button>
                </form>
                    <div class="">
                        <p>ログインしてダウンロードしますか？</p>
                        <a href="{{ route('login') }}" class="header_nav_itm_link">ログイン</a>
                    </div>
                    <div class="">
                        <p>バイヤー登録してダウンロードしますか？</p>
                        <a href="{{ route('register') }}" class="header_nav_itm_link" target="_blank" >登録する</a>
                    </div>
                    @endauth
                    

            </div>
        </div>
</div>
@endsection
