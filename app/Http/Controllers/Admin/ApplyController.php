<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PayDealWaitPost;
use App\Models\Pay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplyController extends Controller
{
    protected $pay;

    public function __construct(Pay $pay)
    {
        parent::__construct();

        $this->pay = $pay;
    }

    public function index(Request $request)
    {
        $this->data['page_title'] = '提现列表';

        $this->data['current_pay_state'] = $paySteate = $request->get('pay_state');

        $this->data['pays'] = $this->pay->getListByState($paySteate);

        return view('admin.apply.index', $this->data);
    }

    public function dealWait($id)
    {
        $this->data['page_title'] = '提现处理';

        $this->data['pay'] = $this->pay->with(['wechat_user'])->find($id);

        // 已经提现过就跳转到详情页
        if ($this->data['pay']->pay_state == Pay::STATE_OK) {
            return redirect(url("admin/apply/{$id}"));
        }

        $this->data['pay_states'] = $this->pay->getDealWaitPayStates();

        return view('admin.apply.deal_wait', $this->data);
    }

    /**
     * 提现中 处理为 已提现
     *
     * @param PayDealWaitPost $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function dealWaitUpdate(PayDealWaitPost $request, $id)
    {
        $pay = $this->pay->find($id);

        // 已经提现过就跳转到详情页
        if ($pay->pay_state == Pay::STATE_OK) {
            return redirect(url("admin/apply/{$id}"));
        }

        DB::transaction(function () use ($request, $pay) {
            // 提现状态 后台操作人
            $pay->pay_state = Pay::STATE_OK;

            $pay->admin_user_id = $this->auth->id;

            $pay->save();

            $wechatUser = $pay->wechat_user;

            // 已提现金额
            $wechatUser->has_get_price = (float)$wechatUser->has_get_price + (float)$pay->price;

            // 处理中金额
            $wechatUser->getting_price = (float)$wechatUser->getting_price - (float)$pay->price;

            $wechatUser->save();
        });

        return redirect(url("admin/apply/{$id}"));
    }

    public function show($id)
    {
        $this->data['page_title'] = '提现详情';

        $this->data['pay'] = $this->pay->with(['wechat_user'])->find($id);

        return view('admin.apply.show', $this->data);
    }
}