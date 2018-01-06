<?php

namespace App\Http\Requests\Admin;

use App\Models\Car;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DealNewPost extends FormRequest
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
        $dealNewCarStates = (new Car())->getDealNewCarStates();

        $validCodes = array_pluck($dealNewCarStates, 'code');

        return [
            'car_state' => "required",
            'car_state' => Rule::in($validCodes),
        ];
    }

    public function attributes()
    {
        return [
            'car_state' => '车辆状态',
        ];
    }
}
