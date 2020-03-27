<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('order_id')->index()->default(0)->comment('订单ID');
            $table->unsignedInteger('user_id')->index()->default(0)->comment('用户ID');
            $table->string('username',50)->default('')->comment('用户名');
            $table->string('good_image',300)->default('')->comment('商品图片');
            $table->string('good_name')->default('')->comment('商品名称');
            $table->decimal('good_price',20,2)->default(0.00)->comment('商品价格');
            $table->unsignedInteger('amount')->default(0)->comment('商品数量');
            $table->decimal('total_price',20,2)->default(0.00)->comment('合计金额');
            $table->tinyInteger('good_type')->default(0)->comment('商品类型 10-普通 20-特权');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."order_items` comment '订单详情表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
