<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpArtcilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_artciles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('cate_id')->default(0)->comment('文章分类ID');
            $table->string('name')->default('')->comment('文章名称');
            $table->integer('sort')->default(10)->comment('排序');
            $table->dateTime('art_time')->nullable()->comment('发布时间');
            $table->tinyInteger('status')->default(1)->comment('状态 1-显示 2-隐藏');
            $table->longText('content_detail')->nullable()->comment('详情');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."help_artciles` comment '文章帮助表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('help_artciles');
    }
}
