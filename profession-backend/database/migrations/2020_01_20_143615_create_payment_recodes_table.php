<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentRecodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_recodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('name')->default('')->comment('名称');
            $table->decimal('money',20,2)->default(0.00)->comment('金额');
            $table->tinyInteger('status')->default(10)->comment('状态 10-待付款 20-已付款 30-付款失败');
            $table->date('paid_time')->nullable()->comment('支付时间');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."payment_recodes` comment '收款记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_recodes');
    }
}
