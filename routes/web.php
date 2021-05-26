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

/**
 * ルーティング１
 * 
 * 美容師向け機能
 * /account/〇〇
 * 
 */
 
//カタログ情報編集
Route::get('/account/edit/catalog={catalog}', 'StylistController@editCatalog')->name('user.catalog.edit');

//メニュー情報編集
Route::get('/account/edit/menu={menu}','StylistController@editMenu')->name('user.menu.edit');

 //美容師情報編集
Route::get('/account/edit/{user}', 'UserController@edit')->where('user', '[0-9]+')->name('user.edit');

//メニュー個別ページ表示
Route::get('/account/menu={menu}', 'StylistController@showMenu')->where('user', '[0-9]+')->name('user.menu.show');

//カタログ個別ページ表示
Route::get('/account/catalog={catalog}', 'StylistController@showCatalog')->where('user', '[0-9]+')->name('user.catalog.show');

//メニュー新規登録
Route::get('/account/menu', 'StylistController@createMenu')->name("user.menu.create");

//カタログ新規登録
Route::get('/account/catalog', 'StylistController@createCatelog')->name('user.catalog.create');

//美容師登録トップページ
Route::get('/account', 'HomeController@index');



//メニュー情報更新
Route::put('/account/menu={menu}','StylistController@updateMenu')->name('user.menu.update');

//カタログ情報更新
Route::put('/account/catalog={catalog}','StylistController@updateCatalog')->name('user.catalog.update');

//美容師情報更新
Route::put('/account/{user}', 'UserController@update')->where('user', '[0-9]+')->name("user.update");


//メニューDB登録
Route::post('/account/menu/storeMenu', 'StylistController@storeMenu')->where('user', '[0-9]+')->name('user.menu.store');

//カタログ情報DB登録
Route::post('/account/catalog/storeCatalog', 'StylistController@storeCatalog')->where('user', '[0-9]+')->name('user.catalog.store');


//カタログ情報削除
Route::delete('/account/catalog={catalog}', 'StylistController@deleteCatalog')->where('user', '[0-9]+')->name('user.catalog.delete');

//メニュー投稿削除
Route::delete('/account/menu={menu}', 'StylistController@deleteMenu')->where('user', '[0-9]+')->name('user.menu.delete');

//美容師情報削除
Route::delete('/account', 'UserController@delete')->where('user', '[0-9]+')->name('user.delete');

/**
 * ルーティング２
 * 
 * お客様向け機能
 * /stylists/〇〇
 * 
 */
 
//スタイリスト一覧
Route::get('/', 'UserController@index');

//スタイリスト情報詳細表示
Route::get('/stylists/{user}', 'UserController@show')->where('user', '[0-9]+');

//スタイリストメニュー詳細表示
Route::get('/stylists/{user}/menu={menu}', 'UserController@showMenuToCust');

//スタイリストカタログ詳細表示
Route::get('/stylists/{user}/catalog={catalog}', 'UserController@showCatalogToCust');



/**
 * ルーティング３
 * 
 * フォーム送信機能
 * /reserve/〇〇
 * 
 */
 
  //予約フォーム確認
 Route::post('reserve/confirm/stylists/{user}/menu={menu}', 'ReserveController@confirm');
 // ->name('reserve.confrim');
 
 //予約フォーム送信
 Route::post('reserve/thanks/stylists/{user}/menu={menu}', 'ReserveController@send');
 // ->name('reserve.send');
 
 //予約フォーム表示
 Route::get('reserve/stylists/{user}/menu={menu}', 'ReserveController@showReserve');
 // ->name('reserve.form');




/**
 * Authメソッド ルーティング
 */ 
 
 Auth::routes();
 
 
 /**
  * 検索機能 ルーティング
  */
 Route::get('searchproduct', 'UserController@search')->name('searchproduct');



