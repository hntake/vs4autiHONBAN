@extends('layouts.app')
<title>検品表</title>
@section('content')
<link rel="stylesheet" href="{{ asset('css/list.css') }}"> <!-- products.cssと連携 -->
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="header-logo-menu">

</div>
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')

    <h1>検品表</h1>
    <div class="store-list">
        <table>
            <thead>
                <tr>
                    <th style="width:10%">番号</th>
                    <th style="width:20%">バッジ</th>
                    <th style="width:20%">名刺</th>
                    <th style="width:20%">完了</th>
                </tr>
            </thead>
            @foreach($losts as $lost)

            <tbody>
                <tr>
                    <td>{{ $lost->id }}</td>
                    <td><input type="checkbox"  ></td>
                    <td><input type="checkbox"  ></td>
                    <td>
                        <iframe name="votar" style="display:none;" ></iframe>
                        <form method="POST" action="{{ route('inspect_complete',['id'=>$lost->id])}}" target="votar">
                        @method('patch')
                        @csrf
                        <div x-data="{ show: false }">
                            <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }">
                            完了
                            </button>

                        </div>
                        </form>

                </td>
                </tr>

                @endforeach
            </tbody>

        </table>


    </div>
</div>
@endsection
