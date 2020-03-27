<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpCatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_cates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cate_name')->default('')->comment('文章分类名称');
            $table->integer('sort')->default(10)->comment('排序');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."help_cates` comment '文章分类表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('help_cates');
    }
}
