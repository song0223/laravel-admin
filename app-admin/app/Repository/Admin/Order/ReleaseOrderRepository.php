<?php

namespace App\Admin\Repository\Admin\Order;

use App\Model\Order\ReleaseOrder;
use Bacao\Alert\Alert;

class ReleaseOrderRepository
{
    public static function index()
    {
        $per_page = request('per_page', 15); ///*获取条数*/

        $user_id = request('user_id', 0);
        $order_number = request('order_number', '');
        $is_type = request('is_type', 0);

        $model = new ReleaseOrder();

        if ($user_id) {
            $model = $model->where('user_id', $user_id);
        }

        if ($order_number) {
            $model = $model->where('order_number', $order_number);
        }

        if ($is_type) {
            $model = $model->where('is_type', $is_type);
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
        $is_delete = ReleaseOrder::destroy($id);
        if ($is_delete) {
            Alert::success('删除成功！');
            return true;
        }
        Alert::error('删除失败！');
        return false;
    }

}