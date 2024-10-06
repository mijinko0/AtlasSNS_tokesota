@extends('layouts.login')

@section('content')
<!-- ここがTOPページ -->
<div class="post_form">

        <!-- 投稿内容入力フォーム -->
    <form action="/post" method="post">
        @csrf
        <input type="text" name="post" value="" placeholder="投稿内容を入力してください">
        <button type="submit" class="post_save"><img class="send" src="images/post.png" width="55" height="55"></button>
    </form>
</div>

<div class="posts_list">
    <!-- 投稿一覧画面の表示 -->
    <!-- 2024/07/28 仮表示段階、見た目要調整 -->
    @foreach ($posts as $post)
    <!--リレーション設定しuserテーブルからもデータ引用-->
    <img src="images/{{ $post->user->images }}">
    <p>{{ $post->user->username }}</p>
    <p>{{ $post->post }}</p>
    <p>{{ $post->created_at }}</p>
    <img src="images/edit.png" class="js-modal-open" width="50" height="50" post="{{ $post->post }}" post_id="{{ $post->id }}">
     <!-- <button type="submit" class="js-modal-open"><img src="images/edit.png" width="50" height="50"></button> -->
    <img src="images/trash.png" width="50" height="50">
    <hr>
    @endforeach

</div>
 <div class="modal js-modal"><!-- モーダル表示 -->
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/post/update" method="post">
                <textarea name="new_post" class="modal_post"></textarea><!--更新する内容を格納-->
                <input type="hidden" name="post_id" class="modal_id" value="modal_id"><!--更新する投稿ID格納-->
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
@endsection
