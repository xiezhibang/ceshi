<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopCollectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_collects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('nick_name',50)->default('')->comment('会员昵称');
            $table->unsignedInteger('shop_id')->default(0)->comment('店铺ID');
            $table->string('shop_name')->default('')->comment('店铺名称');
            $table->string('shop_image',300)->default('')->comment('店铺图片');
            $table->string('shop_address',255)->default('')->comment('店铺详细地址');
            $table->tinyInteger('shop_type')->default(1)->comment('商家类型 1-普通商家 2-特权商家');
            $table->unsignedInteger('overall_evaluate')->default(0)->comment('总体评价 1-很差 2-一般 3-不错 4-很好 5-非常好');
            $table->decimal('longitude',10,6)->default(0)->comment('店铺所在地理的经度');
            $table->decimal('latitude',10,6)->default(0)->comment('店铺所在地理的纬度');
            $table->tinyInteger('status')->default(1)->comment('状态 1-未收藏 2-已收藏');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."shop_collects` comment '店铺收藏表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_collects');
    }
}
