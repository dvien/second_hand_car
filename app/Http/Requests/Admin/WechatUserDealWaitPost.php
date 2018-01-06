<?php

namespace App\Http\Requests\Admin;

use App\Models\WechatUser;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class WechatUserDealWaitPost extends FormRequest
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
        $dealNewCarStates = (new WechatUser())->getDealWaitWechatUserStates();

        $validCodes = array_pluck($dealNewCarStates, 'code');

        return [
            'wechat_user_type' => "required",
            'wechat_user_type' => Rule::in($validCodes),
        ];
    }

    public function attributes()
    {
        return [
            'wechat_user_type' => '审核状态',
        ];
    }
}
