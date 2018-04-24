@extends('admin.admin')
@section('content-header')
    <h1>
        基础管理
        <small>设置订单异常</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">基础管理 -  设置订单异常</li>
    </ol>
@stop

@section('content')
    <a href="{{url('cancel/add')}}" class="btn btn-primary margin-bottom">新增订单异常问题</a>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">异常问题列表</h3>
            <div class="box-tools">
                <form action="{{url('cancel/index')}}" method="get">
                    <div class="input-group">
                        <select class="form-control input-sm pull-right" name="type" style="width:100px">
                            <option value="">-- 请选择 --</option>
                            <option value="1" @if($arr['type']=='1') selected="" @endif>订单异常</option>
                            <option value="2" @if($arr['type']=='2') selected="" @endif>订单取消</option>
                        </select>
                        <div class="input-group-btn">
                            <button style="margin-top:-1.5px" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="input-group-btn">
                            <button style="margin-top:-1.5px" class="btn btn-sm btn-default"><a style="color:#F0F8FF" href="{{url('cancel/index')}}">重置</a></button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
                <tbody>
                <!--tr-th start-->
                <tr>
                    <th>操作</th>
                    <th>异常问题</th>
                    <th>所属上级</th>
                    <th>发布时间</th>
                    <th>更新时间</th>
                </tr>
                <!--tr-th end-->
                @foreach($list as $val)
                <tr>
                    <td>
                        <a style="font-size: 16px" onclick="return confirm('确定要编辑吗？');" href="{!!url('cancel/edit')!!}?id={!!$val->id!!}"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                        <a style="font-size: 16px" onclick="return confirm('确定要删除吗？');" href="{!!url('cancel/del')!!}?id={!!$val->id!!}"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                    </td>
                    <td class="text-muted">{!!$val->cancel_name!!}</td>
                    <td class="text-muted">
                        @if($val->type==1)
                        订单异常
                        @else
                        订单取消
                        @endif
                    </td>
                    <td class="text-navy">{!!$val->created_at!!}</td>
                    <td class="text-navy">{!!$val->updated_at!!}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div style="margin-left:85%">
                {{$list->appends($arr)->links()}}
            </div>
        </div>
    </div>
@stop