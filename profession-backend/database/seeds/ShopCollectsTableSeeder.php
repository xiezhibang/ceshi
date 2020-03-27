<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ShopCollectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_collects')->insert([
            [
                'user_id' => 1,
                'nick_name' => '东方不败',
                'shop_id' => 1,
                'shop_name' => '阿强酸菜鱼',
                'shop_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'shop_address' => '芳村花园近花城大道',
                'shop_type' => 2,
                'overall_evaluate' => 4,
                'longitude' => '113.314271',
                'latitude' => '23.1323',
                'status' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'nick_name' => '东方不败',
                'shop_id' => 1,
                'shop_name' => '绝味鸭脖（坑口店）',
                'shop_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'shop_address' => '坑口荔盛广场',
                'shop_type' => 1,
                'overall_evaluate' => 3,
                'longitude' => '115.314272',
                'latitude' => '25.1325',
                'status' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
