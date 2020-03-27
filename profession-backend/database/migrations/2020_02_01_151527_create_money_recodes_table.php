<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyRecodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_recodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('username')->default('')->comment('会员名称');
            $table->tinyInteger('type')->default(0)->comment('类型 1-付款 2-退款 3-消费 4-收款 5-购买商品 6-充值');
            $table->decimal('money',20,2)->default(0.00)->comment('金额');
            $table->string('remark')->default('')->comment('描述');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."money_recodes` comment '零钱明细表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('money_recodes');
    }
}
