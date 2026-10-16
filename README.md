> ## ⚠️ 安全维护分支说明（1.9 / PHP 7.2-8.5 + Laravel 7-12）
>
> 本仓库是 `z-song/laravel-admin` 的**安全维护分支**（原作者已停止维护），由 `v1.8.19` 基线升级而来。包名已改为 **`song0223/laravel-admin`**，并通过 `replace` 兼容旧包名 `encore/laravel-admin`（`laravel-admin-ext/*` 等旧扩展照常工作）；**代码命名空间仍为 `Encore\Admin`，项目代码零改动**。
>
> ### ✨ 本分支新增功能（官方没有的）
>
> `hasMany` 嵌套表单两大增强，**直接内置、无需装扩展**（详细用法见 [docs/hasmany-features.md](docs/hasmany-features.md)）：
>
> **1. 嵌套行内条件显示（when）** —— 按行内 Radio 的选中值，动态显示/隐藏同一行的其它字段，行与行之间完全隔离：
>
> ```php
> $form->radio('format', '形式')->options([...])->default('纸质书')
>     ->when('电子书', function (NestedForm $form) {
>         $form->text('download_url', '下载地址');
>     });
> ```
>
> **2. 嵌套行内多图上传**（上传 / 拖拽排序 / 单张删除）—— 图片路径以 JSON 数组存入嵌套行字段，排序随表单保存、单张删除即时落库：
>
> ```php
> $form->hasmanyMultipleImage('banner', '封面图');
> ```
>
> ### 修复的安全漏洞（官方至今未修复，含 v1.8.19）
>
> **HandleController 未授权任意类实例化 RCE**（攻击者已在生产环境实战利用）：
>
> 1. **`src/Controllers/HandleController.php`**
>    - 新增 `assertAuthenticated()`：`_handle_form_` / `_handle_action_` / `_handle_selectable_` / `_handle_renderable_` 四个入口先验 Admin guard 登录，未登录返回 403；
>    - 新增 `assertAllowedClass()`：动态实例化的类必须在 `App\` 或 `Encore\Admin\` 命名空间下（类白名单），阻断 `GuzzleHttp\Client` 等任意类实例化 SSRF/RCE。
> 2. **`src/Middleware/Pjax.php`**
>    - `handleErrorResponse()` 对 `$response->exception` 为 `null` 的错误响应做友好展示，替代原版 `get_class(null)` 把真实错误放大成 500 并吞掉原始信息的问题。
>
> ### 其它实测修复
>
> - 多图**单张删除**改为按图片路径精确移除（修复错删），删除端点三层加固（Model 校验/列名校验/鉴权）
> - 多图**拖拽排序**修复重复图片问题（order key 分类解析：路径=已有图、init_N=新上传图）
> - 多图上传逐文件防御：0 字节/无效文件跳过并日志留痕，图片处理失败降级直存原文件
>
> ### 1.9 相对 v1.8.19 的兼容性升级
>
> - 支持 **PHP 7.2 ~ 8.5**（修复动态属性 deprecation 等，签名保持 PHP 7.x 兼容写法）
> - 支持 **Laravel 7 ~ 12**（`symfony/dom-crawler ^6|^7`、`doctrine/dbal 4` 依赖矩阵更新）
> - 已验证组合：PHP 8.5 + Laravel 12、PHP 7.4 + Laravel 8、PHP 7.4 + Laravel 7（含 laravel-admin-ext 扩展共存）
> - 稳定线：`v1.8.19-secure` 分支/tag（仅安全补丁、不改依赖），保守项目可继续使用
>
> ### 使用方式
>
> ```json
> "repositories": [
>     {"type": "vcs", "url": "https://github.com/song0223/laravel-admin"}
> ],
> "require": {
>     "song0223/laravel-admin": "^1.9"
> }
> ```
>
> 旧项目从 `encore/laravel-admin` 迁移：直接把 require 改为上面的写法即可，`Encore\Admin` 命名空间与全部 API 保持不变。

<p align="center">
<a href="https://laravel-admin.org/">
<img src="https://laravel-admin.org/images/logo002.png" alt="laravel-admin">
</a>

<p align="center">⛵<code>laravel-admin</code> is administrative interface builder for laravel which can help you build CRUD backends just with few lines of code.</p>

<p align="center">
<a href="https://laravel-admin.org/docs">Documentation</a> |
<a href="https://laravel-admin.org/docs/zh">中文文档</a> |
<a href="https://demo.laravel-admin.org">Demo</a> |
<a href="https://github.com/z-song/demo.laravel-admin.org">Demo source code</a> |
<a href="#extensions">Extensions</a>
</p>

<p align="center">
    <a href="https://travis-ci.org/z-song/laravel-admin">
        <img src="https://travis-ci.org/z-song/laravel-admin.svg?branch=master" alt="Build Status">
    </a>
    <a href="https://styleci.io/repos/48796179">
        <img src="https://styleci.io/repos/48796179/shield" alt="StyleCI">
    </a>
    <a href="https://packagist.org/packages/encore/laravel-admin">
        <img src="https://img.shields.io/packagist/l/encore/laravel-admin.svg?maxAge=2592000&&style=flat-square" alt="Packagist">
    </a>
    <a href="https://packagist.org/packages/encore/laravel-admin">
        <img src="https://img.shields.io/packagist/dt/encore/laravel-admin.svg?style=flat-square" alt="Total Downloads">
    </a>
    <a href="https://github.com/z-song/laravel-admin">
        <img src="https://img.shields.io/badge/Awesome-Laravel-brightgreen.svg?style=flat-square" alt="Awesome Laravel">
    </a>
    <a href="#backers" alt="sponsors on Open Collective">
        <img src="https://opencollective.com/laravel-admin/backers/badge.svg?style=flat-square" />
    </a> 
    <a href="https://www.paypal.me/zousong" alt="Paypal donate">
        <img src="https://img.shields.io/badge/Donate-Paypal-green.svg?style=flat-square" />
    </a> 
</div>

<p align="center">
    Inspired by <a href="https://github.com/sleeping-owl/admin" target="_blank">SleepingOwlAdmin</a> and <a href="https://github.com/zofe/rapyd-laravel" target="_blank">rapyd-laravel</a>.
</p>

Sponsor
------------

<a href="https://ter.li/32ifxj">
<img src="https://user-images.githubusercontent.com/1479100/102449272-dc356880-406e-11eb-9079-169c8c2af81c.png" alt="laravel-admin" width="200px;">
</a>


Requirements
------------
 - PHP >= 7.0.0
 - Laravel >= 5.5.0
 - Fileinfo PHP Extension

Installation
------------

> This package requires PHP 7+ and Laravel 5.5, for old versions please refer to [1.4](https://laravel-admin.org/docs/v1.4/#/)

First, install laravel 5.5, and make sure that the database connection settings are correct.

```
composer require encore/laravel-admin
```

Then run these commands to publish assets and config：

```
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
```
After run command you can find config file in `config/admin.php`, in this file you can change the install directory,db connection or table names.

At last run following command to finish install.
```
php artisan admin:install
```

Open `http://localhost/admin/` in browser,use username `admin` and password `admin` to login.

