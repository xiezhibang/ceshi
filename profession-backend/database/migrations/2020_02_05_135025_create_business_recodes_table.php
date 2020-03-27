<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessRecodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_recodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('order_sn')->default('')->comment('订单号');
            $table->decimal('money',20,2)->default(0.00)->comment('价格或现金');
            $table->decimal('integral',20,2)->default(0.00)->comment('积分');
            $table->string('desc')->default('')->comment('描述');
            $table->tinyInteger('type')->default(0)->comment('类型 1-现金 2-价格 3-积分');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."business_recodes` comment '营业款记录表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_recodes');
    }
}
