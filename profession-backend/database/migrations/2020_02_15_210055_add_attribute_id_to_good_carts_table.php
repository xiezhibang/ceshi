<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributeIdToGoodCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('good_carts', function (Blueprint $table) {
            $table->unsignedInteger('attribute_id')->default(0)->comment('规格ID');
            $table->string('attr_name')->default('')->comment('规格名称');
            $table->unsignedInteger('sku_id')->default(0)->comment('规格值ID');
            $table->string('sku_name')->default('')->comment('规格值名称');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('good_carts', function (Blueprint $table) {
            //
        });
    }
}
