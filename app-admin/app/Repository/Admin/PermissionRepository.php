<?php

namespace App\Admin\Repository\Admin;

use App\Model\Permission;
use Bacao\Alert\Alert;
use Session;

class PermissionRepository
{
    public static function index()
    {
        $per_page = request('per_page', 15); ///*获取条数*/

        $name = request('name', '');

        $model = new Permission();
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

    public function getPermissionById($id)
    {
        return Permission::find($id);
    }

    public function store($request, $id)
    {
        $data = $request->all();
        $model = new Permission();
        if (!empty($id)) {
            $model = $model->find($id);
        }

        if ($model->fill($data)->save()) {
            Alert::success('操作成功！');
            return true;
        }
        Alert::error('操作失败！');
        return false;
    }


    public static function destroy($id)
    {
        $is_delete = Permission::destroy($id);
        if ($is_delete) {
            Alert::success('删除成功！');
            return true;
        }
        Alert::error('删除失败！');
        return false;
    }
}