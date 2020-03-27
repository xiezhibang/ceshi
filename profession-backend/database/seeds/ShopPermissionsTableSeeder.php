<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ShopPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_permissions')->insert([
            [
                'name' => '财务',
                'user_id' => 1,
                'pid' => 0,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '商品管理',
                'user_id' => 1,
                'pid' => 0,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '运营',
                'user_id' => 1,
                'pid' => 0,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '商品添加',
                'user_id' => 1,
                'pid' => 1,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '商品编辑',
                'user_id' => 1,
                'pid' => 1,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '商品删除',
                'user_id' => 1,
                'pid' => 1,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '商品上下架',
                'user_id' => 1,
                'pid' => 1,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '商品添加',
                'user_id' => 1,
                'pid' => 2,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '商品编辑',
                'user_id' => 1,
                'pid' => 2,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '商品删除',
                'user_id' => 1,
                'pid' => 2,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '商品上下架',
                'user_id' => 1,
                'pid' => 2,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],

        ]);
    }
}
