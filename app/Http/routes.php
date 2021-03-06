<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('front.home');
});
// Route::get('/thingy', function () {
//     Auth::user()->assignRole(1);
//     dd(Auth::user());
// });

// Github login
Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('/home', function () {
    return view('front.home');
});
Route::get('/login', function () {
    return view('auth.signin');
});
Route::get('portfolio/{id}', 'GigsController@show');
Route::get('/telegram', function () {
    $chat_id  = env('TELEGRAM_CHAT_ID', '12658734');
    $response = Telegram::sendMessage($chat_id, 'Hello World, this is a test message!!!');
    dd($response);
});

//    contact post route
Route::post('contact', 'messagesController@store');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::resource('blog', 'PostsController', [ 'only' => [ 'index', 'show' ] ]);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group([ 'middleware' => [ 'auth', 'admin' ], 'prefix' => 'dashboard' ], function () {
    Route::post('portfolio', 'GigsController@store');
    Route::get('portfolio/{id}', 'GigsController@show');
    // upload image route for MediumInsert plugin
    Route::any('upload', 'PostsController@upload');
    // resource routes for posts
    Route::resource('posts', 'PostsController');
    Route::resource('gigs', 'GigsController');
    Route::post('settings', 'messagesController@save_settings');
    Route::get('/', function () {
        $data['tasks'] = [
            [
                'name'     => 'Design New Dashboard',
                'progress' => '87',
                'color'    => 'danger',
            ],
            [
                'name'     => 'Create Home Page',
                'progress' => '76',
                'color'    => 'warning',
            ],
            [
                'name'     => 'Some Other Task',
                'progress' => '32',
                'color'    => 'success',
            ],
            [
                'name'     => 'Start Building Website',
                'progress' => '56',
                'color'    => 'info',
            ],
            [
                'name'     => 'Develop an Awesome Algorithm',
                'progress' => '10',
                'color'    => 'success',
            ],
        ];

        return view('test')->with($data);
    });

});