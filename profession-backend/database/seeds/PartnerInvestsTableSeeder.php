<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PartnerInvestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partner_invests')->insert([
            [
                'user_id' => 1,
                'username' => '东邪',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHmKJol3OPtHiUMzPq2s2n89FHYmkQwMa9v71sZKXWLooKzQ3z2A&s',
                'user_account' => '18632126780',
                'partner_money' => 1000,
                'total_money' => 1000,
                'part_time' => date('Y-m-d H:i:s'),
                'expire_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'username' => '中神通',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHmKJol3OPtHiUMzPq2s2n89FHYmkQwMa9v71sZKXWLooKzQ3z2A&s',
                'user_account' => '18632126788',
                'partner_money' => 1000,
                'total_money' => 1000,
                'part_time' => date('Y-m-d H:i:s'),
                'expire_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 3,
                'username' => '黄蓉',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHmKJol3OPtHiUMzPq2s2n89FHYmkQwMa9v71sZKXWLooKzQ3z2A&s',
                'user_account' => '18632126785',
                'partner_money' => 2000,
                'total_money' => 3000,
                'part_time' => date('Y-m-d H:i:s'),
                'expire_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
