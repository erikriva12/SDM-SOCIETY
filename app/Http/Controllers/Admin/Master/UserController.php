<?php
namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\API\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $ress = [
            'view' => 'admin/master/user/list-user',
            'data' => null
        ];
        return $this->loaderAdminTemplate($ress);
    }
}