Configurations
------------
The file `config/admin.php` contains an array of configurations, you can find the default configurations in there.

## Extensions

| Extension                                        | Description                              | laravel-admin                              |
| ------------------------------------------------ | ---------------------------------------- |---------------------------------------- |
| [helpers](https://github.com/laravel-admin-extensions/helpers)             | Several tools to help you in development | ~1.5 |
| [media-manager](https://github.com/laravel-admin-extensions/media-manager) | Provides a web interface to manage local files          | ~1.5 |
| [api-tester](https://github.com/laravel-admin-extensions/api-tester) | Help you to test the local laravel APIs          |~1.5 |
| [scheduling](https://github.com/laravel-admin-extensions/scheduling) | Scheduling task manager for laravel-admin          |~1.5 |
| [redis-manager](https://github.com/laravel-admin-extensions/redis-manager) | Redis manager for laravel-admin          |~1.5 |
| [backup](https://github.com/laravel-admin-extensions/backup) | An admin interface for managing backups          |~1.5 |
| [log-viewer](https://github.com/laravel-admin-extensions/log-viewer) | Log viewer for laravel           |~1.5 |
| [config](https://github.com/laravel-admin-extensions/config) | Config manager for laravel-admin          |~1.5 |
| [reporter](https://github.com/laravel-admin-extensions/reporter) | Provides a developer-friendly web interface to view the exception          |~1.5 |
| [wangEditor](https://github.com/laravel-admin-extensions/wangEditor) | A rich text editor based on [wangeditor](http://www.wangeditor.com/)         |~1.6 |
| [summernote](https://github.com/laravel-admin-extensions/summernote) | A rich text editor based on [summernote](https://summernote.org/)          |~1.6 |
| [china-distpicker](https://github.com/laravel-admin-extensions/china-distpicker) | 一个基于[distpicker](https://github.com/fengyuanchen/distpicker)的中国省市区选择器          |~1.6 |
| [simplemde](https://github.com/laravel-admin-extensions/simplemde) | A markdown editor based on [simplemde](https://github.com/sparksuite/simplemde-markdown-editor)          |~1.6 |
| [phpinfo](https://github.com/laravel-admin-extensions/phpinfo) | Integrate the `phpinfo` page into laravel-admin          |~1.6 |
| [php-editor](https://github.com/laravel-admin-extensions/php-editor) <br/> [python-editor](https://github.com/laravel-admin-extensions/python-editor) <br/> [js-editor](https://github.com/laravel-admin-extensions/js-editor)<br/> [css-editor](https://github.com/laravel-admin-extensions/css-editor)<br/> [clike-editor](https://github.com/laravel-admin-extensions/clike-editor)| Several programing language editor extensions based on code-mirror          |~1.6 |
| [star-rating](https://github.com/laravel-admin-extensions/star-rating) | Star Rating extension for laravel-admin          |~1.6 |
| [json-editor](https://github.com/laravel-admin-extensions/json-editor) | JSON Editor for Laravel-admin          |~1.6 |
| [grid-lightbox](https://github.com/laravel-admin-extensions/grid-lightbox) | Turn your grid into a lightbox & gallery          |~1.6 |
| [daterangepicker](https://github.com/laravel-admin-extensions/daterangepicker) | Integrates daterangepicker into laravel-admin          |~1.6 |
| [material-ui](https://github.com/laravel-admin-extensions/material-ui) | Material-UI extension for laravel-admin          |~1.6 |
| [sparkline](https://github.com/laravel-admin-extensions/sparkline) | Integrates jQuery sparkline into laravel-admin          |~1.6 |
| [chartjs](https://github.com/laravel-admin-extensions/chartjs) | Use Chartjs in laravel-admin          |~1.6 |
| [echarts](https://github.com/laravel-admin-extensions/echarts) | Use Echarts in laravel-admin          |~1.6 |
| [simditor](https://github.com/laravel-admin-extensions/simditor) | Integrates simditor full-rich editor into laravel-admin          |~1.6 |
| [cropper](https://github.com/laravel-admin-extensions/cropper) | A simple jQuery image cropping plugin.          |~1.6 |
| [composer-viewer](https://github.com/laravel-admin-extensions/composer-viewer) | A web interface of composer packages in laravel.          |~1.6 |
| [data-table](https://github.com/laravel-admin-extensions/data-table) | Advanced table widget for laravel-admin |~1.6 |
| [watermark](https://github.com/laravel-admin-extensions/watermark) | Text watermark for laravel-admin |~1.6 |
| [google-authenticator](https://github.com/ylic/laravel-admin-google-authenticator) | Google authenticator |~1.6 |



## Contributors
 This project exists thanks to all the people who contribute. [[Contribute](CONTRIBUTING.md)].
<a href="graphs/contributors"><img src="https://opencollective.com/laravel-admin/contributors.svg?width=890&button=false" /></a>
 ## Backers
 Thank you to all our backers! 🙏 [[Become a backer](https://opencollective.com/laravel-admin#backer)]
 <a href="https://opencollective.com/laravel-admin#backers" target="_blank"><img src="https://opencollective.com/laravel-admin/backers.svg?width=890"></a>
 ## Sponsors
 Support this project by becoming a sponsor. Your logo will show up here with a link to your website. [[Become a sponsor](https://opencollective.com/laravel-admin#sponsor)]
 <a href="https://opencollective.com/laravel-admin/sponsor/0/website" target="_blank"><img src="https://opencollective.com/laravel-admin/sponsor/0/avatar.svg"></a>
<a href="https://opencollective.com/laravel-admin/sponsor/1/website" target="_blank"><img src="https://opencollective.com/laravel-admin/sponsor/1/avatar.svg"></a>
<a href="https://opencollective.com/laravel-admin/sponsor/2/website" target="_blank"><img src="https://opencollective.com/laravel-admin/sponsor/2/avatar.svg"></a>
<a href="https://opencollective.com/laravel-admin/sponsor/3/website" target="_blank"><img src="https://opencollective.com/laravel-admin/sponsor/3/avatar.svg"></a>
<a href="https://opencollective.com/laravel-admin/sponsor/4/website" target="_blank"><img src="https://opencollective.com/laravel-admin/sponsor/4/avatar.svg"></a>
<a href="https://opencollective.com/laravel-admin/sponsor/5/website" target="_blank"><img src="https://opencollective.com/laravel-admin/sponsor/5/avatar.svg"></a>
<a href="https://opencollective.com/laravel-admin/sponsor/6/website" target="_blank"><img src="https://opencollective.com/laravel-admin/sponsor/6/avatar.svg"></a>
<a href="https://opencollective.com/laravel-admin/sponsor/7/website" target="_blank"><img src="https://opencollective.com/laravel-admin/sponsor/7/avatar.svg"></a>
<a href="https://opencollective.com/laravel-admin/sponsor/8/website" target="_blank"><img src="https://opencollective.com/laravel-admin/sponsor/8/avatar.svg"></a>
<a href="https://opencollective.com/laravel-admin/sponsor/9/website" target="_blank"><img src="https://opencollective.com/laravel-admin/sponsor/9/avatar.svg"></a>

Other
------------
`laravel-admin` based on following plugins or services:

+ [Laravel](https://laravel.com/)
+ [AdminLTE](https://adminlte.io/)
+ [Datetimepicker](http://eonasdan.github.io/bootstrap-datetimepicker/)
+ [font-awesome](http://fontawesome.io)
+ [moment](http://momentjs.com/)
+ [Google map](https://www.google.com/maps)
+ [Tencent map](http://lbs.qq.com/)
+ [bootstrap-fileinput](https://github.com/kartik-v/bootstrap-fileinput)
+ [jquery-pjax](https://github.com/defunkt/jquery-pjax)
+ [Nestable](http://dbushell.github.io/Nestable/)
+ [toastr](http://codeseven.github.io/toastr/)
+ [X-editable](http://github.com/vitalets/x-editable)
+ [bootstrap-number-input](https://github.com/wpic/bootstrap-number-input)
+ [fontawesome-iconpicker](https://github.com/itsjavi/fontawesome-iconpicker)
+ [sweetalert2](https://github.com/sweetalert2/sweetalert2)

License
------------
`laravel-admin` is licensed under [The MIT License (MIT)](LICENSE).
