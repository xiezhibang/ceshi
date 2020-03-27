<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class BusinessRecodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_recodes')->insert([
           [
               'user_id' => 1,
               'order_sn' => date('YmdHis').rand(100000,999999),
               'money' => 20,
               'integral' => 0,
               'desc' => '购买商品',
               'type' => 2,
               'created_at'=>date('Y-m-d H:i:s'),
               'updated_at'=>date('Y-m-d H:i:s'),
           ],
            [
                'user_id' => 1,
                'order_sn' => date('YmdHis').rand(100000,999999),
                'money' => 200,
                'integral' => 0,
                'desc' => '购买商品',
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'order_sn' => date('YmdHis').rand(100000,999999),
                'money' => 120,
                'integral' => 0,
                'desc' => '购买商品',
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'order_sn' => date('YmdHis').rand(100000,999999),
                'money' => 16.8,
                'integral' => 0,
                'desc' => '购买商品',
                'type' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'order_sn' => date('YmdHis').rand(100000,999999),
                'money' => 0,
                'integral' => 10,
                'desc' => '购买商品',
                'type' => 3,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'order_sn' => '',
                'money' => 28820,
                'integral' => 0,
                'desc' => '现金',
                'type' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
