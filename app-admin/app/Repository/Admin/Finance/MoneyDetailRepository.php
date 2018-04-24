<?php

namespace App\Admin\Repository\Admin\Finance;

use App\Model\Finance\MoneyDetail;
use Bacao\Alert\Alert;

class MoneyDetailRepository
{
    public static function index()
    {
        $per_page = request('per_page', 15); ///*获取条数*/

        $user_id = request('user_id', 0);
        $phone = request('phone', '');
        $change_type = request('change_type', 0);
        $pay_type = request('pay_type', 0);

        $model = new MoneyDetail();

        if ($user_id) {
            $model = $model->where('user_id', $user_id);
        }

        if ($phone) {
            $model = $model->where('phone', $phone);
        }

        if ($change_type) {
            $model = $model->where('change_type', $change_type);
        }

        if ($pay_type) {
            $model = $model->where('pay_type', $pay_type);
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
        $is_delete = MoneyDetail::destroy($id);
        if ($is_delete) {
            Alert::success('删除成功！');
            return true;
        }
        Alert::error('删除失败！');
        return false;
    }
}