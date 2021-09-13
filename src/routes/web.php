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

Route::get('/', 'EntryController@index');

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