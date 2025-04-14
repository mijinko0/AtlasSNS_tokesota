@extends('layouts.login')

@section('content')
<!-- ここがTOPページ -->
<div class="post_form">

        <!-- ユーザー検索機能 入力フォーム -->
    <form action="/search" method="get">
        @csrf
        <input type="text" name="get" value="" placeholder="ユーザー名">
        <button type="submit" class="search_user"><img class="send" src="images/search.png" width="55" height="55"></button>
    </form>
</div>

<div class="user_list">
    <!-- ユーザ一覧画面の表示 -->
    <!-- 2025/03/31 仮表示段階、見た目要調整 -->
    <!-- 2025/04/14 次はここから：検索機能の実装、検索ワードに該当するアカウントの表示-->
    @foreach ($users as $user)
    <img src="images/{{ $user->images }}">
    <p>{{ $user->username }}</p>
    <hr>
    @endforeach

</div>

@endsection
