<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ShopStaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_staff')->insert([
            [
                'shop_id' => 1,
                'shop_name' => '天上人间第一味',
                'user_id' => 1,
                'staff_name' => '杨过',
                'account' => '13500892397',
                'staff_phone' => '13500892397',
                'status' => 1,
                'permission_id' => 1,
                'permission_name' => '财务',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'shop_id' => 1,
                'shop_name' => '天上人间第一味',
                'user_id' => 2,
                'staff_name' => '小龙女',
                'account' => '13500892355',
                'staff_phone' => '13500892355',
                'status' => 1,
                'permission_id' => 1,
                'permission_name' => '财务',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'shop_id' => 1,
                'shop_name' => '天上人间第一味',
                'user_id' => 3,
                'staff_name' => '郭靖',
                'account' => '13800892327',
                'staff_phone' => '13800892327',
                'status' => 1,
                'permission_id' => 2,
                'permission_name' => '商品管理',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'shop_id' => 1,
                'shop_name' => '天上人间第一味',
                'user_id' => 4,
                'staff_name' => '黄蓉',
                'account' => '13800892356',
                'staff_phone' => '13800892356',
                'status' => 1,
                'permission_id' => 2,
                'permission_name' => '商品管理',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'shop_id' => 1,
                'shop_name' => '天上人间第一味',
                'user_id' => 5,
                'staff_name' => '欧阳锋',
                'account' => '13900892330',
                'staff_phone' => '13900892330',
                'status' => 1,
                'permission_id' => 1,
                'permission_name' => '财务',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'shop_id' => 1,
                'shop_name' => '天上人间第一味',
                'user_id' => 6,
                'staff_name' => '郭襄',
                'account' => '13900892358',
                'staff_phone' => '13900892358',
                'status' => 1,
                'permission_id' => 3,
                'permission_name' => '运营',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
