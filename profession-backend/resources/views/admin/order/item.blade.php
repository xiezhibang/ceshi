@extends("admin.layouts.layout")

@section("content")

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-content p-xl">
                <div class="row">

                    <div class="col-sm-6">
                        <h4>订单号：</h4>
                        <h4 class="text-navy">{{ $order->order_sn }}</h4><br>
                        <address>
                            <strong>下单用户：{{ $order->username }}</strong><br>
                        </address>
                        <h4 class="text-navy">商品总数量：{{ $order->total }}</h4><br>
                        <p>
                            <span><strong>下单时间：</strong> {{ $order->created_at }}</span>
                        </p>
                        <br>
                        <p>
                            <span><strong>支付时间：</strong> {{ $order->paid_at }}</span>
                        </p>
                    </div>

                </div>

                <div class="table-responsive m-t">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center" width="100">ID编号</th>
                            <th class="text-center" width="170">商品名称</th>
                            <th class="text-center" width="170">商品图片</th>
                            <th class="text-center" width="170">商品价格</th>
                            <th class="text-center" width="170">单个商品数量</th>
                            <th class="text-center" width="170">合计金额</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $k => $v)
                        <tr>
                            <td class="text-center">{{ $v->id }}</td>
                            <td class="text-center">
                                <div><strong>{{ $v->good_name }}</strong>
                                </div>
                            </td>
                            <td class="text-center"><img src="{{ $v->good_image }}" alt="" width="100px" height="100px"></td>
                            <td class="text-center">&yen;{{ $v->good_price }}</td>
                            <td class="text-center">{{ $v->amount }}</td>
                            <td class="text-center">&yen;{{ $v->total_price }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /table-responsive -->

                <table class="table invoice-total">
                    <tbody>
                    <tr>
                        <td><strong>总价：</strong>
                        </td>
                        <td>&yen;{{ $totalPrice }}</td>
                    </tr>
                    <tr>
                        <td><strong>实付金额：</strong>
                        </td>
                        <td>&yen;{{ $order->pay_money }}</td>
                    </tr>
                    <tr>
                        <td><strong>优惠金额：</strong>
                        </td>
                        <td>&yen;{{ $order->discount_money }}</td>
                    </tr>
                    <tr>
                        <td><strong>总订单金额：</strong>
                        </td>
                        <td>&yen;{{ $order->total_money }}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-right">
                    <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                </div>

                <div class="well m-t"><strong>注意：</strong> 请在半小时内完成付款，否则订单会自动取消。
                </div>
            </div>
        </div>
    </div>

@endsection