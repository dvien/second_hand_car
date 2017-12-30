<?php

Route::namespace('Wechat')->prefix('/wechat')->name('wechat.')->group(function () {
    Auth::routes();

    Route::get('/', function () {
        return view('wechat.welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');
});
