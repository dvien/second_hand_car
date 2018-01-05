<?php

namespace App\Models;

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
}
