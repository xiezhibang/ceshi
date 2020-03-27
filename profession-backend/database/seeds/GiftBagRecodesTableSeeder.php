<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class GiftBagRecodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gift_bag_recodes')->insert([
            [
                'gift_bag_id' => 1,
                'user_id' => 1,
                'username' => '东邪',
                'gift_code' => '153890',
                'shop_id' => 1,
                'shop_name' => '天上人间第一味',
                'good_id' => 1,
                'good_name' => '至尊披萨',
                'account' => '18677890536',
                'bag_status' => 1,
                'gift_bag_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'gift_bag_id' => 1,
                'user_id' => 2,
                'username' => '西毒',
                'gift_code' => '158896',
                'shop_id' => 1,
                'shop_name' => '天上人间第一味',
                'good_id' => 1,
                'good_name' => '至尊披萨',
                'account' => '13577890538',
                'bag_status' => 1,
                'gift_bag_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'gift_bag_id' => 2,
                'user_id' => 3,
                'username' => '北丐',
                'gift_code' => '138893',
                'shop_id' => 1,
                'shop_name' => '天上人间第一味',
                'good_id' => 1,
                'good_name' => '至尊披萨',
                'account' => '18577890530',
                'bag_status' => 0,
                'gift_bag_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'gift_bag_id' => 4,
                'user_id' => 3,
                'username' => '南帝',
                'gift_code' => '136693',
                'shop_id' => 1,
                'shop_name' => '天上人间第一味',
                'good_id' => 1,
                'good_name' => '至尊披萨',
                'account' => '18577890536',
                'bag_status' => 1,
                'gift_bag_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
