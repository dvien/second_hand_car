<?php

namespace App\Http\Controllers\Wechat;

class WechatController
{
    public function __construct()
    {
    }

    // TODO: 验证怎么写
    public function serve()
    {

    }

    //
    public function user()
    {
        // 拿到授权微信用户资料
        $wechatUser = session('wechat.oauth_user');

        dd($wechatUser);
    }
}
