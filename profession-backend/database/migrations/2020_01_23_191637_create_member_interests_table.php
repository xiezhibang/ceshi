<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_interests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('')->comment('等级名称');
            $table->tinyInteger('type')->default(7)->comment('类型 7-绿卡 8-金卡 9-黑金卡');
            $table->tinyInteger('interest_type')->default(10)->comment('是否特权 10-否 20-是');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."member_interests` comment '会员权益表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_interests');
    }
}
