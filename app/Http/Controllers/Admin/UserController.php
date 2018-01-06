<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminUserPost;
use App\Models\AdminUser;

class UserController extends Controller
{
    protected $adminUser;

    public function __construct(AdminUser $adminUser)
    {
        parent::__construct();

        $this->adminUser = $adminUser;
    }

    public function index()
    {
        $this->data['page_title'] = '后台用户列表';

        $this->data['admin_users'] = $this->adminUser->getList();

        return view('admin.user.index', $this->data);
    }

    public function create()
    {
        $this->data['page_title'] = '后台用户创建';

        return view('admin.user.create', $this->data);
    }

    public function store(AdminUserPost $request)
    {
        $input = $request->only([
            'name',
            'email',
            'password',
        ]);

        $input['password'] = bcrypt($input['password']);

        $this->adminUser->create($input);

        return redirect(url('admin/user'));
    }
}