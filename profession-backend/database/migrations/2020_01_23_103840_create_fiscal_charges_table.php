<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiscalChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiscal_charges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('username',50)->default('')->comment('用户名');
            $table->string('account',50)->default('')->comment('账号');
            $table->string('order_no')->unique()->comment('订单流水号');
            $table->string('name')->default('')->comment('交易对象');
            $table->decimal('order_money',20,2)->default(0.00)->comment('交易金额');
            $table->decimal('money',20,2)->default(0.00)->comment('实到金额');
            $table->decimal('commission_price',20,2)->default(0.00)->comment('平台佣金');
            $table->tinyInteger('status')->default(1)->comment('状态 1-待审核 2-审核通过 3-审核不通过');
            $table->tinyInteger('type')->default(0)->comment('类型 1-提现 2-充值 3-交易 4-升级 5-续费 6-合伙');
            $table->unsignedInteger('cash_id')->default(0)->comment('提现ID');
            $table->string('bank_name',100)->default('')->comment('银行名称');
            $table->string('bank_user_name',50)->default('')->comment('银行开户名');
            $table->string('bank_no',50)->default('')->comment('银行账号');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."fiscal_charges` comment '财务流水表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiscal_charges');
    }
}
