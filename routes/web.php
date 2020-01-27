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

Route::get('/', 'PagesController@index');
Route::resource('posts', 'PostsController');
Route::get('/store', 'PostsController@store');
Route::put('/update/{id}', 'PostsController@update')->name('update');
Route::delete('/delete/{id}', 'PostsController@destroy');

// Route::get('/edit', 'PostsController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
