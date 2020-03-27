<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class GoodSkusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('good_skus')->insert([
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 2,
                'attribute_name' => '尺码',
                'good_id' => 5,
                'sku_name' => 'S',
                'money' => 28,
                'stock' => 10,
                'type' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 2,
                'attribute_name' => '尺码',
                'good_id' => 5,
                'sku_name' => 'M',
                'money' => 30,
                'stock' => 15,
                'type' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 2,
                'attribute_name' => '尺码',
                'good_id' => 5,
                'sku_name' => 'L',
                'money' => 32,
                'stock' => 20,
                'type' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 2,
                'attribute_name' => '尺码',
                'good_id' => 4,
                'sku_name' => 'S',
                'money' => 8,
                'stock' => 10,
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 2,
                'attribute_name' => '尺码',
                'good_id' => 4,
                'sku_name' => 'M',
                'money' => 10,
                'stock' => 15,
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 2,
                'attribute_name' => '尺码',
                'good_id' => 4,
                'sku_name' => 'L',
                'money' => 12,
                'stock' => 20,
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 1,
                'attribute_name' => '杯型',
                'good_id' => 3,
                'sku_name' => '小杯',
                'money' => 13,
                'stock' => 20,
                'type' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 1,
                'attribute_name' => '杯型',
                'good_id' => 3,
                'sku_name' => '中杯',
                'money' => 15,
                'stock' => 20,
                'type' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 1,
                'attribute_name' => '杯型',
                'good_id' => 3,
                'sku_name' => '大杯',
                'money' => 18,
                'stock' => 20,
                'type' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 1,
                'attribute_name' => '杯型',
                'good_id' => 3,
                'sku_name' => '小杯',
                'money' => 13,
                'stock' => 20,
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 1,
                'attribute_name' => '杯型',
                'good_id' => 1,
                'sku_name' => '中杯',
                'money' => 15,
                'stock' => 20,
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 1,
                'attribute_name' => '杯型',
                'good_id' => 1,
                'sku_name' => '大杯',
                'money' => 18,
                'stock' => 20,
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 3,
                'attribute_name' => '份量',
                'good_id' => 1,
                'sku_name' => '少糖',
                'money' => 18,
                'stock' => 20,
                'type' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 3,
                'attribute_name' => '份量',
                'good_id' => 6,
                'sku_name' => '多糖',
                'money' => 18,
                'stock' => 20,
                'type' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 3,
                'attribute_name' => '份量',
                'good_id' => 6,
                'sku_name' => '全糖',
                'money' => 18,
                'stock' => 20,
                'type' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 3,
                'attribute_name' => '份量',
                'good_id' => 6,
                'sku_name' => '少糖',
                'money' => 18,
                'stock' => 20,
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 3,
                'attribute_name' => '份量',
                'good_id' => 6,
                'sku_name' => '多糖',
                'money' => 18,
                'stock' => 20,
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 3,
                'attribute_name' => '份量',
                'good_id' => 7,
                'sku_name' => '全糖',
                'money' => 18,
                'stock' => 20,
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 4,
                'attribute_name' => '尺寸',
                'good_id' => 2,
                'sku_name' => '8英寸',
                'money' => 29.9,
                'stock' => 100,
                'type' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 4,
                'attribute_name' => '尺寸',
                'good_id' => 5,
                'sku_name' => '10英寸',
                'money' => 39.9,
                'stock' => 100,
                'type' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 4,
                'attribute_name' => '尺寸',
                'good_id' => 3,
                'sku_name' => '10英寸',
                'money' => 0.01,
                'stock' => 50,
                'type' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 4,
                'attribute_name' => '尺寸',
                'good_id' => 4,
                'sku_name' => '10英寸',
                'money' => 39,
                'stock' => 100,
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'attribute_id' => 4,
                'attribute_name' => '尺寸',
                'good_id' => 3,
                'sku_name' => '8英寸',
                'money' => 29,
                'stock' => 100,
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
