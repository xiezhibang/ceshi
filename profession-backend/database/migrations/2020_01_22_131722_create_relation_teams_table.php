<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relation_teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->index()->default(0)->comment('用户ID');
            $table->unsignedInteger('invite_uid')->index()->default(0)->comment('推荐人ID,即父级');
            $table->unsignedInteger('grand_uid')->index()->default(0)->comment('祖父ID');
            $table->unsignedInteger('great_uid')->index()->default(0)->comment('曾祖父ID');
            $table->string('invite_name',80)->default('')->comment('推荐人名称，即父级名称');
            $table->text('relation_path')->nullable()->comment('推荐路径关系');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."relation_teams` comment '推荐关系表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation_teams');
    }
}
