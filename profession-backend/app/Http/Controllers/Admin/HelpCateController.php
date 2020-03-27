<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\HelpCate;
use Illuminate\Http\Request;

class HelpCateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = HelpCate::query();
        if (!empty($request['cate_name'])) {
            $query = $query->where('cate_name', 'like', '%' . $request['cate_name'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.help_cate.list',['results'=>$results,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.help_cate.add');
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
        $info =  HelpCate::create($input);
        flash('添加成功')->success()->important();
        return redirect()->route('helpcate.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = HelpCate::findOrFail($id);
        return view('admin.help_cate.edit',['info'=>$info]);
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
        $info = HelpCate::find($id);
        $input = $request->all();
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('helpcate.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = HelpCate::find($id);
        if (empty($info)) {
            flash('删除失败')->error()->important();
            return redirect()->route('helpcate.index');
        }
        $info->delete();
        flash('删除成功')->success()->important();
        return redirect()->route('helpcate.index');
    }
}
