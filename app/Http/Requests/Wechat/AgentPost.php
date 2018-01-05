<?php

namespace App\Http\Requests\Wechat;

use Illuminate\Foundation\Http\FormRequest;

class AgentPost extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|numeric',
            'hangye' => 'required',
            'job' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '姓名',
            'phone' => '手机',
            'hangye' => '行业',
            'job' => '职务',
        ];
    }
}
