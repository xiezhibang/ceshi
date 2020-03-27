@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>会员列表</h5>
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
                                    <select class="form-control" name="check_status">
                                        <option value="0">请选择审核状态</option>
                                        <option value="10">待审核</option>
                                        <option value="20">已审核</option>
                                        <option value="30">拒绝审核</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group draggable">
                                <div class="col-sm-9">
                                    <select class="form-control" name="bind_card_status">
                                        <option value="0">是否实名</option>
                                        <option value="10">否</option>
                                        <option value="20">是</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" name="nick_name" class="form-control" placeholder="请输入昵称" id="" value="{{ $request->order_sn }}">
                            </div>

                            <div class="form-group">
                                <input type="text" name="mobile" class="form-control" placeholder="请输入手机号" id="" value="{{ $request->username }}">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <a href="" class="btn btn-sm btn-primary" title="会员列表">
                                <span class="hidden-xs">&nbsp;&nbsp;导出表格</span>
                            </a>

                            <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="130">会员信息</th>
                                <th class="text-center" width="130">会员头像</th>
                                <th class="text-center" width="100">审核状态</th>
                                <th class="text-center" width="100">是否实名</th>
                                <th class="text-center" width="100">零钱</th>
                                <th class="text-center" width="100">积分</th>
                                <th class="text-center" width="100">营业款</th>
                                <th class="text-center" width="100">合伙项目</th>
                                <th class="text-center" width="100">启/禁用状态</th>
                                <th class="text-center" width="150">注册时间</th>
                                <th class="text-center" width="180">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">
                                        <p>{{ $item['memberBind']['nick_name'] }}</p>
                                        <p>手机号：{{ $item->mobile }}</p>
                                        <p>等级：
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
                                    <td>
                                        <img src="{{ $item['memberBind']['avatar'] }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td class="text-center">
                                        @if($item->memberBind->check_status == 10)
                                            <span class="text-danger">待审核</span>
                                        @elseif($item->memberBind->check_status == 20)
                                            <span class="text-navy">已审核</span>
                                        @elseif($item->memberBind->check_status == 30)
                                            <span class="text-navy">拒绝审核</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->memberBind->bind_card_status == 10)
                                            <span class="text-danger">否</span>
                                        @elseif($item->memberBind->bind_card_status == 20)
                                            <span class="text-navy">是</span>

                                        @endif
                                    </td>
                                    <td class="text-center"><b>￥</b>{{ $item->money_bag }}</td>
                                    <td class="text-center">{{ $item->total_credits }}</td>
                                    <td class="text-center"><b>￥</b>{{ $item->revenue_money }}</td>
                                    <td class="text-center">{{ $item->partner_num }}</td>
                                    <td class="text-center">
                                        @if($item->status == 10)
                                            <span class="text-navy">启用</span>
                                        @elseif($item->status == 20)
                                            <span class="text-danger">禁用</span>

                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            {{--<a href="/admin/member/{{$item->id}}">--}}
                                                {{--<button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 详情</button>--}}
                                            {{--</a>--}}
                                            <a href="/admin/member/stopstatus/{{$item->id}}">
                                                <button class="btn btn-danger btn-xs" type="button"><i class="fa fa-paste"></i> 禁用</button>
                                            </a>
                                            <a href="/admin/member/restartstatus/{{$item->id}}">
                                                <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 启用</button>
                                            </a>
                                            <br>
                                            <a href="/admin/member/{{$item->id}}">
                                                <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 查看</button>
                                            </a>
                                            <a href="{{route('member.destroy',$item->id)}}">
                                                <button class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash-o"></i> 删除</button>
                                            </a>
                                        </div>
                                    </td>
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