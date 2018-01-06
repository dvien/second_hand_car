<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\WechatUserDealWaitPost;
use App\Models\WechatUser;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    protected $wechatUser;

    public function __construct(WechatUser $wechatUser)
    {
        parent::__construct();

        $this->wechatUser = $wechatUser;
    }

    public function index(Request $request)
    {
        $this->data['page_title'] = '代理列表';

        $this->data['current_code'] = $currentCode = $request->get('wechat_user_type');

        $wechatUsers = $this->wechatUser->getListByType($currentCode);

        foreach ($wechatUsers AS &$wechatUser) {
            $wechatUser->created_at_str = $wechatUser->created_at->toDateString();

            switch ($wechatUser->wechat_user_type) {
                case WechatUser::APPLY_AGENT_CODE:
                    $wechatUser->url = url("admin/agent/{$wechatUser->id}/deal_wait");
                    break;
                default:
                    $wechatUser->url = url("admin/agent/{$wechatUser->id}");
            }
        }

        unset($wechatUser);

        $this->data['wechat_users'] = $wechatUsers;

        $this->data['apply_code'] = WechatUser::APPLY_AGENT_CODE;

        return view('admin.agent.index', $this->data);
    }

    public function dealWait($id)
    {
        $this->data['page_title'] = '代理处理';

        $this->data['wechat_user'] = $wechatUser = $this->wechatUser->find($id);

        // 不是申请中状态就跳转到详情页
        if ($wechatUser->wechat_user_type != WechatUser::APPLY_AGENT_CODE) {
            return redirect(url("admin/agent/{$wechatUser->id}"));
        }

        $this->data['wechat_user_types'] = $this->wechatUser->getDealWaitWechatUserStates();

        return view('admin.agent.deal_wait', $this->data);
    }

    public function dealWaitUpdate(WechatUserDealWaitPost $request, $id)
    {
        $wechatUser = $this->wechatUser->find($id);

        if ($wechatUser->wechat_user_type != WechatUser::APPLY_AGENT_CODE) {
            return redirect(url("admin/agent/{$wechatUser->id}"));
        } else {
            $wechatUser->wechat_user_type = $request->get('wechat_user_type');
            $wechatUser->save();

            return redirect(url("admin/agent/{$wechatUser->id}"));
        }
    }

    public function show($id)
    {
        $this->data['page_title'] = '代理详情';

        $this->data['wechat_user'] = $this->wechatUser->find($id);

        return view('admin.agent.show', $this->data);
    }
}