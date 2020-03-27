<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BindPhoneSmsCodeRequest;
use App\Http\Requests\Api\ForgetPasswordSmsCodeRequest;
use App\Http\Requests\Api\RegisterSmsCodeRequest;
use App\Http\Requests\Api\ShopUserSmsCodeRequest;
use App\Http\Requests\Api\UpdatePasswordSmsCodeRequest;
use App\Http\Requests\Api\UpdatePhoneSmsCodeRequest;
use App\Services\WebService\SmsCodeService;
use Illuminate\Http\Request;

class SendSmsCodeController extends Controller
{
    /*
     * 发送注册验证码
     *
     * */
    public function registerPhoneSmsCode(RegisterSmsCodeRequest $request,SmsCodeService $smsCodeService)
    {
        $result = $smsCodeService->sendSmsCode($request->mobile);
        return $result;
    }

    /*
     * 发送修改手机号验证码
     *
     * */
    public function updatePhoneSmsCode(UpdatePhoneSmsCodeRequest $request,SmsCodeService $smsCodeService)
    {
        $result = $smsCodeService->updatePhoneSmsCode($request->mobile);
        return $result;
    }

    /*
     * 发送绑定手机号验证码
     *
     * */
    public function bindPhoneSmsCode(BindPhoneSmsCodeRequest $request,SmsCodeService $smsCodeService)
    {
        $result = $smsCodeService->bindPhoneSmsCode($request->mobile);
        return $result;
    }

    /*
     * 发送忘记密码验证码
     *
     * */
    public function forgetPasswordSmsCode(ForgetPasswordSmsCodeRequest $request,SmsCodeService $smsCodeService)
    {
        $result = $smsCodeService->forgetPasswordSmsCode($request->mobile);
        return $result;
    }

    /*
     * 发送修改密码验证码
     *
     * */
    public function updatePasswordSmsCode(UpdatePasswordSmsCodeRequest $request,SmsCodeService $smsCodeService)
    {
        $result = $smsCodeService->updatePasswordSmsCode($request->mobile);
        return $result;
    }

    /*
     * 发送添加店员验证码
     *
     * */
    public function shopUserSmsCode(ShopUserSmsCodeRequest $request,SmsCodeService $smsCodeService)
    {
        $result = $smsCodeService->shopUserSmsCode($request->mobile);
        return $result;
    }

}
