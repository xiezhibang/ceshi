<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('shop_id')->default(0)->index()->comment('店铺ID');
            $table->string('shop_name')->default('')->comment('店铺名称');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('staff_name',50)->default('')->comment('店员名称');
            $table->string('account',50)->default('')->comment('店员账号');
            $table->string('staff_phone',12)->default('')->comment('店员电话');
            $table->tinyInteger('status')->default(1)->comment('状态 1-启用 2-禁用');
            $table->unsignedInteger('permission_id')->default(0)->comment('店铺权限ID');
            $table->string('permission_name')->default('')->comment('权限名称');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."shop_staff` comment '店员表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_staff');
    }
}
