<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\GoodCollect;
use Illuminate\Http\Request;

class GoodCollectController extends Controller
{
    /**
     * Display a listing of the resource.
     * 商品收藏
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = GoodCollect::query();
        if (!empty($request['nick_name'])) {
            $query = $query->where('nick_name', 'like', '%' . $request['nick_name'] . '%');
        }
        if (!empty($request['good_name'])) {
            $query = $query->where('good_name', 'like', '%' . $request['good_name'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.good_collect.list',['results'=>$results,'request'=>$request]);
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
