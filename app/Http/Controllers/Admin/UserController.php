<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Base\ResouceController;
use App\Http\Requests\StoreUser;
use App\Services\UserService;
use Illuminate\Support\Facades\View;

class UserController extends ResouceController
{
    function __construct(UserService $userService)
    {
        $this->middleware('admin');
        parent::__construct($userService, array('active' => 'users', 'group' => 'manager'));
        View::share('apartments', Apartment::where('status',0)->get());
    }

    public function store(StoreUser $request)
    {
        if ($request->has("id")) {
            $data = $request->only(['id', 'name', 'position', 'apartment_id', 'location', 'skype', 'email_htauto', 'phone_htauto', 'phone',
                'birth_day']);
        } else {
            $data = $request->only(['name', 'position', 'apartment_id', 'location', 'skype', 'email_htauto', 'phone_htauto', 'phone',
                'birth_day']);
        }
        return parent::storeArr($data);
    }

}
