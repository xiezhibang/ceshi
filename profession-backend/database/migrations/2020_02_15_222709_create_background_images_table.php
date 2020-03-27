<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackgroundImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('background_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('type')->default(1)->comment('类型 1-会员绿卡 2-金卡会员 3-黑金卡会员 4-商家 5-合伙人');
            $table->string('background_image',300)->default('')->comment('背景图');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."background_images` comment '会员背景图表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('background_images');
    }
}
