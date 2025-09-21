<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\API\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        $ress = [
            'view' => 'admin/dashboard',
            'data' => null
        ];
        return $this->loaderAdminTemplate($ress);
    }
}
