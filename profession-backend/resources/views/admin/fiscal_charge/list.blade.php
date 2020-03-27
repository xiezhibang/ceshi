@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>财务管理--流水支出列表</h5>
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
                                        <option value="0">请选择状态</option>
                                        <option value="1">待审核</option>
                                        <option value="2">审核通过</option>
                                        <option value="3">审核不通过</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" name="order_no" class="form-control" placeholder="请输入订单号" id="" value="{{ $request->order_no }}">
                            </div>

                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="请输入会员昵称" id="" value="{{ $request->username }}">
                            </div>

                            <div class="form-group">
                                <input type="text" name="account" class="form-control" placeholder="请输入会员账号" id="" value="{{ $request->account }}">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <a href="" class="btn btn-sm btn-primary" title="流水支出列表">
                                <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;流水支出列表</span>
                            </a>

                            <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="130">订单号</th>
                                <th class="text-center" width="100">交易对象</th>
                                <th class="text-center" width="100">会员昵称</th>
                                <th class="text-center" width="100">会员账号</th>
                                <th class="text-center" width="100">交易金额</th>
                                <th class="text-center" width="100">实到金额</th>
                                <th class="text-center" width="100">平台佣金</th>
                                <th class="text-center" width="100">类型</th>
                                <th class="text-center" width="100">状态</th>
                                <th class="text-center" width="150">时间</th>
                                <th class="text-center" width="130">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->order_no }}</td>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->username }}</td>
                                    <td class="text-center">{{ $item->account }}</td>
                                    <td class="text-center"><b>￥</b>{{ $item->order_money }}</td>
                                    <td class="text-center"><b>￥</b>{{ $item->money }}</td>
                                    <td class="text-center"><b>￥</b>{{ $item->commission_price }}</td>
                                    <td class="text-center">{{ $item->type }}</td>
                                    <td class="text-center">
                                        @if($item->status == 1)
                                            <span class="text-navy">待审核</span>
                                        @elseif($item->status == 2)
                                            <span class="text-danger">审核通过</span>
                                        @elseif($item->status == 3)
                                            <span class="text-navy">审核不通过</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="/admin/fiscalcharge/{{$item->id}}/edit">
                                                <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 查看</button>
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