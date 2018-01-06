<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 模型基础
 *
 */
class BaseModel extends Model
{
    use SoftDeletes;

    // 分页数量
    const PER_PAGE = 1;
}