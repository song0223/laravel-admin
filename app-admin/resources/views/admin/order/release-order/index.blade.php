@extends('admin.admin')
@section('content-header')
    <h1>
        订单管理
        <small>发布订单</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">订单管理 - 发布订单</li>
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
                        <label>会员手机号</label>
                        <input type="text" class="form-control" name="phone" placeholder=""
                               value="{{$search_list['phone'] or ''}}">
                    </div>
                    <div class="col-xs-2">
                        <label>订单编号</label>
                        <input type="text" class="form-control" name="order_number" placeholder=""
                               value="{{$search_list['order_number'] or ''}}">
                    </div>
                    <div class="col-xs-2">
                        <label>审核类型</label>
                        <select class="form-control" name="is_type">
                            <option value="">-- 请选择 --</option>
                            @foreach($type_map as $k => $type)
                                <option value="{{$k}}"
                                        @if(($search_list['is_type'] ?? 0) == $k) selected @endif
                                >{{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search_but">
                        <button type="submit" class="btn btn-primary">搜索</button>
                        <a type="reset" href="{{route('admin.order.release-order.index')}}"
                           class="cz-btn btn-danger">重置</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">发布订单列表</h3>
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
                    <th>会员</th>
                    <th>会员手机号</th>
                    <th>发布订单编号</th>
                    <th>货品名称</th>
                    <th>货品类型</th>
                    <th>货品数量</th>
                    <th>货品图片</th>
                    <th>取货地址</th>
                    <th>联系人</th>
                    <th>联系电话</th>
                    <th>取货时间</th>
                    <th>收货地址</th>
                    <th>收货人</th>
                    <th>收货电话</th>
                    <th>审核状态</th>
                    <th>备注</th>
                    <th>未通过理由</th>
                    <th>订单状态</th>
                    <th>取消理由</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                </tr>
                <!--tr-th end-->
                @foreach(($items ?? []) as $item)
                    <tr>
                        <td>
                            <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                            <a style="font-size: 16px" href="{{route('admin.order.release-order.delete', ['id' => $item->id])}}"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                        </td>
                        <td class="text-muted">{{$item->users->username or ''}}</td>
                        <td class="text-muted">{{$item->phone or ''}}</td>
                        <td class="text-muted">{{$item->order_number or ''}}</td>
                        <td class="text-muted">{{$item->good_name or 0}}</td>
                        <td class="text-muted">{{$item->good_type or 0}}</td>
                        <td class="text-muted">{{$item->good_num or 0}}</td>
                        <td class="text-muted">{{$item->good_img or 0}}</td>
                        <td class="text-muted">{{$item->q_add_id or 0}}</td>
                        <td class="text-muted">{{$item->q_name or 0}}</td>
                        <td class="text-muted">{{$item->q_tel or 0}}</td>
                        <td class="text-muted">{{$item->q_time or 0}}</td>
                        <td class="text-muted">{{$item->s_add_id or 0}}</td>
                        <td class="text-muted">{{$item->s_name or 0}}</td>
                        <td class="text-muted">{{$item->s_tel or 0}}</td>
                        <td class="text-muted">{{$item->is_type or 0}}</td>
                        <td class="text-muted">{{$item->desc or 0}}</td>
                        <td class="text-muted">{{$item->not_through or 0}}</td>
                        <td class="text-muted">{{$item->is_start or 0}}</td>
                        <td class="text-muted">{{$item->reason_id or 0}}</td>
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