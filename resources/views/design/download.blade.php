@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/design.css') }}"> <!-- home.cssと連携 -->

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @auth
                <form method="GET" action="{{ route('design_stripe',['id'=> $design->id]) }}">
                @csrf
                    <h2>ダウンロード確認画面</h2>
                    <div class="card-body" style="text-align:start;">
                        <th >作品名</th>
                            <tr>
                                <td>{{ $design->name}}</td>
                            </tr>
                        <th >金額</th>
                            <tr>
                                <td>{{ $design->price}}</td>
                            </tr>
                
                        <div class="">
                            <div class="">
                                <img src="{{ asset('storage/' . $design->image) }}" alt="image" >
                            </div>
                         
                        </div>
                        </div>
                    </div>
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
                    <h2>ダウンロード確認画面</h2>
                    <div class="card-body" style="text-align:start;">
                        <th >作品名</th>
                            <tr>
                                <td>{{ $design->name}}</td>
                            </tr>
                        <th >金額</th>
                            <tr>
                                <td>{{ $design->price}}</td>
                            </tr>
                
                        <div class="">
                            <div class="">
                                <img src="{{ asset('storage/' . $design->image) }}" alt="image" >
                            </div>
                         
                        </div>
                        </div>
                    </div>
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
                        <a href="{{ route('buyer_login',['id'=> $design->id]) }}" class="header_nav_itm_link">ログイン</a>
                    </div>
                    <div class="">
                        <p>登録してダウンロードしますか？</p>
                        <a href="{{ route('buyer_register',['id'=> $design->id]) }}" class="header_nav_itm_link">登録する</a>
                    </div>
                    @endauth
                    

            </div>
        </div>
</div>
@endsection
