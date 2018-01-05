<?php

namespace App\Http\Requests\Wechat;

use Illuminate\Foundation\Http\FormRequest;

class CarPost extends FormRequest
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
            'owner_name' => 'required',
            'phone' => 'required|numeric',
            'brand' => 'required',
            'price' => 'required|numeric',
            'date' => 'required|date',
            'address' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'owner_name' => '车主姓名',
            'phone' => '手机号码',
            'brand' => '品牌车型',
            'price' => '期望售价',
            'date' => '预约时间',
            'address' => '预约地点',
        ];
    }
}
