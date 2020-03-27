<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50)->default('')->comment('用户名称');
            $table->string('mobile',30)->unique()->default('')->comment('手机号');
            $table->string('password')->default('')->comment('密码');
            $table->decimal('money_bag',20,2)->unsigned()->default(0.00)->comment('零钱');
            $table->decimal('total_credits',20,2)->unsigned()->default(0.00)->comment('剩余积分');
            $table->decimal('revenue_money',20,2)->unsigned()->default(0.00)->comment('营业款');
            $table->unsignedInteger('partner_num')->default(0)->comment('合伙项目数量');
            $table->string('wx_openid',255)->default('')->comment('微信用户openid');
            $table->string('wx_unionid',255)->default('')->comment('微信用户unionid');
            $table->string('provider')->default('')->comment('微信登录的provider');
            $table->string('qq_connect')->default('')->comment('微信登录的qq_connect');
            $table->tinyInteger('status')->default(10)->comment('是否禁用 10-否 20-是');
            $table->tinyInteger('type')->default(10)->comment('用户类型 10-会员绿卡 20-金卡会员 30-黑金卡会员 40-商家 50-合伙人');
            $table->tinyInteger('bind_mobile_status')->default(10)->comment('绑定手机号 10-否 20-是');
            $table->string('wx_name',50)->default('')->comment('微信号');
            $table->tinyInteger('unbind_wx_status')->default(10)->comment('是否解绑微信 10-否 20-是');
            $table->tinyInteger('invite_status')->default(10)->comment('是否被推荐 10-否 20-是');
            $table->unsignedInteger('pid')->default(0)->index()->comment('父级ID');
            $table->unsignedInteger('level')->default(0)->comment('等级水平');
            $table->text('path')->nullable()->comment('用户关系路径');
            $table->text('team_path')->nullable()->comment('用户所有下级路径');
            $table->string('email',64)->default('')->comment('邮箱');
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱验证时间');
            $table->dateTime('bind_user_time')->nullable()->comment('用户身份更换时间');
            $table->dateTime('user_path_time')->nullable()->comment('用户路径更换时间');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."members` comment '会员表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
