<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class FeedBackImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feed_back_images')->insert([
            [
                'feed_back_id' => 1,
                'feed_image' => 'http://img3.imgtn.bdimg.com/it/u=3590582356,2618273529&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'feed_back_id' => 1,
                'feed_image' => 'http://img3.imgtn.bdimg.com/it/u=3590582356,2618273529&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'feed_back_id' => 2,
                'feed_image' => 'http://img3.imgtn.bdimg.com/it/u=3590582356,2618273529&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'feed_back_id' => 2,
                'feed_image' => 'http://img3.imgtn.bdimg.com/it/u=3590582356,2618273529&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'feed_back_id' => 3,
                'feed_image' => 'http://img3.imgtn.bdimg.com/it/u=3590582356,2618273529&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'feed_back_id' => 3,
                'feed_image' => 'http://img3.imgtn.bdimg.com/it/u=3590582356,2618273529&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'feed_back_id' => 4,
                'feed_image' => 'http://img3.imgtn.bdimg.com/it/u=3590582356,2618273529&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'feed_back_id' => 4,
                'feed_image' => 'http://img3.imgtn.bdimg.com/it/u=3590582356,2618273529&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
