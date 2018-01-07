<?php

namespace App\Http\Requests\Admin;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;


class CarDealTalkPost extends FormRequest
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
    public function rules(Request $request, Car $car)
    {
        $dealNewCarStates = $car->getDealTalkCarStates();

        $validCodes = array_pluck($dealNewCarStates, 'code');

        // 不同下拉框校验不一样的情况
        switch ($request->get('car_state')) {
            case Car::TALK_CAR_CODE:
                $rules = [
                    'car_state' => Rule::in($validCodes),
                ];
                break;
            case Car::DONE_CAR_CODE:
                $rules = [
                    'car_state' => Rule::in($validCodes),
                    'profit'    => 'required|numeric',
                ];

                // 一二级提成有对应人才要填写金额
                $carItem = $car->find($request->segment(3));

                if ($carItem->first_wechat_user_id) {
                    $rules['first_price'] = 'required|numeric';
                }

                if ($carItem->second_wechat_user_id) {
                    $rules['second_price'] = 'required|numeric';
                }

                break;
            case Car::UNDONE_CAR_CODE:
                $rules = [
                    'car_state' => Rule::in($validCodes),
                ];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'car_state' => '车辆状态',
            'profit'    => '利润',
            'first_price' => '一级提成',
            'second_price' => '二级提成',
        ];
    }
}
