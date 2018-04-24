@extends('admin.admin')
@section('content-header')
    <h1>
        基础管理
        <small>设置保证金</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">基础管理 -  设置保证金</li>
    </ol>
@stop

@section('content')
    <h3 class="page-header"><a href="{{url('/cancel/m_index')}}" class="btn btn-block btn-primary" style="width:100px">返回</a></h3>
    <div class="box box-primary">
       
        <div class="col-md-6" style="margin-left:20%">
          <!-- Horizontal Form -->
          <div class="box box-info">
           
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{url('/cancel/m_edit')}}" method="post" value="{{csrf_token()}}">
              {{csrf_field()}}
              @foreach($list as $val)
              <div class="box-body">
                <div class="form-group">
                  <label for="inputName3" class="col-sm-2 control-label">保证金</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control"  name="id" value="{!!$val->id!!}" hidden="hidden">
                    <input type="text" class="form-control" id="inputName3" name="money" value="{!!$val->money!!}">
                  </div>
                </div>
              </div>
              @endforeach
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">编辑</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

    </div>
@stop