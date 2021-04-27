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
 * user　ルーティング
 */
 
 


Auth::routes();

//美容師登録トップページ
Route::get('/account', 'HomeController@index');

//ブログ一覧
Route::get('/', 'UserController@index');

//メニュー情報更新
Route::put('/account/{user}/menu={menu}','StylistController@updateMenu');

//カタログ情報更新
Route::put('/account/{user}/catalog={catalog}','StylistController@updateCatalog');

//メニューDB登録
Route::post('/account/{user}/storeMenu', 'StylistController@storeMenu')->where('user', '[0-9]+');

//カタログ情報DB登録
Route::post('/account/{user}/storeCatalog', 'StylistController@storeCatalog')->where('user', '[0-9]+');

//美容師情報更新
Route::put('/account/{user}', 'StylistController@update')->where('user', '[0-9]+');

//美容師情報新規登録
Route::get('/account/create', 'StylistController@create');

//メニュー新規登録
Route::get('/account/{user}/menu', 'StylistController@createMenu');

//カタログ新規登録
Route::get('/account/{user}/catalog', 'StylistController@createCatelog');

//メニュー個別ページ表示
Route::get('/account/{user}/menu={menu}', 'StylistController@showMenu')->where('user', '[0-9]+');

//カタログ個別ページ表示
Route::get('/account/{user}/catalog={catalog}', 'StylistController@showCatalog')->where('user', '[0-9]+');

//美容師マイページ表示
Route::get('/account/{user}', 'StylistController@showAccount');

//美容師情報DB登録
Route::post('/account', 'StylistController@store');

//美容師情報編集
Route::get('/account/{user}/edit', 'StylistController@edit')->where('user', '[0-9]+');

//カタログ情報編集
Route::get('/account/{user}/catalog={catalog}/edit', 'StylistController@editCatalog');

//メニュー情報編集
Route::get('/account/{user}/menu={menu}/edit','StylistController@editMenu');

//カタログ情報削除
Route::delete('/account/{user}/catalog={catalog}', 'StylistController@deleteCatalog')->where('user', '[0-9]+');

//メニュー投稿削除
Route::delete('/account/{user}/menu={menu}', 'StylistController@deleteMenu')->where('user', '[0-9]+');

//ブログ投稿削除
Route::delete('/account/{user}', 'StylistController@delete')->where('user', '[0-9]+');

//ブログ投稿詳細
Route::get('/users/{user}', 'UserController@show')->where('user', '[0-9]+');

//メニュー一覧表示
Route::get('/menus', 'MenuController@index_menu');



