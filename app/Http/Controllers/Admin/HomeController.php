<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return redirect('admin/center');

//        return view('admin.home');
    }

    public function center()
    {
        $this->data['page_title'] = '后台首页';

        return view('admin.center', $this->data);
    }
}
