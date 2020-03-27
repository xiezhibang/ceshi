<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedBackImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed_back_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('feed_back_id')->default(0)->index()->comment('反馈ID');
            $table->string('feed_image',300)->default('')->comment('反馈图片');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."feed_back_images` comment '用户反馈图片表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feed_back_images');
    }
}
