<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Requests\Wechat\AgentPost;
use App\Models\Car;
use App\Models\WechatUser;

class AgentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        // 已经是代理人就跳转到 代理中心
        if ($this->auth->wechat_user_type == WechatUser::AGENT_CODE) {
            return redirect('wechat/agent/center');
        }

        $this->data['page_title'] = '我要代理';

        $this->data['sex'] = (new WechatUser())->sexes;

        return view('wechat.agent.create', $this->data);
    }

    public function store(AgentPost $request)
    {
        // 已经是代理人就跳转到 代理中心
        if ($this->auth->wechat_user_type == WechatUser::AGENT_CODE) {
            return redirect('wechat/agent/center');
        }

        $input = $request->only([
            'name',
            'sex',
            'phone',
            'hangye',
            'job',
        ]);

        $input['wechat_user_type'] = WechatUser::APPLY_AGENT_CODE;

        $this->auth->update($input);

        return redirect('wechat/car/create');
    }

    public function center()
    {
        $this->data['page_title'] = '代理中心';

        return view('wechat.agent.center', $this->data);
    }

    public function rule()
    {
        $this->data['page_title'] = '代理规则';

        return view('wechat.agent.rule', $this->data);
    }

    public function qrCode()
    {
        $this->data['page_title'] = '推广二维码';
        // TODO: 二维码生成尚未处理

        return view('wechat.agent.qr_code', $this->data);
    }

    public function myUser()
    {
        $this->data['page_title'] = '我的团队';
        // TODO: 团队数据还没查询

        return view('wechat.agent.my_user', $this->data);
    }

    public function myCar()
    {
        $this->data['page_title'] = '我的车库';
        // TODO: 车库数据还没查询

        return view('wechat.agent.my_car', $this->data);
    }

    public function apply()
    {
        $this->data['page_title'] = '申请提现';
        // TODO: 提现表单没有实现

        return view('wechat.agent.apply', $this->data);
    }    

    public function myAccount()
    {
        $this->data['page_title'] = '提现记录';
        // TODO: 提现记录据还没查询

        return view('wechat.agent.my_account', $this->data);
    }
}