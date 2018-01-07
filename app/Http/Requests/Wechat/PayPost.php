<?php

namespace App\Http\Requests\Wechat;

use App\Models\Pay;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PayPost extends FormRequest
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
    public function rules(Pay $pay)
    {
        $wechatUser = Auth::guard('wechat')->user();

        $validCodes = array_pluck($pay->getApplyPayTypes(), 'code');

        return [
            'pay_type'  => Rule::in($validCodes),
            'account'   => 'required|string',
            'real_name' => 'required|string',
            'price'     => "required|numeric|max:{$wechatUser->can_get_price}", // 输入金额不能超过可提现额度
        ];
    }

    public function attributes()
    {
        return [
            'pay_type'  => '支付方式',
            'account'   => '账号',
            'real_name' => '真实姓名',
            'price'     => '提现金额',
        ];
    }

    // TODO: 这里为什么不会覆盖呢?
    public function message()
    {
        return [
            'price.max' => '提现金额不能超过可提现额度',
        ];
    }
}
