<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PartnerReturnDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partner_return_details')->insert([
            [
                'user_id' => 1,
                'username' => '东邪',
                'user_account' => '18632126780',
                'order_no' => date('YmdHis').rand(10000,99999),
                'partner_money' => 200,
                'partner_integral' => 1000,
                'remark' => '备注信息。。。',
                'return_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'username' => '西毒',
                'user_account' => '18632126788',
                'order_no' => date('YmdHis').rand(10000,99999),
                'partner_money' => 800,
                'partner_integral' => 1000,
                'remark' => '备注信息。。。',
                'return_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '郭靖',
                'user_account' => '18632126781',
                'order_no' => date('YmdHis').rand(10000,99999),
                'partner_money' => 1000,
                'partner_integral' => 1000,
                'remark' => '备注信息。。。',
                'return_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
