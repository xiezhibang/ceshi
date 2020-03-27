<!--左侧导航开始-->

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close"><i class="fa fa-times-circle"></i>
    </div>
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img alt="image" class="img-circle" src="/huiadmin/img/profile_small.jpg" /></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold">admin</strong></span>
                                <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="J_menuItem" href="">修改头像</a>
                        </li>
                        <li><a class="J_menuItem" href="">个人资料</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('admin/logout') }}">安全退出</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">H+
                </div>
            </li>

            <li>
                <a href=""><i class="fa fa-desktop"></i> <span class="nav-label">主页</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a class="J_menuItem" href="{{ url('admin/userdata') }}">用户数据</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/tranfer') }}">交易明细</a></li>
                </ul>
            </li>


{{--            <li>--}}
{{--                <a href="{{ url('admin/index') }}">--}}
{{--                    <i class="fa fa-home"></i>--}}
{{--                    <span class="nav-label">数据统计</span>--}}
{{--                    <span class="fa arrow"></span>--}}
{{--                </a>--}}

{{--            </li>--}}

            <li>
                <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">会员管理</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a class="J_menuItem" href="{{ url('admin/member') }}">会员列表</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/checkname') }}">会员实名认证</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/shipgrade') }}">会员等级收益</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">商家管理</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    {{--<li><a class="J_menuItem" href="{{ url('admin/goodbanner') }}">商品专区列表</a></li>--}}
                    {{--<li><a class="J_menuItem" href="{{ url('admin/attribute') }}">商品规格列表</a></li>--}}
                    {{--<li><a class="J_menuItem" href="{{ url('admin/sku') }}">商品SKU列表</a></li>--}}
                    <li><a class="J_menuItem" href="{{ url('admin/good') }}">商品管理</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/goodcategory') }}">商品分类</a></li>
                   
                    <li><a class="J_menuItem" href="{{ url('admin/merchant') }}">店铺管理</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/industry') }}">行业分类</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/order') }}">订单管理</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/evaluate') }}">店铺评价</a></li>
{{--                    <li><a class="J_menuItem" href="{{ url('admin/goodcollect') }}">商品收藏列表</a></li>--}}
                </ul>
            </li>

{{--            <li>--}}
{{--                <a href=""><i class="fa fa-desktop"></i> <span class="nav-label">店铺管理</span><span class="fa arrow"></span></a>--}}
{{--                <ul class="nav nav-second-level">--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/merchant') }}">店铺信息</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/staff') }}">店员列表</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/evaluate') }}">店铺评价列表</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/shopcollect') }}">店铺收藏列表</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                <a href=""><i class="fa fa-desktop"></i> <span class="nav-label">行业分类</span><span class="fa arrow"></span></a>--}}
{{--                <ul class="nav nav-second-level">--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/industry') }}">行业</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/storepartner') }}">店铺合伙明细</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/invest') }}">合伙人投资明细</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/partreturn') }}">合伙收益明细</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                <a href=""><i class="fa fa-desktop"></i> <span class="nav-label">订单管理</span><span class="fa arrow"></span></a>--}}
{{--                <ul class="nav nav-second-level">--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/order') }}">订单列表</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/gradeorder') }}">会员升级订单</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/integralorder') }}">积分转换订单</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/prepaidchange') }}">会员充值订单</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">店铺评价</span><span class="fa arrow"></span></a>--}}
{{--            </li>--}}

            <li>
                <a href=""><i class="fa fa-desktop"></i> <span class="nav-label">合伙项目管理</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a class="J_menuItem" href="{{ url('admin/engineer') }}">项目列表</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/giftbag') }}">合伙礼包管理</a></li>
                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">财务管理</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a class="J_menuItem" href="{{ url('admin/fiscalcharge') }}">流水列表</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/configrate') }}">费率设置</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/integralorder') }}">积分转换记录</a></li>
                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">系统配置</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a class="J_menuItem" href="{{ url('admin/website') }}">设置</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/feedback') }}">反馈</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/helpartcile') }}">帮助</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/loger') }}">操作日志</a></li>
{{--                    <li><a class="J_menuItem" href="{{ url('admin/configrate') }}">费率设置</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/feedback') }}">用户反馈列表</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/helpcate') }}">文章分类</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/helpartcile') }}">文章列表</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/ratio') }}">合伙人收益比例</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/website') }}">系统内容设置</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/equity') }}">会员权益介绍</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/upgradeuser') }}">会员升级收益</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/interest') }}">会员权益</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/club') }}">俱乐部会员列表</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/partnerrecode') }}">合伙人列表</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/setmoney') }}">收款金额设置</a></li>--}}
{{--                    <li><a class="J_menuItem" href="{{ url('admin/upgradeprice') }}">会员升级金额设置</a></li>--}}
                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">权限管理</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a class="J_menuItem" href="{{ url('admin/user') }}">管理员管理</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/role') }}">角色管理</a></li>
                    <li><a class="J_menuItem" href="{{ url('admin/permission') }}">权限管理</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">消息管理</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a class="J_menuItem" href="{{ url('admin/message') }}">消息列表</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">广告管理</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a class="J_menuItem" href="{{ url('admin/banner') }}">广告列表</a></li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
<!--左侧导航结束-->