<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('/login', ['as' => 'post.login', 'uses' => 'Auth\LoginController@login']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('/captcha/{tmp}', ['as' => 'captcha', 'uses' => 'Admin\CaptchaController@index']);
//首页大地图测试路由
Route::get('/ceshi',['as' => 'ceshi', 'uses' => 'Admin\CeshiController@ddtu']);
Route::get('/coor',['as' => 'coor', 'uses' => 'Admin\CeshiController@coor']);
Route::get('/tji',['as' => 'tji', 'uses' => 'Admin\CeshiController@tji']);
Route::get('/error',['as' => 'error', 'uses' => 'ErrorController@index']);

Route::get('/ware',['as' => 'ware', 'uses' => 'Admin\CeshiController@ware']);

Route::group(['middleware' => 'guest'], function () {
//状态改变
    Route::get('/', ['as' => 'admin.index', 'uses' => 'Admin\AdminController@index']); //后台首页
    Route::get('/home', ['as' => 'admin.index', 'uses' => 'Admin\AdminController@index']); //后台首页
    Route::get('/dashboard', ['as' => 'admin.index', 'uses' => 'Admin\AdminController@index']); //后台首页
});
Route::group(['middleware' => ['guest', 'role']], function () {
    Route::get('/admin/info/index',['as' => 'admin.info.index', 'uses' => 'Admin\AdminController@admininfo']);//管理员资料
    

    //zhao-修改
    Route::get('/admin/usermember/index',['as' =>'admin.usermember.index','uses' =>'Admin\AdminController@usermembershow']);//用户管理界面
    Route::any('/admin/add',['as' => 'admin.add', 'uses' => 'Admin\AdminController@add']);//用户管理添加界面
    Route::get('/admin/role/index',['as' => 'admin.role.index', 'uses' => 'Admin\RoleController@index']);//用户角色界面
    Route::any('/role/add',['as' => 'role.add', 'uses' => 'Admin\RoleController@add']);//用户角色添加界面
    Route::get('/admin/permission/index',['as' => 'admin.permission.index', 'uses' => 'Admin\PermissionController@index']);//用户权限界面
    Route::any('/permission/add',['as' => 'permission.add', 'uses' => 'Admin\PermissionController@add']);//用户权限添加界面
    Route::get('/permission/del',['as' => 'permission.del', 'uses' => 'Admin\PermissionController@del']);//用户权限删除界面
    Route::get('/role/del',['as' => 'role.del', 'uses' => 'Admin\RoleController@del']);//用户角色删除界面
    Route::get('/admin/del',['as' => 'admin.del', 'uses' => 'Admin\AdminController@del']);//用户管理员删除界面
    Route::any('/permission/edit',['as' => 'permission.edit', 'uses' => 'Admin\PermissionController@edit']);//用户权限编辑
    Route::any('/role/edit',['as' => 'role.edit', 'uses' => 'Admin\RoleController@edit']);//用户权限编辑
    Route::any('/admin/edit',['as' => 'admin.edit', 'uses' => 'Admin\AdminController@edit']);//用户权限编辑

    Route::get('/cate/index',['as' => 'cate.index', 'uses' => 'Admin\CateController@index']);//品类列表
    Route::any('/cate/add',['as' => 'cate.add', 'uses' => 'Admin\CateController@add']);//新增品类
    Route::any('/cate/edit',['as' => 'cate.edit', 'uses' => 'Admin\CateController@edit']);//编辑品类
    Route::get('/cate/del',['as' => 'cate.del', 'uses' => 'Admin\CateController@del']);//删除品类

    Route::get('/cancel/index',['as' => 'cancel.index', 'uses' => 'Admin\CancelController@index']);//订单取消设置列表
    Route::any('/cancel/add',['as' => 'cancel.add', 'uses' => 'Admin\CancelController@add']);//订单取消理由添加
    Route::any('/cancel/edit',['as' => 'cancel.edit', 'uses' => 'Admin\CancelController@edit']);//订单取消理由编辑
    Route::get('/cancel/del',['as' => 'cancel.del', 'uses' => 'Admin\CancelController@del']);//订单取消理由删除

    Route::get('/cancel/m_index',['as' => 'cancel.m_index', 'uses' => 'Admin\CancelController@m_index']);//后台押金金额设置列表
    Route::any('/cancel/m_add',['as' => 'cancel.m_add', 'uses' => 'Admin\CancelController@m_add']);//后台押金金额设置添加
    Route::any('/cancel/m_edit',['as' => 'cancel.m_edit', 'uses' => 'Admin\CancelController@m_edit']);//后台押金金额设置编辑
    Route::get('/cancel/m_del',['as' => 'cancel.m_del', 'uses' => 'Admin\CancelController@m_del']);//后台押金金额设置删除

    Route::get('admin/control/index',['as' => 'control.index', 'uses' => 'Admin\ControlController@index']);//车辆温控信息展示
    Route::get('admin/abnormal/index',['as' => 'abnormal.index', 'uses' => 'Admin\AbnormalController@index']);//车辆温控信息展示
    //结束


    Route::get('/admin/user/index',['as' => 'admin.user.index', 'uses' => 'Admin\UserController@index']);
    //审核
    Route::get('admin/user/{id}/change-audit/{audit}',['as' => 'admin.user.change-audit', 'uses' => 'Admin\UserController@changeAudit']);
    Route::get('admin/user/cert/{id}',['as' => 'admin.user.cert', 'uses' => 'Admin\UserController@cert']);
    //用户管理界面
    Route::get('admin/article/index',['as' => 'admin.articleshow', 'uses' => 'Admin\AdminController@articleshow']);//已发文章界面
    Route::get('admin/article/show',['as' => 'admin.uploadarticle', 'uses' => 'Admin\AdminController@uploadarticle']);//创建文章


    Route::get('admin/carriers-user/index',['as' => 'admin.carriers-user.index', 'uses' => 'Admin\CarriersUserController@index']);
    //收取货地址
    Route::get('admin/user/address/{id}',['as' => 'admin.user.address', 'uses' => 'Admin\UserController@address']);
    Route::get('admin/user/{user_id}/address/delete/{id}',['as' => 'admin.user.address.delete', 'uses' => 'Admin\UserController@delAddress']);

    Route::get('admin/carriers-user/address/{id}',['as' => 'admin.carriers-user.address', 'uses' => 'Admin\CarriersUserController@address']);
    Route::get('admin/carriers-user/{user_id}/address/delete/{id}',['as' => 'admin.carriers-user.address.delete', 'uses' => 'Admin\CarriersUserController@delAddress']);
    //基础信息管理

    //车辆信息
    Route::get('admin/basic-info/vehicle-info/index',['as' => 'admin.basic-info.vehicle-info.index', 'uses' => 'Admin\BasicInfo\VehicleInfoController@index']);
    Route::get('admin/basic-info/vehicle-info/delete/{id}',['as' => 'admin.basic-info.vehicle-info.delete', 'uses' => 'Admin\BasicInfo\VehicleInfoController@delete']);

    Route::get('admin/carriers-user/get-carriers-user',['as' => 'admin.carriers-user.get-carriers-user', 'uses' => 'Admin\CarriersUserController@getCarriersUser']);
    //审核资质认证证书
    Route::get('admin/carriers-user/cert/{id}',['as' => 'admin.carriers-user.cert', 'uses' => 'Admin\CarriersUserController@cert']);
    Route::post('admin/carriers-user/update-sd',['as' => 'admin.carriers-user.update-sd', 'uses' => 'Admin\CarriersUserController@updateSd']);
    Route::post('admin/user/change-status',['as' => 'admin.user.change-status', 'uses' => 'Admin\UserController@changeStatus']);
    Route::post('admin/carriers-user/change-status',['as' => 'admin.carriers-user.change-status', 'uses' => 'Admin\CarriersUserController@changeStatus']);
    //司机审核
    Route::get('admin/carriers-user/{id}/change-audit/{audit}',['as' => 'admin.carriers-user.change-audit', 'uses' => 'Admin\CarriersUserController@changeAudit']);
    //订单管理

    //发布订单列表
    Route::get('admin/order/release-order/index', ['as' => 'admin.order.release-order.index', 'uses' => 'Admin\Order\ReleaseOrderController@index']);
    Route::get('admin/order/release-order/delete/{id}', ['as' => 'admin.order.release-order.delete', 'uses' => 'Admin\Order\ReleaseOrderController@delete']);
    //订单列表
    Route::get('admin/order/order/index', ['as' => 'admin.order.order.index', 'uses' => 'Admin\Order\OrderController@index']);
    Route::get('admin/order/order/delete/{id}', ['as' => 'admin.order.order.delete', 'uses' => 'Admin\Order\OrderController@delete']);
    //订单异常列表
    Route::get('admin/order/order-abnormal/index', ['as' => 'admin.order.order-abnormal.index', 'uses' => 'Admin\Order\OrderAbnormalController@index']);
    Route::get('admin/order/order-abnormal/delete/{id}', ['as' => 'admin.order.order-abnormal.delete', 'uses' => 'Admin\Order\OrderAbnormalController@delete']);

    //财务管理

    //缴纳保证金列表
    Route::get('admin/finance/deposit/index', ['as' => 'admin.order.deposit.index', 'uses' => 'Admin\Finance\DepositController@index']);
    Route::get('admin/finance/deposit/delete/{id}', ['as' => 'admin.order.deposit.delete', 'uses' => 'Admin\Finance\DepositController@delete']);
    //账户资金明细列表
    Route::get('admin/finance/money-detail/index', ['as' => 'admin.order.money-detail.index', 'uses' => 'Admin\Finance\MoneyDetailController@index']);
    Route::get('admin/finance/money-detail/delete/{id}', ['as' => 'admin.order.money-detail.delete', 'uses' => 'Admin\Finance\MoneyDetailController@delete']);
});