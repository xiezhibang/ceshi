<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('user_name',50)->default('')->comment('用户名');
            $table->string('user_pass',255)->default('')->comment('密码');
            $table->string('email')->default('')->comment('邮箱');
            $table->string('phone',11)->default('')->comment('电话');
            $table->tinyInteger('status')->default(1)->comment('用户状态  1-启用 0-禁用');
            $table->tinyInteger('active')->default(0)->comment('账号是否激活 0-未激活  1-激活');
            $table->string('token',255)->default('')->comment('验证账号有效性');
            $table->string('expire')->default('')->comment('账号激活是否过期时间');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."admin_users` comment '管理员表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
