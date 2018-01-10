<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clear', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date')->comment('结算开始日期: 包含');
            $table->date('end_date')->comment('结算截止日期: 包含');
            $table->decimal('income')->comment('收入');
            $table->decimal('commission')->comment('分佣');
            $table->decimal('profit')->comment('利润');
            $table->integer('clear_state')->default(0)->comment('结算状态: 0 未处理; 1 等待结算 2 已结算;');
            $table->integer('admin_user_id')->default(0)->comment('最后一次操作本条记录的后台用户');
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
        Schema::dropIfExists('clear');
    }
}
