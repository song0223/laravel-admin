<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Session;

class CaptchaController extends BaseController
{
    public function index($tmp)
    {
        //生成验证码图片的Builder对象，配置相应属性
        $phraseBuilder = new PhraseBuilder(4, '0123456789');
        $builder = new CaptchaBuilder(null, $phraseBuilder);
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        Session::flash('milkcaptcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
}