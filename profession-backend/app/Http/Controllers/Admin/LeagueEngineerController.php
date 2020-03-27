<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\GoodCategory;
use App\Model\IndustryCategory;
use App\Model\LeagueEngineer;
use App\Model\LeagueGiftBag;
use App\Model\StorePartnerDetail;
use Illuminate\Http\Request;

class LeagueEngineerController extends Controller
{
    /**
     * Display a listing of the resource.
     * 项目列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = LeagueEngineer::query();
        if (!empty($request['engineer_name'])) {
            $query = $query->where('engineer_name', 'like', '%' . $request['engineer_name'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.league_engineer.list',['results'=>$results,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = IndustryCategory::getcates();
        $giftbags = LeagueGiftBag::where('status',10)->get(['id','gift_name']);
        return view('admin.league_engineer.add',['cates'=>$cates,'giftbags'=>$giftbags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $industry_id = $request->work_id;
        //判断是否二级行业
        $cate_pid = IndustryCategory::where('id',$industry_id)->value('cate_pid');
        if ($cate_pid > 0){
            //一级
            $input['industry_id'] = $cate_pid;
            //一级名称
            $input['industry_name'] = IndustryCategory::where('id',$cate_pid)->value('cate_name');
            //二级
            $input['cate_industry_id'] = $industry_id;
            //二级名称
            $input['cate_industry_name'] = IndustryCategory::where('id',$industry_id)->value('cate_name');
        }else{
            return '请选择二级行业分类';
        }
        //礼包名称
        $input['gift_name'] = LeagueGiftBag::where('id',$request->gift_id)->value('gift_name');
        $info =  LeagueEngineer::create($input);
        flash('添加成功')->success()->important();
        return redirect()->route('engineer.index');
    }

    /**
     * Display the specified resource.
     * 查看合伙明细
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDetail(Request $request,$id)
    {
        $results = StorePartnerDetail::where('engineer_id',$id)->latest('id')->get();
        return view('admin.league_engineer.show_detail',['results'=>$results,'request'=>$request]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = LeagueEngineer::findOrFail($id);
        $cates = IndustryCategory::getcates();
        $giftbags = LeagueGiftBag::where('status',10)->get(['id','gift_name']);
        return view('admin.league_engineer.edit',['info'=>$info,'cates'=>$cates,'giftbags'=>$giftbags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //根据id,获取要修改的信息
        $info = LeagueEngineer::find($id);
        $input = $request->all();
        $industry_id = $request->work_id;
        //判断是否二级行业
        $cate_pid = IndustryCategory::where('id',$industry_id)->value('cate_pid');
        if ($cate_pid > 0){
            //一级
            $input['industry_id'] = $cate_pid;
            //一级名称
            $input['industry_name'] = IndustryCategory::where('id',$cate_pid)->value('cate_name');
            //二级
            $input['cate_industry_id'] = $industry_id;
            //二级名称
            $input['cate_industry_name'] = IndustryCategory::where('id',$industry_id)->value('cate_name');
        }else{
            return '请选择二级行业分类';
        }
        //礼包名称
        $input['gift_name'] = LeagueGiftBag::where('id',$request->gift_id)->value('gift_name');
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('engineer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
