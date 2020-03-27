<!DOCTYPE html>
<html>
<head>
    <title>后台管理登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Badge Sign In Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <!-- Custom Theme files -->
    <link href="{{ asset('loginadmin/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
</head>
<body>
<!-- main -->
<div class="main">
    <h1>后台管理系统</h1>
    <div class="login-form">
        <h2>中资联登录</h2>
        <div class="agileits-top">
            <form action="{{ url('admin/dologin') }}" method="post">
                {{ csrf_field() }}
                <div class="styled-input">
                    <input type="text" name="username" required=""/>
                    <label>用户名</label>
                    <span></span>
                </div>

                <div class="styled-input">
                    <input type="password" name="password" required="">
                    <label>密码</label>
                    <span></span>
                </div>

                <div class="styled-input">
                    <input type="text" name="code" required="" style="width: 70%;">
                    <label>验证码</label>
                    <img src="{{ url('admin/code') }}" alt="" style="float:right;margin-top: -5px;" onclick="this.src='{{ url('admin/code') }}?'+Math.random()">
                    <span></span>
                </div>

                {{--<div class="wthree-text">--}}
                    {{--<ul>--}}
                        {{--<li>--}}
                            {{--<input type="checkbox" id="brand" value="">--}}
                            {{--<label for="brand"><span></span> 记住我 ?</label>--}}
                        {{--</li>--}}
                        {{--<li> <a href="#">忘记 密码?</a> </li>--}}
                    {{--</ul>--}}
                    {{--<div class="clear"> </div>--}}
                {{--</div>--}}
                <div class="agileits-bottom">
                    <input type="submit" value="登 录">
                </div>
            </form>
        </div>
        {{--<div class="agileits-bottom">--}}
            {{--<form action="{{ url('admin/dologin') }}" method="post">--}}
                {{--{{ csrf_field() }}--}}
                {{--<input type="submit" value="登 录">--}}
            {{--</form>--}}
        {{--</div>--}}
    </div>
</div>
<!-- //main -->
<!-- copyright -->
<div class="copyright">
    <p> © 2020 Badge Sign In Form . All rights reserved | Design by <a href="" title="bootstrapmb">bootstrapmb</a></p>
</div>
<!-- //copyright -->
</body>
</html>
