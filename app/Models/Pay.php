<?php

namespace App\Models;

class Pay extends BaseModel
{
    protected $table = 'pay';

    protected $fillable = [
        'wechat_user_id',
        'pay_type',
        'account',
        'real_name',
        'price',
        'pay_state',
        'admin_user_id',
    ];

    // 待结算 (处理中)
    const STATE_WAIT = 1;

    // 已结算
    const STATE_OK = 2;

    public $payStates = [
        [
            'code' => self::STATE_WAIT,
            'name' => '待结算',
        ],
        [
            'code' => self::STATE_OK,
            'name' => '已结算',
        ],
    ];

    // 支付宝
    const PAY_ALIPAY = 1;

    // 微信支付
    const PAY_WECHAT = 2;

    public $payTypes = [
        [
            'code' => self::PAY_ALIPAY,
            'name' => '支付宝',
        ],
        [
            'code' => self::PAY_WECHAT,
            'name' => '微信',
        ],
    ];

    public function getApplyPayTypes()
    {
        return $this->payTypes;
    }
}
