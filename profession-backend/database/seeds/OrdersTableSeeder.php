<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'user_id' => 1,
                'username' => '舒婷',
                'order_sn' => 'O'.date('YmdHis').rand(10000,99999),
                'shop_id' => 1,
                'shop_name' => '至尊比萨（车陂店）',
                'shop_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'total' => 4,
                'pay_money' => 99.9,
                'total_money' => 139.9,
                'discount_money' => 40,
                'payment' => 'wxpay',
                'status' => 2,
                'paid_at' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'order_sn' => 'O'.date('YmdHis').rand(10000,99999),
                'shop_id' => 1,
                'shop_name' => '至尊比萨（车陂店）',
                'shop_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'total' => 4,
                'pay_money' => 99.9,
                'total_money' => 139.9,
                'discount_money' => 40,
                'payment' => 'wxpay',
                'status' => 1,
                'paid_at' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'order_sn' => 'O'.date('YmdHis').rand(10000,99999),
                'shop_id' => 1,
                'shop_name' => '至尊比萨（车陂店）',
                'shop_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'total' => 4,
                'pay_money' => 99.9,
                'total_money' => 139.9,
                'discount_money' => 40,
                'payment' => 'wxpay',
                'status' => 3,
                'paid_at' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'order_sn' => 'O'.date('YmdHis').rand(10000,99999),
                'shop_id' => 1,
                'shop_name' => '至尊比萨（车陂店）',
                'shop_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'total' => 4,
                'pay_money' => 99.9,
                'total_money' => 139.9,
                'discount_money' => 40,
                'payment' => 'wxpay',
                'status' => 4,
                'paid_at' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'order_sn' => 'O'.date('YmdHis').rand(10000,99999),
                'shop_id' => 1,
                'shop_name' => '至尊比萨（车陂店）',
                'shop_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'total' => 4,
                'pay_money' => 99.9,
                'total_money' => 139.9,
                'discount_money' => 40,
                'payment' => 'wxpay',
                'status' => 5,
                'paid_at' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
