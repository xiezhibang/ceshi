<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ShopEvaluate;
use Illuminate\Http\Request;

class ShopEvaluateController extends Controller
{
    /**
     * Display a listing of the resource.
     * 店铺评价列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = ShopEvaluate::query();
        if (!empty($request['nick_name'])) {
            $query = $query->where('nick_name', 'like', '%' . $request['nick_name'] . '%');
        }
        if (!empty($request['shop_name'])) {
            $query = $query->where('shop_name', 'like', '%' . $request['shop_name'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.shop_evaluate.list',['results'=>$results,'request'=>$request]);
    }


}
