<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustryCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cate_name')->default('')->comment('分类名称');
            $table->unsignedInteger('cate_pid')->default(0)->comment('父级ID');
            $table->tinyInteger('status')->default(10)->comment('状态 10-显示 20-隐藏 30-删除');
            $table->integer('cate_order')->default(50)->comment('排序');
            $table->unsignedInteger('shop_num')->default(0)->comment('店铺数量');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."industry_categories` comment '行业分类（项目分类）表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('industry_categories');
    }
}
