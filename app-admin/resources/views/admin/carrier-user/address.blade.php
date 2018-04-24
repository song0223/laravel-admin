@extends('admin.admin')
@section('content-header')
    <h1>
        司机/承运商管理
        <small>货主地址</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active"><a href="{{route('admin.carriers-user.index')}}">司机/承运商管理</a> - 司机/承运商地址</li>
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
                        <input type="text" class="form-control" name="phone" placeholder=""
                               value="{{$search_list['phone'] ?? ''}}">
                    </div>
                    <div class="col-xs-2">
                        <label>地址类型</label>
                        <select class="form-control" name="status">
                            <option value="">-- 请选择 --</option>
                            @foreach($status_map as $k => $cert)
                                <option value="{{$k}}"
                                        @if(($search_list['status'] ?? 0) == $k) selected @endif
                                >{{$cert}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search_but">
                        <button type="submit" class="btn btn-primary">搜索</button>
                        <a type="reset" href="{{route('admin.carriers-user.address', ['id' => $id ?? 0])}}" class="cz-btn btn-danger">重置</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">司机/承运商地址列表</h3>
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
                    <th>名称</th>
                    <th>取/发货地址</th>
                    <th>地址状态</th>
                    <th>是否默认</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                </tr>
                <!--tr-th end-->
                @foreach(($items ?? []) as $item)
                    <tr>
                        <td>
                            <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                            <a style="font-size: 16px" href="{{route('admin.user.address.delete', ['id' => $item->id, 'user_id' => $id])}}"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                        </td>
                        <td class="text-muted">{{$item->phone or ''}}</td>
                        <td class="text-muted">{{$item->name or ''}}</td>
                        <td class="text-muted">{{$item->province->name.$item->city->name.$item->area->name.$item->address}}</td>
                        <td class="text-muted">{{$item::statusMap($item->start)}}</td>
                        <td class="text-muted">{{$item::typeMap($item->is_type)}}</td>
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
