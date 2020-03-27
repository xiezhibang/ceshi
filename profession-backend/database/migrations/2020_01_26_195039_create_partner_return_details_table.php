<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerReturnDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_return_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('username',50)->default('')->comment('会员昵称');
            $table->string('user_account',50)->default('')->comment('会员账号');
            $table->string('order_no')->default('')->comment('订单号');
            $table->decimal('partner_money',20,2)->default(0.00)->comment('均分现金');
            $table->decimal('partner_integral',20,2)->default(0.00)->comment('均分积分');
            $table->string('remark',255)->default('')->comment('备注');
            $table->dateTime('return_time')->nullable()->comment('到账时间');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."partner_return_details` comment '合伙人收益明细表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_return_details');
    }
}
