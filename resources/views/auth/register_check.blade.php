@extends('layouts.app')

<link rel="icon" href="{{ asset('favicon.ico') }}" id="favicon">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">仮会員登録確認</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-6">
                                <span class="">{{$email}}</span>
                                <input type="hidden" name="email" value="{{$email}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <span class="">{{$password_mask}}</span>
                                <input type="hidden" name="password" value="{{$password}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">性別</label>

                            <div class="col-md-6">
                                <span class="">{{$gender}}</span>
                                <input type="hidden" name="gender" value="{{$gender}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">完了マーク</label>

                            <div class="col-md-6">
                                @if($image_id==2)
                                <img src="{{asset('img/hana.png')}}">
                                @elseif($image_id==3)
                                <img src="{{asset('img/smile.png')}}">
                                @else
                                <img src="{{asset('img/check.png')}}">
                                @endif
                                <input type="hidden" name="image_id" value="{{$image_id}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    仮登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection