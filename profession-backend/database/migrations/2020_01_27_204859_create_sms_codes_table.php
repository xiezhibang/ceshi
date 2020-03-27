<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mobile',12)->default('')->comment('手机号');
            $table->string('code',10)->default('')->comment('验证码');
            $table->tinyInteger('type')->default(10)->comment('类型 10-注册 20-修改手机号 30-绑定手机号 40-忘记密码 50-修改密码 60-添加店员');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."sms_codes` comment '验证码信息表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_codes');
    }
}
