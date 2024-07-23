<!-- choices.php -->
<link rel="stylesheet" href="{{ asset('css/schedule.css') }}"> <!-- schedule.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/choice.css') }}"> <!-- schedule.cssと連携 -->

<form action="{{route('choice')}}" method="post" >
    @csrf
<h2>デザインを一つ選んでください</h2>

  <label>
    <input type="radio" name="design" value="1" checked>
    <img src="img/bird-black.png" alt="Choice 1" >
  </label>
  <label>
    <input type="radio" name="design" value="2">
    <img src="img/flower-purple.png" alt="Choice 2">
  </label>
  <label>
    <input type="radio" name="design" value="3">
    <img src="img/can_see.png" alt="Choice 3">
  </label>
  <label>
    <input type="radio" name="design" value="4">
    <img src="img/butterfly.png" alt="Choice 4">
  </label>
  <label>
    <input type="radio" name="design" value="5" >
    <img src="img/plain-black.png" alt="Choice 5" >
  </label>
  
  <div class="button">
      <button type="submit">選択する</button>
  </div>
</form>
<a href="{{route('design_original')}}">
    <input type="hidden" name="design" value="8"style="margin-top:80px;">
    <h2>オリジナル画像で作る<br>（追加料金:300円）</h2>
</a>