<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/', function () {
     return view('welcome');
});




//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'], function () {
    Route::get('/top','PostsController@index');//投稿一覧画面呼び出し
    Route::post('/post','PostsController@create');//投稿保存処理呼び出し
    Route::post('/post/update', 'PostsController@update');//編集モーダル呼び出し
    Route::get('/post/delete/{id}', 'PostsController@delete');//削除モーダル呼び出し

    Route::get('/profile','UsersController@profile');

    Route::get('/search','UsersController@index');

    Route::get('/follow-list','PostsController@index');
    Route::get('/follower-list','PostsController@index');
});

 Auth::routes();
 Route::get('/home', 'HomeController@index')->name('home');
