<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        return redirect('admin/center');
    }

    public function center()
    {
        $this->data['page_title'] = '后台首页';

        $this->data['cars_count'] = (new Car())->countByState();

        return view('admin.center', $this->data);
    }
}
