<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpgradeIdToMerchantEntersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchant_enters', function (Blueprint $table) {
            $table->unsignedInteger('upgrade_id')->default(0)->after('latitude')->comment('黑金卡升级ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchant_enters', function (Blueprint $table) {
            //
        });
    }
}
