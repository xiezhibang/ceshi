<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            [
                'name' => '书瑶',
                'mobile' => '13809876658',
                'password' => bcrypt('123456'),
                'money_bag' => 10000,
                'total_credits' => 5000,
                'revenue_money' => 18005.58,
                'wx_name' => '13809876658',
                'type' => 40,
                'email' => Str::random(10).'@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '书瑶_2',
                'mobile' => '13509876685',
                'password' => bcrypt('123456'),
                'money_bag' => 8000,
                'total_credits' => 5080,
                'revenue_money' => 18000,
                'wx_name' => '13509876685',
                'type' => 20,
                'email' => Str::random(10).'@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '书瑶_3',
                'mobile' => '18809876681',
                'password' => bcrypt('123456'),
                'money_bag' => 9000,
                'total_credits' => 10000,
                'revenue_money' => 1000,
                'wx_name' => '18809876681',
                'type' => 30,
                'email' => Str::random(10).'@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '书瑶_4',
                'mobile' => '18809876682',
                'password' => bcrypt('123456'),
                'money_bag' => 9000,
                'total_credits' => 10000,
                'revenue_money' => 1000,
                'wx_name' => '18809876682',
                'type' => 10,
                'email' => Str::random(10).'@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '书瑶_5',
                'mobile' => '18809876683',
                'password' => bcrypt('123456'),
                'money_bag' => 9000,
                'total_credits' => 10000,
                'revenue_money' => 1000,
                'wx_name' => '18809876683',
                'type' => 50,
                'email' => Str::random(10).'@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
