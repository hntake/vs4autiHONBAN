<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>newsite</title>
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('../css/blog.css') }}">

<!-- Quill -->
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

</head>
<body>
    <div class="wrapper">
    <div class="header"><h1>NEWS投稿ページ</h1></div>
    <div class="content_wrapper">
    <div class="content2">

    <form action="/news_post" method="post" name="ansform" enctype="multipart/form-data">
   @csrf
   <p>

	<label for="inq1"><input type="radio" id="inq1" name="category" value="7" >サービス</label>
	<label for="inq2"><input type="radio" id="inq2" name="category" value="8">メンテナンス</label>
	<label for="inq3"><input type="radio" id="inq3" name="category" value="9">リリース</label>
	<label for="inq4"><input type="radio" id="inq4" name="category" value="6">その他</label>
</p>
   <p>タイトル</p>
   <input type="text" name="title" class="formtitle">
   <p>&nbsp;</p>
   <p>本文</p>
   <div id="editor" style="height: 200px;"></div>
   <input type="hidden" name="main">



   <p>&nbsp;</p>
   <input type="submit" class="submitbtn" name="subbtn">
</form>

    </div>
    </div>
    </div>

    <script>
    var quill = new Quill('#editor', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                [{'color': []}, {'background': []}],
                ['link', 'blockquote', 'image', 'video'],
                [{ list: 'ordered' }, { list: 'bullet' }]
     ]
  },
  placeholder: 'Write your question here...',
  theme: 'snow'
});
// 回答フォームを送信
document.ansform.subbtn.addEventListener('click', function() {
// Quillのデータをinputに代入
document.querySelector('input[name=main]').value = document.querySelector('.ql-editor').innerHTML;
// 送信
document.ansform.submit();
});
</script>

</body>
</html>
