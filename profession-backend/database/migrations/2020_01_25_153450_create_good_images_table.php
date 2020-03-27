<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('good_id')->index()->default(0)->comment('商品ID');
            $table->string('good_images',300)->default('')->comment('商品图片');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."good_images` comment '商品图片表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_images');
    }
}
