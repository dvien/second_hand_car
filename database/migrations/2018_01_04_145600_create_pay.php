<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pay_type')->comment('支付方式: 1 支付宝; 2 微信');
            $table->string('account')->comment('账号');
            $table->string('real_name')->comment('真实姓名');
            $table->decimal('price')->comment('提现金额');
            $table->integer('pay_state')->comment('状态: 1. 申请提现; 2. 已转');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pay');
    }
}
