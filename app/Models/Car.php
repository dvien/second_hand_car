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
}
