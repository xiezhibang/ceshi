<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class MemberClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_clubs')->insert([
           [
               'user_id' => 2,
               'upper_id' => 1,
               'username' => '东邪',
               'phone' => '13588093255',
               'member_head_image' => 'http://img3.imgtn.bdimg.com/it/u=3527936276,4134359723&fm=11&gp=0.jpg',
               'shop_id' => 1,
               'user_type'=>30,
               'company_name' => '中华烟草',
               'shop_name' => '尊宝披萨',
               'shop_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
               'shop_address' => '荔湾区龙溪中路108号',
               'status' => 20,
               'industry_id' => 1,
               'industry_name' => '软件类',
               'add_status' => 1,
               'add_time' => date('Y-m-d H:i:s'),
               'expire_time' => date('Y-m-d H:i:s'),
               'created_at'=>date('Y-m-d H:i:s'),
               'updated_at'=>date('Y-m-d H:i:s'),
           ],
            [
                'user_id' => 3,
                'upper_id' => 1,
                'username' => '西毒',
                'phone' => '13588093256',
                'member_head_image' => 'http://img3.imgtn.bdimg.com/it/u=3527936276,4134359723&fm=11&gp=0.jpg',
                'shop_id' => 1,
                'user_type'=>30,
                'company_name' => '中华烟草',
                'shop_name' => '尊宝披萨',
                'shop_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'shop_address' => '荔湾区龙溪中路108号',
                'status' => 20,
                'industry_id' => 1,
                'industry_name' => '软件类',
                'add_status' => 1,
                'add_time' => date('Y-m-d H:i:s'),
                'expire_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 4,
                'upper_id' => 1,
                'username' => '北丐',
                'phone' => '13588093257',
                'member_head_image' => 'http://img3.imgtn.bdimg.com/it/u=3527936276,4134359723&fm=11&gp=0.jpg',
                'shop_id' => 1,
                'user_type'=>30,
                'company_name' => '中华烟草',
                'shop_name' => '尊宝披萨',
                'shop_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'shop_address' => '荔湾区龙溪中路108号',
                'status' => 20,
                'industry_id' => 1,
                'industry_name' => '软件类',
                'add_status' => 1,
                'add_time' => date('Y-m-d H:i:s'),
                'expire_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 5,
                'upper_id' => 1,
                'username' => '南帝',
                'phone' => '13588093258',
                'member_head_image' => 'http://img3.imgtn.bdimg.com/it/u=3527936276,4134359723&fm=11&gp=0.jpg',
                'shop_id' => 1,
                'user_type'=>30,
                'company_name' => '中华烟草',
                'shop_name' => '尊宝披萨',
                'shop_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'shop_address' => '荔湾区龙溪中路108号',
                'status' => 20,
                'industry_id' => 1,
                'industry_name' => '软件类',
                'add_status' => 1,
                'add_time' => date('Y-m-d H:i:s'),
                'expire_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
