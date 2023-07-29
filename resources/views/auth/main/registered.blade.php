@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">本会員登録完了</div>

                    <div class="card-body">
                        <p>本会員登録が完了しました。</p>
                        <!--VS4からお守りの人-->
                         @if($user->type==3 && $user->pm_type == null)
                        <p>そのまま、デザイン選択ページへ移動してください。</p>
                        <a href="{{url('/design')}}" class="sg-btn">デザイン選択ページへ移動</a>
                        @endif
                        <!--VS4のみ-->
                        @if($user->type==0)
                        <a href="{{url('/dashboard')}}" class="sg-btn">保存リストへ移動</a>
                        @endif
                        <!--お守りバッジのみ申込＆販売店より購入:基本使わない-->
                        @if($user->type==1 && $user->pm_type == 10)
                        <a href="{{url('/my_page')}}" class="sg-btn">登録情報確認ページへ移動</a>
                        @endif
                        <!--お守りのみ-->
                        @if($user->type==1)
                        <p>バッジを注文する方は、デザイン選択ページへ移動してください。</p>
                        <a href="{{url('/design')}}" class="sg-btn">デザイン選択ページへ移動</a>
                        <p>バッジは注文せず、登録のみの方は登録料支払いページへ</p>
                        <a href="{{url('/paypay100')}}" class="sg-btn">支払いページへ移動</a>
                        @endif
                        <!--お守りからVS4もの人-->
                        @if($user->type==3 && $user->pm_type ==! null)
                        <a href="{{url('/dashboard')}}" class="sg-btn">保存リストへ移動</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
