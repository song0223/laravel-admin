@extends('admin.admin')
@section('content-header')
    <h1>
        订单管理
        <small>订单列表</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">订单管理 - 订单列表</li>
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
                        <label>车牌号</label>
                        <input type="text" class="form-control" name="vehicle_num" placeholder=""
                               value="{{$search_list['vehicle_num'] or ''}}">
                    </div>
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
                        <label>订单状态</label>
                        <select class="form-control" name="start">
                            <option value="">-- 请选择 --</option>
                            @foreach($status_map as $k => $type)
                                <option value="{{$k}}"
                                        @if(($search_list['is_start'] ?? 0) == $k) selected @endif
                                >{{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-2">
                        <label>付款状态</label>
                        <select class="form-control" name="is_pay">
                            <option value="">-- 请选择 --</option>
                            @foreach($is_pay_map as $k => $type)
                                <option value="{{$k}}"
                                        @if(($search_list['is_pay'] ?? 0) == $k) selected @endif
                                >{{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search_but">
                        <button type="submit" class="btn btn-primary">搜索</button>
                        <a type="reset" href="{{route('admin.order.order.index')}}"
                           class="cz-btn btn-danger">重置</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">订单列表</h3>
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
                    <th>订单号</th>
                    <th>发布订单编号</th>
                    <th>车牌号</th>
                    <th>会员手机</th>
                    <th>付款状态</th>
                    <th>支付方式</th>
                    <th>订单状态</th>
                    <th>是否异常</th>
                    <th>下单时间</th>
                    <th>货品名称</th>
                    <th>货物类型</th>
                    <th>货物数量</th>
                    <th>订单金额</th>
                    <th>发货地址</th>
                    <th>联系人</th>
                    <th>联系电话</th>
                    <th>发货时间</th>
                    <th>收货人</th>
                    <th>收货地址</th>
                    <th>收货电话</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                </tr>
                <!--tr-th end-->
                @foreach(($items ?? []) as $item)
                    <tr>
                        <td>
                            <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                            <a style="font-size: 16px" href="{{route('admin.order.order.delete', ['id' => $item->id])}}"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                        </td>
                        <td class="text-muted">{{$item->order_num or ''}}</td>
                        <td class="text-muted">{{$item->releaseOrder->order_number or ''}}</td>
                        <td class="text-muted">{{$item->vehicle_num or ''}}</td>
                        <td class="text-muted">{{$item->phone or ''}}</td>
                        <td class="text-muted">{{$item->is_pay or 0}}</td>
                        <td class="text-muted">{{$item->is_type or 0}}</td>
                        <td class="text-muted">{{$item->start or 0}}</td>
                        <td class="text-muted">{{$item->is_abnormal or 0}}</td>
                        <td class="text-muted">{{$item->order_time or 0}}</td>
                        <td class="text-muted">{{$item->orderInfo->goods_name or ''}}</td>
                        <td class="text-muted">{{$item->orderInfo->goods_type or ''}}</td>
                        <td class="text-muted">{{$item->orderInfo->goods_num or 0}}</td>
                        <td class="text-muted">{{$item->orderInfo->goods_total_price or 0}}</td>
                        <td class="text-muted">{{$item->str_start_address or ''}}</td>
                        <td class="text-muted">联系人</td>
                        <td class="text-muted">联系电话</td>
                        <td class="text-muted">{{$item->delivery_time or ''}}</td>
                        <td class="text-muted">{{$item->str_name or ''}}</td>
                        <td class="text-muted">{{$item->str_address or ''}}</td>
                        <td class="text-muted">{{$item->str_tel or ''}}</td>
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