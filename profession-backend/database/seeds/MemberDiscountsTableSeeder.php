<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class MemberDiscountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_discounts')->insert([
            [
                'user_id' => 1,
                'discount' => '9折',
                'name' => '绿卡',
                'type' => 10,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'discount' => '8折',
                'name' => '金卡',
                'type' => 20,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],

            [
                'user_id' => 1,
                'discount' => '6折',
                'name' => '黑金卡',
                'type' => 30,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],

        ]);
    }
}
