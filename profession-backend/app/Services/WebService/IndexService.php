<?php

namespace App\Services\WebService;
use App\Model\Banner;
use App\Model\Good;
use App\Model\MerchantEnter;
use App\Model\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class IndexService extends BaseService
{

    /*
     *
     * 首页信息列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     * @param string $good_name 商品名称
     * @param string $shop_name 店铺名称
     * @param number $batch_type 换一批  10-否 20-是
     * @param string $address 地区
     *
     * */
    public function indexList($page,$limit,$batch_type,$request)
    {
        //首页轮播图
        $banners = Banner::where('type',10)->where('status',1)->select('id','banner_image','links')->get();
        $where = function ($query) use ($request) {
            if ($request->has('keywords') and $request->keywords != '') {
                $search = "%" . $request->keywords . "%";
                $query->where('shop_name', 'like', $search);
                $query->orWhere('good_name', 'like', $search);
                $query->orWhere('shop_address', 'like', $search);
            }
        };
        //特权商品信息
        $query = Good::where('type',2)->where('state',1)->where($where);
//        if (!empty($shop_name)) {
//            $query = $query->where('shop_name', 'like', '%' . $shop_name . '%');
//        }
//        if (!empty($good_name)) {
//            $query = $query->where('good_name', 'like', '%' . $good_name . '%');
//        }
        if (!empty($batch_type)) {
            $query = $query->inRandomOrder()->take(50);
        }
//        if (!empty($address)) {
//            $query = $query->where('shop_address', 'like', '%' . $address . '%');
//        }


        $query = $query->select('id','good_image','shop_id','good_name','shop_name','type','commodity_price','selling_price','good_integral','shop_address')
            ->latest()->get()->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($query, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($query);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        $result = $paginator->toArray()['data'];
        $data = ['banners'=>$banners,'goodList'=>$result];
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);

    }

    /*
     * 首页未读消息提示
     *
     * */
    public function readMessageCount()
    {
        $data = Message::where('read_status',1)->count();
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 搜索接口
     * @param string $keywords 关键词
     *
     *
     * */
    public function searchList($request)
    {
        //商品搜索
        $where = function ($query) use ($request) {
            if ($request->has('keywords') and $request->keywords != '') {
                $search = "%" . $request->keywords . "%";
                $query->where('good_name', 'like', $search);
            }
        };
        $query = Good::query();
        $goodList = $query->where($where)
            ->orderBy('id', 'desc')
            ->get(['id','user_id','good_image','good_name','shop_name','commodity_price','selling_price','good_integral']);

        //店铺搜索
        $where_1 = function ($query) use ($request) {
            if ($request->has('keywords') and $request->keywords != '') {
                $search = "%" . $request->keywords . "%";
                $query->where('shop_name', 'like', $search);
            }
        };
        $query = MerchantEnter::query();
        $shopList = $query->where($where_1)
            ->orderBy('id', 'desc')
            ->get(['id','shop_name','address','privilege_type','overall_evaluate','shop_image']);

//        if (!empty($goodList)){
//            return $this->success($goodList);
//        }
//
//        if (!empty($shopList)){
//            return $this->success($shopList);
//        }

        $data = [
            'goodList' => $goodList,
            'shopList' => $shopList,
        ];

        if ($data){
            return $this->success($data);
        }

        return $this->fail(900009);
    }

}