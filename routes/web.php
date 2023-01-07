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

// Route::get('/', function () {
//     return view('posts.index');
// });

// Route::get('/dashboard', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('home');

// Route::get('/posts', 'PostController@index');
// Route::get('/posts/create', 'PostController@create');
// Route::post('/posts', 'PostController@store');
// Route::get('/posts/{post}', 'PostController@show');
// Route::post('/posts/{post}/comments', 'CommentController@store');

// Route::get('/', 'PostController@index');

// Route::get('/home', 'PostController@index');
// Route::resource('/post', 'PostController',);
// Route::get('/posts/create', 'PostController@create');
// Route::post('/comment', 'CommentController@store',);
// // Auth::routes();



// Route::get('/', 'PostController@index')->name('index');
// Route::get('/dashboard', 'HomeController@index')->name('home');
// Route::get('/posts/create', 'PostController@create');
// Route::post('/posts', 'PostController@store');
// Route::get('/posts/{post}', 'PostController@show');



// // Route::get('/home', 'HomeController@index')->name('home');
// // Route::resource('post', 'PostController',);
// Route::post('comment', 'CommentController@store',);
// // Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/posts/{post}', 'PostController@show');


Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'PostController@index');
    Route::get('/posts', 'PostController@index');

    Route::get('/posts/create', 'PostController@create');
    Route::post('/posts', 'PostController@store');
    Route::post('/posts/{post}/comments', 'CommentController@store');
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
 });


require __DIR__.'/auth.php';
