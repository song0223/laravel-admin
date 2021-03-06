@extends('admin.admin')
@section('content-header')
    <h1>
        用户管理
        <small>注册管理员</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">用户管理 - 注册管理员</li>
    </ol>
@stop

@section('content')
    <a href="{{route('admin.user.edit', ['id' => 0])}}" class="btn btn-primary margin-bottom">新增管理员</a>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">搜索</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <form class="">
                    <div class="col-xs-2">
                        <label>手机号</label>
                        <input type="text" class="form-control" name="name" placeholder=""
                               value="{{$search_list['name'] or ''}}">
                    </div>
                    <div class="search_but">
                        <button type="submit" class="btn btn-primary">搜索</button>
                        <a type="reset" href="{{route('admin.user.index')}}" class="cz-btn btn-danger">重置</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="box-header with-border">
            <h3 class="box-title">管理员列表</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
                <tbody>
                <!--tr-th start-->
                <tr>
                    <th>操作</th>
                    <th>昵称</th>
                    <th>邮箱</th>
                    <th>发布时间</th>
                    <th>更新时间</th>
                </tr>
                <!--tr-th end-->
                @foreach(($items ?? []) as $item)
                    <tr>
                        <td>
                            <a style="font-size: 16px" href="{{route('admin.user.edit', ['id' => $item['id']])}}"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                            <a style="font-size: 16px" onclick="return confirm('确定要删除吗？');" href="{{route('admin.user.delete', ['id' => $item['id']])}}"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                        </td>
                        <td class="text-muted">{{$item->name or ''}}</td>
                        <td class="text-muted">{{$item->email or ''}}</td>
                        <td class="text-navy">{{$item->created_at or ''}}</td>
                        <td class="text-navy">{{$item->updated_at or ''}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop