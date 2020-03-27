@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>俱乐部会员列表</h5>
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
                                        <option value="">审核状态</option>
                                        <option value="10">待审核</option>
                                        <option value="20">审核通过</option>
                                        <option value="30">审核不通过</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group draggable">
                                <div class="col-sm-9">
                                    <select class="form-control" name="add_status">
                                        <option value="">加入状态</option>
                                        <option value="0">待加入</option>
                                        <option value="1">已加入</option>
                                        <option value="2">已过期</option>
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
                                <input type="text" name="phone" class="form-control" placeholder="请输入手机号" id="" value="{{ $request->phone }}">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <a href="" class="btn btn-sm btn-primary" title="俱乐部会员列表">
                                <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;俱乐部会员列表</span>
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
                                <th class="text-center" width="100">会员等级</th>
                                <th class="text-center" width="100">电话</th>
                                <th class="text-center" width="100">会员头像</th>
                                <th class="text-center" width="100">店铺名称</th>
                                <th class="text-center" width="100">店铺图片</th>
                                <th class="text-center" width="100">店铺地址</th>
                                <th class="text-center" width="100">公司名称</th>
                                <th class="text-center" width="100">审核状态</th>
                                <th class="text-center" width="100">行业名称</th>
                                <th class="text-center" width="100">加入状态</th>
                                <th class="text-center" width="150">加入时间</th>
                                <th class="text-center" width="150">过期时间</th>
                                <th class="text-center" width="130">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->username }}</td>
                                    <td class="text-center">
                                        @if($item->user_type == 10)
                                            <span class="text-navy">绿卡会员</span>
                                        @elseif($item->user_type == 20)
                                            <span class="text-danger">金卡会员</span>
                                        @elseif($item->user_type == 30)
                                            <span class="text-navy">黑金卡会员</span>
                                        @elseif($item->user_type == 40)
                                            <span class="text-danger">商家</span>
                                        @elseif($item->user_type == 50)
                                            <span class="text-navy">合伙人</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->phone }}</td>
                                    <td>
                                        <img src="{{ $item->member_head_image }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td class="text-center">{{ $item->shop_name }}</td>
                                    <td>
                                        <img src="{{ $item->shop_image }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td class="text-center">{{ $item->shop_address }}</td>
                                    <td class="text-center">{{ $item->company_name }}</td>
                                    <td class="text-center">
                                        @if($item->status == 10)
                                            <span class="text-navy">待审核</span>
                                        @elseif($item->status == 20)
                                            <span class="text-danger">审核通过</span>
                                        @elseif($item->status == 30)
                                            <span class="text-navy">审核不通过</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->industry_name }}</td>
                                    <td class="text-center">
                                        @if($item->add_status == 0)
                                            <span class="text-navy">待加入</span>
                                        @elseif($item->add_status == 1)
                                            <span class="text-danger">已加入</span>
                                        @elseif($item->add_status == 2)
                                            <span class="text-navy">已过期</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->add_time }}</td>
                                    <td class="text-center">{{ $item->expire_time }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="/admin/club/{{$item->id}}/edit">
                                                <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 审核</button>
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