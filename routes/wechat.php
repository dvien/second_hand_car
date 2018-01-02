<?php

Route::namespace('Wechat')->prefix('/wechat')->name('wechat.')->group(function () {
    Auth::routes();

    Route::get('/', function () {
        return view('wechat.welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/admin', function () {
        $data['page_title'] = '高价收车，上门评估';

        return view('adminlte', $data);
    });

    // 高价收车，上门评估
    Route::get('/car/create', function () {
        $data['page_title'] = '高价收车，上门评估';

        return view('wechat.car.create', $data);
    });

    // 我要代理
    Route::get('/agent/create', function () {
        $data['page_title'] = '我要代理';

        return view('wechat.agent.create', $data);
    });

    // 代理中心
    Route::get('/agent/center', function () {
        $data['page_title'] = '代理中心';

        return view('wechat.agent.center', $data);
    });

    // 代理规则
    Route::get('/agent/rule', function () {
        $data['page_title'] = '代理规则';

        return view('wechat.agent.rule', $data);
    });

    // 推广二维码
    Route::get('/agent/qr_code', function () {
        $data['page_title'] = '推广二维码';

        return view('wechat.agent.qr_code', $data);
    });

    // 我的团队
    Route::get('/agent/my_user', function () {
        $data['page_title'] = '我的团队';

        return view('wechat.agent.my_user', $data);
    });

    // 我的车库
    Route::get('/agent/my_car', function () {
        $data['page_title'] = '我的车库';

        return view('wechat.agent.my_car', $data);
    });
});
