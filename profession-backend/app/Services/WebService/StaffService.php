<?php

namespace App\Services\WebService;
use App\Model\Member;
use App\Model\MerchantEnter;
use App\Model\ShopPermission;
use App\Model\ShopStaff;
use App\Model\SmsCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


class StaffService extends BaseService
{

    /*
     * 店员权限列表
     *
     * */
    public function shopPermissionList()
    {
        $data = ShopPermission::with('childs')->where('pid',0)->get();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 店员列表
     * @param int $page 分页数
     * @param int $limit 每页几条
     * */
    public function staffList($page,$limit)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $list = ShopStaff::where('user_id',$uid)->latest()->get()->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }

        $item = array_slice($list, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($list);

        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);

        $data = $paginator->toArray()['data'];

        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 添加店员
     * @param string $staff_name 店员名称
     * @param string $staff_account 店员账号
     * @param string $mobile 店员联系电话
     * @param string $checkCode 验证码
     * @param string $status 启用状态
     * @param string $permission_id 店员权限ID
     *
     * */
    public function addShopStaff($staff_name,$staff_account,$mobile,$checkCode,$status,$permission_id)
    {
        //查询手机验证码
        $smsCode = SmsCode::where('mobile',$mobile)->where('type',60)->first();
        $code = $smsCode['code'];
        //判断验证码是否正确
        if( $code != $checkCode ) {
            return $this->fail(200002);
        }
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //查商家
        $member = Member::where('type',40)->where('id',$uid)->first();
        if ($member){
            //查店铺信息
            $shop = MerchantEnter::where('user_id',$uid)->where('check_status',1)->first();
            //店铺ID
            $shop_id = $shop['id'];
            //店铺名称
            $shop_name = $shop['shop_name'];
        }else{
            //无权限操作
            return $this->fail(300001);
        }

        //查店铺权限
        $shopPermission = ShopPermission::where('id',$permission_id)->first();
        //权限名称
        $permissionName = $shopPermission['name'];

        //判断是否已经添加该店员
        $staff = ShopStaff::where('staff_phone',$mobile)->first();
        if ($staff){
            return $this->fail(300003);
        }

        //添加店员数据
        $data = ShopStaff::create([
            'shop_id' => $shop_id,
            'shop_name' => $shop_name,
            'user_id' => $uid,
            'staff_name' => $staff_name,
            'account' => $staff_account,
            'staff_phone' => $mobile,
            'status' => $status,
            'permission_id' => $permission_id,
            'permission_name' => $permissionName,
        ]);

        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(300002);
    }

    /*
     * 删除店员
     * @param array $staff_id 店员ID 数组形式
     *
     * */
    public function removeShopStaff($staff_id)
    {
        //可以传单个 ID，也可以传 ID 数组
        if (!is_array($staff_id)) {
            $staff_id = [$staff_id];
        }
        //移除操作
        $result = ShopStaff::whereIn('id', $staff_id)->delete();

        if ($result){
            return $this->success($result);
        }
        return $this->fail(300005);

    }

}