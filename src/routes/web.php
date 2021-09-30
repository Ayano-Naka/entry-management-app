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

Route::get('/company', function () {
    return view('company');
});

Route::get('/search-result',function(){
    return view('search');
});

Route::get('/add-to-list',function(){
    return view('add');
});

Route::get('/setting',function(){
    return view('setting');
});

Route::get('/schedule',function(){
    return view('schedule');
});

// Route::get('/edit',function(){
//     return view('edit');
// });

Route::get('/calendar',function(){
    return view('calendar');
});