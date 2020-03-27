<?php

namespace App\Services\WebService;
use App\Model\SmsCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Overtrue\EasySms\EasySms;
use Illuminate\Support\Facades\Redis;
class SmsCodeService extends BaseService
{

    /*
     *  短信发送
     *  注册验证码
     *  @param string $mobile 手机号
     *  将手机号，验证码(6位)存在cache文件中
     * */
    public function sendSmsCode($mobile)
    {

        $config = [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,

            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

                // 默认可用的发送网关
                'gateways' => [
                    'yunpian', 'aliyun', 'alidayu',
                ],
            ],
            // 可用的网关配置
            'gateways' => [
                'errorlog' => [
                    'file' => '/tmp/easy-sms.log',
                ],
                'yunpian' => [
                    'api_key' => '824f0ff2f71cab52936axxxxxxxxxx',
                ],

                'aliyun' => [ //阿里云短信
                    'access_key_id' => 'LTAI0DLVHAWKF9dp',
                    'access_key_secret' => 'mLow1DzwXLQEGscgaMJOXHktujycKt',
                    'sign_name' => '福拉多',
                ],
                'alidayu' => [
                    //...
                ],
            ],
        ];

        //验证码
        $code = $this->makeSmsCode();
        //发送注册短信验证码
        $easySms = new EasySms($config);

        $result = $easySms->send($mobile, [
            'content'  => '您的验证码为: '.$code,
            'template' => 'SMS_148785257',//短信模板
            'data' => [
                'code' => $code
            ],
        ]);

        //先判断是否已存在手机号
        $smsMobile = SmsCode::where('mobile',$mobile)->first();

        if ($smsMobile){
            //更新验证码
            $updateCode = $smsMobile->update([
                'code' => $code,
                'type' => 10,
            ]);

        }else{
            //验证码记录
            $smsCode = SmsCode::create([
                'mobile'=> $mobile,
                'code' => $code,
                'type' => 10,
            ]);
        }

