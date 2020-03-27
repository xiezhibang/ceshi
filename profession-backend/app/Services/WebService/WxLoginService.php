<?php

namespace App\Services\WebService;
use App\Model\Member;
use App\Model\SmsCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Image;
use Validator;
use SocialiteProviders\Weixin\Provider;
use Overtrue\LaravelSocialite\Socialite;
use Illuminate\Support\Str;
class WxLoginService extends BaseService
{

    //设置使用guard！
    protected $guard = 'member';

    /**
     *
     *  绑定手机号
     *  @param  string $mobile 原手机号 必填参数
     *  @param  string $wx_openid 微信openid 可选参数
     *  @param  string $checkCode 验证码  必填参数
     *
     */
    public function bindWechatMobile($mobile,$wx_openid,$checkCode)
    {
        //查询手机验证码
        $smsCode = SmsCode::where('mobile',$mobile)->where('type',30)->first();
        $code = $smsCode['code'];
        //判断验证码是否正确
        if( $code != $checkCode ) {
            return $this->fail(200002);
        }
        //微信用户信息
        if(!$wechatUser = Cache::get($wx_openid)) {
            return $this->fail(210028);
        }
        Log::info('微信用户信息',$wechatUser->getOriginal());
        //根据手机号查用户信息
        $member = Member::where('mobile',$mobile)->first();
        if (!$member){
            //创建用户信息
            $user = new Member([
                'mobile'   => $mobile,
                'name'     => $wechatUser->getNickname(),
                'password' => bcrypt('123456'),
                'wx_openid' => $wx_openid,
                'email' => $wechatUser->getEmail() ?? '',
                'provider' => $wechatUser->getProviderName(),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            //保存数据库
            $user->save();

            //创建用户详情信息
            $userBind = $user->memberBind()->make([
                'nick_name'=> $wechatUser->getNickname(),
                'avatar'   => $wechatUser->getAvatar(),
                'login_ip' => \Illuminate\Support\Facades\Request::ip(),
                'login_time' => date('Y-m-d H:m:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            //保存到数据库
            $userBind->save();

        }else{
            //更新用户信息
            $user = $member->update([
                'wx_openid' => $wx_openid,
            ]);
        }
        //生成TOKEN
        $token = auth('member')->login($user);
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('member')->factory()->getTTL() * 60
        ];
        //返回结果
        if ($token){
            return $this->success($data);
        }
        return $this->fail(210006);
    }

    /*
     * 微信登录
     * @param string $wx_code 微信code
     *
     * */
    public function wxToLogin()
    {
        $result = Socialite::driver('wechat')->user();
        if (!($openid = $result->getId())) {
            return $this->fail(210029);
        }
        //判断数据库中是否存在 openid
        $member = Member::where('wx_openid',$openid)->exists();
        //如果不存在
        if (!$member){
            Cache::put($openid, $result, now()->addMinutes(10));
            return $this->fail(210030);
        }else{
            $existUser = Member::whereWxOpenid($openid)->first();
            if (!($token = auth('member')->login($existUser))){
                return $this->fail(210003);
            }
            $data = [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => Auth::guard('member')->factory()->getTTL() * 60
            ];
            return $this->success($data);
        }

    }
}