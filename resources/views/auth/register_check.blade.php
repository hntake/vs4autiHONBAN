@extends('layouts.app')

<link rel="icon" href="{{ asset('favicon2.ico') }}" id="favicon">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">仮会員登録確認 temporary confirmation</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">申込サービス Your service type</label>

                            <div class="col-md-6">
                                @if($type==0)
                                絵スケジュール visual schedule
                                @elseif($type==1)
                                お守りグッズ may_protect
                                @elseif($type==8)
                                障がい者アートバイヤー登録 art_buyer
                                @elseif($type==10)
                                障がい者アーティスト登録 artist
                                @else
                                マイリク my_request
                                @endif
                                <input type="hidden" name="type" value="{{$type}}">
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス email</label>

                            <div class="col-md-6">
                                <span class="">{{$email}}</span>
                                <input type="hidden" name="email" value="{{$email}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード password</label>

                            <div class="col-md-6">
                                <span class="">{{$password_mask}}</span>
                                <input type="hidden" name="password" value="{{$password}}">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    仮登録 confirm
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
