<?php

namespace App\Services\WebService;
use App\Model\Bank;
use App\Model\ConfigRate;
use App\Model\Member;
use App\Model\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class WithdrawalService extends BaseService
{

    /*
     * 申请提现，提现到银行卡
     * @param number $money 提现金额
     * @param number $type 提现类型 1-个人 2-店铺
     * @param number $bank_id 银行卡ID
     *
     * */
    public function withdrawApply($type,$money,$bank_id)
    {
        //提现用户信息
        $user = Auth::guard('member')->user();
        //提现用户ID
        $uid = $user->id;
        //零钱
        $moneyBag = $user->money_bag;
        if ($money > $moneyBag){
            return $this->fail(210023);
        }
        $member = Member::find($uid);
        //提现费率
        $rate = ConfigRate::where('type',1)->value('rate');
        $rate = $rate / 100 ;
        //银行卡信息
        $bank = Bank::find($bank_id);
        //被除的整数
        $beishu = 10;
        if (is_int($money / $beishu)) {
            //写提现逻辑
            $data = Withdrawal::create([
                'user_id'           => $uid,//用户ID
                'username'          => $member->memberBind->nick_name,//用户名称
                'type'              => $type,//提现类型
                'bank_id'           => $bank_id,//银行卡ID
                'bank_name'         => $bank['bank_name'],//银行卡名称
                'bank_sn'           => $bank['bank_sn'],//银行卡号
                'withdrawal_money'  => $money * $rate,//提现金额
                'rates'             => $rate,//提现费率
                'withdrawal_sn'     => $this->makeOrderNo(),//提现单号
                'withdrawal_status' => 10,//提现状态为提现中，待审核
            ]);
            //返回结果
            if ($data){
                return $this->success($data);
            }
            return $this->fail(210022);
        } else {
            //不符合提现条件
            return $this->fail(210021);
        }
    }

    //生成唯一订单号
    public function makeOrderNo()
    {
        //订单号码主体（YYYYMMDDHHIISSNNNNNNNN）
        $order_id_main = date('YmdHis') . rand(10000000,99999999);
        //订单号码主体长度
        $order_id_len = strlen($order_id_main);
        $order_id_sum = 0;

        for($i=0; $i<$order_id_len; $i++){
            $order_id_sum += (int)(substr($order_id_main,$i,1));
        }
        //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
        $order_id = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100,2,'0',STR_PAD_LEFT);
        return $order_id;
    }

}