

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">本会員登録</div>

                    @isset($message)
                        <div class="card-body">
                            {{$message}}
                        </div>
                    @endisset

                    @empty($message)
                        <div class="card-body">
                            @if($user->type==0)
                            <form method="POST" action="{{ route('register.main.check') }}">
                                @csrf
                                <div class="box" style="margin-bottom: 10px; background-color:#87CEFA ;padding: 0 20px;">
                                    ※性別を選択してください<br>
                                    <label for="gender">
                                        男の子<input id="gender" type="radio" name="gender" value="boy" ><br>
                                    </label>
                                    <label for="gender">
                                        女の子<input id="gender" type="radio" name="gender" value="girl"><br>
                                    </label>
                                </div>

                                <div class="box" style="margin-bottom: 10px; background-color:#ADD8E6 ; padding: 0 20px;">
                                    ※完了マークを選択してください<br>
                                    <label for="image_id2">
                                        1.<img src="{{asset('img/hana.png')}}"><input id="image_id2" type="radio" name="image_id" value="2" ><br>
                                    </label>
                                    <label for="image_id3">
                                        2.<img src="{{asset('img/smile.png')}}"><input id="image_id3" type="radio" name="image_id" value="3"><br>
                                    </label>
                                    <label for="image_id1">
                                        3.<img src="{{asset('img/check.png')}}"><input id="image_id1" type="radio" name="image_id" value="1"><br>
                                    </label>
                                </div>
                                <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    確認画面へ
                                </button>
                            </div>
                        </div>
                        </form>

                                @elseif($user->type==1)
                                <form method="POST" action="{{ route('register.main.check') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">名前 ※必須</label>
                                    <div class="col-md-6">
                                        <input
                                            id="name" type="text"
                                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" value="{{ old('name') }}" required>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name_pronunciation"
                                           class="col-md-4 col-form-label text-md-right">フリガナ ※必須</label>

                                    <div class="col-md-6">
                                        <input id="name_pronunciation" type="text"
                                               class="form-control{{ $errors->has('name_pronunciation') ? ' is-invalid' : '' }}"
                                               name="name_pronunciation" value="{{ old('name_pronunciation') }}"
                                               required>

                                        @if ($errors->has('name_pronunciation'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name_pronunciation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tel1"
                                           class="col-md-4 col-form-label text-md-right">連絡先① ※必須</label>

                                    <div class="col-md-6">
                                        <input id="tel1" type="text"
                                               class="form-control{{ $errors->has('tel1') ? ' is-invalid' : '' }}"
                                               name="tel1" value="{{ old('tel1') }}"
                                               required>

                                        @if ($errors->has('tel1'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('tel1') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tel2"
                                           class="col-md-4 col-form-label text-md-right">連絡先②</label>

                                    <div class="col-md-6">
                                        <input id="tel2" type="text"
                                               class="form-control{{ $errors->has('tel2') ? ' is-invalid' : '' }}"
                                               name="tel2" value="{{ old('tel2') }}"
                                               >

                                        @if ($errors->has('tel2'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('tel2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address"
                                           class="col-md-4 col-form-label text-md-right">住所</label>

                                    <div class="col-md-6">
                                        <p>郵便番号：<input id="zip" type="text" name="zip" size="7">例:1020072（半角数字）</p>
                                        <button class="api-address" type="button">住所を自動入力</button>
                                        <p>住所:
                                        <input id="address" type="text"
                                               class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                               name="address" value="{{ old('address') }}"
                                               >

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
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
                                        <div class="col-md-6">
                                            <select name="mon1">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="mon2">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="mon3">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >火曜日</label>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="tue1">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="tue2">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="tue3">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >水曜日</label>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="wed1">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="wed2">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="wed3">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >木曜日</label>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="thu1">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="thu2">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="thu3">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >金曜日</label>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="fri1">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="fri2">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="fri3">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >土曜日</label>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="sat1">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="sat2">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="sat3">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label >日曜日</label>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="sun1">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="sun2">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-6">
                                            <select name="sun3">
                                            @foreach(config('zone') as $key => $hour)
                                                <option value="{{ $key }}">{{ $hour }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </div>
                </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    確認画面へ
                                </button>
                            </div>
                        </div>
                        </form>
                        @endif
                </div>
                @endempty
            </div>
        </div>
    </div>
    </div>
    <script>
    //イベントリスナの設置：ボタンをクリックしたら反応する
    document.querySelector('.api-address').addEventListener('click', () => {
        //郵便番号を入力するテキストフィールドから値を取得
        const elem = document.querySelector('#zip');
        const zip = elem.value;
        //fetchでAPIからJSON文字列を取得する
        fetch('../api/address/' + zip)
            .then((data) => data.json())
            .then((obj) => {
                //郵便番号が存在しない場合，空のオブジェクトが返ってくる
                //オブジェクトが空かどうかを判定
                if (!Object.keys(obj).length) {
                    //オブジェクトが空の場合
                    txt = '住所が存在しません。'
                } else {
                    //オブジェクトが存在する場合
                    //住所は分割されたデータとして返ってくるので連結する
                    txt = obj.pref + obj.city + obj.town;
                }
                //住所を入力するテキストフィールドに文字列を書き込む
                document.querySelector('#address').value = txt;
            });
    });
</script>
@endsection
