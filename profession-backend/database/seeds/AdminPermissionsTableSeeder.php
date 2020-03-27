<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AdminPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_permissions')->insert([
            [
                'per_name' => '后台首页权限',
                'per_url' => 'App\\Http\\Controllers\\Admin\\LoginController@index',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'per_name' => '用户添加权限',
                'per_url' => 'App\\Http\\Controllers\\Admin\\UserController@create',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'per_name' => '用户修改权限',
                'per_url' => 'App\\Http\\Controllers\\Admin\\UserController@edit',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
