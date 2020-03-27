<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeeTypeToGradeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grade_orders', function (Blueprint $table) {
            $table->tinyInteger('fee_type')->default(1)->after('type')->comment('订单类型 1-升级 2-续费');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grade_orders', function (Blueprint $table) {
            //
        });
    }
}
