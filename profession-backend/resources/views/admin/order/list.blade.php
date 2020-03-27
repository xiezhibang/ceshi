@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>订单列表</h5>
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

                        <div class="form-group draggable">
                            <div class="col-sm-9">
                                <select class="form-control" name="status">
                                    <option value="0">请选择订单状态</option>
                                    <option value="1">待支付</option>
                                    <option value="2">已支付</option>
                                    <option value="4">确认消费</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group draggable">
                            <div class="col-sm-9">
                                <select class="form-control" name="payment">
                                    <option value="0">请选择支付方式</option>
                                    <option value="wxpay">微信支付</option>
                                    <option value="alipay">支付宝支付</option>
                                    <option value="balance">余额支付</option>
                                    <option value="credit">积分支付</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="order_sn" class="form-control" placeholder="请输入订单号" id="" value="{{ $request->order_sn }}">
                        </div>

                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="请输入用户名" id="" value="{{ $request->username }}">
                        </div>

                        <div class="form-group">
                            <input type="text" name="shop_name" class="form-control" placeholder="请输入店铺名称" id="" value="{{ $request->shop_name }}">
                        </div>

                        <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                    </form>

                    <div class="head-tab" style="margin-left: 15px;">

                        <a href="" class="btn btn-sm btn-primary" title="订单列表">
                            <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;订单列表</span>
                        </a>

                        <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                    </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="130">用户信息</th>
                                <th class="text-center" width="130">订单号</th>
                                <th class="text-center" width="130">店铺名称</th>
                                <th class="text-center" width="130">店铺头像</th>
                                <th class="text-center" width="100">商品总数量</th>
                                <th class="text-center" width="100">订单总金额</th>
                                <th class="text-center" width="100">实付金额</th>
                                <th class="text-center" width="100">优惠金额</th>
                                <th class="text-center" width="100">支付方式</th>
                                <th class="text-center" width="100">订单状态</th>
                                <th class="text-center" width="160">支付时间</th>
                                <th class="text-center" width="130">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                            <tr>
                                <td class="text-center">{{ $item->id }}</td>
                                <td class="text-center">
                                    <p>ID：&nbsp;&nbsp;{{ $item->user_id }}</p>
                                    <p>昵称：&nbsp;&nbsp;{{ $item->username }}</p>
                                </td>
                                <td class="text-center">{{ $item->order_sn }}</td>
                                <td class="text-center">{{ $item->shop_name }}</td>
                                <td>
                                    <img src="{{ $item->shop_image }}" alt="" width="130px" height="100px">
                                </td>
                                <td class="text-center">{{ $item->total }}</td>
                                <td class="text-center"><b>￥</b>{{ $item->total_money }}</td>
                                <td class="text-center"><b>￥</b>{{ $item->pay_money }}</td>
                                <td class="text-center"><b>￥</b>{{ $item->discount_money }}</td>
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
                                    @if($item->status == 0)
                                        <span class="text-navy">临时订单</span>
                                    @elseif($item->status == 1)
                                        <span class="text-danger">待支付</span>
                                    @elseif($item->status == 2)
                                        <span class="text-navy">已支付</span>
                                    @elseif($item->status == 3)
                                        <span class="text-danger">已消费</span>
                                    @elseif($item->status == 4)
                                        <span class="text-navy">已评价</span>
                                    @elseif($item->status == 5)
                                        <span class="text-danger">已取消</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $item->paid_at }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="/admin/order/{{$item->id}}">
                                            <button class="btn btn-info btn-xs" type="button"><i class="fa fa-paste"></i> 详情</button>
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