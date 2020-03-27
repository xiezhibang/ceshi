<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class GoodCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('good_categories')->insert([
            [
                'name' => '美食',
                'level_name' => '一级分类',
                'pid' => 0,
                'category_image' => '',
                'status' => 10,
                'level' => 0,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '超市',
                'level_name' => '一级分类',
                'pid' => 0,
                'category_image' => '',
                'status' => 10,
                'level' => 0,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '休闲',
                'level_name' => '一级分类',
                'pid' => 0,
                'category_image' => '',
                'status' => 10,
                'level' => 0,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '教育培训',
                'level_name' => '二级分类',
                'pid' => 0,
                'category_image' => '',
                'status' => 10,
                'level' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '面包甜点',
                'level_name' => '二级分类',
                'pid' => 1,
                'category_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'status' => 10,
                'level' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '生鲜水果',
                'level_name' => '二级分类',
                'pid' => 1,
                'category_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'status' => 10,
                'level' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '个人护理',
                'level_name' => '二级分类',
                'pid' => 2,
                'category_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'status' => 10,
                'level' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '母婴用品',
                'level_name' => '二级分类',
                'pid' => 2,
                'category_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'status' => 10,
                'level' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '按摩足疗',
                'level_name' => '二级分类',
                'pid' => 3,
                'category_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'status' => 10,
                'level' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '洗浴中心',
                'level_name' => '二级分类',
                'pid' => 3,
                'category_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'status' => 10,
                'level' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'UI设计培训',
                'level_name' => '二级分类',
                'pid' => 4,
                'category_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'status' => 10,
                'level' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'PHP课程培训',
                'level_name' => '二级分类',
                'pid' => 4,
                'category_image' => 'http://img5.imgtn.bdimg.com/it/u=1218344908,2950045501&fm=26&gp=0.jpg',
                'status' => 10,
                'level' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
