@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>行业分类列表</h5>
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
                                <input type="text" name="cate_name" class="form-control" placeholder="请输入名称" id="" value="{{ $request->cate_name }}">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <a href="{{route('industry.create')}}" class="btn btn-sm btn-primary" title="添加行业分类">
                                <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;添加行业分类</span>
                            </a>

                            <span class="x-right" style="line-height:40px">共有数据：{{ $data->total() }} 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="100">分类名称</th>
                                <th class="text-center" width="100">父级ID</th>
                                <th class="text-center" width="100">状态</th>
                                <th class="text-center" width="100">排序</th>
                                <th class="text-center" width="100">店铺数量</th>
                                <th class="text-center" width="150">创建时间</th>
                                <th class="text-center" width="150">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">
                                        {{str_repeat('|-----',$item->level)}}{{$item->cate_name}}
                                    </td>
                                    <td class="text-center">{{ $item->cate_pid }}</td>
                                    <td class="text-center">
                                        @if($item->status == 10)
                                            <span class="text-navy">显示</span>
                                        @elseif($item->status == 20)
                                            <span class="text-navy">隐藏</span>
                                        @elseif($item->status == 30)
                                            <span class="text-danger">删除</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->cate_order }}</td>
                                    <td class="text-center">{{ $item->shop_num }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="/admin/industry/{{$item->id}}/edit">
                                                <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 编辑</button>
                                            </a>
                                            <a href="{{route('industry.destroy',$item->id)}}">
                                                <button class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash-o"></i> 删除</button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$data->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection