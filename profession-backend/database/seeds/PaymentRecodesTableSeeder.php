<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PaymentRecodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_recodes')->insert([
            [
                'user_id'=>1,
                'name' => '蒸笼里的包',
                'money' => 36,
                'status' => 20,
                'paid_time' => date('Y-m-d'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id'=>1,
                'name' => '水果',
                'money' => 13.50,
                'status' => 20,
                'paid_time' => date('Y-m-d'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id'=>1,
                'name' => '多抓鱼',
                'money' => 28,
                'status' => 20,
                'paid_time' => date('Y-m-d'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
