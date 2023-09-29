<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>とっとと減税！〜私達の買い控えリスト</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.5,maximum-scale=2.0,user-scalable=yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/tax.css') }}"> <!-- word.cssと連携 -->

</head>
<body>
    <div class="wrap">
        <div class="top">
            <h2>消費税廃止や減税になったら世間に流れるお金の合計</h2>
            <h4>{{$date}}時点</h4>
            <h2 style="color:#eb7589;"><button onclick="readAloud1()" id="text" style="color:red;font-weight:bold;font-size:25px; padding:7px;" ><?php echo number_format($total); ?>円</button></h2>
            <p>※金額をクリックすると読み上げてくれます</p>

            <h2>登録件数</h2>
            <h2>{{$counts}}</h2>
            <div class="header_nav_itm">
                                <a href="{{ url('tax/input') }}" class="header_nav_itm_link">他にも入力してみる</a>
                                <div class="description1">いますぐ減税！</div>
            </div>
        </div>
        <div class="list">
            <table>

                <thead>
                        <th>ハンドルネーム</th>
                        <th>商品名</th>
                        <th>金額</th>
                </thead>
            @foreach ($taxes as $tax)

                        <tr>
                            <td>{{ $tax->name }}</td>
                    
                            <td>{{ $tax->goods }}</td>
                    
                            <td><?php echo number_format($tax->price); ?>円</td>
                        </tr>
                            @endforeach
            </table>
          
            {{ $taxes->links() }}
        </div>
    </div>
    <script>
            function readAloud1() {
            // テキストを取得
            const text = document.getElementById("text").value

            // ブラウザにWeb Speech API Speech Synthesis機能があるか判定
            if ('speechSynthesis' in window) {

            // 発言を設定
            const uttr = new SpeechSynthesisUtterance()

            // テキストを設定
            uttr.text = '{{ $total}}'

            // 言語を設定
            uttr.lang = 'ja-JP';

            

            // 発言を再生
            window.speechSynthesis.speak(uttr)

            }
            }
    </script>
</body>
</html>
