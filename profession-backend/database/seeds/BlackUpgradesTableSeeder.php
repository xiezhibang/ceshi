<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class BlackUpgradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('black_upgrades')->insert([
            'user_id' => 1,
            'shop_id' => 1,
            'shop_name' => '尊宝披萨',
            'company_name' => '天银大厦爱梦科技',
            'social_code' => 'M'.date('YmdHis'),
            'province' => '广东省',
            'city' => '广州市',
            'district' => '荔湾区',
            'address' => '荔湾区龙溪中路108号',
            'username' => '李一菡',
            'phone' => '18857809768',
            'license_image' => 'http://img2.imgtn.bdimg.com/it/u=1180373977,3067345921&fm=26&gp=0.jpg',
            'front_identity_card' => 'http://meituyuan.com/data/share/2014/08/6/02102053dc4b03270d9_b.jpg',
            'side_identity_card' => 'http://meituyuan.com/data/share/2014/08/6/02102053dc4b03270d9_b.jpg',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
