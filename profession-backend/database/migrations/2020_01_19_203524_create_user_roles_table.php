<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
           $table->unsignedInteger('user_id')->default(0)->comment('管理员ID');
           $table->unsignedInteger('role_id')->default(0)->comment('角色ID');
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."user_roles` comment '用户--角色表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}
