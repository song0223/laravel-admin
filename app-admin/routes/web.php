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


Route::group(['middleware' => ['guest', 'role']], function () {
    Route::get('dashboard',['as' => 'admin.admin.index', 'uses' => 'Admin\AdminController@index']);//管理员资料
    Route::get('/',['as' => 'admin.admin.index', 'uses' => 'Admin\AdminController@index']);//管理员资料

    Route::get('admin/user/index',['as' =>'admin.user.index','uses' =>'Admin\UserController@index']);
    Route::get('admin/user/edit/{id}',['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@edit']);
    Route::get('admin//user/delete/{id}',['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@delete']);
    Route::post('admin//user/store/{id}',['as' => 'admin.user.store', 'uses' => 'Admin\UserController@store']);

    Route::get('admin/role/index',['as' => 'admin.role.index', 'uses' => 'Admin\RoleController@index']);


    Route::get('admin/permission/index',['as' => 'admin.permission.index', 'uses' => 'Admin\PermissionController@index']);
    Route::get('admin/permission/edit/{id}',['as' => 'admin.permission.edit', 'uses' => 'Admin\PermissionController@edit']);
    Route::get('admin/permission/delete/{id}',['as' => 'admin.permission.delete', 'uses' => 'Admin\PermissionController@delete']);
    Route::post('admin/permission/store/{id}',['as' => 'admin.permission.store', 'uses' => 'Admin\PermissionController@store']);



    Route::get('admin/role/index',['as' => 'admin.role.index', 'uses' => 'Admin\RoleController@index']);
    Route::get('admin/role/edit/{id}',['as' => 'admin.role.edit', 'uses' => 'Admin\RoleController@edit']);
    Route::get('admin/role/delete/{id}',['as' => 'admin.role.delete', 'uses' => 'Admin\RoleController@delete']);
    Route::post('admin/role/store/{id}',['as' => 'admin.role.store', 'uses' => 'Admin\RoleController@store']);

});