<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopEvaluatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_evaluates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('nick_name',50)->default('')->comment('会员昵称');
            $table->unsignedInteger('order_id')->default(0)->comment('订单ID');
            $table->unsignedInteger('shop_id')->default(0)->comment('店铺ID');
            $table->string('shop_name')->default('')->comment('店铺名称');
            $table->unsignedInteger('overall_evaluate')->default(0)->comment('总体评价 1-很差 2-一般 3-不错 4-很好 5-非常好');
            $table->unsignedInteger('good_evaluate')->default(0)->comment('商品评价 1-很差 2-一般 3-不错 4-很好 5-非常好');
            $table->unsignedInteger('service_evaluate')->default(0)->comment('服务评价 1-很差 2-一般 3-不错 4-很好 5-非常好');
            $table->unsignedInteger('environment_evaluate')->default(0)->comment('环境评价 1-很差 2-一般 3-不错 4-很好 5-非常好');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."shop_evaluates` comment '店铺评价表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_evaluates');
    }
}
