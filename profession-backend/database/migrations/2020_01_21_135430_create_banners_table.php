<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->default('')->comment('标题');
            $table->string('banner_image',300)->default('')->comment('图片');
            $table->tinyInteger('type')->default(10)->comment('类型 10-首页轮播图 20-商家首页轮播图 30-会员金卡 40-会员黑金卡 50-邀请好友 60-启动页面广告');
            $table->string('links',300)->default('')->comment('跳转链接');
            $table->integer('sort')->default(10)->comment('排序');
            $table->tinyInteger('status')->default(1)->comment('状态 1-显示 2-隐藏');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."banners` comment 'banner图片表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
