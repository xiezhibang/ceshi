<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->index()->comment('用户ID');
            $table->string('username',50)->default('')->comment('会员名称');
            $table->unsignedInteger('shop_id')->default(0)->index()->comment('店铺ID');
            $table->string('shop_name')->default('')->comment('店铺名称');
            $table->string('shop_address',255)->default('')->comment('店铺地址');
            $table->string('good_name')->default('')->comment('商品名称');
            $table->decimal('commodity_price',20,2)->default(0.00)->comment('商品原价');
            $table->unsignedInteger('category_id')->default(0)->comment('商品分类ID');
            $table->string('cate_name')->default('')->comment('分类名称');
            $table->tinyInteger('type')->default(1)->comment('是否特权 1-否 2-是');
            $table->decimal('selling_price',20,2)->default(0.00)->comment('商品售价');
            $table->decimal('good_integral',20,2)->default(0.00)->comment('商品积分');
            $table->unsignedInteger('attribute_id')->default(0)->comment('商品规格ID');
            $table->unsignedInteger('limit_num')->default(0)->comment('限购数量');
            $table->unsignedInteger('total_stock')->default(0)->comment('商品总库存');
            $table->unsignedInteger('selling_num')->default(0)->comment('销量');
            $table->tinyInteger('state')->default(1)->comment('上下架 1-上架 2-下架 3-软删除');
            $table->integer('order')->default(10)->comment('排序');
            $table->tinyInteger('status')->default(1)->comment('审核状态 1-待审核 2-审核通过 3-审核不通过');
            $table->string('good_image',300)->default('')->comment('商品主图');
            $table->string('detail_image',300)->default('')->comment('商品详情');
            $table->string('description',255)->default('')->comment('购买须知');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."goods` comment '商品表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
