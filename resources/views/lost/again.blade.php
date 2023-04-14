@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">サービス再開確認画面</div>

                <div class="card-body" style="text-align:start;">
                    <p>サービスを再開しますか？</p>
                    <form method="POST" action="{{ route('again_call') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="margin-top:30px">
                                    {{ __('再開する') }}
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
