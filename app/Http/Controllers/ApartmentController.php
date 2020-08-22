<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResouceController;
use App\Services\ApartmentService;
use App\User;
use App\Services\ApartmentServiceImpl;
use App\Http\Requests\StoreApartment;
use Illuminate\Support\Facades\View;

class ApartmentController extends ResouceController
{
    function __construct(ApartmentService $apartment)
    {
        $this->middleware('admin');
        parent::__construct($apartment, array('active' => 'apartments', 'group' => 'manager'));
        View::share('users',User::where('status',0)->where('role','<>','admin')->get());
    }

    public function store(StoreApartment $request)
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
