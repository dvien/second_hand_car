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

    // 车库列表
    Route::get('/car', function () {
        return view('admin.car.index');
    });

    // 新入库处理操作
    Route::get('/car/{id}/deal_new', function () {
        return view('admin.car.deal_new');
    });

    // 洽谈中处理操作
    Route::get('/car/{id}/deal_talk', function () {
        return view('admin.car.deal_talk');
    });

    // 成交车库详情查看
    Route::get('/car/{id}', function () {
        return view('admin.car.show');
    });

    // 提现列表
    Route::get('/apply', function () {
        return view('admin.apply.index');
    });
});
