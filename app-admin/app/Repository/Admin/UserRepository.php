<?php

namespace App\Admin\Repository\Admin;

use App\Admin\User;
use Bacao\Alert\Alert;
use Session;

class UserRepository
{
    public static function index()
    {
        $per_page = request('per_page', 15); ///*获取条数*/

        $name = request('name', '');

        $model = new User();
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

    public function getUsersById($id)
    {
        return User::find($id);
    }

    public function store($request, $id)
    {
        $data = $request->all();
        $model = new User();
        if (!empty($id)){
            $model = $model->find($id);
        }
        //密码进行加密
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }

        if ($model->fill($data)->save()) {
            //更新用户角色关系
            if (isset($data['role'])) {
                $model->roles()->sync($data['role']);
            }
            Alert::success('操作成功！');
            return true;
        }
        Alert::error('操作失败！');
        return false;
    }

    public static function destroy($id)
    {
        $is_delete = User::destroy($id);
        if ($is_delete) {
            Alert::success('删除成功！');
            return true;
        }
        Alert::error('删除失败！');
        return false;
    }
}