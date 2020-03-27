<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberUpgradeLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_upgrade_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('')->comment('等级名称');
            $table->tinyInteger('type')->default(4)->comment('类型 4-绿卡 5-金卡 6-黑金卡');
            $table->integer('gold_card')->default(0)->comment('推荐升级金卡');
            $table->integer('black_gold_card')->default(0)->comment('推荐升级黑金卡');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."member_upgrade_levels` comment '会员直推升级收益设置表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_upgrade_levels');
    }
}
