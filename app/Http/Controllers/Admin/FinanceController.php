<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ClearDealWaitPost;
use App\Models\Car;
use App\Models\Clear;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    protected $clear;

    protected $car;

    public function __construct(Clear $clear, Car $car)
    {
        parent::__construct();

        $this->clear = $clear;

        $this->car = $car;
    }

    public function index()
    {
        $this->data['page_title'] = '财务列表';

        $this->clear->lastWeekSummary();

        $this->data['finances'] = $this->clear->getList();

        return view('admin.finance.index', $this->data);
    }

    public function dealWait($id)
    {
        $this->data['page_title'] = '财务处理';

        $finance = $this->clear->with(['cars'])->find($id);

        // 不是待结算状态就跳转到详情页
        if ($finance->clear_state != Clear::CLEAR_WAIT) {
            return redirect(url("admin/finance/{$finance->id}"));
        }

        $this->data['finance'] = $finance;

        $this->data['clear_states'] = $this->clear->getDealWaitStates();

        return view('admin.finance.deal_wait', $this->data);
    }

    public function dealWaitUpdate(ClearDealWaitPost $request, $id)
    {
        $finance = $this->clear->with(['cars'])->find($id);

        // 不是待结算状态就跳转到详情页
        if ($finance->clear_state != Clear::CLEAR_WAIT) {
            return redirect(url("admin/finance/{$finance->id}"));
        }

        DB::transaction(function () use ($finance, $request) {
            $finance->clear_state = $request->get('clear_state');
            $finance->admin_user_id = $this->auth->id; // 操作人
            $finance->save();

            // 如果有车辆, 更新车辆 结算状态
            $carIds = array_pluck($finance->cars, 'id');

            if (!empty($carIds)) {
                Car::whereIn('id', $carIds)->update([
                    'clear_state' => $request->get('clear_state'),
                ]);
            }
        });

        return redirect(url('admin/finance'));
    }

    public function show($id)
    {
        $this->data['page_title'] = '财务详情';

        $this->data['finance'] = $this->clear->with(['cars'])->find($id);

        return view('admin.finance.show', $this->data);
    }

}