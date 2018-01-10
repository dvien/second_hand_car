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

    // 结算状态
    // 未处理
    const CLEAR_NEW = 0;

    // 等待结算
    const CLEAR_WAIT = 1;

    // 已结算
    const CLEAR_OK = 2;

    /**
     * 结算涉及的车辆
     */
    public function cars()
    {
        return $this->belongsToMany(Car::class, 'clear_car', 'clear_id', 'car_id');
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
