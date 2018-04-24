<?php

namespace App\Admin\Http\Controllers;

class ErrorController extends BaseController
{
    public function index()
    {
        return $this->view('admin.error');
    }

}