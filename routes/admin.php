<?php

Route::namespace('Admin')->prefix('/admin')->name('admin.')->group(function () {
    Auth::routes();

    Route::middleware(['auth'])->group(function () {
        Route::get('/', function () {
            return redirect('admin/center');
        });

        Route::get('/home', 'HomeController@index')->name('home');

        // 后台首页
        Route::get('/center', 'HomeController@center');

        /**
         * 车辆相关模块
         */
        // 车库列表
        Route::get('/car', 'CarController@index');

        // 新入库处理操作
        Route::get('/car/{id}/deal_new', 'CarController@dealNew');

        Route::post('/car/{id}/deal_new', 'CarController@dealNewUpdate');

        // 洽谈中处理操作
        Route::get('/car/{id}/deal_talk', 'CarController@dealTalk');

        Route::post('/car/{id}/deal_talk', 'CarController@dealTalkUpdate');

        // 成交车库详情查看
        Route::get('/car/{id}', 'CarController@show');


        /**
         * 提现相关模块
         */
        // 提现列表
        Route::get('/apply', 'ApplyController@index');

        // 提现处理
        Route::get('/apply/{id}/deal_wait', 'ApplyController@dealWait');

        Route::post('/apply/{id}/deal_wait', 'ApplyController@dealWaitUpdate');

        // 提现详情
        Route::get('/apply/{id}', 'ApplyController@show');


        /**
         * 代理相关模块
         */
        // 代理列表
        Route::get('/agent', 'AgentController@index');

        // 代理处理
        Route::get('/agent/{id}/deal_wait', 'AgentController@dealWait');

        Route::post('/agent/{id}/deal_wait', 'AgentController@dealWaitUpdate');

        // 代理详情
        Route::get('/agent/{id}', 'AgentController@show');


        /**
         * 后台用户相关模块
         */
        // 后台用户列表
        Route::get('/user', 'UserController@index');

        // 用户创建
        Route::get('/user/create', 'UserController@create');

        Route::post('/user', 'UserController@store');


        /**
         * 财务
         */
        // 财务列表
        Route::get('/finance', 'FinanceController@index');

        // 财务处理
        Route::get('/finance/{id}/deal_wait', 'FinanceController@dealWait');

        Route::post('/finance/{id}/deal_wait', 'FinanceController@dealWaitUpdate');

        // 财务详情
        Route::get('/finance/{id}', 'FinanceController@show');
    });
});
