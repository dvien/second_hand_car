<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class WechatUser extends Authenticatable
{
    use Notifiable, SoftDeletes;

    // 分页数
    const PER_PAGE = 1;

    // 是代理人
    const AGENT_CODE = 1;

    // 申请为代理人
    const APPLY_AGENT_CODE = 2;

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


    /**
     * 微信用户(代理人)分页, 根据指定状态
     *
     * @param int $wechatUserType
     * @return mixed
     */
    public function getListByType($wechatUserType = null)
    {
        $query = new self;

        if (is_numeric($wechatUserType)) {
            $query = $query->where('wechat_user_type', $wechatUserType);
        }

        $query = $query->paginate(self::PER_PAGE);

        if (is_numeric($wechatUserType)) {
            $query = $query->appends(['wechat_user_type' => $wechatUserType]);
        }

        return $query;
    }
}
