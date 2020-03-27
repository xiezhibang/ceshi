<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberUpgradeMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_upgrade_money', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('remark')->default('')->comment('描述');
            $table->decimal('money',20,2)->default(0.00)->comment('升级金额');
            $table->tinyInteger('upgrade_type')->default(1)->comment('类型 1-金卡升级 2-黑金卡升级 3-其他');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."member_upgrade_money` comment '会员升级金额设置表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_upgrade_money');
    }
}
