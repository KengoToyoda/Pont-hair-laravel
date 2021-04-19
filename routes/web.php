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

//メニュー投稿画面更新
Route::put('posts/{post}/{menu}','MenuController@update_menu');

//ブログ投稿画面更新
Route::put('/posts/{post}', 'PostController@update')->where('post', '[0-9]+');

//メニューDB登録
Route::post('/posts/{post}/store', 'MenuController@store_menu')->where('post', '[0-9]+');

//ブログDB登録
Route::post('/posts', 'PostController@store');

//ブログ投稿作成
Route::get('/posts/create', 'PostController@create');

//ブログ投稿画面編集
Route::get('/posts/{post}/edit', 'PostController@edit')->where('post', '[0-9]+');

//メニュー投稿画面編集
Route::get('/posts/{post}/{menu}/edit','MenuController@edit_menu');

//メニュー投稿削除
Route::delete('/posts/{post}/{menu}', 'MenuController@delete_menu')->where('post', '[0-9]+');

//ブログ投稿削除
Route::delete('/posts/{post}', 'PostController@delete')->where('post', '[0-9]+');

//メニュー個別ページ表示
Route::get('/posts/{post}/{menu}', 'MenuController@show_menu')->where('post', '[0-9]+');

//ブログ投稿詳細
Route::get('/posts/{post}', 'PostController@show')->where('post', '[0-9]+');

//メニュー一覧表示
Route::get('/menus', 'MenuController@index_menu');

//メニュー新規作成
Route::get('/create/{post}', 'MenuController@create_menu')->where('post', '[0-9]+');







