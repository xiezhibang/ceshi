<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PrepaidChangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prepaid_changes')->insert([
            [
                'user_id' => 1,
                'username' => '中神通',
                'money' => 30,
                'order_no' => date('YmdHis').rand(100000,999999),
                'payment' => 'wxpay',
                'status' => 2,
                'paid_at' => date('Y-m-d H:i:s'),
                'remark' => '零钱充值',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '中神通',
                'money' => 50,
                'order_no' => date('YmdHis').rand(100000,999999),
                'payment' => 'wxpay',
                'status' => 2,
                'paid_at' => date('Y-m-d H:i:s'),
                'remark' => '零钱充值',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '中神通',
                'money' => 50,
                'order_no' => date('YmdHis').rand(100000,999999),
                'payment' => 'alipay',
                'status' => 2,
                'paid_at' => date('Y-m-d H:i:s'),
                'remark' => '零钱充值',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '中神通',
                'money' => 100,
                'order_no' => date('YmdHis').rand(100000,999999),
                'payment' => 'alipay',
                'status' => 2,
                'paid_at' => date('Y-m-d H:i:s'),
                'remark' => '零钱充值',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
