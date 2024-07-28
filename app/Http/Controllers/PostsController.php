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

    public function create(Request $request){
    //投稿内容を保存する処理
    $user_id = Auth::user()->id;//ログイン情報から参照
    $post = $request->input('post');//投稿データ参照
    Post::create([
           'user_id' => $user_id,
           'post' => $post,
        ]);

        return redirect('/top');
    }

}
