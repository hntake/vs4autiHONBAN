

@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">VS4申込</div>

                    @isset($message)
                        <div class="card-body">
                            {{$message}}
                        </div>
                    @endisset

                    @empty($message)
                    <div class="card-body">
                            <form method="POST" action="{{ route('vs4.check') }}">
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
