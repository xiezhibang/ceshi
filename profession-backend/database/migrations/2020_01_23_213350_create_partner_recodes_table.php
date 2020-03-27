<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerRecodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_recodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->unsignedInteger('upper_id')->default(0)->comment('上级用户ID');
            $table->string('username',50)->default('')->comment('用户名');
            $table->string('account',50)->default('')->comment('账号');
            $table->string('image',300)->default('')->comment('会员头像');
            $table->decimal('money',20,2)->default(0.00)->comment('加入金额');
            $table->tinyInteger('status')->default(0)->comment('状态 0-待加入 1-已入伙 2-已过期');
            $table->unsignedInteger('shop_id')->default(0)->comment('店铺ID');
            $table->string('shop_name')->default('')->comment('店铺名称');
            $table->string('shop_image',300)->default('')->comment('店铺头像');
            $table->string('shop_address',255)->default('')->comment('店铺详细地址');
            $table->string('company_name')->default('')->comment('公司名称');
            $table->dateTime('add_time')->nullable()->comment('加入时间');
            $table->dateTime('expire_time')->nullable()->comment('过期时间');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."partner_recodes` comment '合伙人加入记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_recodes');
    }
}
