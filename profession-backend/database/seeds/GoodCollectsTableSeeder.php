<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class GoodCollectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('good_collects')->insert([
            [
                'user_id' => 1,
                'nick_name' => '东方不败',
                'status' => 2,
                'good_id' => 1,
                'good_name' => '至尊榴莲披萨',
                'good_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'shop_id' => 1,
                'shop_name' => '至尊披萨',
                'commodity_price' => 99,
                'selling_price' => 66,
                'good_integral' => 0,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'nick_name' => '东方不败',
                'status' => 2,
                'good_id' => 2,
                'good_name' => '麻辣小龙虾',
                'good_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'shop_id' => 2,
                'shop_name' => '常来小聚',
                'commodity_price' => 63,
                'selling_price' => 33,
                'good_integral' => 0,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'nick_name' => '东方不败',
                'status' => 2,
                'good_id' => 3,
                'good_name' => '葡国鸡焗饭',
                'good_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'shop_id' => 3,
                'shop_name' => '卡朋西餐厅',
                'commodity_price' => 49,
                'selling_price' => 0,
                'good_integral' => 80,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
