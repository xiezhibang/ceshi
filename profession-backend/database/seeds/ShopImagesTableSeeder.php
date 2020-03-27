<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ShopImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_images')->insert([
            [
                'shop_id' => 1,
                'image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'shop_id' => 1,
                'image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'shop_id' => 1,
                'image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'shop_id' => 1,
                'image' => 'http://img0.imgtn.bdimg.com/it/u=2911377525,2606244145&fm=26&gp=0.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
