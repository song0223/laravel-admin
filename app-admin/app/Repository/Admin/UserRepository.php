<?php

namespace App\Admin\Repository\Admin;

use App\Model\YyUser;
use Bacao\Alert\Alert;
use Session;

class UserRepository
{
    public static function index()
    {
        $per_page = request('per_page', 15); ///*获取条数*/

        $user_tel = request('user_tel', '');
        $username = request('username', '');
        $user_type = request('user_type', 0);
        $is_cert = request('is_cert', 0);
        $is_audit = request('is_audit', 0);

        $model = new YyUser();
        if ($user_tel) {
            $model = $model->where('user_tel', $user_tel);
        }

        if ($username) {
            $model = $model->where('username', 'like', '%' . $username . '%');
        }

        if ($user_type) {
            $model = $model->where('user_type', $user_type);
        }

        if ($is_cert) {
            $model = $model->where('is_cert', $is_cert);
        }

        if ($is_audit) {
            $model = $model->where('is_audit', $is_audit);
        }

        $paginate = $model->paginate($per_page);

        $data['items'] = $paginate;
        $data['pager']['total'] = $paginate->total();
        $data['pager']['last_page'] = $paginate->lastPage();
        $data['pager']['current_page'] = $paginate->currentPage();
        return $data;
    }


    /**
     * @param $id
     * @param $status
     * @return bool
     */
    public function mark($id, $status)
    {
        $yy_user = YyUser::find($id);
        if ($yy_user) {
            $yy_user->is_type = $status;
            if ($yy_user->save()) {
                return true;
            }
            return false;
        }
        abort(404);
    }


    /**
     * 审核
     * @param      $id
     * @param      $audit
     * @param null $not_through
     * @return bool
     */
    public function audit($id, $audit, $not_through = null)
    {
        $carriers_user = YyUser::find($id);
        if ($carriers_user) {
            $carriers_user->is_audit = $audit;
            if ($not_through){
                $carriers_user->not_through = $not_through;
            }
            if ($carriers_user->save()) {
                Alert::success('操作成功！');
                return true;
            }
            Alert::success('操作失败！');
            return false;
        }
        abort(404);
    }

    public function getUsersById($id)
    {
        return YyUser::find($id);
    }
}