@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>管理员列表</h5>
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
                                <input type="text" name="user_name" class="form-control" placeholder="请输入管理员名称" id="" value="{{ $request->user_name }}">
                            </div>

                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="请输入邮箱" id="" value="{{ $request->email }}">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <a href="{{route('user.create')}}" class="btn btn-sm btn-primary" title="添加管理员">
                                <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;添加管理员</span>
                            </a>

                            <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="100">名称</th>
                                <th class="text-center" width="100">邮箱</th>
                                <th class="text-center" width="100">电话</th>
                                <th class="text-center" width="100">状态</th>
                                <th class="text-center" width="100">创建时间</th>
                                <th class="text-center" width="160">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->user_id }}</td>
                                    <td class="text-center">{{ $item->user_name }}</td>
                                    <td class="text-center">{{ $item->email }}</td>
                                    <td class="text-center">{{ $item->phone }}</td>
                                    <td class="text-center">
                                        @if($item->status == 1)
                                            <span class="text-navy">启用</span>
                                        @elseif($item->status == 0)
                                            <span class="text-danger">禁用</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="/admin/user/{{$item->user_id}}/edit">
                                                <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 编辑</button>
                                            </a>
                                            <a href="{{ url('admin/user/auth/'.$item->user_id) }}">
                                                <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 授权</button>
                                            </a>
                                            <a href="/admin/user/{{$item->user_id}}">
                                                <button class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash-o"></i> 删除</button>
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