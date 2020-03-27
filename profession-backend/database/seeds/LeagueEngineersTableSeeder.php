<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class LeagueEngineersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('league_engineers')->insert([
            [
                'engineer_name' => '中资联酒庄',
                'league_num' => 8,
                'industry_id' => 1,
                'industry_name'=>'软件类',
                'cate_industry_id' => 6,
                'cate_industry_name' => '架构师',
                'league_money' => 1000,
                'league_time' => 365,
                'league_scale' => 5,
                'gift_id' => 1,
                'gift_name' => '合伙礼包',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'engineer_name' => '中资联酒庄2',
                'league_num' => 50,
                'industry_id' => 1,
                'industry_name'=>'软件类',
                'cate_industry_id' => 5,
                'cate_industry_name' => '软件测试师',
                'league_money' => 2000,
                'league_time' => 365,
                'league_scale' => 5,
                'gift_id' => 1,
                'gift_name' => '合伙礼包',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
