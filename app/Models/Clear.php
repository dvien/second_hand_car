<?php

namespace App\Models;

class Clear extends BaseModel
{
    protected $table = 'clear';

    protected $fillable = [
        'start_date',
        'end_date',
        'income',
        'profit',
        'clear_state',
    ];
}
