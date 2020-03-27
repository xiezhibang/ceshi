<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class WithdrawalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('withdrawals')->insert([
            [
                'user_id' => 1,
                'username' => '风清扬',
                'bank_id' => 1,
                'type' => 1,
                'bank_name' => '农业银行',
                'bank_sn' => '622689001033228398',
                'withdrawal_money' => 50,
                'withdrawal_sn' => date('YmdHis').rand(10000,99999),
                'status' => 2,
                'withdrawal_status' => 20,
                'withdrawal_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '风清扬',
                'bank_id' => 1,
                'type' => 1,
                'bank_name' => '农业银行',
                'bank_sn' => '622689001033228398',
                'withdrawal_money' => 100,
                'withdrawal_sn' => date('YmdHis').rand(10000,99999),
                'status' => 1,
                'withdrawal_status' => 10,
                'withdrawal_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '风清扬',
                'bank_id' => 1,
                'type' => 2,
                'bank_name' => '农业银行',
                'bank_sn' => '622689001033228398',
                'withdrawal_money' => 20,
                'withdrawal_sn' => date('YmdHis').rand(10000,99999),
                'status' => 3,
                'withdrawal_status' => 30,
                'withdrawal_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
