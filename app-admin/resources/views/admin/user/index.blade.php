@extends('admin.admin')
@section('content-header')
    <h1>
        货主管理
        <small>货主</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">货主管理 - 货主</li>
    </ol>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">搜索</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <form class="">
                    <div class="col-xs-2">
                        <label>手机号</label>
                        <input type="text" class="form-control" name="user_tel" placeholder=""
                               value="{{$search_list['user_tel'] ?? ''}}">
                    </div>
                    <div class="col-xs-2">
                        <label>姓名</label>
                        <input type="text" class="form-control" name="username" placeholder=""
                               value="{{$search_list['username'] ?? ''}}">
                    </div>
                    <div class="col-xs-2">
                        <label>会员类型</label>
                        <select class="form-control" name="user_type">
                            <option value="">-- 请选择 --</option>
                            @foreach($type_map as $k => $type)
                                <option value="{{$k}}"
                                        @if(($search_list['user_type'] ?? 0) == $k) selected @endif
                                >{{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-2">
                        <label>是否认证</label>
                        <select class="form-control" name="is_cert">
                            <option value="">-- 请选择 --</option>
                            @foreach($cert_map as $k => $cert)
                                <option value="{{$k}}"
                                        @if(($search_list['is_cert'] ?? 0) == $k) selected @endif
                                >{{$cert}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-2">
                        <label>是否审核</label>
                        <select class="form-control" name="is_audit">
                            <option value="">-- 请选择 --</option>
                            @foreach($audit_map as $k => $cert)
                                <option value="{{$k}}"
                                        @if(($search_list['is_audit'] ?? 0) == $k) selected @endif
                                >{{$cert}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search_but">
                        <button type="submit" class="btn btn-primary">搜索</button>
                        <a type="reset" href="{{route('admin.user.index')}}" class="cz-btn btn-danger">重置</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">货主列表</h3>
            <div class="box-tools">
                {{--<a href="{{url('admin/article/show')}}" class="btn btn-primary margin-bottom">添加新会员</a>--}}<br>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
                <tbody>
                <!--tr-th start-->
                <tr>
                    <th>操作</th>
                    <th>手机号</th>
                    <th>货主姓名</th>
                    <th>公司名称</th>
                    <th>公司地址</th>
                    <th>账户余额</th>
                    <th>用户信誉度</th>
                    <th>注册码</th>
                    <th>是否认证</th>
                    <th>资质认证信息</th>
                    <th>资质认证审核</th>
                    <th>取/发货地址</th>
                    <th>使用状态</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                </tr>
                <!--tr-th end-->
                @foreach(($items ?? []) as $item)
                    <tr>
                        <td>
                            <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                            <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                        </td>
                        <td class="text-muted">{{$item->user_tel or ''}}</td>
                        <td class="text-muted">{{$item->username or ''}}</td>
                        <td class="text-muted">{{$item->company_name or ''}}</td>
                        <td class="text-muted">{{$item->address or ''}}</td>
                        <td class="text-muted">{{$item->y_amount or ''}}</td>
                        <td class="text-muted">{{$item->credibility or ''}}</td>
                        <td class="text-muted">{{$item->user_code or ''}}</td>
                        <td class="text-muted">{{$item::certMap($item->is_cert)}}</td>
                        <td class="text-muted"><a href="{{route('admin.user.cert', ['id' => $item['id']])}}">查看</a></td>
                        <td class="text-muted">{{$item::checkMap($item->is_audit)}}</td>
                        <td class="text-muted"><a href="{{route('admin.user.address', ['id' => $item['id']])}}">查看</a></td>
                        <td class="text-muted"><input data-id="{{$item->id}}" name="status" type="checkbox"
                                                      @if($item->is_type == $item::YES) checked @endif></td>
                        <td class="text-navy">{{$item->created_at or ''}}</td>
                        <td class="text-navy">{{$item->updated_at or ''}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{--分页--}}
        @if(!$items->isEmpty())
            <div class="patials-paging">
                {!! $items->appends($search_list)->render() !!}
            </div>
        @endif
    </div>
@stop
@section('other-js')
    <script>
        $(function () {
            $('[name="status"]').bootstrapSwitch({
                onText: "启用",
                offText: "禁用",
                onColor: "success",
                offColor: "info",
                size: "small",
                onSwitchChange: function (event, state) {
                    var status;
                    var id;
                    id = $(this).attr('data-id');
                    if (state == true) {
                        status = 1;
                    } else {
                        status = 2;
                    }
                    var url = "{{url('admin/user/change-status')}}";
                    $.ajax({
                        url: url,
                        async: false,
                        method: 'post',
                        data: {'_token': '{{csrf_token()}}', status: status, id: id}
                    });
                }
            })
        })

    </script>
@endsection