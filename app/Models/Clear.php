<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Clear extends BaseModel
{
    protected $table = 'clear';

    protected $fillable = [
        'start_date',
        'end_date',
        'income',
        'commission',
        'profit',
        'clear_state',
    ];

    protected $appends = [
        'button',
        'clear_state_str',
    ];

    // 结算状态
    // 未处理
    const CLEAR_NEW = 0;

    // 待结算
    const CLEAR_WAIT = 1;

    // 已结算
    const CLEAR_OK = 2;

    public $clearStates = [
        [
            'code' => self::CLEAR_NEW,
            'name' => '未处理',
        ],
        [
            'code' => self::CLEAR_WAIT,
            'name' => '待结算',
        ],
        [
            'code' => self::CLEAR_OK,
            'name' => '已结算',
        ],
    ];

    /**
     * 结算涉及的车辆
     */
    public function cars()
    {
        return $this->belongsToMany(Car::class, 'clear_car', 'clear_id', 'car_id');
    }

    /**
     * 根据状态返回详情按钮信息
     *
     * @return array
     */
    public function getButtonAttribute()
    {
        $result = [
            'url' => '',
            'str' => '',
        ];

        switch ($this->clear_state) {
            case self::CLEAR_WAIT:
                $result = [
                    'url' => url("admin/finance/{$this->id}/deal_wait"),
                    'str' => '待结算',
                ];
                break;
            default:
                $result = [
                    'url' => url("admin/finance/{$this->id}"),
                    'str' => '详情',
                ];
        }

        return $result;
    }

    /**
     * 结算状态转中文
     *
     * @return string
     */
    public function getClearStateStrAttribute()
    {
        foreach ($this->clearStates AS $clearState) {
            if ($clearState['code'] == $this->clear_state) {
                return $clearState['name'];
            }
        }

        return '';
    }

    /**
     * 处理 待结算 需要的下拉状态
     */
    public function getDealWaitStates()
    {
        $needCodes = [
            self::CLEAR_OK,
        ];

        $result = array_filter($this->clearStates, function ($state) use($needCodes) {
            return in_array($state['code'], $needCodes);
        });

        return $result;
    }

    /**
     * 结算列表
     */
    public function getList()
    {
        return $this->orderBy('end_date', 'DESC')->paginate(self::PER_PAGE);
    }

    /**
     * 上周报表检查生成
     */
    public function lastWeekSummary()
    {
        $lastWeekRange = getLastWeekRange();

        $item = $this
                    ->where('start_date', $lastWeekRange[0])
                    ->where('end_date', $lastWeekRange[1])
                    ->first();

        if (is_null($item)) {
            // 上周卖出去的新车
            $cars = Car::whereBetween('deal_ok_date', $lastWeekRange)
                        ->where('clear_state', Clear::CLEAR_NEW)
                        ->get();

            DB::transaction(function () use ($cars, $lastWeekRange) {
                // 收入
                $income = array_sum(array_pluck($cars, 'income'));

                // 分佣
                $commission = array_sum(array_pluck($cars, 'commission'));

                // 利润
                $profit = array_sum(array_pluck($cars, 'profit'));

                $carIds = array_pluck($cars, 'id');

                // 创建结算主表, 没有结算数据就直接完结
                $clear = Clear::create([
                    'start_date'    => $lastWeekRange[0],
                    'end_date'      => $lastWeekRange[1],
                    'income'        => $income,
                    'commission'    => $commission,
                    'profit'        => $profit,
                    'clear_state'   => !empty($carIds) ? Clear::CLEAR_WAIT: Clear::CLEAR_OK ,
                ]);

                // 如果有车辆
                if (!empty($carIds)) {
                    // 更新车辆 结算状态
                    Car::whereIn('id', $carIds)->update([
                        'clear_state' => Clear::CLEAR_WAIT,
                    ]);

                    // 结算关联的车子
                    $clear->cars()->sync($carIds);
                }
            });
        }
    }
}
