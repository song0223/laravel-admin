@extends('admin.admin')
@section('content-header')
    <h1>
        角色管理
        <small>注册角色</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">角色管理 - 注册角色</li>
    </ol>
@stop

@section('content')
    <h3 class="page-header"><a href="{{url('/admin/role/index')}}" class="btn btn-block btn-primary"
                               style="width:100px">返回</a></h3>
    <form action="{{url('/role/add')}}" method="post" value="{{csrf_token()}}">
        {{csrf_field()}}
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
            </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-group">
                            <label>角色名称</label>
                                <input type="text" class="form-control" id="inputName3" name="name" placeholder="name">
                        </div>

                        <div class="form-group">
                            <label>角色描述</label>
                                <input type="text" class="form-control" id="inputDesc3" name="desc" placeholder="desc">
                        </div>

                        <div class="form-group">
                            <label>权限分组</label>
                                <select name="permission_id[]" class="form-control" multiple="multiple">
                                    @foreach($list as $val)
                                        <option value="{!!$val->id!!}">{!!$val->name!!}</option>
                                    @endforeach
                                </select>
                        </div>

                    </div>
                <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info right">注册</button>
                    </div>
                </div>
        </div>
        <!-- /.box-footer -->
    </form>
@stop