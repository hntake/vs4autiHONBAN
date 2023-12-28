<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\Reported;


class BbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *各スレッド表示$id=thread_id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $role = User::where('id', '=', Auth::id())
        ->value('role');
        $comments=Comment::where('thread_id','=',$id)->orderBy('created_at', 'asc')->paginate(30);
        $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
        $replace = '<a href="$1">$1</a>';
    
        $title=Thread::where('id','=',$id)->value('title');
        $posts=Reply::where('thread_id',"=",$id)->orderBy('created_at', 'asc')->get();
        $thread=$id;
        return view('bbs/index',[
            'comments'=>$comments,
            'title'=>$title,
            'posts'=>$posts,
            'thread'=>$thread,
            'id'=>$id,
            'role'=>$role,
            'pattern'=>$pattern,
            'replace'=>$replace,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *新規スレッド作成
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $role = User::where('id', '=', Auth::id())
        ->value('role');

        $request->session()->regenerateToken();

          //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $request->validate([
            'category'  => 'required',
            'name'  => 'required',
            'title' => 'required',
            'comment' => 'required',
        ]);

        $thread = new Thread;
        $thread->title = $request->title;
        $thread->category = $request->category;
        $thread->save();
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->title = $request->title;
        $comment->comment = $request->comment;
        $comment->thread_id=$thread->id;
        $comment->save();

        $threads=Thread::orderBy('created_at', 'desc')->paginate(30);

        return view('bbs/list',[
            'threads'=>$threads,
            'role'=>$role,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *掲示板トップページ表示
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $rq)
    {
        $role = User::where('id', '=', Auth::id())
        ->value('role');
        $threads=Thread::orderBy('created_at', 'desc')->paginate(30);

        return view('bbs/list',[
            'threads'=>$threads,
            'role'=>$role,
        ]);
    }

    /**
     * Display the specified resource.
     *コメント入力
     * @param  \App\Models\Thread  $Thread
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request,$id)
    {
        $role = User::where('id', '=', Auth::id())
        ->value('role');
        $request->session()->regenerateToken();

        $comment = new Comment;
        $comment->name = $request->name;
        $comment->title = $request->title;
        $comment->comment = $request->comment;
        $comment->thread_id=Thread::where('id','=',$id)->value('id');
        $comment->save();

        $count=Thread::find($id);
        $count->update([
            'count' => $count->count + 1,
            ]);

        $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
        $replace = '<a href="$1">$1</a>';

        $comments=Comment::where('thread_id','=',$comment->thread_id)->orderBy('created_at', 'asc')->paginate(30);
        $title=$comment->title;
        $thread=$comment->thread_id;
        $posts=Reply::where('comment_id',"=",$id)->orderBy('created_at', 'asc')->get();

        return view('bbs/index',[
            'comments'=>$comments,
            'thread'=>$thread,
            'title'=>$title,
            'posts'=>$posts,
            'role'=>$role,
            'pattern'=>$pattern,
            'replace'=>$replace,

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *新規スレッド作成ページへ
     * @param  \App\Models\Thread  $Thread
     * @return \Illuminate\Http\Response
     */
    public function thread()
    {
        // $category=Thread::where('id','=',$id)->first();

        return view('bbs/create');
    }
    /**
     * Show the form for editing the specified resource.
     *新規コメント入力ページへ
     * @param  \App\Models\Thread  $Thread
     * @return \Illuminate\Http\Response
     */
    public function input($id)
    {
        $comment=Comment::where('thread_id','=',$id)->first();
        return view('bbs/input',[
            'comment'=>$comment,
        ]);
    }

     /**
     * Update the specified resource in storage.
     *スレッド削除するページへ
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $Thread
     * @return \Illuminate\Http\Response
     */
    public function update_index()
    {
        $role = User::where('id', '=', Auth::id())
        ->value('role');
        if($role==1) {
            $threads=Thread::orderBy('created_at', 'desc')->paginate(30);
        
            return view('bbs/edit',[
                'threads'=>$threads,
                'role'=>$role,
            ]);
        }
        else{
            return view('login');
        }
        
    }
     /**
     * Update the specified resource in storage.
     *コメント削除するページへ
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $Thread
     * @return \Illuminate\Http\Response
     */
    public function update_comment()
    {
        $role = User::where('id', '=', Auth::id())
        ->value('role');
        if($role==1) {
            $comments=Comment::orderBy('created_at', 'desc')->paginate(30);
        
            return view('bbs/delete',[
                'comments'=>$comments,
                'role'=>$role,
            ]);
        }
        else{
            return view('login');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *修正する
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $Thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $threads = Thread::find($id);
        $threads->title = $request->input('title');
        $threads->save();

        return direct('bbs/list');
    }

    /**
     * Remove the specified resource from storage.
     *スレッド削除する
     * @param  \App\Models\Thread  $Thread
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $role = User::where('id', '=', Auth::id())
        ->value('role');
        $thread = Thread::find($id)->delete();
    
        return view('bbs/list',[
            'role'=>$role,
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *コメント削除する$id=comment_id
     * @param  \App\Models\Thread  $Thread
     * @return \Illuminate\Http\Response
     */
    public function delete_comment($id)
    {
        $role = User::where('id', '=', Auth::id())
        ->value('role');
        $thread=Comment::where('id',"=",$id)->value('thread_id');
        $comment = Comment::find($id)->delete();
        $title=Thread::where('id','=',$thread)->value('title');
        $count=Thread::where('id','=',$thread)->first();
        $count->update([
            'count' => $count->count - 1,
            ]);

        $comments=Comment::where('thread_id','=',$thread)->orderBy('created_at', 'desc')->paginate(30);

            return view('bbs.index', [
                'comments' => $comments,
                'role'     => $role,
                'title'    => $title,
                'thread'   => $thread,
            ]);


    }
    /**
     * Remove the specified resource from storage.
     *返信削除する$id=comment_id
     * @param  \App\Models\Thread  $Thread
     * @return \Illuminate\Http\Response
     */
    public function delete_reply($id)
    {
        $role = User::where('id', '=', Auth::id())
        ->value('role');
        $thread_id = Reply::find($id)->value('thread_id');
        $comments=Comment::where('thread_id',"=",$thread_id)->get();
        $reply = Reply::find($id)->delete();
        $count=Comment::where('id','=',$id)->first();
        $count->update([
            'count' => $count->count - 1,
            ]);
    
        return view('bbs/index',[
            'comments'=>$comments,
            'role'=>$role,

        ]);    
    }

    /**
     * Remove the specified resource from storage.
     *返信作成ページへ
     * @param  \App\Models\Thread  $Thread
     * @return \Illuminate\Http\Response
     */
    public function reply($id)
    {
        $comment=Comment::where('id','=',$id)->first();
    
        return view('bbs/reply',[
            'comment'=>$comment,
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *返信送信$id=comment_id
     * @param  \App\Models\Thread  $Thread
     * @return \Illuminate\Http\Response
     */
    public function reply_post(Request $request,$id)
    {
        $role = User::where('id', '=', Auth::id())
        ->value('role');
        $request->session()->regenerateToken();

        $reply = new Reply;
        $reply->name=$request->name;
        $reply->comment=$request->comment;
        $reply->comment_id=$id;
        $reply->thread_id=Comment::where('id',"=",$id)->value('thread_id');
        $reply->save();

        $receive=Comment::find($id);
        $receive->update([
            'reply' => $receive->reply + 1,
            ]);

        $comments=Comment::where('thread_id','=',$reply->thread_id)->orderBy('created_at', 'desc')->paginate(30);
        $title=Comment::where('id',"=",$id)->value('title');
        $thread=$reply->thread_id;

        $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
        $replace = '<a href="$1">$1</a>';

        $posts=Reply::where('comment_id',"=",$id)->orderBy('created_at', 'asc')->get();
        return view('bbs/index',[
            'comments'=>$comments,
            'thread'=>$thread,
            'title'=>$title,
            'posts'=>$posts,
            'role'=>$role,
            'pattern'=>$pattern,
            'replace'=>$replace,
        ]);
    }

        /*並び替え機能*/
        public function sort(Request $request)
        {
        $role = User::where('id', '=', Auth::id())
        ->value('role');
        $select = $request->narabi;

        if ($select == 'asc') {
            $threadsQuery = Thread::orderBy('created_at', 'asc');
        } elseif ($select == 'desc') {
            $threadsQuery = Thread::orderBy('created_at', 'desc');
        } elseif ($select == 'up') {
            $threadsQuery = Thread::orderBy('count', 'desc');
        } elseif ($select == 'down') {
            $threadsQuery = Thread::orderBy('count', 'asc');
        } else {
            $threadsQuery = Thread::query();
        }
    
        $threads = $threadsQuery->paginate(10); // ページネーションを適切な数に調整
        return view('bbs/list', compact('threads','role'));
        }

     /**検索 */
        public function search(Request $request)
        {
            $role = User::where('id', '=', Auth::id())
            ->value('role');
            $keyword = $request->input('keyword');
            
            $query = Thread::query();
            
                if(!empty($keyword)) {
                $query->where('title', 'LIKE', "%{$keyword}%");
            }
            $threads = $query->paginate(10); // 10は1ページに表示する件数
            return view('bbs/list', compact('threads', 'keyword','role'));
        }

        //掲示板違反報告thread通報画面
        public function thread_alert($id)
        {
            $thread=Thread::where('id',"=",$id)->first();
            return view('bbs/alert',[
                'thread'=>$thread
            ]);
        }
        //掲示板違反報告comment通報画面
        public function comment_alert($id)
        {
            $comment=Comment::where('id',"=",$id)->first();
            return view('bbs/alert',[
                'comment'=>$comment
            ]);

        } 
        //掲示板違反報告reply通報画面
        public function reply_alert($id)
        {
            $reply=Reply::where('id',"=",$id)->first();
            return view('bbs/alert',[
                'reply'=>$reply
            ]);

        }

        //掲示板違反報告threadポスト画面
        public function thread_alert_post($id)
        {
            $alert = Thread::where('id', $id)->value('alert');
            if ($alert === 0) {
                $newalert = 1;
                $alert = Thread::where('id', $id)
                    ->update([
                        'alert' => $newalert
                    ]);
                $thread = Thread::where('id', $id)->first();
    
                $data = ['スレッドID' => $thread->id];
                \Mail::to('info@itcha50.com')->send(new Reported($data));
    
                return view(
                    'bbs/reported',
                    [
                        'thread' => $thread,
                    ]
                );
            } else {
                $thread = Thread::where('id', $id)->first();
                return view(
                    'bbs/reported',
                    [
                        'thread' => $thread,
                    ]
                );
            }
        }
         //掲示板違反報告commentポスト画面
        public function comment_alert_post($id)
        {
            $alert = Thread::where('id', $id)->value('alert');
            if ($alert === 0) {
                $newalert = 1;
                $alert = Comment::where('id', $id)
                    ->update([
                        'alert' => $newalert
                    ]);
                $thread = Comment::where('id', $id)->first();
    
                $data = ['コメントID' => $comment->id];
    
                \Mail::to('info@itcha50.com')->send(new Reported($data));
    
                return view(
                    'bbs/reported',
                    [
                        'comment' => $comment,
                    ]
                );
            } else {
                $comment = Comment::where('id', $id)->first();
                return view(
                    'bbs/reported',
                    [
                        'comment' => $comment,
                    ]
                );
            }
        }

          //掲示板違反報告replyポスト画面
        public function reply_alert_post($id)
        {
            $alert = Reply::where('id', $id)->value('alert');
            if ($alert === 0) {
                $newalert = 1;
                $alert = Reply::where('id', $id)
                    ->update([
                        'alert' => $newalert
                    ]);
                $reply = Reply::where('id', $id)->first();
                $data = ['返信ID' => $id];
    
                \Mail::to('info@itcha50.com')->send(new Reported($data));
    
                return view(
                    'bbs/reported',
                    [
                        'reply' => $reply,
                    ]
                );
            } else {
                $reply = Reply::where('id', $id)->first();
                return view(
                    'bbs/reported',
                    [
                        'reply' => $reply,
                    ]
                );
            }
        }

}
