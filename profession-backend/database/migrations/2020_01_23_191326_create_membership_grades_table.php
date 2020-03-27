<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('')->comment('等级名称');
            $table->tinyInteger('type')->default(1)->comment('类型 1-绿卡 2-金卡 3-黑金卡');
            $table->integer('annual_fee')->default(0)->comment('年费');
            $table->string('period_time')->default('')->comment('会员有效期');
            $table->decimal('discount',20,2)->default(0.00)->comment('优惠折扣');
            $table->decimal('consumer',20,2)->default(0.00)->comment('直推消费收益');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."membership_grades` comment '会员等级收益设置表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membership_grades');
    }
}
