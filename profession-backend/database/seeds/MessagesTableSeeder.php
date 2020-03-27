<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'name' => 'IOS消息推送',
                'push_type' => 1,
                'target_type' => 1,
                'province' => '广东省',
                'city' => '广州市',
                'district' => '天河区',
                'message_content' => '　其实，那树上并没有树叶，树叶是一位画家画上去的，它不是真树叶，但它达到了真树叶生动真实的效果，给了那位病人一个坚强的信念：活着，只要那片树叶不落，我的生命就不会死。结果，他真的康复了，走出病房去那棵树下看个究竟。',
                'send_type' => 1,
                'status' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Android消息推送',
                'push_type' => 2,
                'target_type' => 1,
                'province' => '广东省',
                'city' => '广州市',
                'district' => '天河区',
                'message_content' => '　其实，那树上并没有树叶，树叶是一位画家画上去的，它不是真树叶，但它达到了真树叶生动真实的效果，给了那位病人一个坚强的信念：活着，只要那片树叶不落，我的生命就不会死。结果，他真的康复了，走出病房去那棵树下看个究竟。',
                'send_type' => 1,
                'status' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Android消息推送',
                'push_type' => 2,
                'target_type' => 2,
                'province' => '广东省',
                'city' => '广州市',
                'district' => '天河区',
                'message_content' => '　其实，那树上并没有树叶，树叶是一位画家画上去的，它不是真树叶，但它达到了真树叶生动真实的效果，给了那位病人一个坚强的信念：活着，只要那片树叶不落，我的生命就不会死。结果，他真的康复了，走出病房去那棵树下看个究竟。',
                'send_type' => 1,
                'status' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'IOS消息推送',
                'push_type' => 2,
                'target_type' => 3,
                'province' => '广东省',
                'city' => '广州市',
                'district' => '天河区',
                'message_content' => '　其实，那树上并没有树叶，树叶是一位画家画上去的，它不是真树叶，但它达到了真树叶生动真实的效果，给了那位病人一个坚强的信念：活着，只要那片树叶不落，我的生命就不会死。结果，他真的康复了，走出病房去那棵树下看个究竟。',
                'send_type' => 1,
                'status' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'IOS消息推送',
                'push_type' => 2,
                'target_type' => 4,
                'province' => '广东省',
                'city' => '广州市',
                'district' => '天河区',
                'message_content' => '　其实，那树上并没有树叶，树叶是一位画家画上去的，它不是真树叶，但它达到了真树叶生动真实的效果，给了那位病人一个坚强的信念：活着，只要那片树叶不落，我的生命就不会死。结果，他真的康复了，走出病房去那棵树下看个究竟。',
                'send_type' => 1,
                'status' => 1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'IOS消息推送',
                'push_type' => 1,
                'target_type' => 1,
                'province' => '广东省',
                'city' => '广州市',
                'district' => '天河区',
                'message_content' => '　其实，那树上并没有树叶，树叶是一位画家画上去的，它不是真树叶，但它达到了真树叶生动真实的效果，给了那位病人一个坚强的信念：活着，只要那片树叶不落，我的生命就不会死。结果，他真的康复了，走出病房去那棵树下看个究竟。',
                'send_type' => 1,
                'status' => 3,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'IOS消息推送',
                'push_type' => 1,
                'target_type' => 1,
                'province' => '广东省',
                'city' => '广州市',
                'district' => '天河区',
                'message_content' => '　其实，那树上并没有树叶，树叶是一位画家画上去的，它不是真树叶，但它达到了真树叶生动真实的效果，给了那位病人一个坚强的信念：活着，只要那片树叶不落，我的生命就不会死。结果，他真的康复了，走出病房去那棵树下看个究竟。',
                'send_type' => 1,
                'status' => 0,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
