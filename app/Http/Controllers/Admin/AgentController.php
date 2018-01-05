<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Repositories\CarRepository;

class AgentController extends Controller
{
    protected $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        parent::__construct();

        $this->carRepository = $carRepository;
    }

    public function index()
    {
        $this->data['page_title'] = '代理列表';

        return view('admin.agent.index', $this->data);
    }

    public function dealWait($id)
    {
        $this->data['page_title'] = '代理处理';

        return view('admin.agent.deal_wait', $this->data);
    }

    public function show($id)
    {
        $this->data['page_title'] = '代理详情';

        return view('admin.agent.show', $this->data);
    }
}