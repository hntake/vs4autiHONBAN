<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>削除ページ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="width:80%; margin:0 auto;">
    <p class="text-center mt-5">登録を完全に削除する</p>
    <p class="text-center mt-5">あなたが登録した個人情報、保存したスケジュール、写真のすべてが削除されます。</p>
    <div class="top"style="text-align: center;
}">
  <form action="{{ url('delete') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="button">
                    <button type="submit" id="mybtn">
                        <i class="fa fa-plus"></i> 削除する
                    </button>
            </div>
        </form>
        <br>
            <div class="button">
                <a href="{{ url('my_page') }}">
                            <i class="fa fa-plus"></i> 削除しない(マイページに戻る)
                </a>
            </div>
    </div>

    <script>
function butotnClick(){
    alert('本当に削除しますか？');
}

let button = document.getElementById('mybtn');
button.addEventListener('click', butotnClick);
</script>
</body>
</html>
