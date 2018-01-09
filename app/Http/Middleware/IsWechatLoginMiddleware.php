<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsWechatLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->guard()->check()) {
            return $next($request);
        } else {
            // TODO: 授权后跳转 url
            $oauthUrl = "http://lara.s1.natapp.cc/wechat/wechat_user_oauth";

            if ($request->get('wechat_id')) {
                $oauthUrl = "{$oauthUrl}?wechat_id={$request->get('wechat_id')}";
            }

            $wechatApp = app('wechat.official_account');

            return $wechatApp->oauth->redirect($oauthUrl);
        }
    }

    protected function guard()
    {
        return Auth::guard('wechat'); // 自定义认证驱动
    }
}
