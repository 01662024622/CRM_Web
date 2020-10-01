<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\ResouceController;
use App\Http\Requests\StoreApartment;
use App\Services\ApartmentService;
use App\Services\ApartmentServiceImpl;
use App\User;
use Illuminate\Support\Facades\View;

class ApartmentController extends ResouceController
{
    function __construct(ApartmentService $apartment)
    {
        $this->middleware('admin');
        parent::__construct($apartment, array('active' => 'apartments', 'group' => 'manager'));
        View::share('users', User::where('status', 0)->where('role', '<>', 'admin')->get());
    }

    public function store(StoreApartment $request)
    {
        if ($request->has("id")) {
            $data = $request->only(['id', 'name', 'code', 'description', 'user_id']);
        } else {
            $data = $request->only(['name', 'code', 'description', 'user_id']);
        }
        return parent::storeArr($data);
    }
}
