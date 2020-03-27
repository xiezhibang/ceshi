<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('icon_image',300)->default('')->comment('商品icon图片');
            $table->string('name')->default('')->comment('商品专区名称');
            $table->integer('sort')->default(10)->comment('排序');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."good_banners` comment '商品专区表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_banners');
    }
}
