<?php

namespace App\Services\WebService;
use App\Model\Good;
use App\Model\GoodAttribute;
use App\Model\GoodCategory;
use App\Model\GoodCollect;
use App\Model\GoodImage;
use App\Model\GoodSku;
use App\Model\IndustryCategory;
use App\Model\Member;
use App\Model\MemberBind;
use App\Model\MerchantEnter;
use App\Model\ShopStaff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class GoodService extends BaseService
{

    /*
     * 商品详情
     * @param number $good_id 商品ID
     *
     * */
    public function goodDetail($good_id)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //判断是否已收藏
        $collect = GoodCollect::where('user_id',$uid)->where('good_id',$good_id)->first();
        if ($collect){
            $collect_status = 2;//已收藏
        }else{
            $collect_status = 1;//未收藏
        }
        //商品信息
        $good = Good::find($good_id);

        //商品轮播图
        $goodImageList = GoodImage::where('good_id',$good_id)->get();
        $sku = GoodSku::where('good_id',$good_id)->first();
        //商品规格
        $goodAttribute = GoodAttribute::where('id',$sku['attribute_id'])->get(['id','name']);
        //店铺信息
        $shop = MerchantEnter::where('id',$good['shop_id'])
            ->where('check_status',1)
            ->select('id','shop_name','address','privilege_type','shop_image','phone')
            ->first();
        //猜你喜欢 取销量最高的三条数据
        $likeGoodList_1 = Good::where('state',1)->where('status',2)->where('selling_num','>',0)->orderBy('selling_num','desc')->limit(3)->get();

        $likeGoodList_2 = Good::where('state',1)->where('status',2)->orderBy('id','desc')->limit(3)->get();

        //结果集
        $data = [
            'goodInfo' => $good,
            'collect_status' => $collect_status,
            'goodImageList' => $goodImageList,
            'goodAttribute' => $goodAttribute,
            'shopInfo' => $shop,
            'likeGoodList'=> !empty($likeGoodList_1) && isset($likeGoodList_1) ? $likeGoodList_1 : $likeGoodList_2,
        ];
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 商品收藏
     * @param number $good_id 商品ID
     *
     *
     * */
    public function addGoodCollect($good_id)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //用户昵称
        $nick_name = MemberBind::where('user_id',$uid)->value('nick_name');
        //商品信息
        $good = Good::find($good_id);
        //判断是否已收藏
        $collect = GoodCollect::where('user_id',$uid)->where('good_id',$good_id)->first();
        if ($collect){
            //更新
            $data = $collect->update([
                'user_id' => $uid,
                'nick_name' => $nick_name ? $nick_name : "",
                'status' => 2,
                'good_id' => $good_id,
                'good_name' => $good['good_name'],
                'good_image' => $good['good_image'],
                'shop_id' => $good['shop_id'],
                'shop_name' => $good['shop_name'],
                'commodity_price' => $good['commodity_price'],
                'selling_price' => $good['selling_price'],
                'good_integral' => $good['good_integral'],
            ]);
        }else{
            //添加商品收藏数据
            $data = GoodCollect::create([
                'user_id' => $uid,
                'nick_name' => $nick_name ? $nick_name : "",
                'status' => 2,
                'good_id' => $good_id,
                'good_name' => $good['good_name'],
                'good_image' => $good['good_image'],
                'shop_id' => $good['shop_id'],
                'shop_name' => $good['shop_name'],
                'commodity_price' => $good['commodity_price'],
                'selling_price' => $good['selling_price'],
                'good_integral' => $good['good_integral'],
            ]);
        }

        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(700001);
    }

    /*
     * 取消商品收藏
     * @param number $good_id 商品ID
     *
     * */
    public function removeGoodCollect($good_id)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //取消
        $data = GoodCollect::where('user_id',$uid)
            ->where('good_id',$good_id)
            ->delete();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(700010);
    }

    /*
     * 商品分类列表
     *
     * */
    public function goodCategoryList()
    {
        $data = GoodCategory::with('childs')->orderBy('cate_order','asc')->get();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 行业项目分类列表
     *
     * */
    public function industryCategoryList()
    {
        $data = IndustryCategory::with('childs')->orderBy('cate_order','asc')->get();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 特权商品---更多
     * @param number $page 分页数
     * @param number $limit 每页几条
     * @param number $category_id 商品分类ID
     * @param number $integral 积分
     * @param string $address 地区
     *
     * */
    public function privilegeGoodList($page,$limit,$category_id,$integral,$address)
    {
        //特权商品信息
        $query = Good::where('type',2)->where('state',1);
        if (!empty($category_id)) {
            $query = $query->where('category_id', $category_id);
        }
        if (!empty($integral)) {
            $query = $query->where('good_integral', 'like', '%' . $integral . '%');
        }
        if (!empty($address)) {
            $query = $query->where('shop_address', 'like', '%' . $address . '%');
        }
        $query = $query->select('id','good_image','good_name','shop_id','shop_name','type','category_id','commodity_price','selling_price','good_integral','shop_address')
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
        //返回结果
        if ($result){
            return $this->success($result);
        }
        return $this->fail(900009);
    }

    /*
     * 热销商品---更多
     * @param number $page 分页数
     * @param number $limit 每页几条
     * @param number $category_id 商品分类ID
     * @param number $money 价格
     * @param string $address 地区
     *
     * */
    public function hotGoodList($page,$limit,$category_id,$money,$address)
    {
        //热销商品信息
        $query = Good::where('type',1)->where('state',1);
        if (!empty($category_id)) {
            $query = $query->where('category_id', $category_id);
        }
        if (!empty($money)) {
            $query = $query->where('selling_price', 'like', '%' . $money . '%');
        }
        if (!empty($address)) {
            $query = $query->where('shop_address', 'like', '%' . $address . '%');
        }
        $query = $query->select('id','good_image','good_name','shop_id','shop_name','type','category_id','commodity_price','selling_price','good_integral','shop_address')
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
        //返回结果
        if ($result){
            return $this->success($result);
        }
        return $this->fail(900009);
    }

    /*
     *
     * 创建商品规格
     * @param string $name 规格名称
     *
     * */
    public function createGoodAttribute($name)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $member = Member::find($uid);
        //新增规格
        $data = GoodAttribute::create([
            'user_id' => $uid,
            'username' => $member->memberBind->nick_name,
            'name' => $name,
        ]);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(700002);
    }

    /*
     * 规格列表
     *
     * */
    public function goodAttributeList()
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $data = GoodAttribute::where('user_id',$uid)->get(['id','name']);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 创建商品规格值
     * @param number $attribute_id 规格ID
     * @param number $type 类型 1-价格 2-积分
     * @param string $sku_name 规格选项名称
     * @param number $money 积分或者价格
     * @param number $stock 库存
     * @param array  $items 规格值数组
     * */
    public function createGoodSku($items)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $member = Member::find($uid);
        //$data = [];
        $items = json_decode($items,true);
        //遍历数组
        foreach ($items as $item){
            //规格ID
            $attribute_id = $item['attribute_id'];
            //类型
            $type = $item['type'];
            //规格选项名称
            $sku_name = $item['sku_name'];
            //积分或者价格
            $money = $item['money'];
            //库存
            $stock = $item['stock'];
            //判断是否已有数据
            $sku = GoodSku::where('user_id', $uid)->where('attribute_id',$attribute_id)->first();
            if ($sku){
                //更新数据
                $data = $sku->update([
                    'user_id' => $uid,
                    'username' => $member->memberBind->nick_name,
                    'attribute_id' => $attribute_id,
                    'attribute_name' => GoodAttribute::where('id',$attribute_id)->value('name'),
                    'sku_name' => $sku_name,
                    'money' => $money,
                    'stock' => $stock,
                    'type' => $type,
                ]);
            }else{
                //新增SKU
                $data = GoodSku::create([
                    'user_id' => $uid,
                    'username' => $member->memberBind->nick_name,
                    'attribute_id' => $attribute_id,
                    'attribute_name' => GoodAttribute::where('id',$attribute_id)->value('name'),
                    'sku_name' => $sku_name,
                    'money' => $money,
                    'stock' => $stock,
                    'type' => $type,
                ]);
            }

        }

        //返回结果
        if ($member){
            return $this->success($items);
        }
        return $this->fail(700003);
    }

    /*
     *
     * 商品SKU列表
     * @param array $attribute_id 商品规格ID
     *
     * */
    public function goodSkuList($attribute_id)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //可以传单个 ID，也可以传 ID 数组
        if (!is_array($attribute_id)) {
            $attribute_id = [$attribute_id];
        }
        //SKU信息
        $data = GoodSku::where('user_id',$uid)->whereIn('attribute_id',$attribute_id)->get();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 商品管理列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     *
     * */
    public function goodList($page,$limit)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //商品
        $query = Good::where('user_id',$uid)->where('state','<',3);
        $query = $query->select('id','good_image','good_name','type','commodity_price','selling_price','good_integral','state')
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
        //返回结果
        if ($result){
            return $this->success($result);
        }
        return $this->fail(900009);
    }

    /*
     * 商品下架
     * @param int $good_id 商品ID
     *
     *
     * */
    public function removeGoodState($good_id)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //当前用户身份
        $type = $user->type;

        //商品信息
        $good = Good::find($good_id);

        //只有拥有权限的店员或者店铺自己才可以下架商品
        $staff = ShopStaff::where('shop_id',$good['shop_id'])
            ->where('user_id',$uid)
            ->first();

        if ($type == 40 || !empty($staff)){
            //下架商品
            $data = $good->update(['state'=>2]);
        }else{
            return $this->fail(700011);
        }

        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(700012);
    }

    /*
     * 商品上架
     * @param int $good_id 商品ID
     *
     *
     * */
    public function addGoodState($good_id)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //当前用户身份
        $type = $user->type;

        //商品信息
        $good = Good::find($good_id);

        //只有拥有权限的店员或者店铺自己才可以下架商品
        $staff = ShopStaff::where('shop_id',$good['shop_id'])
            ->where('user_id',$uid)
            ->first();

        if ($type == 40 || !empty($staff)){
            //下架商品
            $data = $good->update(['state'=>1]);
        }else{
            return $this->fail(700011);
        }

        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(700013);
    }

    /*
     *
     * 创建商品
     * @param string $good_name 商品名称
     * @param string $commodity_price 商品原价
     * @param string $category_id 商品分类ID
     * @param string $type 是否特权 1-否 2-是
     * @param string $selling_price 商品售价
     * @param string $good_integral 商品积分
     * @param string $sku_id 商品规格值ID，数组形式
     * @param string $limit_num 限购数量
     * @param string $total_stock 商品总库存
     * @param string $state 上下架 1-上架 2-下架 3-软删除
     * @param string $order 排序
     * @param string $good_image 商品主图
     * @param string $detail_image 商品详情
     * @param string $description 购买须知
     *
     *
     * */
    public function createGood($good_name,$commodity_price,$category_id,$type,$selling_price,$good_integral,$sku_id,$limit_num,$total_stock,$state,$order,$good_image,$detail_image,$description)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $member = Member::find($uid);
        //店铺信息
        $shop = MerchantEnter::where('user_id',$uid)->first();
