<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class MoneyRecodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('money_recodes')->insert([
            [
                'user_id' => 1,
                'username' => '中神通',
                'type' => 1,
                'money' => 12.8,
                'remark' => '扫二维码付款',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '中神通',
                'type' => 2,
                'money' => 30,
                'remark' => '退款',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '中神通',
                'type' => 3,
                'money' => 100,
                'remark' => '消费',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '中神通',
                'type' => 4,
                'money' => 200,
                'remark' => '二维码收款',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '中神通',
                'type' => 5,
                'money' => 98,
                'remark' => '购买商品',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '中神通',
                'type' => 6,
                'money' => 100,
                'remark' => '充值金额',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '中神通',
                'type' => 1,
                'money' => 28.6,
                'remark' => '扫二维码付款',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
