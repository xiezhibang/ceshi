<?php

namespace App\Http\Controllers\Admin;
use App\Handlers\ImageUploadHandler;
use App\Http\Controllers\Controller;
use App\Model\Banner;
use Illuminate\Http\Request;

class LogController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.log.list');
    }


}
