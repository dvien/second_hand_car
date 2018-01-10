<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Clear;

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

        return view('admin.finance.deal_wait', $this->data);
    }

    public function show($id)
    {
        $this->data['page_title'] = '财务详情';

        return view('admin.finance.show', $this->data);
    }

}