<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     * 消息列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Message::query();
        if (!empty($request['target_type'])) {
            $query = $query->where('target_type', $request['target_type']);
        }
        if (!empty($request['push_type'])) {
            $query = $query->where('push_type', $request['push_type']);
        }
        if (!empty($request['status'])) {
            $query = $query->where('status', $request['status']);
        }
        if (!empty($request['name'])) {
            $query = $query->where('name', 'like', '%' . $request['name'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.message.list',['results'=>$results,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.message.add');
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
        $info =  Message::create($input);
        flash('添加成功')->success()->important();
        return redirect()->route('message.index');
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
        //
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
        //
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
