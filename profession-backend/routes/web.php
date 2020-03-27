<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    //后台登录路由
    Route::get('login','LoginController@login');
    //验证码路由
    Route::get('code','LoginController@code');
    //处理后台登录的路由
    Route::post('dologin','LoginController@doLogin');
    //加密算法
    Route::get('jiami','LoginController@jiami');
});

//登录错误跳转
Route::get('noaccess','Admin\LoginController@noaccess');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['isLogin']],function(){
//后台首页路由
    Route::get('index','LoginController@index');
//后台欢迎页
   // Route::get('welcome','LoginController@welcome');
    Route::get('index/main','LoginController@main')->name('index.main');
//后台退出登录路由
    Route::get('logout','LoginController@logout')->name('admin.logout');

//    后台用户模块相关路由
//    给用户授权相关路由
    Route::get('user/auth/{id}','UserController@auth');
    Route::post('user/doauth','UserController@doAuth');
    //修改用户状态 停用  启用
    Route::post('user/changestatus','UserController@changestatus');
//    删除所有选中用户路由
    Route::get('user/del','UserController@delAll');
    Route::resource('user','UserController');


//    角色模块
//    角色授权路由
    Route::get('role/auth/{id}','RoleController@auth');
    Route::post('role/doauth','RoleController@doAuth');
    Route::resource('role','RoleController');


    // 权限模块路由
    Route::resource('permission','PermissionController');

    //订单模块路由
    Route::resource('order','OrderController');

    //会员升级订单模块路由
    Route::resource('gradeorder','GradeOrderController');

    //积分转换订单模块路由
    Route::resource('integralorder','IntegralOrderController');

    //禁用
    Route::get('member/stopstatus/{id}','MemberController@stopShow')->name('member.stopstatus');
    Route::post('member/stopstatus/{id}','MemberController@stopstatus')->name('member.stopstatus');

    //启用
    Route::get('member/restartstatus/{id}','MemberController@restartShow')->name('member.restartstatus');
    Route::post('member/restartstatus/{id}','MemberController@restartstatus')->name('member.restartstatus');

    //会员模块路由
    Route::resource('member','MemberController');

    //实名认证---不通过
    Route::get('checkname/nopass/{id}','CheckRealNameController@nopassShow')->name('checkname.nopass');
    Route::post('checkname/nopass/{id}','CheckRealNameController@nopassUpdate')->name('checkname.nopassupdate');

    //实名认证模块路由
    Route::resource('checkname','CheckRealNameController');

    //主页---用户数据模块路由
    Route::resource('userdata','MemberDataController');

    //操作日志
    Route::resource('loger','LogController');

    //交易数据
    Route::resource('tranfer','TranferOrderController');


    //会员等级收益模块路由
    Route::resource('shipgrade','MembershipGradeController');

    //会员升级收益模块路由
    Route::resource('upgradeuser','MemberUpgradeController');

    //会员权益模块路由
    Route::resource('interest','MemberInterestController');

    //俱乐部会员模块路由
    Route::resource('club','MemberClubController');

    //商品专区模块路由
    Route::resource('goodbanner','GoodBannerController');

    //查看商品分类的下级
    Route::get('goodcategory/lower/{id}','GoodCategoryController@lower');

    //商品分类模块路由
    Route::resource('goodcategory','GoodCategoryController');

    //商品属性规格
    Route::resource('attribute','GoodAttributeController');

    //商品SKU
    Route::resource('sku','GoodSkuController');

    //商品模块路由
    Route::resource('good','GoodController');

    //费率设置模块路由
    Route::resource('configrate','ConfigRateController');

    //banner图模块路由（轮播图、会员升级图等）
    Route::resource('banner','BannerController');

    //店员模块路由
    Route::resource('staff','ShopStaffController');

    //店铺管理---合伙人列表模块路由
    Route::resource('partnerrecode','PartnerRecodeController');

    //合伙礼包模块路由
    Route::resource('giftbag','GiftBagController');

    //财务管理--支出列表模块路由
    Route::resource('fiscalcharge','FiscalChargeController');

    //用户反馈模块路由
    Route::resource('feedback','FeedBackController');

    //文章分类模块路由
    Route::resource('helpcate','HelpCateController');

    //文章管理模块路由
    Route::resource('helpartcile','HelpArtcileController');

    //商家入驻模块路由
    Route::resource('merchant','MerchantEnterController');

    //行业分类模块路由
    Route::resource('industry','IndustryController');

    //消息管理模块路由
    Route::resource('message','MessageController');

    //店铺合伙明细模块路由
    Route::resource('storepartner','StorePartnerController');

    //合伙人投资明细模块路由
    Route::resource('invest','PartnerInvestController');

    //合伙收益明细模块路由
    Route::resource('partreturn','PartnerReturnController');

    //会员权益介绍模块路由
    Route::resource('equity','MemberEquityController');

    //查看合伙明细
    Route::get('engineer/store/{id}','LeagueEngineerController@showDetail');
    //合伙项目模块路由
    Route::resource('engineer','LeagueEngineerController');

    //合伙人收益比例模块路由
    Route::resource('ratio','PartnerRateController');

    //会员金额设置模块路由
    Route::resource('setmoney','SetMoneyController');

    //系统内容设置模块路由
    Route::resource('website','WebsiteController');

    //会员升级金额设置模块路由
    Route::resource('upgradeprice','MemberUpgradeMoneyController');

    //商品收藏模块路由
    Route::resource('goodcollect','GoodCollectController');

    //充值订单模块路由
    Route::resource('prepaidchange','PrepaidChangeController');

    //店铺评价模块路由
    Route::resource('evaluate','ShopEvaluateController');

    //店铺收藏模块路由
    Route::resource('shopcollect','ShopCollectController');

    //提现模块路由
    Route::resource('withdrawal','WithdrawalController');


});