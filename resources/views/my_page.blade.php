
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dentist.css') }}"> <!-- schedule.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- schedule.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}"> <!-- schedule.cssと連携 -->

<div class="container">
    <a href="{{url('/')}}" class=""><img src="img/vs4auti2.png" style="width:30%; height:auto;"></a>
    <div class="admin_button"style="margin-bottom:10px;"><a href="{{ route('feel_choice') }}" style="background-color:none; color:#7791DE;"><img src="{{ asset('img/feel.png') }}" alt="feel"></a></div>
<!--     両方申込んでいる -->
    @if($type==3)
            <a href="{{ url('dashboard') }}">
                <h3>保存リストへ</h3>
            </a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">登録情報</div>
                @if($lost->mode==0)
                <div class="pro_button"><a href="{{ route('suspend') }}">サービスを一時停止する（個人情報対策）</a></div>
                <div class="pro_button"><a href="{{ route('stop') }}">紛失等の為にサービスを停止する</a></div>
                @else
                <div class="pro_button"><a href="{{ route('again') }}">サービスを再開する</a></div>
                @endif
                <div class="card-body">
                    <div class="form-group row">

                        <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                        <div class="col-md-6">
                            <span class="">{{$user->email}}</span>
                            <input type="hidden" name="email" value="{{$user->email}}">
                        </div>
                    </div>
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
                                @elseif($user->image_id==3)
                                <img src="{{asset('img/smile.png')}}">
                                @else
                                <img src="{{asset('img/check.png')}}">
                                @endif
                                <input type="hidden" name="image_id" value="{{$user->image_id}}">
                            </div>
                    </div>
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
                    </div>
                    @if(isset($picture))
                    <div class="qr_code">
                        <h5>貴方のQRコード</h5>
                        <a href="{{ asset('storage/' . $picture->image) }}"><img src="{{ asset('storage/' . $picture->image) }}" alt="image" ></a>
                        <div class="print">
                            <h6 >印刷したい方はQRコードをクリックし、画像画面で各デバイスに沿った印刷方法で印刷して下さい。<br>ヘルプカードに利用する場合はA4サイズを10～20%に設定してください</h6>
                        </div>

                    </div>
                    <div class="qr_code">
                        <h5 style="font-weight:bold; color:red;">お守りシール</h5>
                        <a href="{{ route('pdf') }}"><img src="{{ asset('img/pdf.png') }}" alt="image" ></a>
                        <div class="print">
                            <h6 >A4サイズで印刷されます。（上記の画像をクリックすると印刷画面が表示されます）</h6>
                        </div>

                    </div>
                    @endif
                </div>
                <!--     VS4だけ申込んでいる -->
                @elseif($type==0)
                <a href="{{ url('dashboard') }}">
                <h3>保存リストへ</h3>
                </a>
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
                                @elseif($user->image_id==3)
                                <img src="{{asset('img/smile.png')}}">
                                @else
                                <img src="{{asset('img/check.png')}}">
                                @endif
                                <input type="hidden" name="image_id" value="{{$user->image_id}}">
                            </div>
                        </div>
            <!--     お守りバッジだけ申込んでいる -->
            @elseif($type==1 )
                <div class="card-header">登録情報</div>
                @if($lost->mode==0)
                <div class="pro_button"><a href="{{ route('suspend') }}">サービスを一時停止する（個人情報対策）</a></div>
                <div class="pro_button"><a href="{{ route('stop') }}">紛失等の為にサービスを停止する</a></div>
                @else
                <div class="pro_button"><a href="{{ route('again') }}">サービスを再開する</a></div>
                @endif
                    <div class="card-body">
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
                            </div>
                        @if(isset($picture))
                        <div class="qr_code">
                            <h5>貴方のQRコード</h5>
                            <a href="{{ asset('storage/' . $picture->image) }}"><img src="{{ asset('storage/' . $picture->image) }}" alt="image" ></a>
                            <div class="print">
                                <h6 >印刷したい方はQRコードをクリックし、画像画面で各デバイスに沿った印刷方法で印刷して下さい。<br>ヘルプカードに利用する場合はA4サイズを10～20%に設定してください</h6>
                            </div>
                        </div>

                        <div class="qr_code">
                                <h5 style="font-weight:bold; color:red;">お守りシール</h5>
                                <a href="{{ route('pdf') }}"><img src="{{ asset('img/pdf.png') }}" alt="image" ></a>
                                <div class="print">
                                    <h6 >A4サイズで印刷されます。（上記の画像をクリックすると印刷画面が表示されます）</h6>
                                </div>

                        </div>
                            @endif
                    </div>
                    @endif
                    <div class="pro_button"><a href="{{ route('edit_user',['id'=> $user->id]) }}">登録情報編集画面へ</a></div>
                    <div class="pro_button"><a href="{{ route('password') }}">パスワード変更画面へ</a></div>
                    <div class="pro_button"><a href="{{ url('delete') }}">登録削除画面へ</a></div>
                </div><!--card-->
            </div><!--col-md-8-->
        </div><!--row justify-content-center-->
</div><!--container-->
        <footer class="site-footer">
        <div class="bc-sitemap-wrapper">
            <div class="sitemap clearfix">
                <div id="nav_menu2" class="widget_nav_menu">
                    <h3 class="widget-title">製品紹介</h3>
                    <div class="menu-site-map-1-container">
                        <ul id="menu-site-map-1" class="menu">
                            <li><a href="{{ url('feature') }}">機能</a></li>
                            <li><a href="{{ url('plan') }}">利用料金</a></li>
                            <li><a href="{{ url('case') }}">導入事例</a></li>
                            <li><a href="{{ url('admin')}}">管理者画面</a></li>
                        </ul>
                    </div>
                </div>
                <div id="nav_menu2" class="widget_nav_menu">
                    <h3 class="widget-title">関連情報</h3>
                    <div class="menu-site-map-1-container">
                        <ul id="menu-site-map-1" class="menu">
                            <li><a href="https://eng50cha.com/blog/index">ブログ</a></li>
                            <l><a href="{{ url('news/index')}}">お知らせ</a></li>
                                <li><a href="{{ url('partner')}}">パートナー</a></li>
                        </ul>
                    </div>
                </div>
                <div id="nav_menu2" class="widget_nav_menu">
                    <h3 class="widget-title">サポート</h3>
                    <div class="menu-site-map-1-container">
                        <ul id="menu-site-map-1" class="menu">
                            <li><a href="{{ url('contact')}}">お問い合わせ</a></li>
                            <li><a href="{{ url('faq')}}">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div id="nav_menu2" class="widget_nav_menu">
                    <h3 class="widget-title">会社情報</h3>
                    <div class="menu-site-map-1-container">
                        <ul id="menu-site-map-1" class="menu">
                            <li><a href="{{ url('policy')}}">プライバシー</a></li>
                            <li><a href="{{ url('rule')}}">利用規約</a></li>
                            <li><a href="{{ url('aboutus')}}">About Us</a></li>
                            <li><a href="{{ url('consumer')}}">特定商取引</a></li>
                        </ul>
                    </div>
                </div>
                <div class="site-info">
                    <div class="widget">
                        <span class="copu-right-text">© All rights reserved by llco</span>
                    </div>
                </div>
            </div>
        </div>
        <p></p>

        <a href="#" class="gotop">トップへ</a>
    </footer>
    </div>
</div>
@endsection
