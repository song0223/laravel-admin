<?php

namespace App\Admin\Repository\Admin;

use App\Model\Address;
use Bacao\Alert\Alert;

class AddressRepository
{
    public static function index()
    {
        $per_page = request('per_page', 15); ///*获取条数*/

        $user_id = request('user_id', 0);
        $type = request('type', 0);
        $status = request('status', 0);
        $phone = request('phone', '');

        $model = new Address();
        if ($user_id) {
            $model = $model->where('user_id', $user_id);
        }

        if ($type) {
            $model = $model->where('type', $type);
        }

        if ($status) {
            $model = $model->where('start', $status);
        }

        if ($phone) {
            $model = $model->where('phone', $phone);
        }

        $paginate = $model->paginate($per_page);

        $data['items'] = $paginate;
        $data['pager']['total'] = $paginate->total();
        $data['pager']['last_page'] = $paginate->lastPage();
        $data['pager']['current_page'] = $paginate->currentPage();
        return $data;
    }

    public static function destroy($id)
    {
        $is_delete = Address::destroy($id);
        if ($is_delete) {
            Alert::success('删除成功！');
            return true;
        }
        Alert::error('删除失败！');
        return false;
    }
}