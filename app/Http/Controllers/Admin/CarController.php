<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected $car;

    public function __construct(Car $car)
    {
        parent::__construct();

        $this->car = $car;

        $this->data['cars_count'] = $this->car->countByState();
    }

    public function index(Request $request, Car $car)
    {
        $this->data['page_title'] = '车库列表';

        $carSteate = $request->get('car_state', 1);

        $this->data['cars'] = $car->getListByState($carSteate);

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

        $this->data['car'] = $this->car->find($id);

        return view('admin.car.show', $this->data);
    }
}