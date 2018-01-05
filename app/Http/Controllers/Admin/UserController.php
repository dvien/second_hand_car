<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Repositories\CarRepository;

class UserController extends Controller
{
    protected $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        parent::__construct();

        $this->carRepository = $carRepository;
    }

    public function index()
    {
        $this->data['page_title'] = '后台用户列表';

        return view('admin.user.index', $this->data);
    }
}