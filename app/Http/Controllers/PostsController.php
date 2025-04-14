<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = Post::get();
        // dd($posts);
        return view('posts.index',['posts'=>$posts]);
    }

    //投稿内容を保存する処理
    public function create(Request $request){
    $user_id = Auth::user()->id;//ログイン情報から参照
    $post = $request->input('post');//投稿データ参照
    Post::create([
           'user_id' => $user_id,
           'post' => $post,
        ]);

        return redirect('/top');
    }

    //編集する投稿データへのルーティング
    public function update(Request $request)
    {
        // $post = Post::where('id', $id)->first();
        $id = $request->input('post_id');//編集する投稿のIDをbladeから受け取り
        $post = $request->input('new_post');//編集する投稿内容をbladeから受け取り
        Post::where('id', $id)->update(['post' => $post]);//受け取った内容で更新処理

        return redirect('/top');
    }
    public function delete($id)
    {
        Post::where('id', $id)->delete();

        return redirect('/top')->with('message', '投稿が削除されました');
    }
}
