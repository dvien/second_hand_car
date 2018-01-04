<?php

namespace App\Http\Controllers\Wechat;

use App\Repositories\CarRepository;

class CarController extends Controller
{
    protected $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        parent::__construct();

        $this->carRepository = $carRepository;
    }

    public function create()
    {
        $data['page_title'] = '高价收车，上门评估';

        return view('wechat.car.create', $data);
    }
}