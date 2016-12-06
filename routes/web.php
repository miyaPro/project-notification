<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'Auth\LoginController@showLoginForm');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('notification/sendBroadcast', 'NotificationController@sendBroadcast');
Route::post('fire', function () {
    event(new App\Events\BroadcastEvent());
    return "event fired";
});
Route::get('index1', function () {
    return view('broadcast.index1');
});

Route::get('index2', function () {
    return view('broadcast.index2');
});

