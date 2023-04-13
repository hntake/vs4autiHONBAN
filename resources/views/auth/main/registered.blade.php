@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">本会員登録完了</div>

                    <div class="card-body">
                        <p>本会員登録が完了しました。</p>
                        @if($user->type==0)
                        <a href="{{url('/dashoboard')}}" class="sg-btn">保存リストへ移動</a>
                        @elseis($user->type==1)
                        <p>そのまま、支払いページへ移動して申し込みを完了してください。</p>
                        <a href="{{url('/paypay')}}" class="sg-btn">支払いページへ移動</a>
                        @elseif($user->type==3 && $user->pm_type !== null)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
