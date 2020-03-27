<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PartnerGiftBagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partner_gift_bags')->insert([
            [
                'user_id' => 1,
                'username' => '中神通',
                'bag_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'bag_name' => '加盟店铺',
                'money' => 66,
                'remark' => '价值1500元美酒（500ml）',
                'status' => 10,
                'bag_code' => '256788',
                'shop_id' => 1,
                'shop_name' => '尊宝披萨（广百店）',
                'shop_address' => '花地湾大道荔胜广场',
                'longitude' => '113.37',
                'latitude' => '24.48',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '中神通',
                'bag_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'bag_name' => '加盟店铺',
                'money' => 66,
                'remark' => '价值1500元美酒（300ml）',
                'status' => 10,
                'bag_code' => '256788',
                'shop_id' => 1,
                'shop_name' => '尊宝披萨（广百店）',
                'shop_address' => '花地湾大道荔胜广场',
                'longitude' => '113.37',
                'latitude' => '24.48',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '中神通',
                'bag_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'bag_name' => '加盟店铺',
                'money' => 66,
                'remark' => '价值1500元美酒（500ml）',
                'status' => 20,
                'bag_code' => '256788',
                'shop_id' => 1,
                'shop_name' => '尊宝披萨（广百店）',
                'shop_address' => '花地湾大道荔胜广场',
                'longitude' => '113.37',
                'latitude' => '24.48',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'username' => '中神通',
                'bag_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'bag_name' => '加盟店铺',
                'money' => 66,
                'remark' => '价值1500元美酒（300ml）',
                'status' => 20,
                'bag_code' => '256788',
                'shop_id' => 1,
                'shop_name' => '尊宝披萨（广百店）',
                'shop_address' => '花地湾大道荔胜广场',
                'longitude' => '113.37',
                'latitude' => '24.48',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
