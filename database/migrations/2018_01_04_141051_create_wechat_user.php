<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWechatUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wechat_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wechat_openid')->unique();
            $table->string('wechat_nickname');
            $table->string('wechat_headimgurl');
            $table->string('wechat_unionid')->default('');
            $table->integer('wechat_sex')->default(0);
            // 以下是申请代理人填写的相关信息
            $table->string('name');
            $table->integer('sex')->default(0);
            $table->string('phone');
            $table->string('hangye')->default('')->comment('行业');
            $table->string('job')->default('')->comment('职务');
            $table->integer('wechat_user_type')->default(0)->comment('字典: 1 代理人');
            $table->integer('first_wechat_user_id')->default(0)->comment('一级代理人');
            $table->integer('second_wechat_user_id')->default(0)->comment('二级代理人');
            $table->decimal('can_get_price')->default(0.00)->comment('可提现总金额');
            $table->decimal('has_get_price')->default(0.00)->comment('已经提现总金额');
            $table->decimal('getting_price')->default(0.00)->comment('处理中金额');
            $table->decimal('total_price')->default(0.00)->comment('总收入: can_get_price + has_get_price + geting_price');
            $table->rememberToken();
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
        Schema::dropIfExists('wechat_user');
    }
}
