
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dentist.css') }}"> <!-- schedule.cssと連携 -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">VS4登録確認</div>

                <div class="card-body">
                <form method="POST" action="{{ route('vs4.registered') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">性別</label>
                            <div class="col-md-6">
                                <span class="">{{$user->gender}}</span>
                                <input type="hidden" name="gender" value="{{$user->gender}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image_id" class="col-md-4 col-form-label text-md-right">完了マーク</label>

                            <div class="col-md-6">
                                @if($user->image_id==2)
                                <img src="{{asset('img/hana.png')}}">
                                @elseif($$user->image_id==3)
                                <img src="{{asset('img/smile.png')}}">
                                @else
                                <img src="{{asset('img/check.png')}}">
                                @endif
                                <input type="hidden" name="image_id" value="{{$user->image_id}}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    本登録
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
