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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category', CategoryController::class);
Route::resource('bookmark', BookmarkController::class);


Route::post('category_update/{category}', 'CategoryController@update_post')->name('category.update.post');
Route::get('category_delete/{category}', 'CategoryController@destroy_get')->name('category.delete.get');

Route::get('bookmark_create/{category}', 'BookmarkController@create_get')->name('bookmark.create.get');
Route::post('bookmark_store/{category}', 'BookmarkController@store_post')->name('bookmark.store.post');
Route::post('bookmark_update/{bookmark}', 'BookmarkController@update_post')->name('bookmark.update.post');
Route::get('bookmark_delete/{bookmark}', 'BookmarkController@destroy_get')->name('bookmark.delete.get');

Route::get('bookmark_delete_get/{id}', 'BookmarkController@destroy_get_id')->name('bookmark.delete.get');
