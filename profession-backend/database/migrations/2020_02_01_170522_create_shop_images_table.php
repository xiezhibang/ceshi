<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('shop_id')->default(0)->comment('店铺ID');
            $table->string('image',300)->default('')->comment('图片');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."shop_images` comment '店铺图片表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_images');
    }
}
