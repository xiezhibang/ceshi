<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LatLngRequest;
use App\Http\Requests\Api\PageLimitRequest;
use App\Services\WebService\CollectService;
use Illuminate\Http\Request;

class CollectController extends Controller
{
    /*
     *
     * 我的--商品收藏列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     * */
    public function goodCollectList(PageLimitRequest $request,CollectService $collectService)
    {
        $result = $collectService->goodCollectList($request->page,$request->limit);
        return $result;
    }

    /*
     *
     * 我的--店铺收藏列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     * */
    public function shopCollectList(LatLngRequest $request,CollectService $collectService)
    {
        $result = $collectService->shopCollectList($request->page,$request->limit,$request->lat,$request->lng);
        return $result;
    }
}
