<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\HelpArtcile;
use App\Model\HelpCate;
use Illuminate\Http\Request;

class HelpArtcileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = HelpArtcile::query();
        if (!empty($request['name'])) {
            $query = $query->where('name', 'like', '%' . $request['name'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.help_artcile.list',['results'=>$results,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = HelpCate::get();
        return view('admin.help_artcile.add',['cates'=>$cates]);
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
        $input['art_time'] = date('Y-m-d H:i:s');
        $info =  HelpArtcile::create($input);
        flash('添加成功')->success()->important();
        return redirect()->route('helpartcile.index');
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
        $cates = HelpCate::get();
        $info = HelpArtcile::find($id);
        return view('admin.help_artcile.edit',['cates'=>$cates,'info'=>$info]);
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
        $info = HelpArtcile::find($id);
        $input = $request->all();
        $res = $info->update($input);
        flash('修改成功')->success()->important();
        return redirect()->route('helpartcile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = HelpArtcile::find($id);
        if (empty($info)) {
            flash('删除失败')->error()->important();
            return redirect()->route('helpartcile.index');
        }
        $info->delete();
        flash('删除成功')->success()->important();
        return redirect()->route('helpartcile.index');
    }
}
