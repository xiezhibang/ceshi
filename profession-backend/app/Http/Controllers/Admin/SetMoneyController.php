<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\SetAmount;
use Illuminate\Http\Request;

class SetMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     * 金额设置列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = SetAmount::query();
        $results = $query->latest('id')->paginate(20);
        return view('admin.set_money.list',['results'=>$results]);
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
