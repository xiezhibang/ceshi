<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GiftBagDetailRequest;
use App\Http\Requests\Api\PageLimitRequest;
use App\Services\WebService\GiftBagRecodeService;
use App\Services\WebService\IndexService;
use Illuminate\Http\Request;

class GiftBagController extends Controller
{

    /*
     * 未领取的礼包（合伙礼包）
     *
     * */
    public function waitGiftBagList(GiftBagRecodeService $giftBagRecodeService)
    {
        $result = $giftBagRecodeService->waitGiftBagList();
        return $result;
    }

    /*
     * 已领取的礼包
     *
     * */
    public function alreadyGiftBagList(GiftBagRecodeService $giftBagRecodeService)
    {
        $result = $giftBagRecodeService->alreadyGiftBagList();
        return $result;
    }

    /*
     * 特权礼包---礼包详情
     * @param number $gift_bag_id 礼包ID
     *
     * */
    public function giftBagDetail(GiftBagDetailRequest $request,GiftBagRecodeService $giftBagRecodeService)
    {
        $result = $giftBagRecodeService->giftBagDetail($request->gift_bag_id);
        return $result;
    }

    /*
     * 领取礼包
     * @param number $gift_bag_id 礼包ID
     *
     * */
    public function receiveGiftBag(GiftBagDetailRequest $request,GiftBagRecodeService $giftBagRecodeService)
    {
        $result = $giftBagRecodeService->receiveGiftBag($request->gift_bag_id);
        return $result;
    }
}
