@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>商家入驻列表</h5>
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
                                    <select class="form-control" name="check_status">
                                        <option value="">审核状态</option>
                                        <option value="0">待审核</option>
                                        <option value="1">审核通过</option>
                                        <option value="2">审核不通过</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group draggable">
                                <div class="col-sm-9">
                                    <select class="form-control" name="type">
                                        <option value="">入驻类型</option>
                                        <option value="1">普通商家入驻</option>
                                        <option value="2">共享项目入驻</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group draggable">
                                <div class="col-sm-9">
                                    <select class="form-control" name="status">
                                        <option value="">是否显示</option>
                                        <option value="0">显示</option>
                                        <option value="1">隐藏</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" name="shop_name" class="form-control" placeholder="请输入店铺名称" id="" value="{{ $request->shop_name }}">
                            </div>

                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="请输入会员名称" id="" value="{{ $request->username }}">
                            </div>

                            <div class="form-group">
                                <input type="text" name="user_phone" class="form-control" placeholder="请输入手机号" id="" value="{{ $request->user_phone }}">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <a href="" class="btn btn-sm btn-primary" title="商家入驻列表">
                                <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;商家入驻列表</span>
                            </a>

                            <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="130">店铺名称</th>
                                <th class="text-center" width="100">店铺图片</th>
                                <th class="text-center" width="100">行业分类</th>
                                <th class="text-center" width="100">俱乐部会员数量</th>
                                <th class="text-center" width="100">合伙人数量</th>
                                <th class="text-center" width="100">联系人</th>
                                <th class="text-center" width="100">手机号</th>
                                <th class="text-center" width="100">审核状态</th>
                                <th class="text-center" width="100">入住类型</th>
                                <th class="text-center" width="100">店铺管理员</th>
                                <th class="text-center" width="150">入驻时间</th>
                                <th class="text-center" width="130">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->shop_name }}</td>
                                    <td>
                                        <img src="{{ $item->shop_image }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td class="text-center">{{ $item->industry_name }}</td>
                                    <td class="text-center">{{ $item->club_num }}</td>
                                    <td class="text-center">{{ $item->partner_num }}</td>
                                    <td class="text-center">{{ $item->username }}</td>
                                    <td class="text-center">{{ $item->user_phone }}</td>
                                    <td class="text-center">
                                        @if($item->check_status == 0)
                                            <span class="text-danger">待审核</span>
                                        @elseif($item->check_status == 1)
                                            <span class="text-navy">审核通过</span>
                                        @elseif($item->check_status == 2)
                                            <span class="text-danger">审核不通过</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->type == 1)
                                            <span class="text-navy">普通商家入驻</span>
                                        @elseif($item->type == 2)
                                            <span class="text-danger">共享项目入驻</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->shop_manner_num }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="/admin/merchant/{{$item->id}}/edit">
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