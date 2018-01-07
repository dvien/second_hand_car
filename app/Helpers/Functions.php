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