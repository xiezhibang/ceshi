<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BankCardRequest;
use App\Http\Requests\Api\BankRequest;
use App\Services\WebService\BankService;
use Illuminate\Http\Request;

class MemberBankController extends Controller
{

    /*
     * 银行卡列表
     *
     * */
    public function bankList(BankService $bankService)
    {
        $result = $bankService->bankList();
        return $result;
    }

    /*
     * 根据卡号获取银行卡名称
     *
     * */
    public function bankNoName(BankCardRequest $request,BankService $bankService)
    {
        $result = $bankService->bankNoName($request->bank_sn);
        return $result;
    }

    /*
     * 添加银行卡
     *
     * */
    public function addBankNo(BankRequest $request,BankService $bankService)
    {
        $result = $bankService->addBankNo($request->username,$request->bank_sn,$request->province,$request->city,$request->area,$request->bank_name,$request->sub_bank_name);
        return $result;
    }


}
