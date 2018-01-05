<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Repositories\CarRepository;

class FinanceController extends Controller
{
    protected $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        parent::__construct();

        $this->carRepository = $carRepository;
    }

    public function index()
    {
        $this->data['page_title'] = '财务列表';

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