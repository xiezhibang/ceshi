<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberBindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_binds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->index()->default(0)->comment('用户ID');
            $table->string('nick_name',100)->default('')->comment('昵称');
            $table->string('avatar',300)->default('')->comment('头像');
            $table->string('user_signature')->default('')->comment('个性签名');
            $table->string('invite_code',50)->default('')->comment('邀请码');
            $table->string('poster_image',300)->default('')->comment('推广海报');
            $table->string('pay_password')->default('')->comment('支付密码');
            $table->string('username',100)->default('')->comment('真实姓名');
            $table->string('code_sn',100)->default('')->comment('身份证号码');
            $table->tinyInteger('sex')->default(0)->comment('性别 0-保密 1-男 2-女');
            $table->string('front_card_image',300)->default('')->comment('身份证正面');
            $table->string('back_card_image',300)->default('')->comment('身份证反面');
            $table->tinyInteger('check_status')->default(10)->comment('审核实名身份 10-待审核 20-已审核 30-拒绝审核');
            $table->tinyInteger('bind_card_status')->default(10)->comment('实名认证 10-否 20-是');
            $table->string('refuse_review',255)->default('')->comment('拒绝审核原因');
            $table->string('address',255)->default('')->comment('身份证所在地');
            $table->string('province',60)->default('')->comment('省份');
            $table->string('city',100)->default('')->comment('城市');
            $table->string('district',100)->default('')->comment('区/县');
            $table->string('address_detail',300)->default('')->comment('详细地址');
            $table->string('qr_code_image',300)->default('')->comment('邀请二维码');
            $table->tinyInteger('login_type')->default(10)->comment('登陆类型 10-手机号登陆 20-微信登陆');
            $table->unsignedInteger('num')->default(0)->comment('直接推荐数量');
            $table->string('login_ip',100)->default('')->comment('登录ip');
            $table->dateTime('login_time')->nullable()->comment('最后登陆时间');
            $table->integer('expire_time')->default(0)->comment('过期时间');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."member_binds` comment '会员详情表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_binds');
    }
}
