@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>会员升级金额设置</h5>
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
                                <input type="text" name="remark" class="form-control" placeholder="请输入描述" id="" value="{{ $request->remark }}">
                            </div>

                            <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                        </form>

                        <div class="head-tab" style="margin-left: 15px;">

                            <a href="{{route('upgradeprice.create')}}" class="btn btn-sm btn-primary" title="添加会员升级金额">
                                <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;添加会员升级金额</span>
                            </a>

                            <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="100">描述</th>
                                <th class="text-center" width="100">升级金额</th>
                                <th class="text-center" width="100">升级类型</th>
                                <th class="text-center" width="160">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->remark }}</td>
                                    <td class="text-center"><b>￥</b>{{ $item->money }}</td>
                                    <td class="text-center">
                                        @if($item->upgrade_type == 1)
                                            <span class="text-navy">金卡升级</span>
                                        @elseif($item->upgrade_type == 2)
                                            <span class="text-danger">黑金卡升级</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="/admin/upgradeprice/{{$item->id}}/edit">
                                                <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 编辑</button>
                                            </a>
                                            <a href="{{route('upgradeprice.destroy',$item->id)}}">
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