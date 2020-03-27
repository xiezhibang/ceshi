<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('')->comment('名称');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID，即商家');
            $table->unsignedInteger('pid')->default(0)->comment('父级ID');
            $table->integer('cate_order')->default(50)->comment('排序');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."shop_permissions` comment '商家权限表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_permissions');
    }
}
