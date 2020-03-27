<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerGiftBagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_gift_bags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->index()->default(0)->comment('用户ID');
            $table->string('username',50)->default('')->comment('用户名称');
            $table->string('bag_image',300)->default('')->comment('礼包图片');
            $table->string('bag_name',100)->default('')->comment('礼包名称');
            $table->decimal('money',20,2)->default(0.00)->comment('礼包价格');
            $table->string('remark')->default('')->comment('描述');
            $table->tinyInteger('status')->default(10)->comment('领取状态 10-待领取 20-已领取');
            $table->string('bag_code',30)->default('')->comment('领取码');
            $table->unsignedInteger('shop_id')->default(0)->comment('店铺ID');
            $table->string('shop_name')->default('')->comment('店铺名称');
            $table->string('shop_address',255)->default('')->comment('店铺详细地址');
            $table->decimal('longitude',10,6)->default(0)->comment('店铺所在地理的经度');
            $table->decimal('latitude',10,6)->default(0)->comment('店铺所在地理的纬度');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."partner_gift_bags` comment '合伙礼包记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_gift_bags');
    }
}
