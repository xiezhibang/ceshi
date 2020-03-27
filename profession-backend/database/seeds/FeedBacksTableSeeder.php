<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class FeedBacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feed_backs')->insert([
            [
                'user_id' => 1,
                'username' => '张大善',
                'account' => '13800967895',
                'content' => '这个问题怎么解决啊，在线急啊。。。。',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'username' => '小不点',
                'account' => '13800967898',
                'content' => '这个问题怎么解决啊，在线急啊。。。。',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 3,
                'username' => '花无缺',
                'account' => '13800967896',
                'content' => '这个问题怎么解决啊，在线急啊。。。。',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 4,
                'username' => '小鱼儿',
                'account' => '13800967893',
                'content' => '这个问题怎么解决啊，在线急啊。。。。',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],

        ]);
    }
}
