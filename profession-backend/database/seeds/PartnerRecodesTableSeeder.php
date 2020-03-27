<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PartnerRecodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partner_recodes')->insert([
            [
                'user_id' => 1,
                'upper_id' => 1,
                'username' => '张无忌',
                'account' => '13500892397',
                'image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'money' => 1000,
                'status' => 1,
                'shop_id' => 1,
                'shop_name' => '至尊披萨（东圃店）',
                'shop_address'=> '广州市天河区车陂启明大街南三巷15号',
                'company_name' => '爱特安为公司',
                'shop_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'add_time' => date('Y-m-d H:i:s'),
                'expire_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'upper_id' => 1,
                'username' => '杨逍',
                'account' => '13800892335',
                'image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'money' => 1000,
                'status' => 1,
                'shop_id' => 1,
                'shop_name' => '至尊披萨（东圃店）',
                'shop_address'=> '广州市天河区车陂启明大街南三巷19号',
                'company_name' => '爱特安为公司',
                'shop_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'add_time' => date('Y-m-d H:i:s'),
                'expire_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 3,
                'upper_id' => 1,
                'username' => '乔峰',
                'account' => '13800892336',
                'image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'money' => 1000,
                'status' => 1,
                'shop_id' => 2,
                'shop_name' => '阿强酸菜鱼',
                'shop_address'=> '广州市天河区车陂启明大街南三巷2号',
                'company_name' => '爱特安为公司',
                'shop_image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'add_time' => date('Y-m-d H:i:s'),
                'expire_time' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
