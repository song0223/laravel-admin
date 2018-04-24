@extends('admin.admin')
@section('content-header')
    <h1>
        车辆信息管理
        <small>车辆信息</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">车辆信息管理 - 车辆信息</li>
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
                        <label>所属机构</label>
                        <select class="form-control" name="carriers_id" id="select2_sample">
                            @if(isset($search_list['carriers_id']))
                                <option value="{{$search_list['carriers_id']}}">{{$search_list['carriers_name']}}</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-xs-2">
                        <label>车牌号</label>
                        <input type="text" class="form-control" name="vehicle_num" placeholder=""
                               value="{{$search_list['vehicle_num'] or ''}}">
                    </div>
                    <div class="search_but">
                        <button type="submit" class="btn btn-primary">搜索</button>
                        <a type="reset" href="{{route('admin.basic-info.vehicle-info.index')}}"
                           class="cz-btn btn-danger">重置</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">车辆信息列表</h3>
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
                    <th>所属机构</th>
                    <th>车牌号</th>
                    <th>设备号</th>
                    <th>驾驶员姓名</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                </tr>
                <!--tr-th end-->
                @foreach(($items ?? []) as $item)
                    <tr>
                        <td>
                            <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                            <a style="font-size: 16px" href="{{route('admin.basic-info.vehicle-info.delete', ['id' => $item->id])}}"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                        </td>
                        <td class="text-muted">{{$item->carriers->username or ''}}</td>
                        <td class="text-muted">{{$item->vehicle_num or ''}}</td>
                        <td class="text-muted">{{$item->uuid or ''}}</td>
                        <td class="text-muted">{{$item->driver_name or 0}}</td>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $("#select2_sample").select2({
                ajax: {
                    delay: 500,
                    url: "{{route('admin.carriers-user.get-carriers-user')}}",//请求的API地址
                    dataType: 'json',//数据类型
                    data: function (params) {
                        return {
                            q: params.term,//此处是最终传递给API的参数
                        }
                    },
                    results: function (data) {
                        return data;
                    }//返回的结果

                },
                placeholder:'请选择',
                minimumInputLength: 1,
                language: "zh-CN"
            });//启动select2
            $('#select2_sample').val(['{{$search_list['carriers_id'] or 0}}']).trigger('change');
        });
    </script>
@endsection