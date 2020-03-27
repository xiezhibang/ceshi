@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>提现列表</h5>
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
                                <input type="text" name="withdrawal_sn" class="form-control" placeholder="请输入提现单号" id="" value="{{ $request->withdrawal_sn }}">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <a href="" class="btn btn-sm btn-primary" title="提现列表">
                                <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;提现列表</span>
                            </a>

                            <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="100">会员名称</th>
                                <th class="text-center" width="100">银行名称</th>
                                <th class="text-center" width="100">银行卡号</th>
                                <th class="text-center" width="100">提现金额</th>
                                <th class="text-center" width="100">提现单号</th>
                                <th class="text-center" width="100">提现类型</th>
                                <th class="text-center" width="100">提现状态</th>
                                <th class="text-center" width="100">审核状态</th>
                                <th class="text-center" width="150">到账时间</th>
                                <th class="text-center" width="150">申请时间</th>
                                {{--<th class="text-center" width="160">操作</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->username }}</td>
                                    <td class="text-center">{{ $item->bank_name }}</td>
                                    <td class="text-center">{{ $item->bank_sn }}</td>
                                    <td class="text-center"><b>￥</b>{{ $item->withdrawal_money }}</td>
                                    <td class="text-center">{{ $item->withdrawal_sn }}</td>
                                    <td class="text-center">
                                        @if($item->type == 1)
                                            <span class="text-navy">个人提现</span>
                                        @elseif($item->type == 2)
                                            <span class="text-danger">店铺提现</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->status == 1)
                                            <span class="text-navy">提现中</span>
                                        @elseif($item->status == 2)
                                            <span class="text-danger">已提现</span>
                                        @elseif($item->status == 3)
                                            <span class="text-navy">提现失败</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->withdrawal_status == 10)
                                            <span class="text-navy">待审核</span>
                                        @elseif($item->withdrawal_status == 20)
                                            <span class="text-danger">已审核</span>
                                        @elseif($item->withdrawal_status == 30)
                                            <span class="text-navy">拒绝审核</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->withdrawal_time }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    {{--<td class="text-center">--}}
                                        {{--<div class="btn-group">--}}
                                            {{--<a href="/admin/withdrawal/{{$item->id}}/edit">--}}
                                                {{--<button class="btn btn-primary btn-xs" type="button"> 同意提现</button>--}}
                                            {{--</a>--}}
                                            {{--<a href="">--}}
                                                {{--<button class="btn btn-danger btn-xs" type="button"> 拒绝提现</button>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</td>--}}
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