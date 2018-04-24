@extends('admin.layout.base')


@section('master.main')
    <link rel="stylesheet" href="{{url('css/admin.css')}}">
    <div class="top">
        <div class="logo">
            <img src='{{url('images/1.png')}}' alt="">
            <span class="text">元一官网</span>
        </div>
        <div class="content1">
            <img class="back_img" src="{{url('img/background1.jpg')}}" alt="">
            <div class="input">
                <img class="back2" src="{{url('img/background2.png')}}" alt="">
                <form id="form" method="POST">
                    <div class="login1">
                        <div class="top_txt">
                            @if (count($errors) > 0)
                                <span class="error-alert" style="color: red">
                                    @foreach ($errors->all() as $key => $error)
                                        {{$key + 1}}、 {{ $error }}
                                    @endforeach
                                </span>
                            @endif
                            <div class="form-group">
                                账户Account Number<br>
                                <input type="text" class="form-control" name="name" placeholder="帐号"
                                       value="{{old('name')}}"
                                       data-validation="required length"
                                       data-validation-length="max20"
                                       data-validation-error-msg="请输入帐号"/>
                            </div>
                            <div class="form-group">
                                密码 Password<br>
                                <input type="password" class="form-control" name="password" placeholder="密码"
                                       value="{{old('name')}}"
                                       data-validation="required length"
                                       data-validation-length="max20"
                                       data-validation-error-msg="请输入帐号"/>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                验证码 Verification Code<br>
                                <input style="width: 44%" type="text" name="captcha" class="form-control"
                                       placeholder="验证码">
                                <a style="position: absolute;left: 45%;top: 55%" onclick="javascript:re_captcha();">
                                    <img src="{{ URL('/captcha/1') }}" alt="验证码" title="刷新图片" width="100" height="40"
                                         id="verify" border="0">
                                </a>
                            </div>
                            <div class="txt">
                                <input type="radio" name="remember_me" value="1"> 记住密码
                            </div>
                            <div class="txt"><input class="submit" type="submit" value=""></div>
                        </div>
                    </div>
                </form>
            </div>
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

@section('login-js')
    <script>
        /* 屏幕大小 */
        var hi = $(window).height();
        $(".content1").css("height",hi);
    </script>
@endsection
