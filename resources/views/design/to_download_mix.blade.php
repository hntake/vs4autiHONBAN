@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/design.css') }}"> <!-- home.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/artist.css') }}"> <!-- home.cssと連携 -->
<link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if(count($downloads) === 0)
                    @auth
                        <p>ダウンロードは既に完了されています。ご利用環境などが原因でダウンロードができない場合は、<a href="{{route('my_page')}}">マイページ</a>にて購入から３ヶ月以内のものは再度ダウンロードが出来ますので、お手数ですが再度ダウンロードをお試し下さい</p>
                    @else
                        <p>ご利用環境などの理由でダウンロードができない場合は、ダウンロード時にご利用いただいたメールアドレスを使用して、<a href="{{url('contact')}}">こちら</a>までお問い合わせいただけますようお願い申し上げます。</p>
                    @endauth
            @else
                <form method="POST" action="{{ route('design_downloaded_mix',['id'=> $email]) }}">
                    @csrf
                    <div class="">
                        <p>以下の画像のダウンロードの準備ができました</p>
                                <button type="submit" onclick="showPopupMessage()" class="text-center mt-5">
                                    <i class="fa fa-plus"></i> 以下を全てダウンロードする
                                </button>
                        @foreach($designs as $design)
                            <div class="card-body" style="text-align:start;">
                                <th >作品名</th>
                                    <tr>
                                        <td>{{ $design->name}}</td>
                                    </tr>
                                <th >金額</th>
                                    <tr>
                                        <td>¥{{ $design->price}}</td>
                                    </tr>
                        
                                    <div class="">
                                    @foreach($designs as $design)
                                            <img src="{{ asset('storage/' . $design->real_image) }}" alt="image" >
                                    @endforeach
                                    </div>
                                    
                            </div>
                        @endforeach
                    </div>
                </form>
            @endif
            </div>
        </div>
</div>
@endsection
