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

Route::resource('skills', 'SkillsController');

Route::resource('calendar', 'CalendarController');


//custom
Route::get('posts/category/{category_id}', 'PostsController@postsByCategory');
Route::post('posts/search', 'PostsController@searchPost');
Route::put('todo/complete/{id}{status}', 'TodoController@changeStatus');
Route::post('calendar/getApointments', 'CalendarController@getApointments');
