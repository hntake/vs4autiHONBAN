@extends('layouts.app')
   
@section('content')

<link rel="stylesheet" href="{{ asset('css/design.css') }}"> <!-- home.cssと連携 -->

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="{{ route('design_downloaded',['id'=> $download->email]) }}">
                @csrf
                @if(isset($downloads))
                <div class="">
                        <p>こちらの作品をダウンロード可能となりました</p>
                            <button type="submit">
                                <i class="fa fa-plus"></i> ダウンロードする
                            </button>
                    </div>
                    <h2>ダウンロード画面</h2>
                    @foreach($downloads as $download)
                    <div class="card-body" style="text-align:start;">
                        <th >作品名</th>
                            <tr>
                                <td>{{ $download->name}}</td>
                            </tr>
                        <th >金額</th>
                            <tr>
                                <td>{{ $download->price}}</td>
                            </tr>
                
                        <div class="">
                            <div class="">
                                <img src="{{ asset('storage/' . $download->Design->real_image) }}" alt="image" >
                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </form>
                @else
                @auth
                ダウンロードは既に完了されています。ご利用環境などが原因でダウンロードができない場合は、<a href="{{route('my'"マイページにて購入から３ヶ月以内のものは再度ダウンロードが出来ますので、お手数ですが再度ダウンロードをお試し下さい
                @else
                ダウンロードは既に完了されています。ご利用環境などが原因でダウンロードができない場合は、ダウンロードした際に利用したメールアドレスを使って、こちらまでお問いお合わせ下さい。
                @endauth
                @endif
                @
            </div>
        </div>
</div>
@endsection
