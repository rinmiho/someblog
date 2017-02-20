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

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::resource('articles', 'ArticlesController');
Route::get('articles/delete/{article}', ['as' => 'articles.delete', 'uses' => 'ArticlesController@destroy']);

Route::resource('comments', 'CommentsController');
Route::get('comments/delete/{comment}', ['as' => 'comments.delete', 'uses' => 'CommentsController@destroy']);

Route::resource('users', 'UsersController');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
