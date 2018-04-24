@extends('admin.admin')
@section('content-header')
    <h1>
        承运商/司机管理
        <small>资质审核</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">承运商/司机管理 - 资质审核</li>
    </ol>
@stop

@section('content')
    <p class="page-header">
        <a type="reset" href="{{route('admin.carriers-user.index')}}" style="width:100px"
                              class="btn btn-primary">返回</a>
    </p>
    <form method="POST" action="#" accept-charset="utf-8">
        {!! csrf_field() !!}
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="form-group">
                        <label>单位名称
                        </label>
                        <input value="{{$cert_info->company_name or ''}}" type="text" class="form-control" name="name"
                               autocomplete="off" maxlength="80" placeholder="单位名称">
                    </div>
                    <div class="form-group">
                        <label>纳税人识别号
                        </label>
                        <input value="{{$cert_info->tax_num or ''}}" type="text" class="form-control" name="email"
                               autocomplete="off" maxlength="80" placeholder="纳税人识别号">
                    </div>
                    <div class="form-group">
                        <label>注册地址
                        </label>
                        <input value="{{$cert_info->reg_address or ''}}" type="text" class="form-control" name="email"
                               autocomplete="off" maxlength="80" placeholder="注册地址">
                    </div>
                    <div class="form-group">
                        <label>注册电话
                        </label>
                        <input value="{{$cert_info->reg_tel or ''}}" type="text" class="form-control" name="email"
                               autocomplete="off" maxlength="80" placeholder="注册电话">
                    </div>
                    <div class="form-group">
                        <label>开户银行
                        </label>
                        <input value="{{$cert_info->bank or ''}}" type="text" class="form-control" name="email"
                               autocomplete="off" maxlength="80" placeholder="开户银行">
                    </div>
                    <div class="form-group">
                        <label>银行账户
                        </label>
                        <input value="{{$cert_info->bank_account or ''}}" type="text" class="form-control" name="email"
                               autocomplete="off" maxlength="80" placeholder="银行账户">
                    </div>
                    <div class="form-group">
                        <label>营业执照
                        </label>
                        <img src="">
                    </div>
                    @if($cert_info->is_audit != $cert_info::CHECK_YES)
                        <div class="form-group" id="not_through" style="display: none">
                            <label>不通过理由
                            </label>
                            <input value="{{$cert_info->bank_account or ''}}" required="required" type="text"
                                   class="form-control" name="not_through" autocomplete="off" maxlength="80"
                                   placeholder="请填写不通过理由">
                        </div>
                </div>
                <a href="{{route('admin.carriers-user.change-audit', ['id' => $cert_info->id, 'audit' => $cert_info::CHECK_YES])}}"
                   class="btn btn-primary">审核通过</a>
                <a id="through" type="reset" class="cz-btn btn-danger">审核不通过</a>
                @endif
            </div>
        </div>
    </form>
@stop
@section('other-js')
    <script>
        $('#through').click(function () {
            if ($('#not_through').css('display') == 'block') {
                var content = $("input[name='not_through']").val();
                window.location.href = '{{route('admin.carriers-user.change-audit', ['id' => $cert_info->id, 'audit' => $cert_info::CHECK_NO])}}' + '?not_through=' + content;
            }
            $('#not_through').css('display', 'block');
        })
    </script>
@endsection