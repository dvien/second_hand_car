<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class WechatUser extends Authenticatable
{
    use Notifiable, SoftDeletes;

    // 是代理人
    const AGENT_CODE = 1;

    protected $table = 'wechat_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'wechat_openid',
        'wechat_nickname',
        'wechat_headimgurl',
        'wechat_unionid',
        'wechat_sex',
        'name',
        'sex',
        'phone',
        'hangye',
        'job',
        'wechat_user_type',
        'first_wechat_user_id',
        'second_wechat_user_id',
        'can_get_price',
        'has_get_price',
        'getting_price',
        'total_price',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $sex = [
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
