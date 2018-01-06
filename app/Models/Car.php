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

    public $ownerSexes = [
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

    // 新入库
    const NEW_CAR_CODE = 1;

    // 洽谈中
    const TALK_CAR_CODE = 2;

    // 成交
    const DONE_CAR_CODE = 3;

    // 未成交
    const UNDONE_CAR_CODE = 4;

    public $carStates = [
        [
            'code' => self::NEW_CAR_CODE,
            'name' => '新入库',
            'count' => 0,
        ],
        [
            'code' => self::TALK_CAR_CODE,
            'name' => '洽谈中',
            'count' => 0,
        ],
        [
            'code' => self::DONE_CAR_CODE,
            'name' => '成交',
            'count' => 0,
        ],
        [
            'code' => self::UNDONE_CAR_CODE,
            'name' => '未成交',
            'count' => 0,
        ],
    ];

    protected $appends = [
        'owner_sex_str',
    ];

    // 所属的一级代理人
    public function firstWechatUser()
    {
        return $this->belongsTo(WechatUser::class, 'first_wechat_user_id', 'id');
    }

    // 所属的二级代理人
    public function secondWechatUser()
    {
        return $this->belongsTo(WechatUser::class, 'second_wechat_user_id', 'id');
    }

    /**
     * 性别转中文
     *
     * @return string
     */
    public function getOwnerSexStrAttribute()
    {
        foreach ($this->ownerSexes AS $sex) {
            if ($sex['code'] == $this->owner_sex) {
                return $sex['name'];
            }
        }

        return '';
    }

    /**
     * 车辆分页, 根据指定状态
     *
     * @param int $carState
     * @return mixed
     */
    public function getListByState($carState = 1)
    {
        return $this->where('car_state', $carState)->simplePaginate(1)->appends(['car_state' => $carState]);
    }

    /**
     * 车辆状态统计
     *
     * @return array
     */
    public function countByState()
    {
        $field = [
            'car_state',
            DB::raw('count(*) AS count'),
        ];

        $counts = $this->groupBy('car_state')->get($field)->pluck('count', 'car_state');

        foreach ($this->carStates AS &$state) {
            $code = $state['code'];

            $state['count'] = isset($counts[$code]) ? $counts[$code] : 0;
        }

        unset($state);

        return $this->carStates;
    }

    /**
     * 处理新入库需要的下拉状态
     */
    public function getDealNewCarStates()
    {
        $needCodes = [
            self::TALK_CAR_CODE,
            self::UNDONE_CAR_CODE,
        ];

        $result = array_filter($this->carStates, function ($state) use($needCodes) {
            return in_array($state['code'], $needCodes);
        });

        return $result;
    }

    /**
     * 处理中车辆需要的下拉状态
     */
    public function getDealTalkCarStates()
    {
        $needCodes = [
            self::TALK_CAR_CODE,
            self::DONE_CAR_CODE,
            self::UNDONE_CAR_CODE,

        ];

        $result = array_filter($this->carStates, function ($state) use($needCodes) {
            return in_array($state['code'], $needCodes);
        });

        return $result;
    }
}
