vs4auti年間プランの申し込みを受け付けました。<br>
<br>
■メールアドレス<br>
{!! $email !!}<br>
<br>
■お名前<br>
{!! $name !!}<br>
■電話番号<br>
{!! $phone !!}<br>
<br>
@if(isset($body))
■質問内容<br>
{!! nl2br($body) !!}<br>
@endif
