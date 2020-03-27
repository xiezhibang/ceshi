<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MemberLoginRequest;
use App\Http\Requests\Api\MemberRegisterRequest;
use App\Services\WebService\MemberAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WapProgramCodeController extends Controller
{
    //设置使用guard！
    protected $guard = 'member';

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('member_refresh', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT via given credentials.
     * 用户注册
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(MemberRegisterRequest $request,MemberAuthService $memberAuthService)
    {
        //$password = $request->password ? $request->password : '123456';
        $result = $memberAuthService->getMemberRegister($request->mobile,$request->checkCode,$request->uid);
        return $result;
    }


    /**
     * Get a JWT via given credentials.
     * 登录
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(MemberLoginRequest $request)
    {
        $credentials = [
            'mobile' => $request->mobile,
            'password' => $request->password,
        ];

        if (! $token = Auth::guard('member')->attempt($credentials)) {
            return response()->json([
                "status"  =>false,
                "code"    => 401,
                "message" => "登录token过期",
                'data'=>[]
            ]);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(Auth::guard('member')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     * 退出登录
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('member')->logout();

        return response()->json([
            "status"  =>true,
            "code"    => 200,
            "message" => "成功",
            'data'=>[]
        ]);
    }

    /**
     * Refresh a token.
     * 刷新token
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('member')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            "status"  =>true,
            "code"    => 200,
            "message" => "成功",
            'data'=>[
                'HeaderAuthorization' => 'Authorization',
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => Auth::guard('member')->factory()->getTTL() * 60
            ]
        ]);
    }
}
