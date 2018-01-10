<?php

namespace App\Http\Requests\Admin;

use App\Models\Clear;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClearDealWaitPost extends FormRequest
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
    public function rules(Clear $clear)
    {
        $validCodes = array_pluck($clear->getDealWaitStates(), 'code');

        return [
            'clear_state' => ['required', Rule::in($validCodes)],
        ];
    }

    public function attributes()
    {
        return [
            'clear_state' => '结算状态',
        ];
    }
}
