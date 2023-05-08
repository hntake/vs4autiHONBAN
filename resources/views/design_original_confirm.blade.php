@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/design.css') }}"> <!-- home.cssと連携 -->

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('design_send') }}">
                @csrf
                    <h2>デザイン確認画面</h2>

                    <div class="card-body" style="text-align:start;">
                        <p>こちらのデザインで宜しいですか？</p>

                        <div class="relative">
                            <img src="{{asset('img/custom-black.png')}}" alt="image" >
                            <div class="absolute">
                                <img src="{{ asset('storage/' . $design->image) }}" alt="image" >
                            </div>
                        </div>
                            <h5>※完成イメージです</h5>
                            <h5>※機種によってずれたイメージになりますが、<br>バッジ作成時にはQRコードと同サイズに修正し並べて配置致します。</h5>
                        <button type="submit_button" name="action" value="submit">
                            送信する
                        </button>
                    </div>
                </form>
                <form method="GET" action="{{ route('design_delete') }}">
                @csrf
                <button type="submit_button" name="action" value="submit">
                        変更する
                    </button>
                </form>
            </div>
        </div>
</div>
@endsection
