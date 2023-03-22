<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use Illuminate\Support\Facades\Auth;


class FormController extends Controller
{
/*お知らせ作成ページへ*/
public function news (Request $request){
    $role = User::where('id', '=', Auth::id())
    ->value('role');
    if($role==1) {
        return view ('/news/wysiwyg');
    }
    else{
        return view('login');
    }
  }
/*お知らせ保存*/
public function save_news (Request $request){
    $post = new News;
    $post->title = $request->title;
    $post->main = $request->main;
    $post->category = $request->category;
    $post->save();



    return redirect ('/news/index');
   }
   /*お知らせトップページ表示*/
   public function news_index (Request $request){
    $data = News::orderBy('created_at', 'desc')->paginate(10);
    $service = News::where('category','=', '7')->orderBy('created_at', 'desc')->paginate(10);
    $mente = News::where('category','=', '8')->orderBy('created_at', 'desc')->paginate(10);
    $etc = News::where('category','=', '6')->orderBy('created_at', 'desc')->paginate(10);
    $lelease= News::where('category','=', '9')->orderBy('created_at', 'desc')->paginate(10);
    return view('/news/post')->with(
        ['data' => $data,
         'service'  => $service,
         'mente'   => $mente,
         'etc'   => $etc,
         'lelease'   => $lelease,
    ]);
  }
  /*選択したお知らせページ表示*/
  public function news_page (Request $request,$id){
    $data = News::where('id', $request->id)->first();
    return view('news/page', [
        'id' => $id,
        'data' => $data,
    ]);
  }
    //top_page
    public function welcome()
    {
        $new = News::orderBy('created_at', 'desc')->first();
        return view('welcome', [
            'new' => $new
        ]);
    }
}
