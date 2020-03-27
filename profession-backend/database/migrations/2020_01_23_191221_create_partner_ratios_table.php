<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerRatiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_ratios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ratio')->default(0)->comment('收益比例');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."partner_ratios` comment '合伙人收益比例表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_ratios');
    }
}
