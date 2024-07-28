@extends('layouts.login')

@section('content')
<!-- ここがTOPページ -->
<div class="post_form">
        <!-- 投稿内容入力フォーム -->
    <form action="/post" method="post">
        @csrf
        <input type="text" name="post" value="" placeholder="投稿内容を入力してください">
        <button type="submit"><img class="send" src="images/post.png" width="55" height="55"></button>
    </form>
</div>

<div class="posts_list">
    <!-- 投稿一覧画面の表示 -->
    <!-- 2024/07/28 仮表示段階、次回以降に編集機能、見た目調整 -->
    @foreach ($posts as $post)
    <!--リレーション設定しuserテーブルからもデータ引用-->
    <img src="images/{{ $post->user->images }}">
    <p>{{ $post->user->username }}</p>
    <p>{{ $post->post }}</p>
    <p>{{ $post->created_at }}</p>
    @endforeach
</div>
@endsection
