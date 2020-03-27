<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\FeedBack;
use App\Model\FeedBackImage;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     * 用户反馈列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = FeedBack::query();
        if (!empty($request['username'])) {
            $query = $query->where('username', 'like', '%' . $request['username'] . '%');
        }
        if (!empty($request['account'])) {
            $query = $query->where('account', 'like', '%' . $request['account'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.feedback.list',['results'=>$results,'request'=>$request]);
    }


    /**
     * Display the specified resource.
     * 查看详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = FeedBack::find($id);
        //图片
        $results = FeedBackImage::where('feed_back_id',$id)->get();
        return view('admin.feedback.item',['results'=>$results,'info'=>$info]);
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
