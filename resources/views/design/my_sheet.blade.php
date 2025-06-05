<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>障がい者アーティストページ｜本人のみ閲覧ページ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="障がい者アートの魅力を探求するプラットフォーム。アーティストの感動的な作品やストーリーを通じて、多様性と創造性を称賛します。">
    <meta name="keywords" content="障がい者アート,アートプロジェクト,アートコミュニティ,多様性,創造性">
    <meta name="author" content="IT2U">
    <meta name="robots" content="index, follow">

    <link rel="shortcut icon" href="{{ asset('/racoon.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

    <link rel="stylesheet" href="{{ asset('css/artist.css') }}">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962" crossorigin="anonymous"></script>

</head>
<body>

    <header>
        <h1>障がい者アーティストページ｜本人のみ閲覧ページ</h1>
    </header>
    <h2>個人情報（編集可能）</h2>

    <section class="profile">
        <div class="card-body">
                    <div class="form-group row">

                        <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                        <div class="col-md-6">
                            <span class="">{{$user->email}}</span>
                            <input type="hidden" name="email" value="{{$user->email}}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
                            <div class="col-md-6">
                                <span class="">{{$artist->name}}</span>
                                <input type="hidden" name="name" value="{{$artist->name}}">
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="name_pronunciation" class="col-md-4 col-form-label text-md-right">フリガナ</label>
                            <div class="col-md-6">
                                <span class="">{{$artist->name_pronunciation}}</span>
                                <input type="hidden" name="name_pronunciation" value="{{$artist->name_pronunciation}}">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">住所</label>
                        <div class="col-md-6">
                            <span class="">{{$artist->address}}</span>
                            <input type="hidden" name="address" value="{{$artist->address}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tel1" class="col-md-4 col-form-label text-md-right">連絡先①</label>
                        <div class="col-md-6">
                            <span class="">{{$artist->tel1}}</span>
                            <input type="hidden" name="tel1" value="{{$artist->tel1}}">
                        </div>
                    </div>
        </div>
        <div class="my_image">
            @if(isset($artist->image))
            <img src="{{asset('storage/' . $artist->image)}}">
            @else
            <img src="{{asset('img/icon_man.png')}}">
            @endif
        </div>
    </section>
    <nav>
        <button><a href="{{ url('design/post_select') }}">作品アップロード画面へ</a></button>
        <button><a href="{{ route('edit_user',['id'=> $user->id]) }}">登録情報編集画面へ</a></button>
        <button><a href="{{ route('edit_image') }}">プロフィール画像編集画面へ</a></button>
        <button><a href="{{ route('password') }}">パスワード変更画面へ</a></button>
        <button><a href="{{ url('delete') }}">登録削除画面へ</a></button>
        <button><a href="{{ url('design/list') }}">障がい者アートトップページ</a></button>

    </nav>
    <section>
        <h2>作品一覧</h2>
        <div class="list" style="display:grid;">
        @foreach ($designs as $design)
                <div class="card-header" >
                    <table >
                        <tr>
                        @if($design->license==0)
                        <td><a href="{{route('design_select',['id'=>$design->id])}}" ><img src="{{ asset('storage/' . $design->image) }}" alt="image" ></a></td>
                        @else
                        <td><a href="{{route('design_select',['id'=>$design->id])}}" ><img src="{{ asset('storage/' . $design->image_with_artist_name) }}" alt="image" ></a></td>
                        @endif
                        </tr>
                    </table>
                </div>
                <div class="detail-card">    
                    <tr>
                        <td>ダウンロード数:{{$design->downloaded}}</td>
                        <td><a href="{{ route('design_delete_index',['id'=>$design->id]) }}">画像削除</a></td>
                    </tr>
                </div>
        @endforeach
        </div>
        <div class="pagination">
        {{ $designs->links() }}
        </div>
    </section>
    <section>
        <div class="download_list">
            <div class="dl_web">
                <h2>ダウンロード情報</h2>
                <table>
                    <thead>
                            <th>作品名</th>
                            <th>金額</th>
                            <th>日時</th>
                    </thead>
                    @foreach ($downloads as $download)
                        <tr>
                            <td>{{ $download->designName }}</td>
                            <td>{{ $download->price }}</td>
                            <td>{{ $download->created_at }}</td>
                        </tr>
                    @endforeach
                    <div class="pagination">
                        {{ $downloads->links('pagination::simple-bootstrap-4', ['prev_text' => '前へ', 'next_text' => '次へ']) }}
                        {{ $downloads->links() }}
                    </div>
                </table>
                @if(isset($badges) && count($badges) > 0)
                <h2>バッジ売り上げ</h2>
                <table>
                    <thead>
                            <th>作品名</th>
                            <th>金額</th>
                            <th>日時</th>
                    </thead>
                    @foreach ($badges as $badge)
                        <tr>
                            <td>{{ $badge->designName }}</td>
                            <td>¥50</td>
                            <td>{{ $badge->created_at }}</td>
                        </tr>
                    @endforeach
                    <div class="pagination">
                        {{ $badges->links('pagination::simple-bootstrap-4', ['prev_text' => '前へ', 'next_text' => '次へ']) }}
                        {{ $badges->links() }}
                    </div>
                </table>
                @endif
            </div>
            <div class="dl_sp">
                <h2>ダウンロード情報</h2>
                <table>
                    @foreach ($downloads as $download)
                        <tr>
                            <td>作品名:{{ $download->designName }}</td>
                            <td>金額:{{ number_format($download->price) }}円</td>
                            <td>購入日時:{{ $download->created_at->format('Y/m/d') }}</td>
                        </tr>
                    @endforeach
                    <div class="pagination">
                    {{ $downloads->links('pagination::simple-bootstrap-4', ['prev_text' => '前へ', 'next_text' => '次へ']) }}
                    {{ $downloads->links() }}

                    </div>
                </table>
                @if(isset($badges) && count($badges) > 0)
                <h2>バッジ売り上げ</h2>
                <table>
                    @foreach ($badges as $badge)
                        <tr>
                            <td>作品名:{{ $badge->designName }}</td>
                            <td>金額:50円</td>
                            <td>購入日時:{{ $badge->created_at->format('Y/m/d') }}</td>
                        </tr>
                    @endforeach
                    <div class="pagination">
                    {{ $badges->links('pagination::simple-bootstrap-4', ['prev_text' => '前へ', 'next_text' => '次へ']) }}
                    {{ $badges->links() }}

                    </div>
                </table>
                @endif
            </div>
                <table>
                    <tr>
                        @if(isset( $total->total_price))
                        <td>これまで購入された総額 :<span style="font-weight:bold;">{{ $total->total_price }}円</span></td>
                        @else
                        <td>これまで購入された総額 :<span style="font-weight:bold;">0円</span></td>
                        @endif
                    </tr>
                    <tr>
                        <td>手数料総額 :<span style="font-weight:bold;">{{ $cost }}円</span></td>
                    </tr>
                    <tr>
                        <td>売上総額 :<span style="font-weight:bold;">{{ $artist->paid + $artist->unpaid }}円</span></td>
                    </tr>
                    <tr>
                        <td>送金申請済み総額 :<span style="font-weight:bold;">{{ $artist->paid }}円</span></td>
                    </tr>
                    <tr>
                        <td>未払い済み残高 :<span style="font-weight:bold;">{{ $artist->unpaid }}円</span></td>
                    </tr>
                    <tr>
                        <td>受取総額(売上総額より送金申請済み総額を引いたもの)<span style="font-weight:bold; color:red;">{{ $artist->unpaid}}円</span><br>こちらから振込手数料52円もしくは150円が引かれます（金融機関により異なります）</td>
                    </tr>
                    <td><a href="{{route('design_pay')}}">送金申込 (受取総額が2000円以上になったら申し込めます)</a></td>
                    </tr>
                </table>
                <p>銀行への振込手数料は予告なしに変更される場合がございます。予めご了承ください。何かご不明点がございましたら、お気軽にお問い合わせください。</p>
        </div>
    </section>
    <section>
        <h2>お問い合わせ</h2>
        <p>ご質問やお問い合わせがあれば、以下の連絡先までお気軽にご連絡ください。</p>
        <address>
            ボランティア団体IT2U<br>
            電話：[連絡先電話番号070-4225-0615]<br>
            メール：[info@itcha50.com]
        </address>
    </section>

    <footer>
        <p><a href="https://itcha50.com/design/list">&copy; IT2U 障がい者アート共有サイト</a></p>
    </footer>

</body>
</html>
