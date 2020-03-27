<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\MemberEquity;
use Illuminate\Http\Request;

class MemberEquityController extends Controller
{
    /**
     * Display a listing of the resource.
     * 会员权益介绍列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = MemberEquity::query();
        if (!empty($request['name'])) {
            $query = $query->where('name', 'like', '%' . $request['name'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.member_equity.list',['results'=>$results,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member_equity.add');
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
        $info =  MemberEquity::create($input);
        flash('添加成功')->success()->important();
        return redirect()->route('equity.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = MemberEquity::findOrFail($id);
        return view('admin.member_equity.edit',['info'=>$info]);
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
        $info = MemberEquity::find($id);
        $input = $request->all();
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('equity.index');
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
