@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>充值订单列表</h5>
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

                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="请输入会员昵称" id="" value="{{ $request->username }}">
                            </div>

                            <div class="form-group">
                                <input type="text" name="order_no" class="form-control" placeholder="请输入订单号" id="" value="{{ $request->order_no }}">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <a href="" class="btn btn-sm btn-primary" title="充值订单列表">
                                <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;充值订单列表</span>
                            </a>

                            <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="100">会员昵称</th>
                                <th class="text-center" width="100">充值金额</th>
                                <th class="text-center" width="130">订单号</th>
                                <th class="text-center" width="100">充值方式</th>
                                <th class="text-center" width="100">充值状态</th>
                                <th class="text-center" width="100">充值描述</th>
                                <th class="text-center" width="150">充值时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->username }}</td>
                                    <td class="text-center"><b>￥</b>{{ $item->money }}</td>
                                    <td class="text-center">{{ $item->order_no }}</td>
                                    <td class="text-center">
                                        @if($item->payment == 'wxpay')
                                            <span class="text-navy">微信支付</span>
                                        @elseif($item->payment == 'alipay')
                                            <span class="text-danger">支付宝支付</span>
                                        @elseif($item->payment == 'balance')
                                            <span class="text-navy">余额支付</span>
                                        @elseif($item->payment == 'credit')
                                            <span class="text-danger">积分支付</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->status == 1)
                                            <span class="text-danger">待支付</span>
                                        @elseif($item->status == 2)
                                            <span class="text-navy">充值成功</span>
                                        @elseif($item->status == 3)
                                            <span class="text-danger">充值失败</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->remark }}</td>
                                    <td class="text-center">{{ $item->paid_at }}</td>
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