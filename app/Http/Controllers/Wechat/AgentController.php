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

        $this->data['page_title'] = '我要代理';

        $this->data['sex'] = (new WechatUser())->sex;

        return view('wechat.agent.create', $this->data);
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
}