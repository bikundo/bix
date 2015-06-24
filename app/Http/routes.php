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
    $subject = 'Welcome!';

    Mail::send('emails.welcome', ['key' => 'value'], function ($message) use ($subject) {
        $message->to('binmonk@gmail.com', '')
            ->subject($subject);
    });

    return 'sent';
});
Route::get('admin', function () {
    $data['tasks'] = [
        [
            'name'     => 'Design New Dashboard',
            'progress' => '87',
            'color'    => 'danger'
        ],
        [
            'name'     => 'Create Home Page',
            'progress' => '76',
            'color'    => 'warning'
        ],
        [
            'name'     => 'Some Other Task',
            'progress' => '32',
            'color'    => 'success'
        ],
        [
            'name'     => 'Start Building Website',
            'progress' => '56',
            'color'    => 'info'
        ],
        [
            'name'     => 'Develop an Awesome Algorithm',
            'progress' => '10',
            'color'    => 'success'
        ]
    ];

    return view('test')->with($data);
});
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    // upload image route for MediumInsert plugin
    Route::any('upload', 'PostsController@upload');
// resource routes for posts
    Route::resource('posts', 'PostsController');

});