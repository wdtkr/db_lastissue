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

use App\Todocontent;
use App\Todocontentedit;
use Illuminate\Http\Request;

URL::forceScheme('http');

// 以下は全てControllerに投げられる
// ホーム画面
Route::get('/','TodocontentsController@index');

// 登録処理
Route::post('/todocontents','TodocontentsController@store');

// 更新画面
Route::post('/todocontentsedit/{task}','TodocontentsController@edit');

// 更新処理
Route::post('/todocontents/update','TodocontentsController@update');

// バリデーションでなんかいるらしい、更新画面のGET
Route::get('/todocontentsedit/{id}','TodocontentsController@update');

// ToDoのコンテンツを削除 
Route::delete('/todocontent/{task}','TodocontentsController@destroy');

// ログインなどAuth系
Auth::routes();
Route::get('/home', 'TodocontentsController@index')->name('home');