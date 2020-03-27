<?php

namespace App\Services\WebService;
use App\Model\PartnerGiftBag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class GiftBagRecodeService extends BaseService
{

    /*
     * 未领取的礼包（合伙礼包）
     *
     * */
    public function waitGiftBagList()
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //礼包信息
        $data = PartnerGiftBag::where('user_id',$uid)
            ->where('status',10)
            ->latest('id')
            ->get(['id','user_id','bag_image','bag_name','money','remark','status']);
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 已领取的礼包
     *
     * */
    public function alreadyGiftBagList()
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //礼包信息
        $data = PartnerGiftBag::where('user_id',$uid)
            ->where('status',20)
            ->latest('id')
            ->get(['id','user_id','bag_image','bag_name','money','remark','status']);
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 特权礼包---礼包详情
     * @param number $gift_bag_id 礼包ID
     *
     * */
    public function giftBagDetail($gift_bag_id)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //礼包
        $data = PartnerGiftBag::where('user_id',$uid)
            ->where('id',$gift_bag_id)
            ->select('id','bag_code','bag_name','money','bag_image')
            ->first();
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 领取礼包
     * @param number $gift_bag_id 礼包ID
     *
     * */
    public function receiveGiftBag($gift_bag_id)
    {
        $bag = PartnerGiftBag::find($gift_bag_id);
        //领取
        $data = $bag->update(['status'=>20]);
        if ($data){
            return $this->success($data);
        }
        return $this->fail(210031);
    }

}