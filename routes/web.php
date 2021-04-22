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

// Route::get('/', function () {
//     return view('index');
// });



/**
 * Post　ルーティング
 */
 
 
//ブログ一覧
Route::get('/', 'PostController@index');

Route::get('/account', 'StylistController@transStylistPage');

//メニュー投稿画面更新
Route::put('/account/{post}/{menu}','StylistController@updateMenu');

//メニューDB登録
Route::post('/account/{post}/storeMenu', 'StylistController@storeMenu')->where('post', '[0-9]+');

//カタログ情報DB登録
Route::post('/account/{post}/storeCatalog', 'StylistController@storeCatalog')->where('post', '[0-9]+');

//美容師情報更新
Route::put('/account/{post}', 'StylistController@update')->where('post', '[0-9]+');

//美容師情報新規登録
Route::get('/account/create', 'StylistController@create');

//メニュー新規登録
Route::get('/account/{post}/menu', 'StylistController@createMenu');

//カタログ新規登録
Route::get('/account/{post}/catalog', 'StylistController@createCatelog');

//メニュー個別ページ表示
Route::get('/account/{post}/menu={menu}', 'StylistController@showMenu')->where('post', '[0-9]+');

//カタログ個別ページ表示
Route::get('/account/{post}/catalog={catalog}', 'StylistController@showCatalog')->where('post', '[0-9]+');

//美容師マイページ表示
Route::get('/account/{post}', 'StylistController@showAccount');

//美容師情報DB登録
Route::post('/account', 'StylistController@store');

//美容師情報編集
Route::get('/account/{post}/edit', 'StylistController@edit')->where('post', '[0-9]+');

//メニュー投稿画面編集
Route::get('/account/{post}/{menu}/edit','StylistController@editMenu');

//メニュー投稿削除
Route::delete('/account/{post}/{menu}', 'StylistController@deleteMenu')->where('post', '[0-9]+');

//ブログ投稿削除
Route::delete('/account/{post}', 'StylistController@delete')->where('post', '[0-9]+');

//ブログ投稿詳細
Route::get('/posts/{post}', 'PostController@show')->where('post', '[0-9]+');

//メニュー一覧表示
Route::get('/menus', 'MenuController@index_menu');









