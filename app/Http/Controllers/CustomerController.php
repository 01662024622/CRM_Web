<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Customer;
use App\Services\ReportMarketService;
use App\User;
use Illuminate\Support\Facades\View;

class CustomerController extends Controller
{
    public function intergration($auth){
        //check Authorization header
        $user = User::where('authentication',"=",$auth)->first();
        return view('report_market.intergration',['auth'=>$auth,'name'=>$user['name'],'customers'=> Customer::all()]);
    }

    public function review360($auth){
        //check Authorization header
        $user = User::where('authentication',"=",$auth)->first();
        return view('report_review.intergration',['auth'=>$auth,'name'=>$user['name'],'apartment'=>$user->apartment->name,"apartments"=>Apartment::where("status",0)->get()]);
    }

}
