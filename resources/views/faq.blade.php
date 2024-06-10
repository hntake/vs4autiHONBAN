<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.5,maximum-scale=2.0,user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/faq.css') }}" rel="stylesheet">
    <script src="according.js"></script>
</head>
<title>FAQ "VS4視覚支援ツール”</title>

<body>
    <h1 style="margin: 30px 0; text-align: center;">FAQ</h1>
    <div class="category">
        <h2 style="margin: 30px 0; text-align: center;">カテゴリー</h2>
        <ul>
            <li><a href="#index1">登録について</a></li>
            <li><a href="#index2">ログインについて</a></li>
            <li><a href="#index2">お守りバッジについて</a></li>
            <li><a href="#index3">スケジュールについて</a></li>
            <li><a href="#index4">アカウント情報</a></li>
            <li><a href="#index5">支払いについて</a></li>
        </ul>
    </div>
    <h2><a id="index1">登録について</a></h2>
    <ul class="accordion-area">
        <li>
            <section>

                <h2 class="title"><a id="index">Q.登録後の認証メールが来ない</a></h2>
                <div class="box">
                    <p>1.迷惑メールとなっている場合があります。ご確認ください。</p>
                    <p>2.docomo、au、softbankなど各キャリアのセキュリティ設定により受信拒否と認識されているか、迷惑メール対策などでドメイン指定受信を設定している場合に、メールが正しく届かないことがございます。@itcha50.comからのメールを受信できるようにしてください。</p>
                    <p>3.gmailやyahooメールなどで登録すると以上のような問題が生じません。指定受信の設定が難しい場合はこちらでの再設定をお薦め致します。</p>
                </div>
                <h2 class="title">Q.メールアドレスは正しいのに登録できない</h2>
                <div class="box">
                    <p>登録にはメール認証が必要です。</p>
                    <p>docomo、au、softbankなど各キャリアのセキュリティ設定により受信拒否と認識されているか、迷惑メール対策などでドメイン指定受信を設定している場合に、メールが正しく届かないことがございます。@gmail.comドメインからのメールを受信できるようにしてください。</p>
                    <p>gmailやyahooメールなどで登録すると以上のような問題が生じません。指定受信の設定が難しい場合はこちらでの再設定をお薦め致します。</p>
                </div>
            </section>
        </li>
        <h2><a id="index2">ログインについて</a></h2>
        <li>
            <section>
                <h2 class="title">Q.登録したメールアドレスがわからない</h2>
                <div class="box">
                    <p>個別の対応が必要となります。お問い合わせフォームよりご相談ください。</p>
                    <a href="{{ route('contact.index') }}" class="button" style="font-size: 1.0rem; font-weight: 700;letter-spacing: normal;text-decoration: none;color: green;">こちらをクリック</a>
                </div>
                <h2 class="title">Q.パスワードがわからない</h2>
                <div class="box">
                    <p>ログイン画面のパスワードリセットボタンを押す→登録メールアドレスを入力→メールを確認してパスワードリセットサイトへ移動する</p>
                </div>
                <h2 class="title">Q.パスワードリセットメールが来ない</h2>
                <div class="box">
                    <p>登録の際に認証メールから確認している場合→迷惑メールBOXをご確認ください。</p>
                    <p>登録の際に認証メールから確認していない場合→登録できていません。<a href="#index">"登録後の認証メールが来ない"を参照してください</a></p>
                </div>
            </section>
        </li>
        <h2><a id="index2">お守りバッジについて</a></h2>
        <li>
            <section>
                <h2 class="title">Q.登録情報を変更したい</h2>
                <div class="box">
                    <p>ログインをすると表示されるページ(マイページ)下部にある登録情報編集画面へをクリックして編集画面へ移動する</p>
                    <a href="{{ route('my_page') }}" class="button" style="font-size: 1.0rem; font-weight: 700;letter-spacing: normal;text-decoration: none;color: green;">マイページへ移動</a>
                </div>
                <h2 class="title">Q.パスワードを変更したい</h2>
                <div class="box">
                    <p>ログインをすると表示されるページ(マイページ)下部にあるパスワード変更画面へをクリックします</p>
                    <a href="{{ route('my_page') }}" class="button" style="font-size: 1.0rem; font-weight: 700;letter-spacing: normal;text-decoration: none;color: green;">マイページへ移動</a>
                </div>
                <h2 class="title">Q.バッジを紛失したのでサービスを止めたい</h2>
                <div class="box">
                    <p>ログインをすると表示されるページ上部にある”紛失の為にサービスを停止する”をクリックし、次のページでも”停止する”をクリックする</p>
                </div>

                <h2 class="title">Q.本当に必要なとき迄、電話番号を隠しておきたい</h2>
                <div class="box">
                    <p>ログインをすると表示されるページ上部にある”サービスを一時停止する”をクリックし、次のページでも”一時停止する”をクリックする</p>
                </div>
                <h2 class="title">Q.サービスを再開したい</h2>
                <div class="box">
                    <p>ログインをすると表示されるページ上部にある”サービスを再開する”をクリックし、次のページでも”再開する”をクリックする</p>
                </div>

                <h2 class="title">Q.メールアドレスも電話番号も登録していないが、バッジ利用者が行方不明になった場合に何か協力してもらえますか？</h2>
                <div class="box">
                    <p>QRコードへのアクセスがあれば、その日時とIPアドレスの情報は確保出来ます。こちらまでお問い合わせください。可能な限り早急に対応させていただきます。</p>
                </div>
                <h2 class="title">Q.返品をしたい</h2>
                <div class="box">
                    <p>システムが機能しない場合は、じんそくに対応させていただきます。また、デザイン等ご注文と異なる商品が届いた場合又は商品に欠陥がある場合を除き、返品には応じません。</p>
                </div>
            </section>
        </li>
        <h2><a id="index3">スケジュールについて</a></h2>
        <li>
            <section>
                <h2 class="title">Q.自分の作ったスケジュールはどこにある？</h2>
                <div class="box">
                    <p>保存リストにいくと自分の作成したスケジュールがリストされています。</p>
                </div>
                <h2 class="title">Q.自分の作ったスケジュールに間違いがあった</h2>
                <div class="box">
                    <p>保存リストにて個々のスケジュールを編集できます。</p>
                </div>
                <h2 class="title">Q.同じスケジュールを作ってしまった</h2>
                <div class="box">
                    <p>Myページ内にて作成したスケジュールを削除できます。</p>
                </div>
            </section>
        </li>
        <h2><a id="index4">アカウント情報</a></h2>
        <li>
            <section>
                <h2 class="title">Q.自分の情報を一部残して、他は削除したい</h2>
                <div class="box">
                <p>個別の対応が必要となります。お問い合わせフォームよりご相談ください。</p>
                    <a href="{{ route('contact.index') }}" class="button" style="font-size: 1.0rem; font-weight: 700;letter-spacing: normal;text-decoration: none;color: green;">こちらをクリック</a>
                </div>
                <h2 class="title">Q.退会し、全ての登録情報を削除したい</h2>
                <div class="box">
                    <p>マイページの最下部に登録削除ページへの遷移ボタンがあるので、そちらから削除してください。</p>
                </div>
                <h2 class="title">Q.サブスクプランをキャンセルしたい。</h2>
                <div class="box">
                    <p>支払い情報ページよりキャンセルできます。</p>
                    <a href="img/cancel1.png" data-lightbox="group"><img src="img/cancel1.png" alt="cancel1" style="width:20%;"></a>
                    <a href="img/cancel2.png" data-lightbox="group"><img src="img/cancel2.png" alt="cancel2" style="width:20%;"></a>
                    <a href="img/cancel3.png" data-lightbox="group"><img src="img/cancel3.png" alt="cancel3" style="width:20%;"></a>
                    <p>※詳細は画像をクリックして拡大してみてください</p>
                </div>

                <h2 class="title">Q.退会後の写真や個人情報は？</h2>
                <div class="box">
                    <p>速やかにすべての情報が削除されます。</p>
                </div>
                <h2 class="title">Q.支払期限の期日を知りたい。</h2>
                <div class="box">
                    <p>支払い情報ページよりトライアル終了日を確認できます。</p>
                </div>
            </section>
        </li>
        <h2><a id="index5">支払いについて</a></h2>
        <li>
            <section>
                <h2 class="title">Q.支払い情報を見たい</h2>
                <div class="box">
                    <p>支払い情報ページにあるStripeポータルサイトへアクセスしてください。<br></p>
                </div>

            </section>

        </li>
    </ul>
    <footer>
        <p>© All rights reserved by IT2U</p>
        <div class="contact">
            <h3>
                お問い合わせ・ご質問はこちら迄
                <a href="{{ route('contact.index') }}" class="button" style="font-size: 1.0rem; font-weight: 700;letter-spacing: normal;text-decoration: none;color: blue;">Contact us</a>
            </h3>
        </div>
        <div class="left">
            <div class="policy">
                <a href="{{ url('policy') }}" class="button">プライバシーポリシー</a>
            </div>
            <div class="terms">
                <a href="{{ url('rule') }}" class="button">利用規約</a>
            </div>
            <div class="terms">
                <a href="{{ url('aboutus') }}" class="button">About Us</a>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/9-2-1/js/9-2-1.js"></script>
    <script src="according.js"></script>
    <a href="#" class="gotop">トップへ</a>
</body>
