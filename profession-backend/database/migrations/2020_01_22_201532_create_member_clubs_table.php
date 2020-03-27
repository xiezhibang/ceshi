<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_clubs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->unsignedInteger('upper_id')->default(0)->comment('上级用户ID');
            $table->string('username',50)->default('')->comment('用户名');
            $table->string('phone',12)->default('')->comment('电话');
            $table->string('member_head_image',300)->default('')->comment('会员头像');
            $table->tinyInteger('user_type')->default(10)->comment('会员等级 10-会员绿卡 20-金卡会员 30-黑金卡会员 40-商家 50-合伙人');
            $table->unsignedInteger('shop_id')->default(0)->comment('商家入驻ID，即店铺ID');
            $table->string('company_name')->default('')->comment('商家入驻公司名称');
            $table->string('shop_name')->default('')->comment('商家入驻店铺名称');
            $table->string('shop_image',300)->default('')->comment('商家入驻店铺头像');
            $table->string('shop_address',255)->default('')->comment('商家入驻店铺详细地址');
            $table->tinyInteger('status')->default(10)->comment('状态 10-待审核 20-已审核 30-拒绝审核');
            $table->unsignedInteger('industry_id')->default(0)->comment('行业ID');
            $table->string('industry_name')->default('')->comment('行业名称，即类目');
            $table->tinyInteger('add_status')->default(0)->comment('加入状态 0-待加入 1-已加入 2-已过期');
            $table->dateTime('add_time')->nullable()->comment('加入时间');
            $table->dateTime('expire_time')->nullable()->comment('过期时间');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."member_clubs` comment '会员加入俱乐部表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_clubs');
    }
}
