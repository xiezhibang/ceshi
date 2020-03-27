<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $str = '123123';
        $crypt_str = Crypt::encrypt($str);
        DB::table('admin_users')->insert([
            'user_name' => 'admin',
            'email' => Str::random(10).'@gmail.com',
            'user_pass' => $crypt_str,
            'phone' => '18890256785',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
