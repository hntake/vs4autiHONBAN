@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/design.css') }}"> <!-- home.cssと連携 -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="{{ route('design_original') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <h3>オリジナルの画像を使う</h3>
                    <input type="file" name="image" id="image" class="form-control">
                    <div class="create-button">
                        <div class="button">
                            <button type="submit">
                                <i class="fa fa-plus"></i> 送信する
                            </button>
                        </div>
                    </div>
                </form>
                <h6>当サイトでは、バッジを作成する際に、お客様がアップロードする画像が著作権侵害に該当する場合があります。著作権侵害になる可能性がある画像は、商標、ロゴ、アート、キャラクター、写真、映像などです。<br>
                <br>
                当サイトでは著作権の尊重と遵守を徹底しており、お客様がアップロードした画像については十分に確認しておりますが、万が一、著作権侵害に該当する場合は、オリジナルグッズの作成をお断りさせていただく場合がございます。
                <br>  <br>
                お客様自身で著作権侵害になる可能性がある画像をアップロードしないようにお願いいたします。万が一、著作権侵害に該当する場合は、当店では一切の責任を負いかねますので、あらかじめご了承ください。</h6>
            </div>
        </div>
    </div>
</div>
@endsection