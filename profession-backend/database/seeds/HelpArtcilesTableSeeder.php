<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class HelpArtcilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('help_artciles')->insert([
            [
                'name' => '我的世界太過安靜',
                'cate_id' => 1,
                'sort' => 50,
                'art_time' => date('Y-m-d H:i:s'),
                'status' => 1,
                'content_detail' => '我的世界太過安靜，
                                    靜得可以聽見自己心跳的聲音。
                                    心房的血液慢慢流回心室，
                                    如此這般的輪回。
                                     
                                    聰明的人，喜歡猜心，
                                    也許猜對了別人的心，
                                    卻也失去了自己的。
                                    傻氣的人，喜歡給心，
                                    也許會被人騙，
                                    卻未必能得到別人的。
                                    你以為我刀槍不入，
                                    我以為你百毒不侵。',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'name' => '給自己一次拼搏的機會',
                'cate_id' => 2,
                'sort' => 100,
                'art_time' => date('Y-m-d H:i:s'),
                'status' => 1,
                'content_detail' => '一棵優秀的種子，如果放在杯子裡，最多會是一顆豆芽；如果放在盆子裡，最多是一盆好看的盆景；如果放在原始森林裡，它就會成為一棵參天大樹！

這說明把自己放在什麼位置很重要。

讀萬卷書不如行萬里路，別讓一生輸在一個"等"字上。

等將來，等不忙，等下次，等有時間，等有條件，等有錢了，等來等去等沒了緣分，等沒了青春，等沒了健康，等沒了機會，等沒了選擇，等沒了美麗。

誰也無法預知未來，很多事情可能會一等就等成了永遠。

想要做的事就趕緊去做，不要給自己等來太多的遺憾。

如果你肯改變，一切都會跟著改變，勇敢追求你的夢想。',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
