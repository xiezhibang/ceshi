<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class StorePartnerDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store_partner_details')->insert([
            [
                'shop_id' => 1,
                'engineer_id'=>1,
                'shop_name' => '第一味店铺',
                'shop_account' => '18632126789',
                'user_id' => 1,
                'username' => '东邪',
                'phone' => '18632126780',
                'num' => 5,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'shop_id' => 2,
                'engineer_id'=>2,
                'shop_name' => '披萨店铺',
                'shop_account' => '18632126788',
                'user_id' => 2,
                'username' => '西毒',
                'phone' => '18632126781',
                'num' => 9,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'shop_id' => 1,
                'engineer_id'=>1,
                'shop_name' => '店小二店铺',
                'shop_account' => '18632126787',
                'user_id' => 3,
                'username' => '北丐',
                'phone' => '18632126782',
                'num' => 12,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
