<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->default('')->comment('描述');
            $table->tinyInteger('type')->default(0)->comment('类型 1-个人提现费率 2-店铺（营业款）提现费率 3-个人积分转现费率 4-商家积分转现费率');
            $table->string('rate')->default('')->comment('费率');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."config_rates` comment '费率设置表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_rates');
    }
}
