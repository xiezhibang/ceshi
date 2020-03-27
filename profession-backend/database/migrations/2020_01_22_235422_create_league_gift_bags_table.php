<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeagueGiftBagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('league_gift_bags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gift_name')->default('')->comment('礼包名称');
            $table->decimal('gift_money',20,2)->default(0.00)->comment('礼包价格');
            $table->string('gift_image',300)->default('')->comment('礼包图片');
            $table->string('description',255)->default('')->comment('简介');
            $table->integer('num')->default(0)->comment('领取人数');
            $table->tinyInteger('status')->default(10)->comment('状态 10-启用 20-禁用');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."league_gift_bags` comment '合伙礼包表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('league_gift_bags');
    }
}
