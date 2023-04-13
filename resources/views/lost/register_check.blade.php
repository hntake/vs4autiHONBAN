
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dentist.css') }}"> <!-- schedule.cssと連携 -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">お守り登録確認</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('register.lost.registered') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
                            <div class="col-md-6">
                                <span class="">{{$lost->name}}</span>
                                <input type="hidden" name="name" value="{{$lost->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_pronunciation" class="col-md-4 col-form-label text-md-right">フリガナ</label>
                            <div class="col-md-6">
                                <span class="">{{$lost->name_pronunciation}}</span>
                                <input type="hidden" name="name_pronunciation" value="{{$lost->name_pronunciation}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">住所</label>
                            <div class="col-md-6">
                                <span class="">{{$lost->address}}</span>
                                <input type="hidden" name="address" value="{{$lost->address}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel1" class="col-md-4 col-form-label text-md-right">連絡先①</label>
                            <div class="col-md-6">
                                <span class="">{{$lost->tel1}}</span>
                                <input type="hidden" name="tel1" value="{{$lost->tel1}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel2" class="col-md-4 col-form-label text-md-right">連絡先②</label>
                            <div class="col-md-6">
                                <span class="">{{$lost->tel2}}</span>
                                <input type="hidden" name="tel2" value="{{$lost->tel2}}">
                            </div>
                        </div>
                        <div class="box" style="margin-bottom: 10px; background-color:#87CEFA ;padding: 0 20px;">
                            ※掛ける連絡先を選択してください<br>
                            <table class="0">
                                <thead>
                                    <tr>
                                    <th style="width:20%">曜日</th>
                                    <th style="width:20%">朝6～12時</th>
                                    <th style="width:20%">昼12~19時</th>
                                    <th style="width:20%">夜19～6時</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                        <label >月曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->mon1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="mon1" value="{{$lost->mon1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->mon2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="mon2" value="{{$lost->mon2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->mon3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="mon3" value="{{$lost->mon3}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >火曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->tue1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="tue1" value="{{$lost->tue1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->tue2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="tue2" value="{{$lost->tue2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->tue3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="tue3" value="{{$lost->tue3}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >水曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->wed1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="wed1" value="{{$lost->wed1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->wed2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="wed2" value="{{$lost->wed2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->wed3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="wed3" value="{{$lost->wed3}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >木曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->thu1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="thu1" value="{{$lost->thu1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->thu2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="thu2" value="{{$lost->thu2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->thu3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="thu3" value="{{$lost->thu3}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >金曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->fri1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="fri1" value="{{$lost->fri1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->fri2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="fri2" value="{{$lost->fri2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->fri3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="fri3" value="{{$lost->fri3}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >土曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->sat1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="sat1" value="{{$lost->sat1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->sat2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="sat2" value="{{$lost->sat2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->sat3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="sat3" value="{{$lost->sat3}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >日曜日</label>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->sun1==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="sun1" value="{{$lost->sun1}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->sun2==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="sun2" value="{{$lost->sun2}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                        @if($lost->sun3==0)
                                        連絡先①
                                        @else
                                        連絡先②
                                        @endif
                                        <input type="hidden" name="sun3" value="{{$lost->sun3}}">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        <div>

                        </div>



                        <div class="">
                            <button type="button" onClick="history.back()">
                                戻る
                            </button>
                            <button type="submit" class="btn btn-primary">
                                本登録
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
