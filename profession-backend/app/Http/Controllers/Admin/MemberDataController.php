<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Member;
use App\Model\Website;
use Illuminate\Http\Request;

class MemberDataController extends Controller
{
    /**
     * Display a listing of the resource.
     * 用户数据
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Member::query()->with('memberBind');

        if (!empty($request['start'])) {
            $query = $query->where('created_at', '>=',$request['start']);
        }
        if (!empty($request['end'])) {
            $query = $query->where('created_at', '<=',$request['end']);
        }

        $results = $query->latest('id')->paginate(20);

        //昨天时间
        $time_01 = date("Y-m-d 00:00:01",strtotime("-1 day"));
        $time_02 = date("Y-m-d 23:59:59",strtotime("-1 day"));
        //今日
        $time_03 = date("Y-m-d 00:00:01");
        $time_04 = date("Y-m-d 23:59:59");
        //会员总数
        $user_total = Member::query()->count();
        //昨日新增
        $before_total = Member::query()->whereBetween('created_at',[$time_01,$time_02])->count();
        //日活跃量
        $today_total = Member::query()->whereBetween('created_at',[$time_03,$time_04])->count();
        return view('admin.member_data.list',[
            'results'=>$results,
            'request'=>$request,
            'user_total'=>$user_total,
            'before_total'=>$before_total,
            'today_total'=>$today_total
        ]);
    }


}
