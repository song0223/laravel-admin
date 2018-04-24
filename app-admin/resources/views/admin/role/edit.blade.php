@extends('admin.admin')
@section('content-header')
    <h1>
        角色管理
        <small>编辑角色</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">角色管理 - 编辑角色</li>
    </ol>
@stop

@section('content')
    <h3 class="page-header"><a href="{{url('/admin/role/index')}}" class="btn btn-block btn-primary"
                               style="width:100px">返回</a></h3>
    <form action="{{url('/role/edit')}}" method="post" value="{{csrf_token()}}">
        {{csrf_field()}}
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
            </ul>
            @foreach($list as $val)
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-group">
                            <label>角色名称</label>
                            <input type="hidden" class="form-control" name="id" value="{!!$val->id!!}"
                                   hidden="hidden">
                            <input type="text" class="form-control" id="inputName3" name="name"
                                   value="{!!$val->name!!}">
                        </div>

                        <div class="form-group">
                            <label>角色描述</label>
                            <input type="text" class="form-control" id="inputDesc3" name="desc"
                                   value="{!!$val->desc!!}">
                        </div>

                        <div class="form-group">
                            <label>权限分组</label>
                            <select name="permission_id[]" class="form-control" multiple="multiple">
                                @foreach($lis as $va)
                                    <option value="{!!$va->id!!}"
                                            @foreach(($val->per ?? []) as $v) @if($va->id ==$v->permission_id) selected @endif @endforeach>
                                        {!!$va->name!!}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                @endforeach
                <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info right">编辑</button>
                    </div>
                    <!-- /.box-footer -->
                </div>
        </div>
    </form>
@stop