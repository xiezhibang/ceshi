<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


$api = app('Dingo\Api\Routing\Router');


/*********************** 中资联APP接口路由 *************************/

$api->version('v1',['namespace' => 'App\Http\Controllers\Api'], function ($api) {

    $api->group(['prefix' => 'V1','middleware'=>['api']], function($api) {

        /*********************** 发送验证码接口路由 *************************/
        $api->group(['prefix' => 'sms'], function ($api) {

            //发送注册验证码
            $api->any('register/code', 'SendSmsCodeController@registerPhoneSmsCode');
            //发送添加店员验证码
            $api->any('staff/code', 'SendSmsCodeController@shopUserSmsCode');
            //发送更换手机验证码
            $api->any('update/phone/code', 'SendSmsCodeController@updatePhoneSmsCode');
            //发送修改密码验证码
            $api->any('update/pwd/code', 'SendSmsCodeController@updatePasswordSmsCode');
            //发送绑定手机号验证码
            $api->any('bind/phone/code', 'SendSmsCodeController@bindPhoneSmsCode');
            //发送忘记密码验证码
            $api->any('forget/pwd/code', 'SendSmsCodeController@forgetPasswordSmsCode');
        });

        /********************** 会员注册和登录 ******************/
        //这个路由不需要验证
        $api->group(['prefix' => 'auth'], function ($api) {

            //注册
            $api->post('register', 'WapProgramCodeController@register');
            //登录
            $api->post('login', 'WapProgramCodeController@login');

            //注册协议
            $api->get('register/info', 'MemberController@registerInfo');

            //测试
            $api->post('code/info', 'TestInfoController@createInviteCode');


        });

        $api->group(['prefix' => 'member'], function ($api) {

            //忘记密码
            $api->post('forget/password', 'MemberController@forgetPassword');

        });

        /********************** 会员退出登录和刷新令牌 ******************/
        //这个路由需要验证
        $api->group(['prefix' => 'auth','middleware' => ['api.throttle','member_refresh']], function ($api) {

            //退出登录
            $api->post('logout', 'WapProgramCodeController@logout');
            //刷新令牌
            $api->post('refresh', 'WapProgramCodeController@refresh');

        });

        /*********************** 充值接口路由 *************************/
        $api->group(['prefix' => 'change'], function ($api) {

            //支付宝充值回调
            $api->post('alipayr/notify', 'PrepaidChangeController@aliPayNotify');
            //微信充值回调
            $api->post('wxpay/notify', 'PrepaidChangeController@wxpayNotity');
            //支付宝--会员升级回调
            $api->post('upgrade/pay/notify', 'GradePayController@alipayChangeNotify');
            //支付宝--订单回调
            $api->post('order/wyalipay/notify', 'OrderController@waliPayOrderNotify');
            //微信--订单回调
            $api->post('order/wxpay/notify', 'OrderController@wxOrderNotify');
            //微信--升级回调
            $api->post('order/upgradewxpay/notify', 'GradePayController@wxUpgradeNotify');

        });

        $api->group(['prefix' => 'change','middleware' => ['api.throttle','member_refresh']], function ($api) {

            $api->get('prepaid', 'PrepaidChangeController@prepaidPay');

        });

        /*********************** 首页接口路由 *************************/
        $api->group(['prefix' => 'index'], function ($api) {

            //首页信息列表
            $api->get('welcome/list', 'IndexController@indexList');
            //商家首页信息列表
            $api->get('shop/good/list', 'ShopIndexController@shopIndexList');
            //附近商家
            $api->get('near/address/shop', 'ShopIndexController@nearAddressShopList');
            //附近商家---更多
            $api->get('many/shop', 'ShopIndexController@manyShopList');
            //搜索接口
            $api->get('search', 'IndexController@searchList');

        });

        /*********************** 商家接口路由 *************************/
        $api->group(['prefix' => 'shop'], function ($api) {

            //商家相册
            $api->get('shop/image', 'ShopIndexController@shopImageList');
            //商家详情---在售商品
            $api->get('detail/good/list', 'ShopController@shopDetailGoodList');
            //商家详情---商家信息
            $api->get('merchant/detail', 'ShopController@shopDetail');
        });

        /*********************** 商品接口路由 *************************/
        $api->group(['prefix' => 'good'], function ($api) {

            //商品分类
            $api->get('category/list', 'GoodController@goodCategoryList');
            //行业项目分类列表
            $api->get('industry/list', 'GoodController@industryCategoryList');
            //特权商品---更多
            $api->get('privilege/list', 'GoodController@privilegeGoodList');
            //热销商品---更多
            $api->get('hot/list', 'GoodController@hotGoodList');
            //单个商品的规格信息
            $api->get('attribute/sku/info', 'GoodController@goodAttributeSkuInfo');

        });

        $api->group(['prefix' => 'good','middleware' => ['api.throttle','member_refresh']], function ($api) {

            //商品详情
            $api->get('detail', 'GoodController@goodDetail');
            //商品收藏
            $api->post('collect/add', 'GoodController@addGoodCollect');
            //取消商品收藏
            $api->post('collect/remove', 'GoodController@removeGoodCollect');
            //商品收藏列表
            $api->get('collect/list', 'CollectController@goodCollectList');
            //店铺收藏列表
            $api->get('shop/collect', 'CollectController@shopCollectList');
            //创建商品规格
            $api->post('attribute/add', 'GoodController@createGoodAttribute');
            //规格列表
            $api->get('attribute/list', 'GoodController@goodAttributeList');
            //创建商品规格值
            $api->post('sku/add', 'GoodController@createGoodSku');
            //商品SKU列表
            $api->get('sku/list', 'GoodController@goodSkuList');
            //商品列表
            $api->get('list', 'GoodController@goodList');
            //创建商品
            $api->post('add', 'GoodController@createGood');
            //删除商品
            $api->post('remove', 'GoodController@removeGood');
            //删除购物车商品（单个）
            $api->post('cart/delete', 'GoodController@deleteCartGood');
            //购物车添加
            $api->post('cart/add', 'GoodCartController@cartAdd');
            //已勾选商品---购物车列表
            $api->get('cart/list', 'GoodCartController@cartList');
            //已勾选的商品--清空（删除购物车商品）
            $api->post('cart/remove', 'GoodCartController@removeGoodCart');
            //商品上架
            $api->post('add/state', 'GoodController@addGoodState');
            //商品下架
            $api->post('remove/state', 'GoodController@removeGoodState');

        });

        /*********************** 银行卡接口路由 *************************/
        $api->group(['prefix' => 'bank','middleware' => ['api.throttle','member_refresh']], function ($api) {

            //银行卡列表
            $api->get('list', 'MemberBankController@bankList');
            //根据卡号获取银行卡名称
            $api->get('name/info', 'MemberBankController@bankNoName');
            //绑定银行卡
            $api->post('add', 'MemberBankController@addBankNo');
        });

        /*********************** 会员接口路由 *************************/
        $api->group(['prefix' => 'member','middleware' => ['api.throttle','member_refresh']], function ($api) {
            //会员升级--金卡
            $api->get('gold/info', 'MemberController@goldInfo');
            //会员升级--黑金卡
            $api->get('black/info', 'MemberController@blackInfo');
            //实名认证
            $api->post('real/name', 'MemberController@realNameAuthentication');
            //修改会员头像
            $api->post('update/avatar', 'MemberController@updateAvatar');
            //修改会员信息
            $api->post('update/memberinfo', 'MemberController@updateMemberInfo');
            //设置金额
            $api->post('set/money', 'MemberController@setPayMoney');
            //帮助中心列表
            $api->get('help/cate/list', 'MemberController@helpCategoryList');
            //帮助中心详情
            $api->get('help/detail', 'MemberController@helpDetailShow');
            //关于我们
            $api->get('about/info', 'MemberController@aboutOurInfo');
            //俱乐部说明
            $api->get('club/remark', 'MemberController@clubRemark');
            //俱乐部会员章程
            $api->get('club/content', 'MemberController@clubContent');
            //版本信息
            $api->get('version/info', 'MemberController@versionInfo');
            //用户反馈
            $api->post('feedback/add', 'MemberController@addFeedback');
            //合伙人管理列表
            $api->get('partner/recode/list', 'MemberController@partnerRecodeList');
            //俱乐部会员列表
            $api->get('users/club/list', 'MemberController@memberClubList');
            //我的合伙
            $api->get('my/partner/list', 'MemberController@myPartnerList');
            //合伙详情
            $api->get('my/partner/detail', 'MemberController@partnerDetail');
            //我的零钱
            $api->get('money/bag', 'MemberController@myMoneyBag');
            //申请提现，提现到银行卡
            $api->post('withdraw/apply', 'WithdrawController@withdrawApply');
            //解绑微信号
            $api->post('cancel/wxcode', 'MemberController@cancelWxCode');
            //更换手机号
            $api->post('update/mobile', 'MemberController@updateMobile');
            //修改密码
            $api->post('update/password', 'MemberController@updatePassword');
            //黑金卡升级--信息填写
            $api->post('black/upgrade', 'MemberController@upgradeBackAdd');
            //选择根据地，即店铺列表
            $api->get('upgrade/shop/list', 'MemberController@upgradeAddress');
            //确认选择根据地
            $api->post('upgrade/shop/add', 'MemberController@getAddressUpgrade');
            //商家入驻，行业分类（一级）
            $api->get('pid/category', 'MemberController@industryPidCategory');
            //商家入驻，行业分类（二级）
            $api->get('son/category', 'MemberController@industrySonCategory');
            //商家入驻，项目列表
            $api->get('league/list', 'MemberController@leagueEngineerList');
            //商家入驻--用户升级的信息
            $api->get('upgrade/detail', 'MemberController@blackUpgradeDetail');
            //商家入驻
            $api->post('merchant/add', 'MemberController@merchantEngineerAdd');
            //营业报表
            $api->get('business/recode', 'MemberController@businessRecodeList');
            //营业款
            $api->get('business/count', 'MemberController@businessCount');
            //绑定手机号（微信）
            $api->post('bind/phone', 'WechatLoginController@bindWechatMobile');
            //微信登录
            $api->post('wx/login', 'WechatLoginController@wxToLogin');
            //系统通知列表
            $api->get('message/list', 'MemberController@messageList');
            //系统通知详情
            $api->get('message/detail', 'MemberController@messageDetail');
            //交易通知
            $api->get('order/message/list', 'MemberController@orderMessageList');
            //交易详情
            $api->get('order/jy/detail', 'MemberController@orderItem');
            //实名认证信息页面 --审核不通过
            $api->get('no/check/shiMing', 'MemberController@shiMingInfo');
            //我的店铺--数据统计
            $api->get('discount/info', 'MemberController@myShopCountInfo');
            //会员信息
            $api->get('users/detail', 'MemberController@memberForDetail');
            //上传图片
            $api->post('feedback/image', 'MemberController@feedBackImageAdd');
            //邀请好友
            $api->get('invite/user/info', 'MemberController@inviteUser');
            //会员背景图
            $api->get('background/image', 'MemberController@backgroundImage');
            //首页未读消息提示
            $api->get('read/message', 'IndexController@readMessageCount');
            //读取消息
            $api->get('message', 'MemberController@readMessage');
        });

        /*********************** 店铺接口路由 *************************/
        $api->group(['prefix' => 'store','middleware' => ['api.throttle','member_refresh']], function ($api) {

            //权限列表
            $api->get('permission/list', 'ShopStaffController@shopPermissionList');
            //店员列表
            $api->get('staff/list', 'ShopStaffController@staffList');
            //添加店员
            $api->post('staff/add', 'ShopStaffController@addShopStaff');
            //删除店员
            $api->post('staff/remove', 'ShopStaffController@removeShopStaff');
            //店铺收藏
            $api->post('shop/collect', 'ShopController@shopCollectAdd');
            //取消店铺收藏
            $api->post('remove/shop/collect', 'ShopController@removeShopCollect');
            //店铺信息
            $api->get('merchant/detail', 'ShopController@shopMerchantDetail');
            //店铺信息修改
            $api->post('update/merchant/detail', 'ShopController@updateShopDetail');
            //店铺列表
            $api->get('shop/list', 'ShopController@shopList');
            //中资联店铺列表（项目列表）
            $api->get('project/list', 'ShopController@zjlShopList');
            //项目详情
            $api->get('project/detail', 'ShopController@projectDetail');

        });


        /*********************** 订单接口路由 *************************/
        $api->group(['prefix' => 'order','middleware' => ['api.throttle','member_refresh']], function ($api) {

            //店铺订单列表
            $api->get('shop/order/list', 'OrderController@shopOrderList');
            //取消订单
            $api->post('closed', 'OrderController@closedOrder');
            //订单列表
            $api->get('list', 'OrderController@orderList');
            //订单评价
            $api->post('evaluate', 'OrderController@orderComment');
            //订单详情
            $api->get('detail', 'OrderController@orderDetail');
            //订单待评价列表
            $api->get('wait/evaluate', 'OrderController@waitOrderCommentList');
            //已评价订单列表
            $api->get('shop/evaluate', 'OrderController@orderEvaluateList');
            //收款明细
            $api->get('payment/recode', 'OrderController@paymentRecodeList');
            //零钱明细
            $api->get('money/recode/list', 'OrderController@moneyRecodeList');
            //会员升级支付订单
            $api->get('member/upgrade', 'GradePayController@upgradeOrder');
            //支付完成的订单详情
            $api->get('compolete/detail', 'OrderController@compoleteOrder');
            //订单详情---确认消费页面
            $api->get('make/detail', 'OrderController@makeOrderComplete');
            //确认消费
            $api->post('make/finsh', 'OrderController@makeFreeOrder');
            //已选商品--去结算（创建订单）
            $api->post('info/add', 'OrderController@createGoodPrepaidOrder');
            //支付订单
            $api->get('prepaid/pay', 'OrderController@confirmPrepaidOrderInfo');
            //发起订单支付
            $api->get('prepaid/send', 'OrderController@payOrder');
        });

        /*********************** 积分接口路由 *************************/
        $api->group(['prefix' => 'integral','middleware' => ['api.throttle','member_refresh']], function ($api) {

            //我的积分
            $api->get('user/credit', 'IntegralOrderController@memberIntegral');
            //积分明细
            $api->get('order/list', 'IntegralOrderController@integralOrderList');
            //积分转换零钱
            $api->post('money/add', 'IntegralOrderController@makeIntegralMoney');

        });

        /*********************** 礼包接口路由 *************************/
        $api->group(['prefix' => 'giftbag','middleware' => ['api.throttle','member_refresh']], function ($api) {

            //未领取的礼包（合伙礼包）
            $api->get('wait/list', 'GiftBagController@waitGiftBagList');
            //已领取的礼包
            $api->get('make/list', 'GiftBagController@alreadyGiftBagList');
            //特权礼包---礼包详情
            $api->get('detail', 'GiftBagController@giftBagDetail');
            //领取礼包
            $api->post('receive', 'GiftBagController@receiveGiftBag');
        });

    });


});