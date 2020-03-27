<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\WithdrawRequest;
use App\Services\WebService\WithdrawalService;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * @api {get} /withdraws/{withdraw_id}/verifier 提现审核
     */
    public function verify(Request $request, $withdraw_id)
    {
        if (!$type = $request->type) {
            return failed(400, '类型不能为空');
        }
        $withdraw = WithdrawModel::find($withdraw_id);
        if (!$withdraw) {
            return failed(404, '提现记录不存在');
        }
        if ($withdraw->status != 1) {
            return failed(401, '该提现已审核，无需再次操作');
        }
        //用户提现
        $user_id = $withdraw->user_id;
        //代理提现
        if ($withdraw->type == 2) {
            $user_id = AdminModel::where('id', $withdraw->user_id)->value('user_id');
        }
        $openid = UserModel::where('id', $user_id)->value('openid');
        if (!$openid) {
            return failed(402, '用户不存在');
        }
        $result = app('wechat_pay')->transfer([
            'openid' => $openid,
            'check_name' => 'NO_CHECK',
            'partner_trade_no' => $withdraw->withdraw_no,
            'amount' => $withdraw->money * 100,
            'desc' => '提现'
        ]);
        if ($result['return_code'] === 'SUCCESS' && $result['result_code'] === 'SUCCESS') {
            $withdraw->payment_no = $result->payment_no;
            $withdraw->payment_time = $result->payment_time;
            $withdraw->status = 3;
            $withdraw->payment_type = 1;
            $result = $withdraw->save();
        } else {
            $result = 0;
        }

        return $result ? successful() : failed(403, '审核失败，请联系管理员');
    }

    /*
     * 申请提现，提现到银行卡
     * @param number $money 提现金额
     *
     * @param number $bank_id 银行卡ID
     *
     * */
    public function withdrawApply(WithdrawRequest $request,WithdrawalService $withdrawalService)
    {
        $result = $withdrawalService->withdrawApply($request->type,$request->money,$request->bank_id);
        return $result;
    }
}
