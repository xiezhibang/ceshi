<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class IndustryCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industry_categories')->insert([
            [
                'cate_name' => '软件类',
                'cate_pid' => 0,
                'cate_order' => 50,
                'shop_num' => 5,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'cate_name' => '信息系统类',
                'cate_pid' => 0,
                'cate_order' => 20,
                'shop_num' => 3,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'cate_name' => '商务类',
                'cate_pid' => 0,
                'cate_order' => 100,
                'shop_num' => 10,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'cate_name' => '系统分析师',
                'cate_pid' => 1,
                'cate_order' => 100,
                'shop_num' => 10,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'cate_name' => '软件测试师',
                'cate_pid' => 1,
                'cate_order' => 100,
                'shop_num' => 10,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'cate_name' => '架构师',
                'cate_pid' => 1,
                'cate_order' => 100,
                'shop_num' => 10,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'cate_name' => '信息系统安全师',
                'cate_pid' => 2,
                'cate_order' => 100,
                'shop_num' => 10,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'cate_name' => '信息系统评估师',
                'cate_pid' => 2,
                'cate_order' => 100,
                'shop_num' => 10,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'cate_name' => '网上销售员',
                'cate_pid' => 3,
                'cate_order' => 100,
                'shop_num' => 10,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'cate_name' => '网络编辑员',
                'cate_pid' => 3,
                'cate_order' => 100,
                'shop_num' => 10,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
