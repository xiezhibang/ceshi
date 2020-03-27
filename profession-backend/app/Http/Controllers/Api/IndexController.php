<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PageLimitRequest;
use App\Http\Requests\Api\SearchRequest;
use App\Services\WebService\IndexService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /*
     *
     * 首页信息列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     * @param string $good_name 商品名称
     * @param string $shop_name 店铺名称
     * @param number $batch_type 换一批  10-否 20-是
     * @param string $address 地区/城市
     * */
    public function indexList(Request $request,IndexService $indexService)
    {
        $result = $indexService->indexList($request->page,$request->limit,$request->batch_type,$request);
        return $result;
    }

    /*
    * 首页未读消息提示
    *
    * */
    public function readMessageCount(IndexService $indexService)
    {
        $result = $indexService->readMessageCount();
        return $result;
    }

    /*
     * 搜索接口
     * @param string $keywords 关键词
     *
     *
     * */
    public function searchList(SearchRequest $request,IndexService $indexService)
    {
        $result = $indexService->searchList($request);
        return $result;
    }

}
