<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class WechatUser extends Authenticatable
{
    use Notifiable, SoftDeletes;

    // 分页数
    const PER_PAGE = 10;

    // 是代理人
    const AGENT_CODE = 1;

    // 申请为代理人 中
    const APPLY_AGENT_CODE = 2;

    // 申请为代理人 不通过
    const UNPASS_AGENT_CODE = 3;

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

    public $sexes = [
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

    public $wechatUserTypes = [
        [
            'code' => 0,
            'name' => '未申请',
        ],
        [
            'code' => self::AGENT_CODE,
            'name' => '代理人',
        ],
        [
            'code' => self::APPLY_AGENT_CODE,
            'name' => '申请中',
        ],
        [
            'code' => self::UNPASS_AGENT_CODE,
            'name' => '不通过',
        ],
    ];

    /**
     * 用户发部过的车辆
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cars()
    {
        return $this->hasMany(Car::class, 'wechat_user_id', 'id');
    }

    /**
     * 性别转中文
     *
     * @return string
     */
    public function getSexStrAttribute()
    {
        foreach ($this->sexes AS $sex) {
            if ($sex['code'] == $this->sex) {
                return $sex['name'];
            }
        }

        return '';
    }

    /**
     * 性别转中文
     *
     * @return string
     */
    public function getWechatUserTypeStrAttribute()
    {
        foreach ($this->wechatUserTypes AS $wechatUserType) {
            if ($wechatUserType['code'] == $this->wechat_user_type) {
                return $wechatUserType['name'];
            }
        }

        return '';
    }

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

    /**
     * 申请为代理人能选到的状态
     */
    public function getDealWaitWechatUserStates()
    {
        $needCodes = [
            self::AGENT_CODE,
            self::UNPASS_AGENT_CODE,
        ];

        $result = array_filter($this->wechatUserTypes, function ($state) use($needCodes) {
            return in_array($state['code'], $needCodes);
        });

        return $result;
    }

    /**
     * 我的团队
     */
    public function getMyUserList($wechatUserId)
    {
        return $this->with(['cars'])
                    ->where('first_wechat_user_id', $wechatUserId)
                    ->orWhere('second_wechat_user_id', $wechatUserId)
                    ->paginate(self::PER_PAGE);
    }

    /**
     * 我发展的用户id (且包含我自己的)
     *
     * @param $wechatUserId
     * @return mixed
     */
    public function myUserIds($wechatUserId)
    {
        $myUserIds = $this->where('first_wechat_user_id', $wechatUserId)
                        ->orWhere('second_wechat_user_id', $wechatUserId)
                        ->pluck('id')
                        ->toArray();

        // 补上用户自己的
        array_unshift($myUserIds, $wechatUserId);

        return $myUserIds;
    }
}
