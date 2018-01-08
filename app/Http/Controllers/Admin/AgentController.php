<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\WechatUserDealWaitPost;
use App\Models\WechatUser;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use QrCode;

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

    /**
     * 代理人申请处理: 如果会员成为代理人后, 拿一级佣金的代理人 变成自己; 拿二级佣金的代理人 变成原来 拿一级佣金的代理人.
     *
     * @param WechatUserDealWaitPost $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function dealWaitUpdate(WechatUserDealWaitPost $request, $id)
    {
        $wechatUser = $this->wechatUser->find($id);

        if ($wechatUser->wechat_user_type != WechatUser::APPLY_AGENT_CODE) {
            return redirect(url("admin/agent/{$wechatUser->id}"));
        } else {
            $wechatUserType = $request->get('wechat_user_type');

            $wechatUser->wechat_user_type = $wechatUserType;

            // 如果会员成为代理人后, 拿一级佣金的代理人 变成自己; 拿二级佣金的代理人 变成原来 拿一级佣金的代理人
            if ($wechatUserType == WechatUser::AGENT_CODE) {
                $wechatUser->second_wechat_user_id = $wechatUser->first_wechat_user_id;
//
                $wechatUser->first_wechat_user_id = $wechatUser->id;

                $wechatUser->agent_qrcode_url = $this->generateQrcodeUrl($wechatUser->id);
            }

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

    protected function generateQrcodeUrl($id)
    {
        $qrcodePath = public_path() . '/images';

        // 生成邀请 url 的二维码
        QrCode::format('png')->size(80)->margin(0.1)->generate(url("wechat/car/create?wechat_id={$id}"), "{$qrcodePath}/qrcode_{$id}.png");

        // 把生成的二维码放入指定图片里 (成为图片的一小部分)
        $im = new ImageManager();

        $warter = $im->make("{$qrcodePath}/qrcode_{$id}.png");

        $image  = $im->make("{$qrcodePath}/qrcode_background.png");

        $image->insert($warter, 'top-left', 70, 55);

        $image->save("{$qrcodePath}/agent_qrcode_{$id}.png");

        $url = url("images/agent_qrcode_{$id}.png");

        return $url;
    }
}