<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PageLimitRequest;
use App\Http\Requests\Api\WechatBindPhonerRequest;
use App\Services\WebService\WxLoginService;
use Illuminate\Http\Request;

class WechatLoginController extends Controller
{
   /*
    * 绑定手机号
    *
    * */
   public function bindWechatMobile(WechatBindPhonerRequest $request,WxLoginService $wxLoginService)
   {
       $result = $wxLoginService->bindWechatMobile($request->mobile,$request->wx_openid,$request->checkCode);
       return $result;
   }

   /*
    * 微信登录
    *
    * */
    public function wxToLogin(WxLoginService $wxLoginService)
    {
        $result = $wxLoginService->wxToLogin();
        return $result;
    }
}
