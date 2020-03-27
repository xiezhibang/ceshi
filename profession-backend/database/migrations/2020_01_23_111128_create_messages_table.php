<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('')->comment('消息名称');
            $table->tinyInteger('push_type')->default(1)->comment('推送平台 1-IOS 2-Android');
            $table->tinyInteger('target_type')->default(1)->comment('目标人群 1-所有用户 2-绿卡会员 3-金卡会员 4-黑金卡会员');
            $table->string('province',60)->default('')->comment('省份');
            $table->string('city',100)->default('')->comment('城市');
            $table->string('district',100)->default('')->comment('区/县');
            $table->string('message_content')->default('')->comment('消息内容');
            $table->tinyInteger('send_type')->default(1)->comment('发送时间类型 1-立即发送 2-定时发送');
            $table->tinyInteger('status')->default(0)->comment('状态 0-未发送 1-已发送 3-发送失败');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."messages` comment '消息表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
