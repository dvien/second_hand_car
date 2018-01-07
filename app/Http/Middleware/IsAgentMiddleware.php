<?php

namespace App\Http\Middleware;

use App\Models\WechatUser;
use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * 是否代理人判定, 不是代理人不能进入代理中心等模块
 *
 * Class IsAgentMiddleware
 * @package App\Http\Middleware
 */
class IsAgentMiddleware
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
        if ($this->guard()->user()->wechat_user_type != WechatUser::AGENT_CODE) {
            return redirect(url('wechat/car/create'));
        } else {
            return $next($request);
        }
    }

    protected function guard()
    {
        return Auth::guard('wechat'); // 自定义认证驱动
    }
}
