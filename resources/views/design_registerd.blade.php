@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">本会員登録完了</div>

                    <div class="card-body">
                        <p>デザイン登録が完了しました。</p>
                        <!--オリジナルデザインの場合-->
                        @if($lost->design==8)
                        <p>そのまま、支払いページへ移動して申し込みを完了してください。</p>
                        <a href="{{url('/paypay800')}}" class="sg-btn">支払いページへ移動</a>
                        @else
                        <p>そのまま、支払いページへ移動して申し込みを完了してください。</p>
                        <a href="{{url('/paypay')}}" class="sg-btn">支払いページへ移動</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
