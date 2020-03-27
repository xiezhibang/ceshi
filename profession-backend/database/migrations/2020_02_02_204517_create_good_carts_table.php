<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('good_id')->default(0)->comment('商品ID');
            $table->string('good_name')->default('')->comment('商品名称');
            $table->string('good_image',300)->default('')->comment('商品图片');
            $table->decimal('money',20,2)->default(0.00)->comment('商品价格');
            $table->decimal('credit',20,2)->default(0.00)->comment('商品积分');
            $table->decimal('orgin_money',20,2)->default(0.00)->comment('商品原价');
            $table->tinyInteger('good_type')->default(1)->comment('商品类型 1-普通 2-特权');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->unsignedInteger('shop_id')->default(0)->comment('店铺ID');
            $table->unsignedInteger('cart_num')->default(0)->comment('商品数量');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."good_carts` comment '商品购物车表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_carts');
    }
}
