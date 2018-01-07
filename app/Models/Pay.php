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

    /**
     * 提现记录所属微信用户
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wechat_user()
    {
        return $this->belongsTo(WechatUser::class, 'wechat_user_id', 'id');
    }

    /**
     * 日期格式化处理
     */
    public function getCreatedAtStrAttribute()
    {
        return $this->created_at->toDateString();
    }

    /**
     * 提现状态转中文
     *
     * @return string
     */
    public function getPayStateStrAttribute()
    {
        foreach ($this->payStates AS $payState) {
            if ($payState['code'] == $this->pay_state) {
                return $payState['name'];
            }
        }

        return '';
    }

    /**
     * 提现账号类型转中文
     *
     * @return string
     */
    public function getPayTypeStrAttribute()
    {
        foreach ($this->payTypes AS $payType) {
            if ($payType['code'] == $this->pay_type) {
                return $payType['name'];
            }
        }

        return '';
    }

    /**
     * 根据提现状态得到详情 url
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getAdminShowUrlAttribute()
    {
        switch ($this->pay_state) {
            case self::STATE_WAIT:
                $url = url("admin/apply/{$this->id}/deal_wait");
                break;
            default:
                $url = url("admin/apply/{$this->id}");
        }

        return $url;
    }

    /**
     * 申请提现账号类型
     *
     * @return array
     */
    public function getApplyPayTypes()
    {
        return $this->payTypes;
    }

    /**
     * 微信用户提现记录
     *
     * @param $wechatUser
     * @return mixed
     */
    public function getMyAccountList($wechatUser)
    {
        return $this->where('wechat_user_id', $wechatUser->id)
                    ->paginate(self::PER_PAGE);
    }

    /**
     * 提现记录分页, 根据指定状态
     *
     * @param int $payState
     * @return mixed
     */
    public function getListByState($payState = null)
    {
        $query = new self;

        if (is_numeric($payState)) {
            $query = $query->where('pay_state', $payState);
        }

        $query = $query->paginate(self::PER_PAGE);

        if (is_numeric($payState)) {
            $query = $query->appends(['pay_state' => $payState]);
        }

        return $query;
    }

    /**
     * 处理申请提现的下拉选项
     *
     * @return array|mixed
     */
    public function getDealWaitPayStates()
    {
        $needCodes = [
            self::STATE_OK,
        ];

        $result = array_filter($this->payStates, function ($payState) use($needCodes) {
            return in_array($payState['code'], $needCodes);
        });

        return $result;
    }
}
