@extends('layouts.app')
   
@section('content')

<link rel="stylesheet" href="{{ asset('css/design.css') }}"> <!-- home.cssと連携 -->

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="{{ route('design_download_each',['id'=> $download->id]) }}">
                @csrf
                <div class="">
                            <button type="submit">
                                <i class="fa fa-plus"></i> ダウンロードする
                            </button>
                    <h2>ダウンロード画面</h2>
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
                                <img src="{{ asset('storage/' . $download->Design->real_image) }}" alt="image" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection
