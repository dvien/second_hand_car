<?php

Route::namespace('Admin')->prefix('/admin')->name('admin.')->group(function () {
    Auth::routes();

    Route::get('/', function () {
        return view('admin.welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    // 后台首页
    Route::get('/center', function () {
        return view('admin.center');
    });

    // 车库
    Route::get('/car', function () {
        return view('admin.car.index');
    });
});
