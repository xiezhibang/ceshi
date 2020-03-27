<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantEntersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_enters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->string('username',50)->default('')->comment('用户名');
            $table->string('user_phone',12)->default('')->comment('用户手机号');
            $table->tinyInteger('type')->default(0)->comment('入驻类型 1-普通商家入驻 2-共享项目入驻');
            $table->unsignedInteger('industry_id')->default(0)->comment('行业分类ID');
            $table->unsignedInteger('cate_industry_id')->default(0)->comment('二级行业分类ID');
            $table->string('industry_name')->default('')->comment('一级行业分类名称');
            $table->string('cate_industry_name')->default('')->comment('二级行业分类名称');
            $table->string('shop_name')->default('')->comment('店铺名称');
            $table->string('desc')->default('')->comment('简介');
            $table->string('province',60)->default('')->comment('省份');
            $table->string('city',100)->default('')->comment('城市');
            $table->string('district',100)->default('')->comment('区/县');
            $table->string('address',255)->default('')->comment('店铺详细地址');
            $table->string('phone',12)->default('')->comment('店铺电话');
            $table->tinyInteger('privilege_type')->default(10)->comment('是否特权 10-否 20-是');
            $table->unsignedInteger('overall_evaluate')->default(0)->comment('店铺总体评价 1-很差 2-一般 3-不错 4-很好 5-非常好');
            $table->decimal('longitude',10,6)->default(0)->comment('店铺所在地理的经度');
            $table->decimal('latitude',10,6)->default(0)->comment('店铺所在地理的纬度');
            $table->string('company_name')->default('')->comment('公司名称');
            $table->string('social_code')->default('')->comment('社会信用代码');
            $table->string('company_province',60)->default('')->comment('公司所在省份');
            $table->string('company_city',100)->default('')->comment('公司所在城市');
            $table->string('company_district',100)->default('')->comment('公司所在区/县');
            $table->string('company_address',255)->default('')->comment('公司所在详细地址');
            $table->string('license_image',300)->default('')->comment('营业执照');
            $table->string('front_identity_card',300)->default('')->comment('身份证正面');
            $table->string('side_identity_card',300)->default('')->comment('身份证反面');
            $table->string('shop_image',300)->default('')->comment('店铺图片');
            $table->unsignedInteger('engineer_id')->default(0)->comment('关联项目ID');
            $table->string('engineer_name')->default('')->comment('项目名称');
            $table->string('league_image',300)->default('')->comment('中资联加盟凭证');
            $table->tinyInteger('status')->default(0)->comment('显示状态 0-显示 1-隐藏');
            $table->tinyInteger('recommend_status')->default(1)->comment('推荐状态 1-否 2-是');
            $table->tinyInteger('check_status')->default(0)->comment('审核状态 0-待审核 1-审核通过 2-审核不通过');
            $table->unsignedInteger('club_num')->default(0)->comment('俱乐部会员数量');
            $table->unsignedInteger('partner_num')->default(0)->comment('合伙人数量');
            $table->unsignedInteger('shop_manner_num')->default(0)->comment('店铺管理员数量');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `".DB::getConfig('prefix')."merchant_enters` comment '商家入驻表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_enters');
    }
}
