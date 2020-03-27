@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>消息列表</h5>
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
                                    <select class="form-control" name="target_type">
                                        <option value="">目标人群</option>
                                        <option value="1">所有用户</option>
                                        <option value="2">绿卡会员</option>
                                        <option value="3">金卡会员</option>
                                        <option value="4">黑金卡会员</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group draggable">
                                <div class="col-sm-9">
                                    <select class="form-control" name="push_type">
                                        <option value="">推送平台</option>
                                        <option value="1">IOS</option>
                                        <option value="2">Android</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group draggable">
                                <div class="col-sm-9">
                                    <select class="form-control" name="status">
                                        <option value="">发送状态</option>
                                        <option value="0">未发送</option>
                                        <option value="1">已发送</option>
                                        <option value="3">发送失败</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="请输入消息名称" id="" value="{{ $request->name }}">
                            </div>


                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <a href="{{route('message.create')}}" class="btn btn-sm btn-primary" title="添加消息">
                                <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;添加消息</span>
                            </a>

                            <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="130">消息名称</th>
                                <th class="text-center" width="100">推送平台</th>
                                <th class="text-center" width="100">目标人群</th>
                                <th class="text-center" width="100">省份</th>
                                <th class="text-center" width="100">城市</th>
                                <th class="text-center" width="100">区/县</th>
                                <th class="text-center" width="100">发送类型</th>
                                <th class="text-center" width="100">发送状态</th>
                                <th class="text-center" width="150">时间</th>
                                <th class="text-center" width="130">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">
                                        @if($item->push_type == 1)
                                            <span class="text-navy">IOS</span>
                                        @elseif($item->push_type == 2)
                                            <span class="text-danger">Android</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->target_type == 1)
                                            <span class="text-navy">所有用户</span>
                                        @elseif($item->target_type == 2)
                                            <span class="text-danger">绿卡会员</span>
                                        @elseif($item->target_type == 3)
                                            <span class="text-navy">金卡会员</span>
                                        @elseif($item->target_type == 4)
                                            <span class="text-danger">黑金卡会员</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->province }}</td>
                                    <td class="text-center">{{ $item->city }}</td>
                                    <td class="text-center">{{ $item->district }}</td>
                                    <td class="text-center">
                                        @if($item->send_type == 1)
                                            <span class="text-navy">立即发送</span>
                                        @elseif($item->send_type == 2)
                                            <span class="text-danger">定时发送</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->status == 0)
                                            <span class="text-danger">未发送</span>
                                        @elseif($item->status == 1)
                                            <span class="text-navy">已发送</span>
                                        @elseif($item->status == 3)
                                            <span class="text-danger">发送失败</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="/admin/message/{{$item->id}}/edit">
                                                <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 发送消息</button>
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