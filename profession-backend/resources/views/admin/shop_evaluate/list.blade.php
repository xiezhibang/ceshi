@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>店铺评价列表</h5>
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
                                <input type="text" name="nick_name" class="form-control" placeholder="请输入会员昵称" id="" value="{{ $request->nick_name }}">
                            </div>

                            <div class="form-group">
                                <input type="text" name="shop_name" class="form-control" placeholder="请输入店铺名称" id="" value="{{ $request->shop_name }}">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <a href="" class="btn btn-sm btn-primary" title="店铺评价列表">
                                <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;店铺评价列表</span>
                            </a>

                            <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="60">会员ID</th>
                                <th class="text-center" width="100">会员名称</th>
                                <th class="text-center" width="100">店铺名称</th>
                                <th class="text-center" width="100">总体评价</th>
                                <th class="text-center" width="100">商品评价</th>
                                <th class="text-center" width="100">服务评价</th>
                                <th class="text-center" width="100">环境评价</th>
                                <th class="text-center" width="150">评价时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->user_id }}</td>
                                    <td class="text-center">{{ $item->nick_name }}</td>
                                    <td class="text-center">{{ $item->shop_name }}</td>
                                    <td class="text-center">
                                        @if($item->overall_evaluate == 1)
                                            <span class="text-navy">很差</span>
                                        @elseif($item->overall_evaluate == 2)
                                            <span class="text-danger">一般</span>
                                        @elseif($item->overall_evaluate == 3)
                                            <span class="text-navy">不错</span>
                                        @elseif($item->overall_evaluate == 4)
                                            <span class="text-danger">很好</span>
                                        @elseif($item->overall_evaluate == 5)
                                            <span class="text-navy">非常好</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->good_evaluate == 1)
                                            <span class="text-navy">很差</span>
                                        @elseif($item->good_evaluate == 2)
                                            <span class="text-danger">一般</span>
                                        @elseif($item->good_evaluate == 3)
                                            <span class="text-navy">不错</span>
                                        @elseif($item->good_evaluate == 4)
                                            <span class="text-danger">很好</span>
                                        @elseif($item->good_evaluate == 5)
                                            <span class="text-navy">非常好</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->service_evaluate == 1)
                                            <span class="text-navy">很差</span>
                                        @elseif($item->service_evaluate == 2)
                                            <span class="text-danger">一般</span>
                                        @elseif($item->service_evaluate == 3)
                                            <span class="text-navy">不错</span>
                                        @elseif($item->service_evaluate == 4)
                                            <span class="text-danger">很好</span>
                                        @elseif($item->service_evaluate == 5)
                                            <span class="text-navy">非常好</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->environment_evaluate == 1)
                                            <span class="text-navy">很差</span>
                                        @elseif($item->environment_evaluate == 2)
                                            <span class="text-danger">一般</span>
                                        @elseif($item->environment_evaluate == 3)
                                            <span class="text-navy">不错</span>
                                        @elseif($item->environment_evaluate == 4)
                                            <span class="text-danger">很好</span>
                                        @elseif($item->environment_evaluate == 5)
                                            <span class="text-navy">非常好</span>
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