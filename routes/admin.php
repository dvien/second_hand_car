<?php

Route::namespace('Admin')->prefix('/admin')->name('admin.')->group(function () {
    Auth::routes();

    Route::get('/', function () {
        return redirect('admin/center');

//        return view('admin.welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    // 后台首页
    Route::get('/center', 'HomeController@center');

    // 车库列表
    Route::get('/car', 'CarController@index');

    // 新入库处理操作
    Route::get('/car/{id}/deal_new', 'CarController@dealNew');

    // 洽谈中处理操作
    Route::get('/car/{id}/deal_talk', 'CarController@dealTalk');

    // 成交车库详情查看
    Route::get('/car/{id}', 'CarController@show');

    // 提现列表
    Route::get('/apply', 'ApplyController@index');

    // 提现处理
    Route::get('/apply/{id}/deal_wait', 'ApplyController@dealWait');

    // 提现详情
    Route::get('/apply/{id}', 'ApplyController@show');

    // 代理列表
    Route::get('/agent', 'AgentController@index');

    // 代理处理
    Route::get('/agent/{id}/deal_wait', 'AgentController@dealWait');

    // 代理详情
    Route::get('/agent/{id}', 'AgentController@show');

    // TODO: 系统设置没有, 因为没有添加的页面
    // 后台用户列表
    Route::get('/user', 'UserController@index');

    // 用户创建
    Route::get('/user/create', function () {
        return view('admin.user.create');
    });

    // 财务列表
    Route::get('/finance', function () {
        return view('admin.finance.index');
    });

    // 财务处理
    Route::get('/finance/{id}/deal_wait', function () {
        return view('admin.finance.deal_wait');
    });

    // 财务详情
    Route::get('/finance/{id}', function () {
        return view('admin.finance.show');
    });
});
