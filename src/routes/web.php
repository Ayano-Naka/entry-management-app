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

Auth::routes();

Route::get('/', 'EntryController@index');

Route::get('/task','TaskController@index');

Route::post('/task','TaskController@create');

Route::get('/edit/{id}','TaskController@showEditForm');

Route::post('/edit', 'TaskController@edit');

Route::post('/task/{id}', 'TaskController@delete');

Route::get('/calendar','CalendarController@index');

Route::get('/calendar', 'CalendarController@show');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'web']], function () {
    Route::get('/user/setting', 'Admin\UserController@index');
    Route::post('/user/setting', 'Admin\UserController@update');
    Route::get('/user/editpassword','Admin\UserController@editPassword')->name('user.password.edit');
    Route::post('/user/editpassword','Admin\UserController@updatePassword')->name('user.password.update');
});

Route::get('/', 'PostController@index');

Route::post('/post','PostController@create');

Route::get('/post','PostController@showCreateForm');

Route::get('/post', 'PostController@new')->name('pullDown');

Route::get('/postedit/{id}', 'PostController@showEdit')->name('posts.edit');

Route::post('/postedit/{id}', 'PostController@edit');

Route::get('/company/{id}','PostController@show')->name('posts.show');

Route::post('/company/{id}','PostController@delete');






Route::get('/search-result',function(){
    return view('search');
});

Route::get('/schedule',function(){
    return view('schedule');
});

// Route::get('/profile','ProfileController@profile');