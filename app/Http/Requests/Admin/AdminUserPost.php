<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admin_user',
            'password' => 'required|string|min:6',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名字',
            'email' => '邮箱(账号)',
            'password' => '密码',
        ];
    }
}
