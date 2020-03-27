<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            [
                'title' => '首页轮播图',
                'banner_image' => 'http://img2.imgtn.bdimg.com/it/u=1180373977,3067345921&fm=26&gp=0.jpg',
                'type' => 10,
                'links' => 'www.baidu.com',
                'sort' => 100,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'title' => '首页轮播图',
                'banner_image' => 'http://img2.imgtn.bdimg.com/it/u=1180373977,3067345921&fm=26&gp=0.jpg',
                'type' => 10,
                'links' => 'www.baidu.com',
                'sort' => 100,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'title' => '首页轮播图',
                'banner_image' => 'http://img2.imgtn.bdimg.com/it/u=1180373977,3067345921&fm=26&gp=0.jpg',
                'type' => 10,
                'links' => 'www.baidu.com',
                'sort' => 100,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'title' => '商家首页轮播图',
                'banner_image' => 'http://img2.imgtn.bdimg.com/it/u=1180373977,3067345921&fm=26&gp=0.jpg',
                'type' => 20,
                'links' => 'www.baidu.com',
                'sort' => 100,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'title' => '商家首页轮播图',
                'banner_image' => 'http://img2.imgtn.bdimg.com/it/u=1180373977,3067345921&fm=26&gp=0.jpg',
                'type' => 20,
                'links' => 'www.baidu.com',
                'sort' => 100,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'title' => '商家首页轮播图',
                'banner_image' => 'http://img2.imgtn.bdimg.com/it/u=1180373977,3067345921&fm=26&gp=0.jpg',
                'type' => 20,
                'links' => 'www.baidu.com',
                'sort' => 100,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'title' => '会员金卡',
                'banner_image' => 'http://img2.imgtn.bdimg.com/it/u=1180373977,3067345921&fm=26&gp=0.jpg',
                'type' => 30,
                'links' => 'www.baidu.com',
                'sort' => 100,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'title' => '会员黑金卡',
                'banner_image' => 'http://img2.imgtn.bdimg.com/it/u=1180373977,3067345921&fm=26&gp=0.jpg',
                'type' => 40,
                'links' => 'www.baidu.com',
                'sort' => 100,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'title' => '邀请好友',
                'banner_image' => 'http://img2.imgtn.bdimg.com/it/u=1180373977,3067345921&fm=26&gp=0.jpg',
                'type' => 50,
                'links' => 'www.baidu.com',
                'sort' => 100,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'title' => '启动页面广告',
                'banner_image' => 'http://img2.imgtn.bdimg.com/it/u=1180373977,3067345921&fm=26&gp=0.jpg',
                'type' => 60,
                'links' => 'www.baidu.com',
                'sort' => 100,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
