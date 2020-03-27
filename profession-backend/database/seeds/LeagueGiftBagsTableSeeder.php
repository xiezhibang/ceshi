<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class LeagueGiftBagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('league_gift_bags')->insert([
            [
                'gift_name' => '豪华大礼包',
                'gift_money' => 3000,
                'gift_image' => 'http://img3.imgtn.bdimg.com/it/u=3590582356,2618273529&fm=26&gp=0.jpg',
                'description' => '升级送礼包优惠',
                'num' => 100,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'gift_name' => '豪华大礼包',
                'gift_money' => 1,
                'gift_image' => 'http://img3.imgtn.bdimg.com/it/u=3590582356,2618273529&fm=26&gp=0.jpg',
                'description' => '升级送礼包优惠',
                'num' => 50,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'gift_name' => '豪华大礼包',
                'gift_money' => 0.1,
                'gift_image' => 'http://img3.imgtn.bdimg.com/it/u=3590582356,2618273529&fm=26&gp=0.jpg',
                'description' => '升级送礼包优惠',
                'num' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'gift_name' => '豪华大礼包',
                'gift_money' => 600,
                'gift_image' => 'http://img3.imgtn.bdimg.com/it/u=3590582356,2618273529&fm=26&gp=0.jpg',
                'description' => '升级送礼包优惠',
                'num' => 150,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
