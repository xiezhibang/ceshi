@extends("admin.layouts.layout")

@section("content")

    <div class="row">
        <div class="col-sm-4">
            <div class="contact-box">

                    <div class="col-sm-4">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="{{ $member_bind->avatar }}">
                            <div class="m-t-xs font-bold">{{ $member_bind->nick_name }}</div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <p><strong>个性签名：</strong>{{ $member_bind->user_signature }}</p>
                        <p><strong>性别：</strong>{{ $member_bind->sex }}</p>
                        <p><strong>手机号：</strong>{{ $member->mobile }}</p>
                        <p><strong>零钱：</strong>{{ $member->money_bag }}</p>
                        <p><strong>积分：</strong>{{ $member->total_credits }}</p>
                        <p><strong>身份：</strong>{{ $member->type }}</p>
                        <p><strong>升级时间：</strong>{{ $member->bind_user_time }}</p>
                        <p><strong>合伙项目：</strong>{{ $member->partner_num }}</p>
                        <p><strong>真实姓名：</strong>{{ $member_bind->username }}</p>
                        <p><strong>身份证号：</strong>{{ $member_bind->code_sn }}</p>
                        <p><strong>出生地：</strong>{{ $member_bind->address }}</p>
                        <p><strong>身份证正面：</strong> <img src="{{ $member_bind->front_card_image }}" alt="" width="130px" height="100px"></p>
                        <p><strong>身份证反面：</strong> <img src="{{ $member_bind->back_card_image }}" alt="" width="130px" height="100px"></p>
                        <p><strong>审核状态：</strong>{{ $member_bind->check_status }}</p>
                        <p><strong>是否实名：</strong>{{ $member_bind->bind_card_status }}</p>
                        <p><strong>拒绝审核原因：</strong>{{ $member_bind->refuse_review }}</p>
                        <p><strong>省份：</strong>{{ $member_bind->province }}</p>
                        <p><strong>城市：</strong>{{ $member_bind->city }}</p>
                        <p><strong>区县：</strong>{{ $member_bind->district }}</p>
                        <p><strong>详细地址：</strong>{{ $member_bind->address_detail }}</p>
                        <p><strong>直接推荐数量：</strong>{{ $member_bind->num }}</p>
                        <p><strong>过期时间：</strong>{{ $member_bind->expire_time }} 年</p>
                        <p><strong>最后登陆时间：</strong>{{ $member_bind->login_time }}</p>
                    </div>
                    <br>
                    <br>
                    {{--<a class="btn btn-primary btn-xs" href="javascript:history.go(-1)">返回</a>--}}
                    <div class="clearfix"></div>
                <div class="text-right">
                    <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                </div>

            </div>
        </div>

    </div>

@endsection