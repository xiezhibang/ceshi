<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class IntegralConverOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('integral_conver_orders')->insert([
            [
                'user_id' => 1,
                'username' => '东邪',
                'account' => '18809356689',
                'order_no' => date('YmdHis').rand(10000,99999),
                'name' => '换取积分',
                'integral' => 32,
                'money' => 31.9,
                'commission_price' => 0.1,
                'payment'=>1,
                'type' => 1,
                'status' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '东邪',
                'account' => '18809356689',
                'order_no' => date('YmdHis').rand(10000,99999),
                'name' => '广州酒家',
                'integral' => 100,
                'money' => 98.5,
                'commission_price' => 1.5,
                'payment'=>1,
                'type' => 1,
                'status' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '东邪',
                'account' => '18809356689',
                'order_no' => date('YmdHis').rand(10000,99999),
                'name' => '换取积分',
                'payment'=>1,
                'integral' => 50,
                'money' => 49.8,
                'commission_price' => 0.2,
                'type' => 2,
                'status' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '东邪',
                'account' => '18809356689',
                'order_no' => date('YmdHis').rand(10000,99999),
                'name' => '商品',
                'payment'=>2,
                'integral' => 100,
                'money' => 49.8,
                'commission_price' => 0.2,
                'type' => 2,
                'status' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '东邪',
                'account' => '18809356689',
                'order_no' => date('YmdHis').rand(10000,99999),
                'name' => '商品',
                'payment'=>2,
                'integral' => 200,
                'money' => 49.8,
                'commission_price' => 0.2,
                'type' => 2,
                'status' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'username' => '西毒',
                'account' => '18709356685',
                'order_no' => date('YmdHis').rand(10000,99999),
                'name' => '换取积分',
                'payment'=>1,
                'integral' => 80,
                'money' => 79.8,
                'commission_price' => 0.2,
                'type' => 1,
                'status' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'username' => '西毒',
                'account' => '18709356685',
                'order_no' => date('YmdHis').rand(10000,99999),
                'name' => '广州酒家',
                'integral' => 30,
                'money' => 29.9,
                'commission_price' => 0.1,
                'payment'=>1,
                'type' => 2,
                'status' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
