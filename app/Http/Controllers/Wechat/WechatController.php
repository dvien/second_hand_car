<?php

namespace App\Http\Controllers\Wechat;

use App\Models\WechatUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WechatController
{
    protected $wechatApp;

    public function __construct()
    {
        $this->wechatApp = app('wechat.official_account');
    }

    // TODO: 验证怎么写
    public function serve(Request $request)
    {
        \Log::debug($request->all());

        return $this->wechatApp->server->serve();
    }

    public function userOauth(Request $request)
    {
        // 获取 OAuth 授权结果用户信息
        $wechatUser = $this->wechatApp->oauth->user()->toArray();

        // 更新授权信息
        $item = WechatUser::where('wechat_openid', $wechatUser['id'])->first();

        if ($item) {
            $item->wechat_nickname = $wechatUser['nickname'];
            $item->wechat_headimgurl = $wechatUser['avatar'];
            $item->save();
        } else {
            $item = WechatUser::create([
                'wechat_openid' => $wechatUser['id'],
                'wechat_nickname' => $wechatUser['nickname'],
                'wechat_headimgurl' => $wechatUser['avatar'],
                'first_wechat_user_id' => $request->get('wechat_id', 0), // 邀请人
                'name' => '',
                'phone' => '',
            ]);
        }

        // 接入 laravel 的登录
        $this->guard()->loginUsingId($item->id, true);

        return redirect(url('wechat/car/create'));
    }

    protected function guard()
    {
        return Auth::guard('wechat'); // 自定义认证驱动
    }
}
