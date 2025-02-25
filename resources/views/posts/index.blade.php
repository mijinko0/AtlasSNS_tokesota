@extends('layouts.login')

@section('content')
@if (session('message'))
  <div class="alert alert-danger text-center w-25 mx-auto">
    {{ session('message') }}
  </div>
@endif
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
    <!-- 削除試作3 実相版 -->
    <a href="/post/delete/{{$post->id}}"><img src="images/trash.png" class="js-trash" name="post_id" width="50" height="50" post_id="{{ $post->id }}"></a>
    <!-- 削除試作２ -->
    <!-- <img src="images/trash.png" class="js-trash" name="post_id" width="50" height="50" post_id="{{ $post->id }}"> -->

    <!-- <form action="/post/delete" method="post" class="inline">　　削除機能試作１
        @csrf
        @method('DELETE')
        <input type="submit" name="post_id" class="modal_id" value="modal_id">
        <button type="submit" class="text-red-600 hover:text-red-900 ml-20"
            onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="images/trash.png" width="50" height="50"></button>
    </form> -->
    <hr>
    @endforeach

</div>
 <div class="modal js-modal"><!-- 投稿編集モーダル表示 -->
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
