<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorePartnerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_partner_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('engineer_id')->default(0)->comment('合伙项目ID');
            $table->unsignedInteger('shop_id')->default(0)->comment('店铺ID');
            $table->string('shop_name')->default('')->comment('店铺名称');
            $table->string('shop_account',50)->default('')->comment('店铺账号');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('username',50)->default('')->comment('联系人');
            $table->string('phone',12)->default('')->comment('手机号');
            $table->unsignedInteger('num')->default(0)->comment('入伙人数');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."store_partner_details` comment '店铺合伙明细表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_partner_details');
    }
}
