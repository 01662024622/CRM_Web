<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Customer;
use App\User;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function intergration($auth)
    {
        //check Authorization header
        $user = User::where('authentication', "=", $auth)->first();
        if (Auth::check()) {
            Auth::logout();
            Auth::login($user);
        }
        return view('report_market.intergration', ['auth' => $auth, 'name' => $user['name'], 'customers' => Customer::all()]);
    }

    public function review360($auth)
    {
        //check Authorization header
        $user = User::where('authentication', "=", $auth)->where('status', 0)->first();
        if (Auth::check()) {
            Auth::logout();
        }
        Auth::login($user);
        return view('report_review.intergration', ['apartment' => $user->apartment->name, "apartments" => Apartment::where("status", 0)->get()]);
    }

    public function success($auth)
    {
        //check Authorization header
        return view('report_review.success', ['auth' => $auth]);
    }


}
