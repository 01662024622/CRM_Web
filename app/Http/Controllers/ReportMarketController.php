<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResouceController;
use App\Services\ReportMarketService;
use Illuminate\Http\Request;

use App\ReportMarket;
use App\Customer;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\StoreReportMarket;


class ReportMarketController extends ResouceController
{
    function __construct(ReportMarketService $reportMarketService) {
        $this->middleware('auth.api');
        parent::__construct($reportMarketService, array('active' => 'report_market', 'group' => 'manager'));
        View::share('customers', Customer::all());
    }
    public function intergration($auth){
        //check Authorization header
        $user = User::where('authentication',"=",$auth)->first();
        return view('report_market.intergration',['auth'=>$auth,'name'=>$user['name']]);
    }


	public function index(){
		if (Auth::user()->role!="admin") {
			return redirect('login');
		}
		return parent::index();
	}


	public function store(StoreReportMarket $request) {
		$data=$request->all();
        if (array_key_exists("status", $data)) {
            return response()
                ->json([
                    'code' => 400,
                    'message' => 'Quyền không hợp lệ!'
                ], 400);
        }
		if (Auth::check()){
		    $data["user_id"]= Auth::id();
        }else{
		    $user = User::where('authentication',$request->header('Authorization'))->first();
		    $data["user_id"]=$user->id;
        }
		// check image and put job to driver
		if ($request->hasFile('image_1')) {
			$name = time()."-1-".$data['user_id']."-".$request->image_1->getClientOriginalExtension();
			$request->image_1->storeAs('/', $name, 'google');
			$data['image_1']=$name;
		}
		if ($request->hasFile('image_2')) {
			$name = time()."-2-".$data['user_id']."-".$request->image_2->getClientOriginalExtension();
			$request->image_2->storeAs('/', $name, 'google');
			$data['image_2']=$name;
		}
		if ($request->hasFile('image_3')) {
			$name = time()."-3-".$data['user_id']."-".$request->image_3->getClientOriginalExtension();
			$request->image_3->storeAs('/', $name, 'google');
			$data['image_3']=$name;
		}

		// format date
		$data['date_work']=Carbon::createFromFormat('d/m/Y', $data['date_work'])->format('Y/m/d');
        return parent::storeArr($data);
	}

}
