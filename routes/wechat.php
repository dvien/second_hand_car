<?php

use Overtrue\Socialite\User as SocialiteUser;

Route::namespace('Wechat')->prefix('/wechat')->name('wechat.')->group(function () {
    Auth::routes();

    Route::any('/wechat_serve', 'WechatController@serve');

    Route::get('/wechat_user', 'WechatController@user')->middleware('wechat.oauth');

    Route::middleware(['web', 'is_wechat_login'])->group(function () {
        Route::get('/', function () {
            return redirect(url('wechat/car/create'));
        });

        // 高价收车，上门评估
        Route::get('/car/create', 'CarController@create');

        Route::post('/car', 'CarController@store');

        // 我要代理
        Route::get('/agent/create', 'AgentController@create');

        Route::post('/agent', 'AgentController@store');

        // 只有代理人才能看的模块
        Route::middleware(['is_agent'])->group(function () {
            // 代理中心
            Route::get('/agent/center', 'AgentController@center');

            // 代理规则
            Route::get('/agent/rule', 'AgentController@rule');

            // 推广二维码
            Route::get('/agent/qr_code', 'AgentController@qrCode');

            // 我的团队
            Route::get('/agent/my_user', 'AgentController@myUser');

            // 我的车库
            Route::get('/agent/my_car', 'AgentController@myCar');

            // 申请提现
            Route::get('/agent/apply', 'AgentController@apply');

            Route::post('/agent/apply', 'AgentController@applyPost');

            // 我的账户
            Route::get('/agent/my_account', 'AgentController@myAccount');
        });
    });
});
