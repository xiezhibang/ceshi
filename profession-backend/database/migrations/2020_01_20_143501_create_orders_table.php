<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->index()->default(0)->comment('用户ID');
            $table->string('username',50)->default('')->comment('用户名');
            $table->string('order_sn')->unique()->comment('订单号');
            $table->unsignedInteger('shop_id')->index()->default(0)->comment('店铺ID');
            $table->string('shop_name')->default('')->comment('店铺名称');
            $table->string('shop_image',300)->default('')->comment('店铺头像');
            $table->tinyInteger('pay')->default(10)->comment('下单方式 10-直接下单 20-购物车下单');
            $table->integer('total')->default(0)->comment('商品总数量');
            $table->decimal('pay_money',20,2)->default(0.00)->comment('实付金额');
            $table->decimal('total_money',20,2)->default(0.00)->comment('订单总金额');
            $table->decimal('discount_money',20,2)->default(0.00)->comment('优惠金额');
            $table->string('payment',30)->default('')->comment('支付方式 wxpay-微信支付 alipay-支付宝支付 balance-余额支付 credit-积分支付');
            $table->tinyInteger('status')->default(0)->comment('订单状态 0-临时订单 1-待支付(支付失败) 2-已支付(待消费) 3-确认消费（待评价） 4-已评价（关闭订单） 5-取消订单');
            $table->dateTime('paid_at')->nullable()->comment('支付时间');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."orders` comment '订单表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
