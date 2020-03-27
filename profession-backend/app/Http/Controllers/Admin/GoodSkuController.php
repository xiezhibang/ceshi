<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\GoodSku;
use Illuminate\Http\Request;

class GoodSkuController extends Controller
{
    /**
     * Display a listing of the resource.
     * 商品 SKU 列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = GoodSku::query();
        if (!empty($request['sku_name'])) {
            $query = $query->where('sku_name', 'like', '%' . $request['sku_name'] . '%');
        }
        $results = $query->latest('id')->paginate(20);
        return view('admin.sku.list',['results'=>$results,'request'=>$request]);
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
