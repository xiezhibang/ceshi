<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class MemberEquitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_equities')->insert([
            [
                'name' => '额外95折',
                'type' => 10,
                'money' => 99,
                'sort' => 50,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '推广返佣',
                'type' => 10,
                'money' => 99,
                'sort' => 50,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '消费奖励',
                'type' => 10,
                'money' => 99,
                'sort' => 50,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '额外95折',
                'type' => 20,
                'money' => 299,
                'sort' => 50,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '推广返佣',
                'type' => 20,
                'money' => 299,
                'sort' => 50,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '消费奖励',
                'type' => 20,
                'money' => 299,
                'sort' => 50,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '开通店铺',
                'type' => 20,
                'money' => 299,
                'sort' => 50,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '加入俱乐部',
                'type' => 20,
                'money' => 299,
                'sort' => 50,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name' => '加入合伙项目',
                'type' => 20,
                'money' => 299,
                'sort' => 50,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
