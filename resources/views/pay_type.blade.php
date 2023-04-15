@extends('layouts.app')

<title>支払い表</title>

@section('content')


<div class="searchtable-responsive">


    <!--検索結果テーブル 検索された時のみ表示する-->
    @if (!empty($payments))
    <div class="test-hover" >
        <p>全{{ $payments->count() }}件</p>
        <table class="table table-hover" style="width:100%;">
            <thead style="background-color: #ffd900">
                <tr>
                    <th style="width:10%">name</th>
                    <th style="width:5%">タイプ</th>
                    <th style="width:10%">uuid</th>
                    <th style="width:10%">メールアドレス</th>
                </tr>
            </thead>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->name }}</td>
                <td>{{$payment->type }}</td>
                <td>{{$payment->uuid }}</td>
                <td>{{$payment->email }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <!--テーブルここまで-->
    <!--ページネーション-->
    <div class="d-flex justify-content-center">
        {{-- appendsでカテゴリを選択したまま遷移 --}}
        {{ $payments->appends(request()->input())->links() }}
    </div>
    <!--ページネーションここまで-->
    @endif
    <form method="POST" action="{{ route('payment_post') }}">
        @csrf
        <div>
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('name') }}</label>
        <input name="name" value="{{ old('name') }}" type="text">
        </div>
        <div>
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('type') }}</label>
        <input name="type" value="{{ old('type') }}" type="text">
        </div>
        <div>
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('email') }}</label>
        <input name="email" value="{{ old('email') }}" type="text">
        </div>
    <button type="submit_button" name="action" value="submit">
            追加
        </button>
    </form>
    <p>pay_type</p>
    <p>1 stripe</p>
    <p>2 paypay</p>
    <p>3 bank</p>
</div>
</div>
</main>
@endsection
<a href="{{('/')}}" class="gotop">トップへ</a>
