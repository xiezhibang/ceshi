<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegralConverOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral_conver_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('username',50)->default('')->comment('用户名');
            $table->string('account',50)->default('')->comment('账号');
            $table->string('order_no')->unique()->comment('订单流水号');
            $table->string('name')->default('')->comment('名称或描述');
            $table->decimal('integral',20,2)->default(0.00)->comment('积分');
            $table->decimal('money',20,2)->default(0.00)->comment('实到金额');
            $table->decimal('commission_price',20,2)->default(0.00)->comment('佣金');
            $table->tinyInteger('payment')->default(1)->comment('兑换类型 1-积分转换零钱 2-购买商品');
            $table->tinyInteger('type')->default(1)->comment('类型 1-个人 2-商家');
            $table->tinyInteger('status')->default(0)->comment('状态 0-待完成 1-已完成 2-失败');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."integral_conver_orders` comment '积分转换记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integral_conver_orders');
    }
}
