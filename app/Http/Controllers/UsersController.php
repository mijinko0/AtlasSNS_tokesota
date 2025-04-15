<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\View\View;

class UsersController extends Controller
{
    /**
     * 全てのユーザーリストを表示する（初期表示）。
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $users = User::all();
        return view('users.search', ['users' => $users]);
    }

    /**
     * ユーザー名による検索処理を実行し、検索結果を表示する。
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request): View
    {
        $query = $request->get('get');

        if ($query) {
            $users = User::where('username', 'LIKE', '%' . $query . '%')
                         ->get();
        } else {
            $users = collect(); // 検索キーワードがない場合は空のコレクション
        }

        return view('users.search', ['users' => $users, 'search_query' => $query]);
    }

    /**
     * プロフィール画面を表示する。
     *
     * @return \Illuminate\View\View
     */
    public function profile(): View
    {
        return view('users.profile');
    }
}
