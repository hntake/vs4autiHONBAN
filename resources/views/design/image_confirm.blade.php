@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/design.css') }}"> <!-- home.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/artist.css') }}">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($new_image)
                <form method="POST" action="{{ route('image_send',['id'=> $new_image]) }}">
                @csrf
                    <h2>イメージ確認画面</h2>

                    <div class="card-body" style="text-align:start;">
                        <p>こちらのイメージで宜しいですか？</p>
                        <div class="">
                            <div class="">
                                <img src="{{ asset('storage/' . $new_image) }}" alt="image" >
                            </div>
                        </div>
                        <button type="button"onclick="history.back()">
                            変更する
                        </button>
                        <button type="submit_button" name="action" value="submit">
                            送信する
                        </button>
                    </div>
                </form>
                @else

                    <a href="{{url('design_original')}}">
                    <h5>プロフィール画像<br>アップロードページへ戻る</h5>
                    </a>
            
                @endif
            </div>
        </div>
</div>
@endsection
