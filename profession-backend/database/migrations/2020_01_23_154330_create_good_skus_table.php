<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_skus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->index()->comment('用户ID');
            $table->string('username',50)->default('')->comment('会员名称');
            $table->unsignedInteger('attribute_id')->default(0)->comment('商品规格ID');
            $table->string('attribute_name')->default('')->comment('规格名称');
            $table->unsignedInteger('good_id')->default(0)->comment('商品ID');
            $table->string('sku_name')->default('')->comment('名称');
            $table->decimal('money',20,2)->default(0.00)->comment('价格或者积分');
            $table->unsignedInteger('stock')->default(0)->comment('库存');
            $table->tinyInteger('type')->default(1)->comment('是否特权 1-否 2-是');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."good_skus` comment '商品SKU表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_skus');
    }
}
