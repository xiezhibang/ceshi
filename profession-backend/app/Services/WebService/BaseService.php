<?php

namespace App\Services\WebService;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseService
{

    //成功返回
    public function success($data = [])
    {
        return response()->json([
            'status'  => true,
            'code'    => 200,
            'message' => config('errorcode.code')[200],
            'data'    => $data,
        ]);
    }

    //失败返回
    public function fail($code, $data = [])
    {
        return response()->json([
            'status'  => false,
            'code'    => $code,
            'message' => config('errorcode.code')[(int) $code],
            'data'    => $data,
        ]);
    }

}