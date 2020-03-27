<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\IndustryCategory;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     * 行业或项目分类列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = IndustryCategory::query();
        if (!empty($request['cate_name'])) {
            $query = $query->where('cate_name', 'like', '%' . $request['cate_name'] . '%');
        }
        $data = $query->paginate(20);
        //获取分类
        $results = IndustryCategory::showCategory();
        //返回分类页面
        return view('admin.industry_category.list',['results'=>$results,'request'=>$request,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = IndustryCategory::getcates();
        return view('admin.industry_category.add',['cates'=>$cates]);
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
        $info =  IndustryCategory::create($input);
        flash('添加成功')->success()->important();
        return redirect()->route('industry.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = IndustryCategory::findOrFail($id);
        $cates = IndustryCategory::getcates();
        return view('admin.industry_category.edit',['info'=>$info,'cates'=>$cates]);
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
        $info = IndustryCategory::find($id);
        $input = $request->all();
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('industry.index');
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
