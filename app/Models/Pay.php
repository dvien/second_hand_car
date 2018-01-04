<?php

namespace App\Models;

class Pay extends BaseModel
{
    protected $table = 'pay';

    protected $fillable = [
        'pay_type',
        'account',
        'real_name',
        'price',
        'pay_state',
    ];
}
