<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PageLimitRequest;
use App\Http\Requests\Api\RemoveStaffRequest;
use App\Http\Requests\Api\ShopStaffRequest;
use App\Services\WebService\StaffService;
use Illuminate\Http\Request;

class ShopStaffController extends Controller
{
    /*
     * 店铺权限列表
     *
     *
     * */
    public function shopPermissionList(StaffService $staffService)
    {
        $result = $staffService->shopPermissionList();
        return $result;
    }

    /*
     * 店员列表
     *
     * */
    public function staffList(PageLimitRequest $request,StaffService $staffService)
    {
        $result = $staffService->staffList($request->page,$request->limit);
        return $result;
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
    public function addShopStaff(ShopStaffRequest $request,StaffService $staffService)
    {
        $result = $staffService->addShopStaff($request->staff_name,$request->staff_account,$request->mobile,$request->checkCode,$request->status,$request->permission_id);
        return $result;
    }

    /*
     * 删除店员
     *
     * */
    public function removeShopStaff(RemoveStaffRequest $request,StaffService $staffService)
    {
        $result = $staffService->removeShopStaff($request->staff_id);
        return $result;
    }
}
