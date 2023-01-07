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


Route::get('/', 'HomeController@index');
Route::get('/posts/{post}', 'PostController@show');


Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'PostController@index');
    Route::get('/posts', 'PostController@index');
    Route::get('/create', 'PostController@create');
    Route::post('/posts', 'PostController@store');

    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::put('/posts/{post}', 'PostController@update');

    Route::delete('/posts/{post}', 'PostController@destroy');
    Route::post('/posts/{post}/comments', 'CommentController@store');

    
    Route::get('/logout', 'LogoutController@index');
 });


require __DIR__.'/auth.php';
