<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wechat_user_id')->comment('发布人: 不一定是车主');
            $table->string('owner_name')->default('');
            $table->integer('owner_sex')->default(0);
            $table->string('phone');
            $table->string('brand')->comment('品牌车型');
            $table->decimal('price')->comment('期望售价');
            $table->date('date')->comment('预约时间');
            $table->string('address')->default('')->comment('预约地点');
            $table->integer('car_state')->default(1)->comment('1 新入库; 2 洽谈中; 3 成交; 4 未成交;');
            $table->integer('admin_user_id')->default(0)->comment('最后操作人: 填写利润等操作');
            $table->decimal('profit')->default(0.00)->comment('利润: 操作人自己输入');
            $table->integer('first_wechat_user_id')->default(0)->comment('拿一级佣金的代理人');
            $table->decimal('first_price')->default(0.00)->comment('一级提成');
            $table->integer('second_wechat_user_id')->default(0)->comment('拿二级佣金的代理人');
            $table->decimal('second_price')->default(0.00)->comment('二级提成');
            $table->string('description')->default('')->comment('情况');
            $table->decimal('income')->default(0.00)->comment('收入: 收入 = 利润 - 一级提成 - 二级提成');
            $table->decimal('commission')->default(0.00)->comment('分佣: 分佣 = 一级提成 + 二级提成');
            $table->integer('clear_state')->default(0)->comment('结算状态: 0 未处理; 1 等待结算 2 已结算;');
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
        Schema::dropIfExists('car');
    }
}
