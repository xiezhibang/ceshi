<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class GradeOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grade_orders')->insert([
            [
                'user_id' => 1,
                'username' => '舒婷',
                'order_no' => 'O'.date('YmdHis').rand(1000,9999),
                'money' => 99,
                'type' => 10,
                'payment' => 'wxpay',
                'status' => 2,
                'paid_at' => date('Y-m-d H:i:s'),
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '舒婷',
                'order_no' => 'O'.date('YmdHis').rand(1000,9999),
                'money' => 299,
                'type' => 20,
                'payment' => 'alipay',
                'status' => 2,
                'paid_at' => date('Y-m-d H:i:s'),
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
