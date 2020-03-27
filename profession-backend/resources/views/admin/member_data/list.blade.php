@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>用户数据</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">设置选项1</a>
                            </li>
                            <li><a href="#">设置选项2</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="ibox-content">

                    <div class="row">

                        <form action="" class="form-inline pull-right">

                            <div class="form-group" id="data_5">
                                <label class="font-noraml">日期选择</label>
                                <div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="form-control" name="start" value="{{ date('Y-m-d') }}" />
                                    <span class="input-group-addon">到</span>
                                    <input type="text" class="form-control" name="end" value="{{ date('Y-m-d') }}" />
                                </div>
                            </div>

                            <div class="form-group draggable">
                                <div class="col-sm-9">
                                    <select class="form-control" name="">
                                        <option value="">请选择时间</option>
                                        <option value="10">今日</option>
                                        <option value="20">昨日</option>
                                        <option value="30">最近7天</option>
                                        <option value="40">最近30天</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group draggable">
                                <div class="col-sm-9">
                                    <select class="form-control" name="">
                                        <option value="">全部</option>
                                        <option value="10">绿卡</option>
                                        <option value="20">金卡</option>
                                        <option value="30">黑金卡</option>
                                    </select>
                                </div>
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">

                        <table class="table table-striped  table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="100">会员总数</th>
                                <th class="text-center" width="100">昨日新增</th>
                                <th class="text-center" width="100">日活跃量</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">{{ $user_total }}</td>
                                    <td class="text-center"><b>+</b>{{ $before_total }}</td>
                                    <td class="text-center">{{ $today_total }}</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="130">会员头像</th>
                                <th class="text-center" width="100">会员昵称</th>
                                <th class="text-center" width="100">账号</th>
                                <th class="text-center" width="100">会员等级</th>
                                <th class="text-center" width="100">是否实名</th>
                                <th class="text-center" width="160">注册时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td>
                                        <img src="{{ $item['memberBind']['avatar'] }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td class="text-center">{{ $item['memberBind']['nick_name'] }}</td>
                                    <td class="text-center">{{ $item->mobile }}</td>
                                    <td class="text-center">
                                        <p>
                                            @if($item->type == 10)
                                                <span class="text-navy">会员绿卡</span>
                                            @elseif($item->type == 20)
                                                <span class="text-navy">金卡会员</span>
                                            @elseif($item->type == 30)
                                                <span class="text-navy">黑金卡会员</span>
                                            @elseif($item->type == 40)
                                                <span class="text-navy">商家</span>
                                            @elseif($item->type == 50)
                                                <span class="text-navy">合伙人</span>
                                            @endif
                                        </p>
                                    </td>

                                    <td class="text-center">
                                        @if($item->memberBind->bind_card_status == 10)
                                            <span class="text-danger">未认证</span>
                                        @elseif($item->memberBind->bind_card_status == 20)
                                            <span class="text-navy">已认证</span>

                                        @endif
                                    </td>

                                    <td class="text-center">{{ $item->created_at }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$results->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection