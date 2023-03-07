<td ><div>
    <img src="{{ asset('img/sample1.png') }}" alt="image" style="width: 560px; height: auto;">
</div>
    <button onclick="readAloud1()" id="text" style="color:red;font-weight:bold;font-size:25px; padding:7px;" > <img src="{{ asset('img/ear.png') }}" alt="image" style="width: 160px; height: auto;" ></button>
    <button onclick="readAloud2()" id="text" style="color:red;font-weight:bold;font-size:25px; padding:7px;" > <img src="{{ asset('img/caution-sign.png') }}" alt="image" style="width: 160px; height: auto;"></button>
</td>

<script>
        function readAloud1() {
          // 発言を作成
        const uttr = new SpeechSynthesisUtterance("おみずをいれる")
        // 発言を再生 (発言キューに発言を追加)
        speechSynthesis.speak(uttr)


            // 言語を設定
            uttr.lang = "ja-JP"

              // 速度を設定
            uttr.rate = 1

            // 高さを設定
            uttr.pitch = 1

            // 音量を設定
            uttr.volume = 1



            }
</script>
<script>
    function readAloud2() {
        // 発言を作成
        const uttr = new SpeechSynthesisUtterance("せんまでいれる")
        // 発言を再生 (発言キューに発言を追加)
        speechSynthesis.speak(uttr)


    // 言語を設定
    uttr.lang = "ja-JP"
     // 速度を設定
     uttr.rate = 1

        // 高さを設定
        uttr.pitch = 1

        // 音量を設定
uttr.volume = 1



            }
</script>
