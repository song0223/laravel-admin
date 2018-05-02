@extends('admin.layout.base')


@section('master.main')
    <div class="login-box">
        @if (count($errors) > 0)
            <p class="error-alert">
                @foreach ($errors->all() as $key => $error)
                    {{$key + 1}}、 {{ $error }}
                @endforeach
            </p>
        @endif
        <div class="login-logo">
            <a href="#"><img src="{{url('images/2.png')}}"></a>
        </div>
        <div class="login-box-body">
            <form id="form" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="帐号"
                           value="{{old('name')}}"
                           data-validation="required length"
                           data-validation-length="max20"
                           data-validation-error-msg="请输入帐号"/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="密码"
                           value=""
                           data-validation="required length"
                           data-validation-length="20"
                           data-validation-error-msg="请输入密码"/>
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <input type="text" name="captcha" class="form-control" placeholder="验证码">
                    <a onclick="javascript:re_captcha();">
                        <img src="{{ URL('/captcha/1') }}" alt="验证码" title="刷新图片" width="100" height="40" id="verify" border="0">
                    </a>
                </div>
                <button type="submit" class="btn btn-primary btn-block">登录</button>
            </form>
        </div>
    </div>
    <script>
        function re_captcha() {
            $url = "{{ URL('/captcha') }}";
            $new_url = $url + "/" + Math.random();
            document.getElementById('verify').src = $new_url;
        }
    </script>
@overwrite
