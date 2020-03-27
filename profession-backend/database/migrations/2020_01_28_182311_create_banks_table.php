<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('username',50)->default('')->comment('银行开户名');
            $table->string('bank_sn',350)->default('')->comment('银行卡号');
            $table->string('province',60)->default('')->comment('省份');
            $table->string('city',80)->default('')->comment('城市');
            $table->string('district',80)->default('')->comment('区/县');
            $table->string('bank_name')->default('')->comment('银行名称');
            $table->string('branch_name')->default('')->comment('支行名称');
            $table->string('card_type_name')->default('')->comment('银行卡类型名称');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."banks` comment '银行卡记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
