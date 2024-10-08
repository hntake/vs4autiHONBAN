@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/design.css') }}"> <!-- home.cssと連携 -->

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($lost->design==8 && empty($design))
                    <a href="{{url('design_original')}}">
                    <h5>オリジナル画像<br>アップロードページへ移動する</h5>
                    </a>
                @else
                <form method="POST" action="{{ route('design_send') }}">
                @csrf
                    <h2>デザイン確認画面</h2>

                    <div class="card-body" style="text-align:start;">
                        <p>こちらのデザインで宜しいですか？</p>
                        @if($lost->design==1)
                        <img src="{{asset('img/bird-black.png')}}" alt="image" >
                        @elseif($lost->design==2)
                        <img src="{{asset('img/flower-purple.png')}}" alt="image" >
                        @elseif($lost->design==3)
                        <img src="{{asset('img/can_see.png')}}" alt="image" >
                        @elseif($lost->design==4)
                        <img src="{{asset('img/butterfly.png')}}" alt="image" >
                        @elseif($lost->design==5)
                        <img src="{{asset('img/elephant-red.png')}}" alt="image" >
                        @elseif($lost->design==6)
                        <img src="{{asset('img/turtle-orange.png')}}" alt="image" > 
                        @elseif($lost->design==7)
                        <img src="{{asset('img/plain-black.png')}}" alt="image" >
                        @else
                        <div class="relative">
                            <img src="{{asset('img/custom-black.png')}}" alt="image" >
                            <div class="absolute">
                                <img src="{{ asset('storage/' . $design->image) }}" alt="image" >
                            </div>
                        </div>
                            <h5>※完成イメージです</h5>
                            <h5>※機種によってずれたイメージになりますが、<br>バッジ作成時にはQRコードと同サイズに修正し並べて配置致します。</h5>
                        @endif
                        <button type="button"onclick="history.back()">
                            変更する
                        </button>
                        <button type="submit_button" name="action" value="submit">
                            送信する
                        </button>
                    </div>
                </form>
                @endif
            </div>
        </div>
</div>
@endsection
