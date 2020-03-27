<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodCollectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_collects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('nick_name',50)->default('')->comment('会员昵称');
            $table->tinyInteger('status')->default(1)->comment('状态 1-未收藏 2-已收藏');
            $table->unsignedInteger('good_id')->default(0)->comment('商品ID');
            $table->string('good_name')->default('')->comment('商品名称');
            $table->string('good_image',300)->default('')->comment('商品图片');
            $table->unsignedInteger('shop_id')->default(0)->comment('店铺ID');
            $table->string('shop_name')->default('')->comment('店铺名称');
            $table->decimal('commodity_price',20,2)->default(0.00)->comment('商品原价');
            $table->decimal('selling_price',20,2)->default(0.00)->comment('商品售价');
            $table->decimal('good_integral',20,2)->default(0.00)->comment('商品积分');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."good_collects` comment '商品收藏表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_collects');
    }
}
