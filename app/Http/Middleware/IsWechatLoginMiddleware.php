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
            // TODO: 没有微信登陆就登陆一个测试账号
            $this->guard()->loginUsingId(1, true);

            return $next($request);
        }
    }

    protected function guard()
    {
        return Auth::guard('wechat'); // 自定义认证驱动
    }
}
