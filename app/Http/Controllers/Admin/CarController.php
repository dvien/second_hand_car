<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Repositories\CarRepository;

class CarController extends Controller
{
    protected $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        parent::__construct();

        $this->carRepository = $carRepository;
    }

    public function index()
    {
        $this->data['page_title'] = '车库列表';

        return view('admin.car.index', $this->data);
    }

    public function dealNew($id)
    {
        $this->data['page_title'] = '新入库处理操作';

        return view('admin.car.deal_new', $this->data);
    }

    public function dealTalk($id)
    {
        $this->data['page_title'] = '洽谈中处理操作';

        return view('admin.car.deal_talk', $this->data);
    }

    public function show($id)
    {
        $this->data['page_title'] = '车辆详情';

        return view('admin.car.show', $this->data);
    }
}