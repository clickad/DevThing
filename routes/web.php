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

Route::get('/', 'HomeController@index');

//Route::get('/about', 'PagesController@about');

Route::get('/skills', 'PagesController@skills');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController');

Route::resource('categories', 'CategoriesController');

Route::resource('todo', 'TodoController');


//custom
Route::get('posts/category/{category_id}', 'PostsController@postsByCategory');
Route::put('todo/complete/{id}{status}', 'TodoController@changeStatus');
