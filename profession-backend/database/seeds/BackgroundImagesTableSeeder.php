<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BackgroundImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('background_images')->insert([
            [
                'type' => 1,
                'background_image' => 'http://img5.imgtn.bdimg.com/it/u=403274396,344954859&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'type' => 2,
                'background_image' => 'http://img5.imgtn.bdimg.com/it/u=403274396,344954859&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'type' => 3,
                'background_image' => 'http://img5.imgtn.bdimg.com/it/u=403274396,344954859&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'type' => 4,
                'background_image' => 'http://img5.imgtn.bdimg.com/it/u=403274396,344954859&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'type' => 5,
                'background_image' => 'http://img5.imgtn.bdimg.com/it/u=403274396,344954859&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
