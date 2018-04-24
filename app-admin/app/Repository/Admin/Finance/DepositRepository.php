<?php

namespace App\Admin\Repository\Admin\Finance;

use App\Model\Finance\Deposit;
use Bacao\Alert\Alert;

class DepositRepository
{
    public static function index()
    {
        $per_page = request('per_page', 15); ///*获取条数*/

        $user_id = request('user_id', '');
        $uuid = request('uuid', '');

        $model = new Deposit();

        if ($user_id) {
            $model = $model->where('user_id', $user_id);
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
        $is_delete = Deposit::destroy($id);
        if ($is_delete) {
            Alert::success('删除成功！');
            return true;
        }
        Alert::error('删除失败！');
        return false;
    }
}