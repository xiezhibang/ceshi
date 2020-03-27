<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeagueEngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('league_engineers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('engineer_name')->default('')->comment('项目名称');
            $table->integer('league_num')->default(0)->comment('加盟数量');
            $table->unsignedInteger('industry_id')->default(0)->comment('行业分类ID');
            $table->unsignedInteger('cate_industry_id')->default(0)->comment('二级行业分类ID');
            $table->string('industry_name')->default('')->comment('一级行业分类名称');
            $table->string('cate_industry_name')->default('')->comment('二级行业分类名称');
            $table->decimal('league_money',20,2)->default(0.00)->comment('合伙金额');
            $table->integer('league_time')->default(0)->comment('合伙期限');
            $table->integer('league_scale')->default(0)->comment('合伙奖励比例');
            $table->unsignedInteger('gift_id')->default(0)->comment('礼包ID');
            $table->string('gift_name')->default('')->comment('礼包名称');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."league_engineers` comment '合伙项目表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('league_engineers');
    }
}
