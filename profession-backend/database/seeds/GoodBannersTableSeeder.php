<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class GoodBannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('good_banners')->insert([
            [
                'icon_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'name' => '美食',
                'sort' => 20,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'icon_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'name' => '超市',
                'sort' => 50,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'icon_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'name' => '休闲',
                'sort' => 100,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'icon_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'name' => '教育培训',
                'sort' => 100,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'icon_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'name' => '酒店住宿',
                'sort' => 80,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
