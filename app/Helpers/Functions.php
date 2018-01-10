<?php

if (! function_exists('getQueryLog')) {
    /**
     * 打印数据库查询
     */
    function getQueryLog()
    {
        dd(\Illuminate\Support\Facades\DB::getQueryLog());
    }
}

if (! function_exists('getLastWeekRange')) {
    /**
     * 获取上个星期(相对于本周)的开始日期和结束日期
     *
     * https://www.cnblogs.com/spectrelb/p/7055579.html
     *
     * @return array
     */
    function getLastWeekRange()
    {
        // php获取上周起始时间戳和结束时间戳
        $beginLastweek = mktime(0, 0, 0, date('m'), date('d') - date('w') + 1 - 7, date('Y'));

        $endLastweek   = mktime(23 , 59, 59, date('m'), date('d') - date('w') + 7 - 7, date('Y'));

        return [
            date('Y-m-d', $beginLastweek),
            date('Y-m-d', $endLastweek),
        ];
    }
}