<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function createInviteCode()
    {
        $code = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        //$code = strtolower($code);
        $rand = $code[rand(0,25)]
            .strtoupper(dechex(date('m')))
            .date('d')
            .substr(time(),-5)
            .substr(microtime(),2,5)
            .sprintf('%02d',rand(0,99));
        for(
            $a = md5( $rand, true ),
            $s = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            $s = strtolower($s),
            $d = '',
            $f = 0;
            $f < 6;
            $g = ord( $a[ $f ] ),
            $d .= $s[ ( $g ^ ord( $a[ $f + 8 ] ) ) - $g & 0x1F ],
            $f++
        );
        return $d;

    }

    /*
     * 测试
     *
     *
     * */
    public function test()
    {
        $a = '1,2,3,5,13,38,50';
        //把字符串转为数组
        //拆分字符串
        $b = explode(',',$a);
        foreach ($b as $item){
            $val = $item;
            var_dump($val);
        }
    }
}
