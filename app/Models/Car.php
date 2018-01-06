<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Car extends BaseModel
{
    protected $table = 'car';

    protected $fillable = [
        'wechat_user_id',
        'owner_name',
        'owner_sex',
        'phone',
        'brand',
        'price',
        'date',
        'address',
        'car_state',
        'admin_user_id',
        'profit',
        'first_wechat_user_id',
        'first_price',
        'second_wechat_user_id',
        'second_price',
        'description',
        'income',
        'commission',
        'clear_state',
    ];

    public $ownerSex = [
        [
            'code' => 0,
            'name' => '未知',
        ],
        [
            'code' => 1,
            'name' => '男',
        ],
        [
            'code' => 2,
            'name' => '女',
        ],
    ];

    public $carState = [
        [
            'code' => 1,
            'name' => '新入库',
            'count' => 0,
        ],
        [
            'code' => 2,
            'name' => '洽谈中',
            'count' => 0,
        ],
        [
            'code' => 3,
            'name' => '成交',
            'count' => 0,
        ],
        [
            'code' => 4,
            'name' => '未成交',
            'count' => 0,
        ],
    ];

    protected $appends = [
        'owner_sex_str',
    ];

    public function getOwnerSexStrAttribute()
    {
        foreach ($this->ownerSex AS $sex) {
            if ($sex['code'] == $this->owner_sex) {
                return $sex['name'];
            }
        }

        return '';
    }

    public function getListByState($carState = 1)
    {
        return $this->where('car_state', $carState)->simplePaginate(1);
    }

    public function countByState()
    {
        $field = [
            'car_state',
            DB::raw('count(*) AS count'),
        ];

        $counts = $this->groupBy('car_state')->get($field)->pluck('count', 'car_state');

        foreach ($this->carState AS &$state) {
            $code = $state['code'];

            $state['count'] = isset($counts[$code]) ? $counts[$code] : 0;
        }

        unset($state);

        return $this->carState;
    }
}
