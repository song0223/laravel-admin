<?php

namespace App\Admin\Repository\Admin;

use App\Model\CarriersUser;
use Bacao\Alert\Alert;

class CarriersUserRepository
{
    public static function index()
    {
        $per_page = request('per_page', 15); ///*获取条数*/

        $user_tel = request('user_tel', '');
        $username = request('username', '');
        $user_type = request('user_type', 0);
        $is_cert = request('is_cert', 0);
        $is_audit = request('is_audit', 0);

        $model = new CarriersUser();
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


    public function findCarriersUserByUserName($username)
    {
        $collect = collect();
        $data = [];
        $query = CarriersUser::query();
        $query->where('company_name', 'like', '%' . $username . '%');
        $collect = $query->get();
        if (!empty($collect)) {
            foreach($collect as $value){
                $item['id'] = $value['id'];
                $item['text'] = $value['company_name'];
                $data[] = $item;
            }
        }
        return $data;
    }


    public function updateShorthand($id, $shorthand)
    {
        $carriers_user_model = CarriersUser::find($id);
        if (isset($carriers_user_model)) {
            $carriers_user_model->shorthand = $shorthand;
            if ($carriers_user_model->save()) {
                return true;
            }
        }
        return false;
    }

    /**
     * 使用状态
     * @param $id
     * @param $status
     * @return bool
     */
    public function mark($id, $status)
    {
        $carriers_user = CarriersUser::find($id);
        if ($carriers_user) {
            $carriers_user->is_type = $status;
            if ($carriers_user->save()) {
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
        $carriers_user = CarriersUser::find($id);
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
        return CarriersUser::find($id);
    }
}