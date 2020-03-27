@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>交易数据</h5>
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
                                        <option value="10">支付宝</option>
                                        <option value="20">微信</option>
                                        <option value="30">积分</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group draggable">
                                <div class="col-sm-9">
                                    <select class="form-control" name="">
                                        <option value="">全部</option>
                                        <option value="10">待付款</option>
                                        <option value="20">待消费</option>
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
                        平台资金：
                        <table class="table table-striped  table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="100">订单总数</th>
                                <th class="text-center" width="100">成交订单总额</th>
                                <th class="text-center" width="100">平台实收</th>
                                <th class="text-center" width="100">待收款</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">
                                        <p>9564.32 <b>元</b></p>
                                        <p>2 <b>笔</b></p>
                                    </td>
                                    <td class="text-center">
                                        <p>9564.32 <b>元</b></p>
                                        <p>2 <b>笔</b></p>
                                    </td>
                                    <td class="text-center"><b>+</b>9000<b>元</b></td>
                                    <td class="text-center">
                                        <p>100 <b>元</b></p>
                                        <p>2 <b>笔</b></p>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>

                    <div class="table-responsive">
                        平台积分：
                        <table class="table table-striped  table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="100">订单总数</th>
                                <th class="text-center" width="100">成交订单总额</th>
                                <th class="text-center" width="100">平台实收</th>
                                <th class="text-center" width="100">待收款</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td class="text-center">
                                    <p>9564.32 <b>元</b></p>
                                    <p>2 <b>笔</b></p>
                                </td>
                                <td class="text-center">
                                    <p>9564.32 <b>元</b></p>
                                    <p>2 <b>笔</b></p>
                                </td>
                                <td class="text-center"><b>+</b>9000<b>元</b></td>
                                <td class="text-center">
                                    <p>100 <b>元</b></p>
                                    <p>2 <b>笔</b></p>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="130">订单号</th>
                                <th class="text-center" width="100">商品</th>
                                <th class="text-center" width="100">支付方式|交易号</th>
                                <th class="text-center" width="100">订单金额</th>
                                <th class="text-center" width="100">积分</th>
                                <th class="text-center" width="100">买家信息</th>
                                <th class="text-center" width="100">状态</th>
                                <th class="text-center" width="160">下单时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->order_sn }}</td>
                                    <td class="text-center">披萨</td>
                                    <td class="text-center">
                                        @if($item->payment == 'wxpay')
                                            <span class="text-navy">微信</span>
                                        @elseif($item->payment == 'alipay')
                                            <span class="text-danger">支付宝</span>
                                        @elseif($item->payment == 'balance')
                                            <span class="text-navy">余额</span>
                                        @elseif($item->payment == 'credit')
                                            <span class="text-danger">积分</span>
                                        @endif
                                    </td>

                                    <td class="text-center">{{ $item->total_money }}</td>
                                    <td class="text-center">{{ $item->total_money }}</td>
                                    <td class="text-center">
                                        <p>{{ $item->username }}</p>
                                        <p>{{ $item->account }}</p>
                                    </td>
                                    <td class="text-center">
                                        @if($item->status == 1)
                                            <span class="text-navy">待支付</span>
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