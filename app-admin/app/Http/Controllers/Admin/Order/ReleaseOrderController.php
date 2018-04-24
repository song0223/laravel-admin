<?php

namespace App\Admin\Http\Controllers\Admin\Order;

use App\Admin\Http\Controllers\BaseController;
use App\Model\Order\ReleaseOrder;
use App\Admin\Repository\Admin\Order\ReleaseOrderRepository;
use Illuminate\Http\Request;

class ReleaseOrderController extends BaseController
{

    public function index(Request $request)
    {
        $data = [];
        $release_order = new ReleaseOrder();
        $data = ReleaseOrderRepository::index();
        $data['type_map'] = $release_order::typeMap();
        $data['search_list'] = $this->getAppends($request->all());
        return $this->view('admin.order.release-order.index', $data);
    }


    protected function getAppends($search_list)
    {
        return $search_list;
    }

    public function delete(Request $request, $id)
    {
        ReleaseOrderRepository::destroy($id);
        return redirect('admin/order/release-order/index');
    }
}