<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlackUpgradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('black_upgrades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->unsignedInteger('shop_id')->default(0)->comment('店铺ID');
            $table->string('shop_name')->default('')->comment('店铺名称');
            $table->string('company_name')->default('')->comment('公司名称');
            $table->string('social_code')->default('')->comment('社会信用代码');
            $table->string('province',60)->default('')->comment('省份');
            $table->string('city',100)->default('')->comment('城市');
            $table->string('district',100)->default('')->comment('区/县');
            $table->string('address',255)->default('')->comment('注册地址');
            $table->string('username',50)->default('')->comment('姓名');
            $table->string('phone',12)->default('')->comment('电话');
            $table->string('license_image',300)->default('')->comment('营业执照');
            $table->string('front_identity_card',300)->default('')->comment('身份证正面');
            $table->string('side_identity_card',300)->default('')->comment('身份证反面');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."black_upgrades` comment '黑金卡会员升级表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('black_upgrades');
    }
}
