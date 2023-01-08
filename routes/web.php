<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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


Route::get('/', 'PostController@index')->name('dashboard');
Route::get('/posts/{post}', 'PostController@show') ->name('posts.show');


Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'PostController@index')->name('/');
    Route::get('/posts', 'PostController@index')->name('/');
    Route::get('/create', 'PostController@create')->name('posts.create');
    Route::post('/posts', 'PostController@store')->name('posts.store');

    Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
    Route::put('/posts/{post}', 'PostController@update') ->name('posts.update');

    Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');
    Route::post('/posts/{post}/comments', 'CommentController@store')->name('comments.store');
    Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.destroy');

    
    Route::get('/logout', 'LogoutController@index') ->name('logout');

    // Route::get('/profiles/create', 'ProfileController@create')->name('profiles.create');
    Route::post('/profiles', 'ProfileController@store')->name('profiles.store');
    Route::get('/profiles/{profile}', 'ProfileController@show')->name('profiles.show');
    Route::get('/profiles/{profile}/edit', 'ProfileController@edit')->name('profiles.edit');
    Route::patch('/profiles/{profile}', 'ProfileController@update')->name('profiles.update');



 });


require __DIR__.'/auth.php';
