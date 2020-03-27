<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrepaidChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prepaid_changes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('username',50)->default('')->comment('会员名称');
            $table->decimal('money',20,2)->default(0.00)->comment('充值金额');
            $table->string('order_no')->unique()->comment('订单号');
            $table->string('payment',30)->default('')->comment('支付方式 wxpay-微信支付 alipay-支付宝支付 balance-余额支付 credit-积分支付');
            $table->tinyInteger('status')->default(0)->comment('订单状态 0-临时订单 1-待支付 2-已支付 3-支付失败');
            $table->dateTime('paid_at')->nullable()->comment('支付时间');
            $table->string('remark')->default('')->comment('支付描述');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."prepaid_changes` comment '充值订单记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prepaid_changes');
    }
}
