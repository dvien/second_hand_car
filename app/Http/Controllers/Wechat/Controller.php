<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // 微信端登陆用户信息
    protected $auth;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->auth = $this->guard()->user();

            return $next($request);
        });
    }

    protected function guard()
    {
        return Auth::guard('wechat'); // 自定义认证驱动
    }
}
