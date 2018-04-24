@extends('admin.admin')
@section('content-header')
    <h1>
        温控管理
        <small>车辆温控</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">温控管理 - 车辆温控</li>
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
                        <label>订单号</label>
                        <input type="text" class="form-control" name="order_num" placeholder="" value="{{$search_list['order_num'] or ''}}">
                    </div>
                    <div class="col-xs-2">
                        <label>车牌号</label>
                        <input type="text" class="form-control" name="vehicle_num" placeholder="" value="{{$search_list['vehicle_num'] or ''}}">
                    </div>

                    <div class="col-xs-2">
                        <label>所属机构</label>
                        <input type="text" class="form-control" name="company_name" placeholder="" value="{{$search_list['company_name'] or ''}}">
                    </div>

                    <div class="col-xs-2">
                        <label>设备号</label>
                        <input type="text" class="form-control" name="uuid" placeholder="" value="{{$search_list['uuid'] or ''}}">
                    </div>
                   
                    <div class="search_but">
                        <button type="submit" class="btn btn-primary">搜索</button>
                        <a type="reset" href="{{url('admin.control.index')}}" class="cz-btn btn-danger">重置</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">温控列表</h3>
            <div class="box-tools">
                {{--<a href="{{url('')}}" class="btn btn-primary margin-bottom">添加新会员</a>--}}<br>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
                <tbody>
                <!--tr-th start-->
                <tr>
                    <th>操作</th>
                    <th>车牌号</th>
                    <th>设备号</th>
                    <th>订单号</th>
                    <th>所属机构</th>
                    <th>GPS时间</th>
                    <th>异常状态</th>
                    <th>行驶状态</th>
                    <th>温度区间</th>
                    <th>驾驶员</th>
                    <th>联系方式</th>
                    <th>当前位置</th>
                </tr>
                <!--tr-th end-->
                @foreach(($items ?? []) as $item)
                    <tr>
                        <td>
                            <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                            <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                        </td>
                        <td class="text-muted">{{$item->vehicle_num or ''}}</td>
                        <td class="text-muted">{{$item->uuid or ''}}</td>
                        <td class="text-muted">{{$item->order_num or ''}}</td>
                        <td class="text-muted">{{$item->company_name or ''}}</td>
                        <td class="text-muted">{{$item->gps_time or ''}}</td>
                        <td class="text-red">{{$item->is_abnormal or 0}}</td>
                        <td class="text-muted">{{$item->state or ''}}</td>
                        <td class="text-navy">{{$item->min_wen or ''}}℃-{{$item->max_wen or ''}}℃</td>
                        <td class="text-navy">{{$item->vehicle_num or ''}}</td>
                        <td class="text-navy">{{$item->vehicle_num or ''}}</td>
                        <td class="text-navy">{{$item->vehicle_num or ''}}</td>
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
                    id =  $(this).attr('data-id');
                    if (state == true) {
                        status = 1;
                    } else {
                        status = 2;
                    }
                    var url = "{{url('admin/user/change-status')}}" + '/' + id;
                    $.ajax({
                        url: url,
                        async: false,
                        method: 'post',
                        data : {'_token':'{{csrf_token()}}', status: status}
                    });
                }
            })
        })

    </script>
@endsection
