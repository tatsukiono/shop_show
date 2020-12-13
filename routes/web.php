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

// Route::get('/', function () {
//     // return view('welcome');
// });
// お店関係
Route::resource('shops', 'ShopController');
Route::post('/shops/update/{id}', 'ShopController@update');
Route::get('/shops/update/{id}', 'ShopController@direct');
Route::post('/shops/delete/{id}', 'ShopController@destroy');
Route::get('/shops/delete/{id}', 'ShopController@direct');

// 完了ページ
Route::get('/form-complete', 'ShopController@FormComplete');
Route::get('/update-complete', 'ShopController@UpdateComplete');
Route::get('/delete-complete', 'ShopController@DeleteComplete');

// いいね機能
Route::post('shops/{id}/favorites', 'FavoriteController@store')->name('favorites');
Route::get('shops/{id}/favorites', 'FavoriteController@direct');
Route::post('shops/{id}/unfavorites', 'FavoriteController@destroy')->name('unfavorites');
Route::get('shops/{id}/unfavorites', 'FavoriteController@direct');

// ログイン関係
Auth::routes();
Route::get('/logout', 'Auth\LoginController@direct');

// マイページ
Route::get('/mypage/{id}', 'ShopController@mypage');

// Route::get('/home', 'HomeController@index')->name('home');
