<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

/**
 * Post　ルーティング
 */
 
//ブログ一覧
Route::get('/', 'PostController@index');

//DB登録
Route::post('/posts', 'PostController@store');

//ブログ投稿作成
Route::get('/posts/create', 'PostController@create');

//ブログ投稿画面編集
Route::get('/posts/{post}/edit', 'PostController@edit');

//ブログ投稿削除
Route::delete('/posts/{post}', 'PostController@delete');

//ブログ投稿画面更新
Route::put('/posts/{post}', 'PostController@update');

//ブログ投稿詳細
Route::get('/posts/{post}', 'PostController@show');

/**
 * Menu　ルーティング
 */
Route::get('/menus', 'MenuController@index_menu');





