<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Requests\Wechat\CarPost;
use App\Models\Car;

class CarController extends Controller
{
    protected $car;

    public function __construct(Car $car)
    {
        parent::__construct();

        $this->car = $car;
    }

    public function create()
    {
        $this->data['page_title'] = '高价收车，上门评估';

        $this->data['owner_sex'] = (new Car())->ownerSexes;

        $this->data['wechat_user_type'] = $this->auth->wechat_user_type;

        return view('wechat.car.create', $this->data);
    }

    public function store(CarPost $request)
    {
        $input = $request->only([
            'owner_name',
            'sex',
            'phone',
            'brand',
            'price',
            'date',
            'address',
        ]);

        $input['wechat_user_id'] = $this->auth->id;

        $input['first_wechat_user_id'] = $this->auth->first_wechat_user_id;

        $input['second_wechat_user_id'] = $this->auth->second_wechat_user_id;

        $this->car->create($input);

        return redirect('wechat/car/create');
    }
}