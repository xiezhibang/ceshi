<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->default('')->comment('标题');
            $table->tinyInteger('type')->default(10)->comment('类型 10-注册协议 20-关于我们 30-俱乐部说明 40-俱乐部会员章程 50-版本信息');
            $table->longText('website_content')->nullable()->comment('网站内容');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."websites` comment '网站信息表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
