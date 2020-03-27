<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerInvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_invests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('会员ID');
            $table->string('username',50)->default('')->comment('会员昵称');
            $table->string('image',300)->default('')->comment('会员头像');
            $table->string('user_account',50)->default('')->comment('会员账号');
            $table->decimal('partner_money',20,2)->default(0.00)->comment('入伙金额');
            $table->decimal('total_money',20,2)->default(0.00)->comment('累计金额');
            $table->dateTime('part_time')->nullable()->comment('入伙日期');
            $table->dateTime('expire_time')->nullable()->comment('到期日期');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."partner_invests` comment '合伙人投资明细表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_invests');
    }
}
