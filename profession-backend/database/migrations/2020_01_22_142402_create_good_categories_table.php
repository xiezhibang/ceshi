<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('')->comment('分类名称');
            $table->string('level_name')->default('')->comment('层级名称');
            $table->unsignedInteger('pid')->default(0)->comment('父级分类ID');
            $table->string('category_image',300)->default('')->comment('分类图片');
            $table->tinyInteger('status')->default(10)->comment('状态 10-显示 20-隐藏 30-删除');
            $table->integer('cate_order')->default(50)->comment('排序');
            $table->integer('level')->default(0)->comment('层级水平');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."good_categories` comment '商品分类表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_categories');
    }
}
