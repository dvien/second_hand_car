<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Requests\Wechat\AgentPost;
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

        $data['page_title'] = '我要代理';

        $data['sex'] = (new WechatUser())->sex;

        return view('wechat.agent.create', $data);
    }

    public function store(AgentPost $request)
    {
        $input = $request->only([
            'name',
            'sex',
            'phone',
            'hangye',
            'job',
        ]);

        $input['wechat_user_type'] = WechatUser::AGENT_CODE;

        $this->auth->update($input);

        return redirect('wechat/agent/center');
    }
}