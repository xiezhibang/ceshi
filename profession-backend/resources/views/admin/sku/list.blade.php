@extends("admin.layouts.layout")

@section("content")

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>商品SKU列表</h5>
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
                            <input type="text" name="sku_name" class="form-control" placeholder="请输入名称" id="" value="{{ $request->sku_name }}">
                        </div>

                        <input type="submit" value="查询" class="btn btn-primary" style="margin-top: 6px;margin-right: 15px;">

                    </form>

                    <div class="head-tab" style="margin-left: 15px;">

                        <a href="" class="btn btn-sm btn-primary" title="商品SKU列表">
                            <i class="fa fa-plus-circle"></i><span class="hidden-xs">&nbsp;&nbsp;商品SKU列表</span>
                        </a>

                        <span class="x-right" style="line-height:40px">共有数据：{{ $results->total() }} 条</span>
                    </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover m-t-md">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">ID</th>
                                <th class="text-center" width="100">用户ID</th>
                                <th class="text-center" width="130">会员昵称</th>
                                <th class="text-center" width="100">商品规格ID</th>
                                <th class="text-center" width="100">商品规格名称</th>
                                <th class="text-center" width="100">SKU名称</th>
                                <th class="text-center" width="100">积分或价格</th>
                                <th class="text-center" width="100">库存</th>
                                <th class="text-center" width="100">商品类型</th>
                                <th class="text-center" width="160">创建时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $k => $item)
                            <tr>
                                <td class="text-center">{{ $item->id }}</td>
                                <td class="text-center">{{ $item->user_id }}</td>
                                <td class="text-center">{{ $item->username }}</td>
                                <td class="text-center">{{ $item->attribute_id }}</td>
                                <td class="text-center">{{ $item->attribute_name }}</td>
                                <td class="text-center">{{ $item->sku_name }}</td>
                                <td class="text-center">{{ $item->money }}</td>
                                <td class="text-center">{{ $item->stock }}</td>
                                <td class="text-center">{{ $item->type }}</td>
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