<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberEquitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_equities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('')->comment('名称');
            $table->tinyInteger('type')->default(10)->comment('类型 10-金卡 20-黑金卡');
            $table->decimal('money',20,2)->comment('价格');
            $table->integer('sort')->default(10)->comment('排序');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."member_equities` comment '会员权益介绍表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_equities');
    }
}