//        //获取当前域名
//        $url = 'http://'.$_SERVER["HTTP_HOST"];
//        $descImage  = '';
//        //上传商品详情
//        if ($detail_image) {
//            $result = $this->uploader->save($detail_image, 'desc_image');
//            if ($result) {
//                $descImage = $url.$result['path'];
//            }
//        }
        $arr = [];
        //拆分字符串
        $imgs = explode(',',$good_image);

        //商品ID
        $good_id = Good::insertGetId([
            'user_id' => $uid,
            'username' => $member->memberBind->nick_name,
            'shop_id' => $shop['id'],
            'shop_name' => $shop['shop_name'],
            'shop_address' => $shop['city'].$shop['district'].$shop['address'],
            'good_name' => $good_name,
            'good_image' => $imgs[0],
            'commodity_price' => $commodity_price,
            'category_id' => $category_id,
            'cate_name' => GoodCategory::where('id',$category_id)->value('name') ?? '',
            'type' => $type,
            'selling_price' => $selling_price,
            'good_integral' => $good_integral,
            'limit_num' => $limit_num,
            'total_stock' => $total_stock,
            'state' => $state,
            'order' => $order,
            'detail_image' => $detail_image,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        //$type 是否特权 1-否 2-是
        if ($type){
            //更新门店
            $update_shop = $shop->update(['privilege_type'=>20]);
        }else{
            $update_shop = $shop->update(['privilege_type'=>10]);
        }

       // $sku_id = json_decode($sku_id,true);
        //遍历SKU数组
        //拆分字符串
        $sku = explode(',',$sku_id);
        foreach ($sku as $item){
            $good_sku = GoodSku::where('id',$item)->update(['good_id'=>$good_id]);
        }
//        foreach ($sku_id as $sku=>$item){
//            //更新SKU信息
//            $attr_value_id = $item['attr_value_id'];
//            $good_sku = GoodSku::where('id',$attr_value_id)->update(['good_id'=>$good_id]);
//        }

        //添加商品主图
        foreach ($imgs as $img){
            //添加图片数据到数据库
            $arr = GoodImage::create([
                'good_id' => $good_id,
                'good_images'   => $img,
            ]);
        }

        $data = ['goodId'=>$good_id,'goodImageList'=>$arr];

        if ($data){
            return $this->success($data);
        }
        return $this->fail(700005);
    }

    /*
    * 上传商品主图
     * @param int $id 商品ID
    *
    * */
    public function uploadGoodImage(Request $request,$id)
    {

        $file = $request->file("good_image");
        if (!is_array($file)) {
            $file = [$file];
        }
        $len = 0;
        $newFileName = '';
        $data = [];
        if (!empty($file)) {
            foreach ($file as $key => $value) {
                $len = $key;
            }
            if ($len > 9) {
                return $this->fail(600001);
            }
            $m = 0;
            $k = 0;
            for ($i = 0; $i <= $len; $i++) {
                // $n 表示第几张图片
                $n = $i + 1;
                if ($file[$i]->isValid()) {
                    if (in_array(strtolower($file[$i]->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
                        $picname = $file[$i]->getClientOriginalName();//获取上传原文件名
                        $ext = $file[$i]->getClientOriginalExtension();//获取上传文件的后缀名
                        // 重命名
                        $filename = time() . Str::random(6) . "." . $ext;
                        if ($file[$i]->move("uploads/images", $filename)) {
                            $newFileName = '/' . "uploads/images" . '/' . $filename;
                            $m = $m + 1;

                        } else {
                            $k = $k + 1;
                        }

                        $msg = $m . "张图片上传成功 " . $k . "张图片上传失败<br>";
                        //获取当前域名
                        $url = 'http://'.$_SERVER["HTTP_HOST"];
                        //添加图片数据到数据库
                        $insert = GoodImage::create([
                            'good_id' => $id,
                            'good_images'   => $url.$newFileName,
                        ]);

                        //更新商品
                        $good = Good::where('id',$id)->update(['good_image'=>$url.$newFileName]);

                        $data = ['info' => $msg, 'newFileName' => $newFileName];

                    } else {
                        return response()->json([
                            "status"  =>false,
                            "code"    => 600002,
                            "message" => '第' . $n . '张图片后缀名不合法!<br/>' . '只支持jpeg/jpg/png/gif格式',
                            'data'=>[]
                        ]);

                    }
                } else {
                    return response()->json([
                        "status"  =>false,
                        "code"    => 600003,
                        "message" => '第' . $n . '张图片超过最大限制!<br/>' . '图片最大支持10M',
                        'data'=>[]
                    ]);
                }
            }

        } else {
            return $this->fail(600005);
        }

        return $data;
    }

    /*
     *
     * 删除商品
     * @param array $good_id 商品ID
     *
     * */
    public function removeGood($good_id)
    {
        //可以传单个 ID，也可以传 ID 数组
        if (!is_array($good_id)) {
            $good_id = [$good_id];
        }
        //软删除商品
        $data = Good::whereIn('id',$good_id)->update(['state'=>3]);
        if ($data){
            return $this->success($data);
        }
        return $this->fail(700006);
    }

    /*
     * 单个商品的规格信息
     * @param int $good_id 商品ID
     *
     * */
    public function goodAttributeSkuInfo($good_id)
    {
        $data = GoodSku::with('goodAttribute')
            ->where('good_id',$good_id)
            ->get(['id','attribute_id','attribute_name','good_id','sku_name','money','stock','type']);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }
}