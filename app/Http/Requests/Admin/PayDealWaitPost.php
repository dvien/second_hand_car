<?php

namespace App\Http\Requests\Admin;

use App\Models\Pay;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PayDealWaitPost extends FormRequest
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
        $validCodes = array_pluck($pay->getDealWaitPayStates(), 'code');

        return [
            'pay_state' => ['required', Rule::in($validCodes)],
        ];
    }

    public function attributes()
    {
        return [
            'pay_state' => '提现状态',
        ];
    }
}
