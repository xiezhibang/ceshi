<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('username',50)->default('')->comment('用户名');
            $table->string('order_no')->unique()->comment('订单号');
            $table->decimal('money',20,2)->default(0.00)->comment('金额');
            $table->tinyInteger('type')->default(0)->comment('类型 10-金卡升级 20-黑金卡升级');
            $table->string('payment',30)->default('')->comment('支付方式 wxpay-微信支付 alipay-支付宝支付 balance-余额支付 credit-积分支付');
            $table->tinyInteger('status')->default(0)->comment('订单状态 0-临时订单 1-待支付 2-已支付 3-支付失败 ');
            $table->dateTime('paid_at')->nullable()->comment('支付时间');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."grade_orders` comment '会员升级订单表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade_orders');
    }
}
