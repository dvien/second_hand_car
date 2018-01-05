<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Repositories\CarRepository;

class ApplyController extends Controller
{
    protected $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        parent::__construct();

        $this->carRepository = $carRepository;
    }

    public function index()
    {
        $this->data['page_title'] = '提现列表';

        return view('admin.apply.index', $this->data);
    }

    public function dealWait($id)
    {
        $this->data['page_title'] = '提现处理';

        return view('admin.apply.deal_wait', $this->data);
    }

    public function show($id)
    {
        $this->data['page_title'] = '提现详情';

        return view('admin.apply.show', $this->data);
    }
}