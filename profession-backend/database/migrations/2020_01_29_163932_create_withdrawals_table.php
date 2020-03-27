<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('username')->default('')->comment('用户名称');
            $table->unsignedInteger('bank_id')->default(0)->comment('银行ID');
            $table->string('bank_name')->default('')->comment('银行名称');
            $table->string('bank_sn',350)->default('')->comment('银行卡号');
            $table->decimal('withdrawal_money',20,2)->default(0.00)->comment('提现金额');
            $table->string('withdrawal_sn')->default('')->comment('提现单号');
            $table->string('rates')->default('')->comment('费率');
            $table->tinyInteger('type')->default(1)->comment('提现类型 1-个人 2-店铺');
            $table->tinyInteger('status')->default(1)->comment('提现状态 1-提现中 2-已提现 3-提现失败');
            $table->tinyInteger('withdrawal_status')->default(10)->comment('审核状态 10-待审核 20-已审核 30-拒绝审核');
            $table->dateTime('withdrawal_time')->nullable()->comment('提现到账时间');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."withdrawals` comment '提现记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdrawals');
    }
}
