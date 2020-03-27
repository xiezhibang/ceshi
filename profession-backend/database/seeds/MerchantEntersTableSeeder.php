<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class MerchantEntersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merchant_enters')->insert([
            [
                'user_id' => 1,
                'username' => '中神通',
                'user_phone' => '13500678903',
                'type' => 1,
                'industry_id' => 1,
                'cate_industry_id' => 4,
                'industry_name' => '软件类',
                'cate_industry_name' => '系统分析师',
                'shop_name' => '至尊披萨（荔湾店）',
                'desc' => '申请商家入驻简介',
                'province' => '广东省',
                'city' => '广州市',
                'district' => '荔湾区',
                'address' => '花城大道128号',
                'phone' => '13900898756',
                'privilege_type' => 20,
                'overall_evaluate' => 4,
                'longitude' => '115.21',
                'latitude' => '22.47',
                'company_name' => '爱特安为科技',
                'social_code' => 'AD1548885856',
                'company_province' => '广东省',
                'company_city' => '广州市',
                'company_district' => '荔湾区',
                'company_address' => '花城大道128号北塔13楼三单元',
                'license_image' => 'http://img2.imgtn.bdimg.com/it/u=1180373977,3067345921&fm=26&gp=0.jpgs',
                'front_identity_card' => 'http://meituyuan.com/data/share/2014/08/6/02102053dc4b03270d9_b.jpg',
                'side_identity_card' => 'http://meituyuan.com/data/share/2014/08/6/02102053dc4b03270d9_b.jpg',
                'shop_image' => 'http://img3.imgtn.bdimg.com/it/u=2136448882,2820293373&fm=26&gp=0.jpg',
                'engineer_id' => 1,
                'engineer_name' => '入驻店铺合伙项目',
                'league_image' => 'http://img3.imgtn.bdimg.com/it/u=2136448882,2820293373&fm=26&gp=0.jpg',
                'status' => 0,
                'recommend_status' => 2,
                'check_status' => 1,
                'club_num' => 3,
                'partner_num' => 5,
                'shop_manner_num' => 2,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'username' => '北丐',
                'user_phone' => '13500678988',
                'type' => 2,
                'industry_id' => 1,
                'cate_industry_id' => 5,
                'industry_name' => '软件类',
                'cate_industry_name' => '软件测试师',
                'shop_name' => '至尊披萨（荔湾店2）',
                'desc' => '申请商家入驻简介',
                'province' => '广东省',
                'city' => '广州市',
                'district' => '荔湾区',
                'address' => '花城大道128号',
                'phone' => '13900898756',
                'privilege_type' => 10,
                'overall_evaluate' => 4,
                'longitude' => '114.07',
                'latitude' => '22.33',
                'company_name' => '爱特安为科技',
                'social_code' => 'AD1548885856',
                'company_province' => '广东省',
                'company_city' => '广州市',
                'company_district' => '荔湾区',
                'company_address' => '花城大道128号北塔13楼三单元',
                'license_image' => 'http://img2.imgtn.bdimg.com/it/u=1180373977,3067345921&fm=26&gp=0.jpg',
                'front_identity_card' => 'http://meituyuan.com/data/share/2014/08/6/02102053dc4b03270d9_b.jpg',
                'side_identity_card' => 'http://meituyuan.com/data/share/2014/08/6/02102053dc4b03270d9_b.jpg',
                'shop_image' => 'http://img3.imgtn.bdimg.com/it/u=2136448882,2820293373&fm=26&gp=0.jpg',
                'engineer_id' => 2,
                'engineer_name' => '入驻店铺合伙项目2',
                'league_image' => 'http://img3.imgtn.bdimg.com/it/u=2136448882,2820293373&fm=26&gp=0.jpg',
                'status' => 0,
                'recommend_status' => 2,
                'check_status' => 1,
                'club_num' => 8,
                'partner_num' => 12,
                'shop_manner_num' => 5,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
