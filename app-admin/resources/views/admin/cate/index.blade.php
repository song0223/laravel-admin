@extends('admin.admin')
@section('content-header')
    <h1>
        基础管理
        <small>设置货物品类</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">基础管理 -  设置品类</li>
    </ol>
@stop

@section('content')
    <a href="{{url('cate/add')}}" class="btn btn-primary margin-bottom">新增货物品类</a>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">品类列表</h3>
            <div class="box-tools">
                <!-- <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm pull-right" name="s_title"
                               style="width: 150px;" placeholder="搜索角色">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form> -->
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
                <tbody>
                <!--tr-th start-->
                <tr>
                    <th>操作</th>
                    <th>品类名称</th>
                    <th>发布时间</th>
                    <th>更新时间</th>
                </tr>
                <!--tr-th end-->
                @foreach($list as $val)
                <tr>
                    <td>
                        <a style="font-size: 16px" onclick="return confirm('确定要编辑吗？');" href="{!!url('cate/edit')!!}?id={!!$val->id!!}"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                        <a style="font-size: 16px" onclick="return confirm('确定要删除吗？');" href="{!!url('cate/del')!!}?id={!!$val->id!!}"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                    </td>
                    <td class="text-muted">{!!$val->cate_name!!}</td>
                    <td class="text-navy">{!!$val->created_at!!}</td>
                    <td class="text-navy">{!!$val->updated_at!!}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop