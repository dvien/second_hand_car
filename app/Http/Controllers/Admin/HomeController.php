<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        return redirect('admin/center');
    }

    public function center(Car $car)
    {
        $this->data['page_title'] = '后台首页';

        $this->data['cars_count'] = $car->countByState();

        return view('admin.center', $this->data);
    }
}
