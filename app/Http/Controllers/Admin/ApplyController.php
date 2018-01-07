<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pay;
use Illuminate\Http\Request;

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

        return view('admin.apply.deal_wait', $this->data);
    }

    public function show($id)
    {
        $this->data['page_title'] = '提现详情';

        $this->data['pay'] = $this->pay->with(['wechat_user'])->find($id);

        return view('admin.apply.show', $this->data);
    }
}