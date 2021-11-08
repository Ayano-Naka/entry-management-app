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

Route::get('/task','TaskController@index');

Route::post('/task','TaskController@create');

Route::get('/edit/{id}','TaskController@showEditForm');

Route::post('/edit', 'TaskController@edit');

Route::post('/task/{id}', 'TaskController@delete');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'web']], function () {
    Route::get('/user/setting', 'Admin\UserController@index');
    Route::post('/user/setting', 'Admin\UserController@update');
    Route::get('/user/editpassword','Admin\UserController@editPassword')->name('user.password.edit');
    Route::post('/user/editpassword','Admin\UserController@updatePassword')->name('user.password.update');
});

Route::get('/', 'PostController@index')->name('posts.search');

Route::post('/post','PostController@create');

Route::get('/post', 'PostController@new')->name('pullDown');

Route::get('/postedit/{id}', 'PostController@showEdit')->name('posts.edit');

Route::post('/postedit/{id}', 'PostController@edit');

Route::get('/company/{id}','PostController@show')->name('posts.show');

Route::post('/company/{id}','PostController@delete');

// Route::get('/search','PostController@search')->name('posts.search');

Route::get('/schedule',function(){
    return view('schedule');
});

Route::get('/calendar','CalendarController@index');

// Route::get('/calendar', 'CalendarController@show');

Route::get('/calendar/redirect', function () {
    return Socialite::driver('google')
        ->scopes(['https://www.googleapis.com/auth/calendar.events'])
        ->with(['access_type' => 'offline'])
        ->redirect();
});

// oauthで飛んできたコードを使ってユーザを認証している
Route::get('/calendar/callback', function () {
    $social_user = Socialite::driver('google')->user();
    $google_user = GoogleUser::whereGoogleId($social_user->id)->first();
    $user = ($google_user) ? $google_user->user: new User;
    if (!$google_user) {
        $user->name = $social_user->name;
        $user->email = $social_user->email;
        $user->password = bcrypt(Str::random(20));
        $user->save();

        $google_user = new GoogleUser;
        $google_user->google_id = $social_user->id;
    }
    
    // アクセストークンとリフレッシュトークンをセットしている
    $google_user->access_token = $social_user->token;
    $google_user->refresh_token = $social_user->refreshToken ?? $google_user->refreshToken;
    $google_user->expires = Carbon::now()->timestamp + $social_user->expiresIn;

    $user->googleUser()->save($google_user);
    Auth::login($user);
    return redirect('/calendar');
});