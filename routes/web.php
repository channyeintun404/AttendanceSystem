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

Route::get('/home', function () {
    return view('pages.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/checkin', 'PostsController@create')->name('create');
// Route::get('/posts/{{id}}/edit', 'PostsController@edit')->name('edit');
// Route::get('/checkin', 'PostsController@create')->name('create');
Route::resource('posts', 'PostsController');