        if ($result){
            return $this->success($result);
        }
        return $this->fail(200001);

    }

    /*
     * 生成验证码
     *
     * */
    public function makeSmsCode()
    {
        $code = substr(base_convert(md5(uniqid(md5(microtime(true)),true)), 16, 10), 0, 6);
        return $code;
    }


    /*
     * 发送添加店员验证码
     * @param string $mobile 手机号
     *
     * */
    public function shopUserSmsCode($mobile)
    {
        $config = [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,

            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

                // 默认可用的发送网关
                'gateways' => [
                    'yunpian', 'aliyun', 'alidayu',
                ],
            ],
            // 可用的网关配置
            'gateways' => [
                'errorlog' => [
                    'file' => '/tmp/easy-sms.log',
                ],
                'yunpian' => [
                    'api_key' => '824f0ff2f71cab52936axxxxxxxxxx',
                ],

                'aliyun' => [ //阿里云短信
                    'access_key_id' => 'LTAI0DLVHAWKF9dp',
                    'access_key_secret' => 'mLow1DzwXLQEGscgaMJOXHktujycKt',
                    'sign_name' => '福拉多',
                ],
                'alidayu' => [
                    //...
                ],
            ],
        ];

        //验证码
        $code = $this->makeSmsCode();
        //发送注册短信验证码
        $easySms = new EasySms($config);

        $result = $easySms->send($mobile, [
            'content'  => '您的验证码为: '.$code,
            'template' => 'SMS_148785257',//短信模板
            'data' => [
                'code' => $code
            ],
        ]);

        //先判断是否已存在手机号
        $smsMobile = SmsCode::where('mobile',$mobile)->first();

        if ($smsMobile){
            //更新验证码
            $updateCode = $smsMobile->update([
                'code' => $code,
                'type' => 60,
            ]);

        }else{
            //验证码记录
            $smsCode = SmsCode::create([
                'mobile'=> $mobile,
                'code' => $code,
                'type' => 60,
            ]);
        }

        if ($result){
            return $this->success($result);
        }
        return $this->fail(200001);
    }

    /*
     * 发送更换手机验证码
     * @param string $mobile 手机号
     *
     * */
    public function updatePhoneSmsCode($mobile)
    {
        $config = [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,

            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

                // 默认可用的发送网关
                'gateways' => [
                    'yunpian', 'aliyun', 'alidayu',
                ],
            ],
            // 可用的网关配置
            'gateways' => [
                'errorlog' => [
                    'file' => '/tmp/easy-sms.log',
                ],
                'yunpian' => [
                    'api_key' => '824f0ff2f71cab52936axxxxxxxxxx',
                ],

                'aliyun' => [ //阿里云短信
                    'access_key_id' => 'LTAI0DLVHAWKF9dp',
                    'access_key_secret' => 'mLow1DzwXLQEGscgaMJOXHktujycKt',
                    'sign_name' => '福拉多',
                ],
                'alidayu' => [
                    //...
                ],
            ],
        ];

        //验证码
        $code = $this->makeSmsCode();
        //发送注册短信验证码
        $easySms = new EasySms($config);

        $result = $easySms->send($mobile, [
            'content'  => '您的验证码为: '.$code,
            'template' => 'SMS_148785257',//短信模板
            'data' => [
                'code' => $code
            ],
        ]);

        //先判断是否已存在手机号
        $smsMobile = SmsCode::where('mobile',$mobile)->first();

        if ($smsMobile){
            //更新验证码
            $updateCode = $smsMobile->update([
                'code' => $code,
                'type' => 20,
            ]);

        }else{
            //验证码记录
            $smsCode = SmsCode::create([
                'mobile'=> $mobile,
                'code' => $code,
                'type' => 20,
            ]);
        }

        if ($result){
            return $this->success($result);
        }
        return $this->fail(200001);
    }


    /*
    * 发送修改密码验证码
    * @param string $mobile 手机号
    *
    * */
    public function updatePasswordSmsCode($mobile)
    {
        $config = [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,

            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

                // 默认可用的发送网关
                'gateways' => [
                    'yunpian', 'aliyun', 'alidayu',
                ],
            ],
            // 可用的网关配置
            'gateways' => [
                'errorlog' => [
                    'file' => '/tmp/easy-sms.log',
                ],
                'yunpian' => [
                    'api_key' => '824f0ff2f71cab52936axxxxxxxxxx',
                ],

                'aliyun' => [ //阿里云短信
                    'access_key_id' => 'LTAI0DLVHAWKF9dp',
                    'access_key_secret' => 'mLow1DzwXLQEGscgaMJOXHktujycKt',
                    'sign_name' => '福拉多',
                ],
                'alidayu' => [
                    //...
                ],
            ],
        ];

        //验证码
        $code = $this->makeSmsCode();
        //发送注册短信验证码
        $easySms = new EasySms($config);

        $result = $easySms->send($mobile, [
            'content'  => '您的验证码为: '.$code,
            'template' => 'SMS_148785257',//短信模板
            'data' => [
                'code' => $code
            ],
        ]);

        //先判断是否已存在手机号
        $smsMobile = SmsCode::where('mobile',$mobile)->first();

        if ($smsMobile){
            //更新验证码
            $updateCode = $smsMobile->update([
                'code' => $code,
                'type' => 50,
            ]);

        }else{
            //验证码记录
            $smsCode = SmsCode::create([
                'mobile'=> $mobile,
                'code' => $code,
                'type' => 50,
            ]);
        }

        if ($result){
            return $this->success($result);
        }
        return $this->fail(200001);
    }


    /*
    * 发送绑定手机号验证码
    * @param string $mobile 手机号
    *
    * */
    public function bindPhoneSmsCode($mobile)
    {
        $config = [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,

            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

                // 默认可用的发送网关
                'gateways' => [
                    'yunpian', 'aliyun', 'alidayu',
                ],
            ],
            // 可用的网关配置
            'gateways' => [
                'errorlog' => [
                    'file' => '/tmp/easy-sms.log',
                ],
                'yunpian' => [
                    'api_key' => '824f0ff2f71cab52936axxxxxxxxxx',
                ],

                'aliyun' => [ //阿里云短信
                    'access_key_id' => 'LTAI0DLVHAWKF9dp',
                    'access_key_secret' => 'mLow1DzwXLQEGscgaMJOXHktujycKt',
                    'sign_name' => '福拉多',
                ],
                'alidayu' => [
                    //...
                ],
            ],
        ];

        //验证码
        $code = $this->makeSmsCode();
        //发送注册短信验证码
        $easySms = new EasySms($config);

        $result = $easySms->send($mobile, [
            'content'  => '您的验证码为: '.$code,
            'template' => 'SMS_148785257',//短信模板
            'data' => [
                'code' => $code
            ],
        ]);

        //先判断是否已存在手机号
        $smsMobile = SmsCode::where('mobile',$mobile)->first();

        if ($smsMobile){
            //更新验证码
            $updateCode = $smsMobile->update([
                'code' => $code,
                'type' => 30,
            ]);

        }else{
            //验证码记录
            $smsCode = SmsCode::create([
                'mobile'=> $mobile,
                'code' => $code,
                'type' => 30,
            ]);
        }

        if ($result){
            return $this->success($result);
        }
        return $this->fail(200001);
    }

    /*
   * 发送忘记密码验证码
   * @param string $mobile 手机号
   *
   * */
    public function forgetPasswordSmsCode($mobile)
    {
        $config = [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,

            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

                // 默认可用的发送网关
                'gateways' => [
                    'yunpian', 'aliyun', 'alidayu',
                ],
            ],
            // 可用的网关配置
            'gateways' => [
                'errorlog' => [
                    'file' => '/tmp/easy-sms.log',
                ],
                'yunpian' => [
                    'api_key' => '824f0ff2f71cab52936axxxxxxxxxx',
                ],

                'aliyun' => [ //阿里云短信
                    'access_key_id' => 'LTAI0DLVHAWKF9dp',
                    'access_key_secret' => 'mLow1DzwXLQEGscgaMJOXHktujycKt',
                    'sign_name' => '福拉多',
                ],
                'alidayu' => [
                    //...
                ],
            ],
        ];

        //验证码
        $code = $this->makeSmsCode();
        //发送注册短信验证码
        $easySms = new EasySms($config);

        $result = $easySms->send($mobile, [
            'content'  => '您的验证码为: '.$code,
            'template' => 'SMS_148785257',//短信模板
            'data' => [
                'code' => $code
            ],
        ]);

        //先判断是否已存在手机号
        $smsMobile = SmsCode::where('mobile',$mobile)->first();

        if ($smsMobile){
            //更新验证码
            $updateCode = $smsMobile->update([
                'code' => $code,
                'type' => 40,
            ]);

        }else{
            //验证码记录
            $smsCode = SmsCode::create([
                'mobile'=> $mobile,
                'code' => $code,
                'type' => 40,
            ]);
        }

        if ($result){
            return $this->success($result);
        }
        return $this->fail(200001);
    }
}