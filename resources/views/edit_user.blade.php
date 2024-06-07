
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dentist.css') }}"> <!-- schedule.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/edit.css') }}"> <!-- schedule.cssと連携 -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if($user->type <= 5)    
            <a href="{{url('/')}}" class="">トップページに戻る</a>
            @elseif($user->type = 8)
            <a href="{{ route('my_page') }}">マイページに戻る</a>
            @endif
            <form method="POST" action="{{route('update_user',['id'=> $user->id])}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
                <div class="card-header">登録情報編集ページ</div>

                <div class="card-body">
                <table class="table-hover">
                    <thead>
                    <tr>
                        <th >メールアドレス</th>
                        <td><input type="text" name="email" value="{{ $user->email}}" class="form-control"></td>
                    </tr>
                    @if($user->type==0 )
                    <tr>
                        <th >性別</th>
                        <td>
                            <div class="col-md-6">
                                @if($user->gender=="boy")
                                <input type="radio" name="gender" value="boy" checked>男の子
                                <input type="radio" name="gender"  value="girl">女の子
                                @else
                                <input type="radio" name="gender" value="boy" >男の子
                                <input type="radio" name="gender"  value="girl" checked>女の子
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th >完了マーク</th>
                        <td>
                        <div class="form-group row">
                            <div class="col-md-6">
                                @if($user->image_id==2)
                                <img src="{{asset('img/hana.png')}}"><input id="image_id2" type="radio" name="image_id" value="2" checked >
                                <img src="{{asset('img/smile.png')}}"><input id="image_id3" type="radio" name="image_id" value="3">
                                <img src="{{asset('img/check.png')}}"><input id="image_id1" type="radio" name="image_id" value="1">
                                @elseif($user->image_id==3)
                                <img src="{{asset('img/hana.png')}}"><input id="image_id2" type="radio" name="image_id" value="2"  >
                                <img src="{{asset('img/smile.png')}}"><input id="image_id3" type="radio" name="image_id" value="3"checked>
                                <img src="{{asset('img/check.png')}}"><input id="image_id1" type="radio" name="image_id" value="1">
                                @else
                                <img src="{{asset('img/hana.png')}}"><input id="image_id2" type="radio" name="image_id" value="2"  >
                                <img src="{{asset('img/smile.png')}}"><input id="image_id3" type="radio" name="image_id" value="3">
                                <img src="{{asset('img/check.png')}}"><input id="image_id1" type="radio" name="image_id" value="1"checked>
                                @endif
                            </div>
                        </div>
                        </td>
                    </tr>
                    </thead>
                </table>
                    <div class="button"><input type="submit" value="更新">
                    <h4>更新ボタンを押さないと変更されません</h4>
                </div>
                    @elseif($user->type==1)
                 
                    <tr>
                        <th >名前</th>
                        <td><input type="text" name="name" value="{{ $lost->name}}" class="form-control"></td>
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </tr>
                    <tr>
                        <th >フリガナ</th>
                        <td><input type="text" name="name_pronunciation" value="{{ $lost->name_pronunciation}}" class="form-control"></td>
                    </tr>
                    <tr>
                        <th >連絡先①</th>
                            <td><input type="text" name="tel1" value="{{ $lost->tel1}}" class="form-control"></td>
                            @if ($errors->has('tel1'))
                                <p class="text-danger">{{ $errors->first('tel1') }}</p>
                            @endif                   
                    </tr>
                    <tr>
                        <th >連絡先②</th>
                        <td><input type="text" name="tel2" value="{{ $lost->tel2}}" class="form-control"></td>
                    </tr>
                    <tr>
                        <th >住所</th>
                        <td><input type="text" name="address" value="{{ $lost->address}}" class="form-control"></td>
                    </tr>

                </table>
                <div class="support">
                        <h3>サポートブック</h3>
                        <tr>
                            <th >苦手な事</th>
                            <td><input type="text" name="weak" value="{{ $user->weak}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <th >安心できる事</th>
                            <td><input type="text" name="relax" value="{{ $user->relax}}" class="form-control"></td>
                        </tr>    <tr>
                            <th >できる事</th>
                            <td><input type="text" name="can" value="{{ $user->can}}" class="form-control"></td>
                        </tr>    <tr>
                            <th >できない事</th>
                            <td><input type="text" name="cannot" value="{{ $user->cannot}}" class="form-control"></td>
                        </tr>
                        <tr>
                            @if($user->support == 0)
                            <input type="radio" name="support" value="0" checked>隠す
                            <input type="radio" name="support"  value="1">表示する
                            @else
                            <input type="radio" name="support" value="0" >隠す
                            <input type="radio" name="support"  value="1"checked>表示する
                            @endif
                        </tr>
                    </div>
                <div class="horizon">
                    <div class="box1">
                        @if($lost->mon1==0)
                        月曜日 朝6～12時
                        <input type="radio" name="mon1" value="0" checked>連絡先①
                        <input type="radio" name="mon1"  value="1">連絡先②
                        @else
                        月曜日 朝6～12時
                        <input type="radio" name="mon1" value="0" >連絡先①
                        <input type="radio" name="mon1"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box2">
                        @if($lost->mon2==0)
                        月曜日 昼12~19時
                        <input type="radio" name="mon2" value="0" checked>連絡先①
                        <input type="radio" name="mon2"  value="1">連絡先②
                        @else
                        月曜日 昼12~19時
                        <input type="radio" name="mon2" value="0" >連絡先①
                        <input type="radio" name="mon2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->mon3==0)
                        月曜日 夜19～6時
                        <input type="radio" name="mon3" value="0" checked>連絡先①
                        <input type="radio" name="mon3"  value="1">連絡先②
                        @else
                        月曜日 夜19～6時
                        <input type="radio" name="mon3" value="0" >連絡先①
                        <input type="radio" name="mon3"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box1">
                        @if($lost->tue1==0)
                        火曜日 朝6～12時
                        <input type="radio" name="tue1" value="0" checked>連絡先①
                        <input type="radio" name="tue1"  value="1">連絡先②
                        @else
                        火曜日 朝6～12時
                        <input type="radio" name="tue1" value="0" >連絡先①
                        <input type="radio" name="tue1"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box2">
                        @if($lost->tue2==0)
                        火曜日 昼12~19時
                        <input type="radio" name="tue2" value="0" checked>連絡先①
                        <input type="radio" name="tue2"  value="1">連絡先②
                        @else
                        火曜日 昼12~19時
                        <input type="radio" name="tue2" value="0" >連絡先①
                        <input type="radio" name="tue2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->tue3==0)
                        火曜日 夜19～6時
                        <input type="radio" name="tue3" value="0" checked>連絡先①
                        <input type="radio" name="tue3"  value="1">連絡先②
                        @else
                        火曜日 夜19～6時
                        <input type="radio" name="tue3" value="0" >連絡先①
                        <input type="radio" name="tue3"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box1">
                        @if($lost->wed1==0)
                        水曜日 朝6～12時
                        <input type="radio" name="wed1" value="0" checked>連絡先①
                        <input type="radio" name="wed1"  value="1">連絡先②
                        @else
                        水曜日 朝6～12時
                        <input type="radio" name="wed1" value="0" >連絡先①
                        <input type="radio" name="wed1"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box2">
                        @if($lost->wed2==0)
                        水曜日 昼12~19時
                        <input type="radio" name="wed2" value="0" checked>連絡先①
                        <input type="radio" name="wed2"  value="1">連絡先②
                        @else
                        水曜日 昼12~19時
                        <input type="radio" name="wed2" value="0" >連絡先①
                        <input type="radio" name="wed2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->wed3==0)
                        水曜日 夜19～6時
                        <input type="radio" name="wed3" value="0" checked>連絡先①
                        <input type="radio" name="wed3"  value="1">連絡先②
                        @else
                        水曜日 夜19～6時
                        <input type="radio" name="wed3" value="0" >連絡先①
                        <input type="radio" name="wed3"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box1">
                        @if($lost->thu1==0)
                        木曜日 朝6～12時
                        <input type="radio" name="thu1" value="0" checked>連絡先①
                        <input type="radio" name="thu1"  value="1">連絡先②
                        @else
                        木曜日 朝6～12時
                        <input type="radio" name="thu1" value="0" >連絡先①
                        <input type="radio" name="thu1"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box2">
                        @if($lost->thu2==0)
                        木曜日 昼12~19時
                        <input type="radio" name="thu2" value="0" checked>連絡先①
                        <input type="radio" name="thu2"  value="1">連絡先②
                        @else
                        木曜日 昼12~19時
                        <input type="radio" name="thu2" value="0" >連絡先①
                        <input type="radio" name="thu2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->thu3==0)
                        木曜日 夜19～6時
                        <input type="radio" name="thu3" value="0" checked>連絡先①
                        <input type="radio" name="thu3"  value="1">連絡先②
                        @else
                        木曜日 夜19～6時
                        <input type="radio" name="thu3" value="0" >連絡先①
                        <input type="radio" name="thu3"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box1">
                        @if($lost->fri1==0)
                        金曜日 朝6～12時
                        <input type="radio" name="fri1" value="0" checked>連絡先①
                        <input type="radio" name="fri1"  value="1">連絡先②
                        @else
                        金曜日 朝6～12時
                        <input type="radio" name="fri1" value="0" >連絡先①
                        <input type="radio" name="fri1"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box2">
                        @if($lost->fri2==0)
                        金曜日 昼12~19時
                        <input type="radio" name="fri2" value="0" checked>連絡先①
                        <input type="radio" name="fri2"  value="1">連絡先②
                        @else
                        金曜日 昼12~19時
                        <input type="radio" name="fri2" value="0" >連絡先①
                        <input type="radio" name="fri2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->fri3==0)
                        金曜日 夜19～6時
                        <input type="radio" name="fri3" value="0" checked>連絡先①
                        <input type="radio" name="fri3"  value="1">連絡先②
                        @else
                        金曜日 夜19～6時
                        <input type="radio" name="fri3" value="0" >連絡先①
                        <input type="radio" name="fri3"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box1">
                        @if($lost->sat1==0)
                        土曜日 朝6～12時
                        <input type="radio" name="sat1" value="0" checked>連絡先①
                        <input type="radio" name="sat1"  value="1">連絡先②
                        @else
                        土曜日 朝6～12時
                        <input type="radio" name="sat1" value="0" >連絡先①
                        <input type="radio" name="sat1"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box2">
                        @if($lost->sat2==0)
                        土曜日 昼12~19時
                        <input type="radio" name="sat2" value="0" checked>連絡先①
                        <input type="radio" name="sat2"  value="1">連絡先②
                        @else
                        土曜日 昼12~19時
                        <input type="radio" name="sat2" value="0" >連絡先①
                        <input type="radio" name="sat2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->sat3==0)
                        土曜日 夜19～6時
                        <input type="radio" name="sat3" value="0" checked>連絡先①
                        <input type="radio" name="sat3"  value="1">連絡先②
                        @else
                        土曜日 夜19～6時
                        <input type="radio" name="sat3" value="0" >連絡先①
                        <input type="radio" name="sat3"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box1">
                        @if($lost->sun1==0)
                        日曜日 朝6～12時
                        <input type="radio" name="sun1" value="0" checked>連絡先①
                        <input type="radio" name="sun1"  value="1">連絡先②
                        @else
                        日曜日 朝6～12時
                        <input type="radio" name="sun1" value="0" >連絡先①
                        <input type="radio" name="sun1"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box2">
                        @if($lost->sun2==0)
                        日曜日 昼12~19時
                        <input type="radio" name="sun2" value="0" checked>連絡先①
                        <input type="radio" name="sun2"  value="1">連絡先②
                        @else 日曜日 昼12~19時
                        <input type="radio" name="sun2" value="0" >連絡先①
                        <input type="radio" name="sun2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->sun3==0)
                        日曜日 夜19～6時
                        <input type="radio" name="sun3" value="0" checked>連絡先①
                        <input type="radio" name="sun3"  value="1">連絡先②
                        @else
                        日曜日 夜19～6時
                        <input type="radio" name="sun3" value="0" >連絡先①
                        <input type="radio" name="sun3"  value="1"checked>連絡先②
                        @endif
                    </div>
                </div>
                    <div class="button"><input type="submit" value="更新">
                    <h4>更新ボタンを押さないと変更されません</h4>
                </div>
                <!-- バイヤー -->
                @elseif($user->type==8)

                </table>
                </div>
                    <div class="button"><input type="submit" value="更新">
                    <h4>更新ボタンを押さないと変更されません</h4>
                </div>
                <!-- アーティスト -->
                @elseif($user->type==10)

                <tr>
                        <th >名前</th>
                        <td><input type="text" name="name" value="{{ $artist->name}}" class="form-control"></td>
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </tr>
                    <tr>
                        <th >フリガナ</th>
                        <td><input type="text" name="name_pronunciation" value="{{ $artist->name_pronunciation}}" class="form-control"></td>
                    </tr>
                    <tr>
                        <th >連絡先①</th>
                            <td><input type="text" name="tel1" value="{{ $artist->tel1}}" class="form-control"></td>
                            @if ($errors->has('tel1'))
                                <p class="text-danger">{{ $errors->first('tel1') }}</p>
                            @endif                   
                    </tr>
                    <tr>
                        <th >アーティスト名</th>
                        <td><input type="text" name="artist_name" value="{{ $artist->artist_name}}" class="form-control"></td>
                    </tr>
                    <tr>
                        <th >住所</th>
                        <td><input type="text" name="address" value="{{ $artist->address}}" class="form-control"></td>
                    </tr>

                </table>
                </div>
                    <div class="button"><input type="submit" value="更新">
                    <h4>更新ボタンを押さないと変更されません</h4>
                </div>
               <!-- VS4とお守り両方申込  -->
                @else
                <tr>
                        <th >性別</th>
                        <td>
                            <div class="col-md-6">
                                @if($user->gender=="boy")
                                <input type="radio" name="gender" value="boy" checked>男の子
                                <input type="radio" name="gender"  value="girl">女の子
                                @else
                                <input type="radio" name="gender" value="boy" >男の子
                                <input type="radio" name="gender"  value="girl" checked>女の子
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th >完了マーク</th>
                        <td>
                        <div class="form-group row">
                            <div class="col-md-6">
                                @if($user->image_id==2)
                                <img src="{{asset('img/hana.png')}}"><input id="image_id2" type="radio" name="image_id" value="2" checked >
                                <img src="{{asset('img/smile.png')}}"><input id="image_id3" type="radio" name="image_id" value="3">
                                <img src="{{asset('img/check.png')}}"><input id="image_id1" type="radio" name="image_id" value="1">
                                @elseif($user->image_id==3)
                                <img src="{{asset('img/hana.png')}}"><input id="image_id2" type="radio" name="image_id" value="2"  >
                                <img src="{{asset('img/smile.png')}}"><input id="image_id3" type="radio" name="image_id" value="3"checked>
                                <img src="{{asset('img/check.png')}}"><input id="image_id1" type="radio" name="image_id" value="1">
                                @else
                                <img src="{{asset('img/hana.png')}}"><input id="image_id2" type="radio" name="image_id" value="2"  >
                                <img src="{{asset('img/smile.png')}}"><input id="image_id3" type="radio" name="image_id" value="3">
                                <img src="{{asset('img/check.png')}}"><input id="image_id1" type="radio" name="image_id" value="1"checked>
                                @endif
                            </div>
                        </div>
                        </td>
                    </tr>
                    </thead>
                    
                    <tr>
                    <th >名前</th>
                        <td><input type="text" name="name" value="{{ $lost->name}}" class="form-control"></td>
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </tr>
                    <th >フリガナ</th>
                        <td><input type="text" name="name_pronunciation" value="{{ $lost->name_pronunciation}}" class="form-control"></td>
                    </tr>
                    <th >連絡先①</th>
                        <td><input type="text" name="tel1" value="{{ $lost->tel1}}" class="form-control"></td>
                        @if ($errors->has('tel1'))
                            <p class="text-danger">{{ $errors->first('tel1') }}</p>
                        @endif
                    </tr>
                    <th >連絡先②</th>
                        <td><input type="text" name="tel2" value="{{ $lost->tel2}}" class="form-control"></td>
                    </tr>
                    <th >住所</th>
                        <td><input type="text" name="address" value="{{ $lost->address}}" class="form-control"></td>
                    </tr>

                </table>
                <div class="support">
                        <h3>サポートブック</h3>
                        <tr>
                            <th >苦手な事</th>
                            <td><input type="text" name="weak" value="{{ $user->weak}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <th >安心できる事</th>
                            <td><input type="text" name="relax" value="{{ $user->relax}}" class="form-control"></td>
                        </tr>    <tr>
                            <th >できる事</th>
                            <td><input type="text" name="can" value="{{ $user->can}}" class="form-control"></td>
                        </tr>    <tr>
                            <th >できない事</th>
                            <td><input type="text" name="cannot" value="{{ $user->cannot}}" class="form-control"></td>
                        </tr>
                        <tr>
                            @if($user->support == 0)
                            <input type="radio" name="support" value="0" checked>隠す
                            <input type="radio" name="support"  value="1">表示する
                            @else
                            <input type="radio" name="support" value="0" >隠す
                            <input type="radio" name="support"  value="1"checked>表示する
                            @endif
                        </tr>
                    </div>
                <div class="horizon">
                    <div class="box1">
                        @if($lost->mon1==0)
                        月曜日 朝6～12時
                        <input type="radio" name="mon1" value="0" checked>連絡先①
                        <input type="radio" name="mon1"  value="1">連絡先②
                        @else
                        月曜日 朝6～12時
                        <input type="radio" name="mon1" value="0" >連絡先①
                        <input type="radio" name="mon1"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box2">
                        @if($lost->mon2==0)
                        月曜日 昼12~19時
                        <input type="radio" name="mon2" value="0" checked>連絡先①
                        <input type="radio" name="mon2"  value="1">連絡先②
                        @else
                        月曜日 昼12~19時
                        <input type="radio" name="mon2" value="0" >連絡先①
                        <input type="radio" name="mon2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->mon3==0)
                        月曜日 夜19～6時
                        <input type="radio" name="mon3" value="0" checked>連絡先①
                        <input type="radio" name="mon3"  value="1">連絡先②
                        @else
                        月曜日 夜19～6時
                        <input type="radio" name="mon3" value="0" >連絡先①
                        <input type="radio" name="mon3"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box1">
                        @if($lost->tue1==0)
                        火曜日 朝6～12時
                        <input type="radio" name="tue1" value="0" checked>連絡先①
                        <input type="radio" name="tue1"  value="1">連絡先②
                        @else
                        火曜日 朝6～12時
                        <input type="radio" name="tue1" value="0" >連絡先①
                        <input type="radio" name="tue1"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box2">
                        @if($lost->tue2==0)
                        火曜日 昼12~19時
                        <input type="radio" name="tue2" value="0" checked>連絡先①
                        <input type="radio" name="tue2"  value="1">連絡先②
                        @else
                        火曜日 昼12~19時
                        <input type="radio" name="tue2" value="0" >連絡先①
                        <input type="radio" name="tue2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->tue3==0)
                        火曜日 夜19～6時
                        <input type="radio" name="tue3" value="0" checked>連絡先①
                        <input type="radio" name="tue3"  value="1">連絡先②
                        @else
                        火曜日 夜19～6時
                        <input type="radio" name="tue3" value="0" >連絡先①
                        <input type="radio" name="tue3"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box1">
                        @if($lost->wed1==0)
                        水曜日 朝6～12時
                        <input type="radio" name="wed1" value="0" checked>連絡先①
                        <input type="radio" name="wed1"  value="1">連絡先②
                        @else
                        水曜日 朝6～12時
                        <input type="radio" name="wed1" value="0" >連絡先①
                        <input type="radio" name="wed1"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box2">
                        @if($lost->wed2==0)
                        水曜日 昼12~19時
                        <input type="radio" name="wed2" value="0" checked>連絡先①
                        <input type="radio" name="wed2"  value="1">連絡先②
                        @else
                        水曜日 昼12~19時
                        <input type="radio" name="wed2" value="0" >連絡先①
                        <input type="radio" name="wed2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->wed3==0)
                        水曜日 夜19～6時
                        <input type="radio" name="wed3" value="0" checked>連絡先①
                        <input type="radio" name="wed3"  value="1">連絡先②
                        @else
                        水曜日 夜19～6時
                        <input type="radio" name="wed3" value="0" >連絡先①
                        <input type="radio" name="wed3"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box1">
                        @if($lost->thu1==0)
                        木曜日 朝6～12時
                        <input type="radio" name="thu1" value="0" checked>連絡先①
                        <input type="radio" name="thu1"  value="1">連絡先②
                        @else
                        木曜日 朝6～12時
                        <input type="radio" name="thu1" value="0" >連絡先①
                        <input type="radio" name="thu1"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box2">
                        @if($lost->thu2==0)
                        木曜日 昼12~19時
                        <input type="radio" name="thu2" value="0" checked>連絡先①
                        <input type="radio" name="thu2"  value="1">連絡先②
                        @else
                        木曜日 昼12~19時
                        <input type="radio" name="thu2" value="0" >連絡先①
                        <input type="radio" name="thu2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->thu3==0)
                        木曜日 夜19～6時
                        <input type="radio" name="thu3" value="0" checked>連絡先①
                        <input type="radio" name="thu3"  value="1">連絡先②
                        @else
                        木曜日 夜19～6時
                        <input type="radio" name="thu3" value="0" >連絡先①
                        <input type="radio" name="thu3"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box1">
                        @if($lost->fri1==0)
                        金曜日 朝6～12時
                        <input type="radio" name="fri1" value="0" checked>連絡先①
                        <input type="radio" name="fri1"  value="1">連絡先②
                        @else
                        金曜日 朝6～12時
                        <input type="radio" name="fri1" value="0" >連絡先①
                        <input type="radio" name="fri1"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box2">
                        @if($lost->fri2==0)
                        金曜日 昼12~19時
                        <input type="radio" name="fri2" value="0" checked>連絡先①
                        <input type="radio" name="fri2"  value="1">連絡先②
                        @else
                        金曜日 昼12~19時
                        <input type="radio" name="fri2" value="0" >連絡先①
                        <input type="radio" name="fri2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->fri3==0)
                        金曜日 夜19～6時
                        <input type="radio" name="fri3" value="0" checked>連絡先①
                        <input type="radio" name="fri3"  value="1">連絡先②
                        @else
                        金曜日 夜19～6時
                        <input type="radio" name="fri3" value="0" >連絡先①
                        <input type="radio" name="fri3"  value="1"checked>連絡先②
                        @endif
                    </div>
                      <div class="box1">
                        @if($lost->sat1==0)
                        土曜日 朝6～12時
                        <input type="radio" name="sat1" value="0" checked>連絡先①
                        <input type="radio" name="sat1"  value="1">連絡先②
                        @else
                        土曜日 朝6～12時
                        <input type="radio" name="sat1" value="0" >連絡先①
                        <input type="radio" name="sat1"  value="1"checked>連絡先②
                        @endif
                      </div>
                    <div class="box2">
                        @if($lost->sat2==0)
                        土曜日 昼12~19時
                        <input type="radio" name="sat2" value="0" checked>連絡先①
                        <input type="radio" name="sat2"  value="1">連絡先②
                        @else
                        土曜日 昼12~19時
                        <input type="radio" name="sat2" value="0" >連絡先①
                        <input type="radio" name="sat2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->sat3==0)
                        土曜日 夜19～6時
                        <input type="radio" name="sat3" value="0" checked>連絡先①
                        <input type="radio" name="sat3"  value="1">連絡先②
                        @else
                        土曜日 夜19～6時
                        <input type="radio" name="sat3" value="0" >連絡先①
                        <input type="radio" name="sat3"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box1">
                        @if($lost->sun1==0)
                        日曜日 朝6～12時
                        <input type="radio" name="sun1" value="0" checked>連絡先①
                        <input type="radio" name="sun1"  value="1">連絡先②
                        @else
                        日曜日 朝6～12時
                        <input type="radio" name="sun1" value="0" >連絡先①
                        <input type="radio" name="sun1"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box2">
                        @if($lost->sun2==0)
                        日曜日 昼12~19時
                        <input type="radio" name="sun2" value="0" checked>連絡先①
                        <input type="radio" name="sun2"  value="1">連絡先②
                        @else 日曜日 昼12~19時
                        <input type="radio" name="sun2" value="0" >連絡先①
                        <input type="radio" name="sun2"  value="1"checked>連絡先②
                        @endif
                    </div>
                    <div class="box3">
                        @if($lost->sun3==0)
                        日曜日 夜19～6時
                        <input type="radio" name="sun3" value="0" checked>連絡先①
                        <input type="radio" name="sun3"  value="1">連絡先②
                        @else
                        日曜日 夜19～6時
                        <input type="radio" name="sun3" value="0" >連絡先①
                        <input type="radio" name="sun3"  value="1"checked>連絡先②
                        @endif
                    </div>
                </div>
                    <div class="button"><input type="submit" value="更新">
                        <h4>更新ボタンを押さないと変更されません</h4>
                    </div>

            </div>
        </form>

        @endif

        </div>
    </div>
</div>

@endsection
