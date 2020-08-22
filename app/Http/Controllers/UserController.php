<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResouceController;
use App\Http\Requests\StoreUser;
use App\Services\UserService;
use App\Apartment;
use Illuminate\Support\Facades\View;

class UserController extends ResouceController
{
	function __construct(UserService $userService)
    {
        $this->middleware('admin');
        parent::__construct($userService, array('active' => 'users', 'group' => 'manager'));
        View::share('apartments', Apartment::all());
    }
    public function store(StoreUser $request)
    {
        $data = $request->all();
        if (array_key_exists("status", $data)) {
            return response()
                ->json([
                    'code' => 400,
                    'message' => 'Quyền không hợp lệ!'
                ], 400);
        }
        return parent::storeArr($data);
    }
}
