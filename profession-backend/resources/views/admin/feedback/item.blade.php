@extends("admin.layouts.layout")

@section("content")

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-content p-xl">
                <div class="row">

                    <div class="col-sm-6">
                        <h4>会员昵称：</h4>
                        <h4 class="text-navy">{{ $info->username }}</h4><br>
                        <h4>会员账号：</h4>
                        <h4 class="text-danger">{{ $info->account }}</h4><br>
                        <h4>反馈内容：</h4>
                        <h4 >{{ $info->content }}</h4><br>
                    </div>

                </div>

                <div class="table-responsive m-t" style="width: 30%;">
                    <table class="table table-striped table-bordered table-hover m-t-md">
                        <thead>
                        <tr>
                            <th class="text-center" width="80">ID编号</th>
                            <th class="text-center" width="80">反馈ID</th>
                            <th class="text-center" width="130">反馈图片</th>
                            <th class="text-center" width="150">反馈时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $k => $v)
                        <tr>
                            <td class="text-center">{{ $v->id }}</td>
                            <td class="text-center">{{ $v->feed_back_id }}</td>
                            <td class="text-center"><img src="{{ $v->feed_image }}" alt="" width="130px" height="130px"></td>

                            <td class="text-center">{{ $v->created_at }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="text-right">
                    <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
                </div>

                <div class="well m-t"><strong>注释：</strong> 用户反馈详情。
                </div>
            </div>
        </div>
    </div>

@endsection