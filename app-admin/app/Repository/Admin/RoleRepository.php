<?php

namespace App\Admin\Repository\Admin;

use App\Model\Role;
use Bacao\Alert\Alert;
use Session;

class RoleRepository
{
    public static function index()
    {
        $per_page = request('per_page', 15); ///*获取条数*/

        $name = request('name', '');

        $model = new Role();
        if ($name) {
            $model = $model->where('name', 'like', '%' . $name . '%');
        }

        $paginate = $model->paginate($per_page);

        $data['items'] = $paginate;
        $data['pager']['total'] = $paginate->total();
        $data['pager']['last_page'] = $paginate->lastPage();
        $data['pager']['current_page'] = $paginate->currentPage();
        return $data;
    }

    public function getRoleById($id)
    {
        $model = new Role();
        $role_model = $model->find($id);
        $role_model->permissions = $role_model->permissions()->pluck('permission_id')->toArray();
        return $role_model;
    }

    public function store($request, $id)
    {
        $data = $request->all();
        $model = new Role();
        if (!empty($id)) {
            $model = $model->find($id);
        }

        if ($model->fill($data)->save()) {
            //更新用户角色关系
            if (isset($data['permissions'])) {
                $model->permissions()->sync($data['permissions']);
            }
            Alert::success('操作成功！');
            return true;
        }
        Alert::error('操作失败！');
        return false;
    }


    public static function destroy($id)
    {
        $is_delete = Role::destroy($id);
        if ($is_delete) {
            Alert::success('删除成功！');
            return true;
        }
        Alert::error('删除失败！');
        return false;
    }
}