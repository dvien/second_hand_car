<?php

Route::namespace('Admin')->prefix('/admin')->name('admin.')->group(function () {
    Auth::routes();

    Route::get('/', function () {
        return view('admin.welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/center', function () {
        return view('admin.center');
    });
});
