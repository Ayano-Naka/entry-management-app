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

Auth::routes(['verify' => true]);

Route::get('/task', 'TaskController@getTasks');
Route::get('/task/getData', 'TaskController@getData');

Route::post('/task', 'TaskController@addTask');

Route::post('/task/del', 'TaskController@deleteTask');

Route::post('/task/edit','TaskController@editTask');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('verified')->group(function () {
    Route::group(['middleware' => ['auth', 'web']], function () {
        Route::get('/user/setting', 'Admin\UserController@index');
        Route::post('/user/setting', 'Admin\UserController@update');
        Route::get('/user/editpassword','Admin\UserController@editPassword')->name('user.password.edit');
        Route::post('/user/editpassword','Admin\UserController@updatePassword')->name('user.password.update');
    });
});

Route::get('/', 'PostController@index')->name('posts.search');

Route::post('/post','PostController@create');

Route::get('/post', 'PostController@new')->name('pullDown');

Route::get('/postedit/{id}', 'PostController@showEdit')->name('posts.edit');

Route::post('/postedit/{id}', 'PostController@edit');

Route::get('/company/{id}','PostController@show')->name('posts.show');

Route::get('/postdel/{id}', 'PostController@showDelete');

Route::post('/postdel/{id}','PostController@delete');

Route::get('/schedule',function(){
    return view('schedule');
});

Route::get('/calendar','CalendarController@show');

Route::post('/schedule','CalendarController@index');

