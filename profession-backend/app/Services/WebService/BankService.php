<?php

namespace App\Services\WebService;
use App\Model\Bank;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Zhuzhichao\BankCardInfo\BankCard;

class BankService extends BaseService
{

    /*
     *
     * 获取银行卡列表
     *
     *
     * */
    public function bankList()
    {
        $result = Bank::query()->latest()->get();
        if ($result){
            return $this->success($result);
        }
        return $this->fail(900009);
    }

    /*
     *
     * 根据卡号获取银行卡名称
     * @param string $bank_sn 银行卡号
     *
     * */
    public function bankNoName($bank_sn)
    {
        $result = BankCard::info($bank_sn);
        if ($result){
            return $this->success($result);
        }
        return $this->fail(900009);
    }


    /*
    *
    * 添加银行卡
    * @param string $username 开户名
    * @param string $bank_sn 银行卡号
    * @param string $province 省份
    * @param string $city 城市
    * @param string $area 地区
    * @param string $bank_name 银行名称
    * @param string $sub_bank_name 支行名称
    *
    * */
    public function addBankNo($username,$bank_sn,$province,$city,$area,$bank_name,$sub_bank_name)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //判断是否已经绑定银行卡
        $bindCardBank = Bank::query()->where('user_id',$uid)
            ->where('bank_sn',$bank_sn)
            ->first();

        if ($bindCardBank){
            return $this->fail(500002);
        }

        $result = Bank::create([
            'user_id' => $uid,
            'username' => $username,
            'bank_sn' => $bank_sn,
            'province' => $province,
            'city' => $city,
            'district' => $area,
            'bank_name' => $bank_name,
            'branch_name' => $sub_bank_name,
        ]);

        if ($result){
            return $this->success($result);
        }
        return $this->fail(500001);
    }

}