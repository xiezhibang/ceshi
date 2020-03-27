<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ShopEvaluatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_evaluates')->insert([
            [
                'user_id' => 1,
                'nick_name' => '鲁迅',
                'order_id' => 1,
                'shop_id' => 1,
                'shop_name' => '至尊披萨（东圃店）',
                'overall_evaluate' => 5,
                'good_evaluate' => 4,
                'service_evaluate' => 3,
                'environment_evaluate' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'nick_name' => '丽丽',
                'order_id' => 1,
                'shop_id' => 1,
                'shop_name' => '至尊披萨（东圃店）',
                'overall_evaluate' => 4,
                'good_evaluate' => 5,
                'service_evaluate' => 2,
                'environment_evaluate' => 3,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 3,
                'nick_name' => '黄飞鸿',
                'order_id' => 1,
                'shop_id' => 1,
                'shop_name' => '至尊披萨（东圃店）',
                'overall_evaluate' => 3,
                'good_evaluate' => 2,
                'service_evaluate' => 5,
                'environment_evaluate' => 5,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
