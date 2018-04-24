@extends('admin.admin')
@section('content-header')
    <h1>
        财务管理
        <small>账户资金明细列表</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">财务管理 - 账户资金明细列表</li>
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
                        <select class="form-control" name="user_id" id="select2_sample">
                            @if(isset($search_list['user_id']))
                                <option value="{{$search_list['user_id']}}">{{$search_list['user_name']}}</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-xs-2">
                        <label>会员手机号</label>
                        <input type="text" class="form-control" name="phone" placeholder=""
                               value="{{$search_list['phone'] or ''}}">
                    </div>
                    <div class="col-xs-2">
                        <label>变动类型</label>
                        <select class="form-control" name="change_type">
                            <option value="">-- 请选择 --</option>
                            @foreach($change_map as $k => $type)
                                <option value="{{$k}}"
                                        @if(($search_list['change_type'] ?? 0) == $k) selected @endif
                                >{{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-2">
                        <label>支付方式</label>
                        <select class="form-control" name="pay_type">
                            <option value="">-- 请选择 --</option>
                            @foreach($pay_map as $k => $type)
                                <option value="{{$k}}"
                                        @if(($search_list['pay_type'] ?? 0) == $k) selected @endif
                                >{{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search_but">
                        <button type="submit" class="btn btn-primary">搜索</button>
                        <a type="reset" href="{{route('admin.order.money-detail.index')}}"
                           class="cz-btn btn-danger">重置</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">账户资金明细列表</h3>
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
                    <th>会员名称</th>
                    <th>手机号</th>
                    <th>会员类型</th>
                    <th>所属机构</th>
                    <th>变动金额</th>
                    <th>支付方式</th>
                    <th>变动类型</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                </tr>
                <!--tr-th end-->
                @foreach(($items ?? []) as $item)
                    <tr>
                        <td>
                            <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                            <a style="font-size: 16px" href="{{route('admin.order.money-detail.delete', ['id' => $item->id])}}"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                        </td>
                        <td class="text-muted">{{$item->carriersUser->username or ''}}</td>
                        <td class="text-muted">{{$item->phone or ''}}</td>
                        <td class="text-muted">{{$item::typeMap($item->user_type)}}</td>
                        <td class="text-muted">{{$item->carriersUser->company_name or ''}}</td>
                        <td class="text-red">{{$item->bd_money}}</td>
                        <td class="text-muted">{{$item::payMap($item->pay_type)}}</td>
                        <td class="text-muted">{{$item::changeMap($item->change_type)}}</td>
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
            $('#select2_sample').val(['{{$search_list['user_id'] or 0}}']).trigger('change');
        });
    </script>
@endsection