<?php

namespace App\Admin\Http\Controllers\Admin;

use App\Admin\Http\Controllers\BaseController;
use App\Admin\Repository\AdminRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Admin\Repository\Admin\ControlRepository;
use App\Model\YyControl;
use DB;
use Bacao\Alert\Alert;

class ControlController extends BaseController
{

  public $admin;

    /**
     * AdminController constructor.
     * @param AdminRepository $admin
     */
  public function __construct(AdminRepository $admin)
  {
      $this->admin = $admin;

  }


  //车辆温控列表
  public function index(Request $request)
  {
    $data = [];
    $control = new YyControl();
    $data = ControlRepository::index();
    $data['is_abnormal'] = $control::typeMap();
    $data['search_list'] = $this->getAppends($request->all());
    return $this->view('admin.control.index', $data);
  }

  protected function getAppends($search_list)
  {
      return $search_list;
  }
    
}
