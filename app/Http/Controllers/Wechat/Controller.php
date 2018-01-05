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

    // 模板数据
    protected $data = [];

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->auth = $this->guard()->user();

            $this->data['wechat_nickname'] = $this->auth->wechat_nickname;

            $this->data['wechat_headimgurl'] = $this->auth->wechat_headimgurl;

            // 总收入
            $this->data['total_price'] = $this->auth->total_price;

            // 可提现金额
            $this->data['can_get_price'] = $this->auth->can_get_price;

            return $next($request);
        });
    }

    protected function guard()
    {
        return Auth::guard('wechat'); // 自定义认证驱动
    }
}
