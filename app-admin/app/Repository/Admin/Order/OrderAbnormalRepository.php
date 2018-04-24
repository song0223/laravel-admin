<?php

namespace App\Admin\Repository\Admin\Order;

use App\Model\Order\OrderAbnormal;
use Bacao\Alert\Alert;

class OrderAbnormalRepository
{
    public static function index()
    {
        $per_page = request('per_page', 15); ///*获取条数*/

        $order_num = request('order_num', '');

        $model = new OrderAbnormal();

        if ($order_num) {
            $model = $model->leftJoin("yy_order", function ($join) {
                $join->on("yy_order_abnormal.order_id", "=", "yy_order.id");
            });
            $model = $model->where('yy_order.order_num', $order_num);
        }
        $model = $model->select('yy_order_abnormal.*')->distinct();
        $paginate = $model->paginate($per_page);

        $data['items'] = $paginate;
        $data['pager']['total'] = $paginate->total();
        $data['pager']['last_page'] = $paginate->lastPage();
        $data['pager']['current_page'] = $paginate->currentPage();
        return $data;
    }


    public static function destroy($id)
    {
        $is_delete = OrderAbnormal::destroy($id);
        if ($is_delete) {
            Alert::success('删除成功！');
            return true;
        }
        Alert::error('删除失败！');
        return false;
    }
}