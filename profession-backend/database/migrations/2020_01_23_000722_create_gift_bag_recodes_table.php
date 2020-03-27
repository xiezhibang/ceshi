<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftBagRecodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_bag_recodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('gift_bag_id')->default(0)->comment('礼包ID');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('username',50)->default('')->comment('会员名称');
            $table->string('gift_code',30)->default('')->comment('领取码');
            $table->unsignedInteger('shop_id')->default(0)->comment('店铺ID');
            $table->string('shop_name')->default('')->comment('店铺名称');
            $table->unsignedInteger('good_id')->default(0)->comment('商品ID');
            $table->string('good_name')->default('')->comment('商品名称');
            $table->string('account',60)->default('')->comment('账号');
            $table->tinyInteger('bag_status')->default(0)->comment('领取状态 0-待领取 1-已领取 2-领取失败');
            $table->dateTime('gift_bag_time')->nullable()->comment('领取时间');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."gift_bag_recodes` comment '合伙礼包领取记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gift_bag_recodes');
    }
}
