@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">本会員登録完了</div>

                    <div class="card-body">
                        <p>本会員登録が完了しました。</p>
                        <a href="{{url('/my_page')}}" class="sg-btn">マイページへ移動</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
