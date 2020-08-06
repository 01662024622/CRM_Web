<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ReportMarket;
use App\Customer;
use App\User;
use Carbon\Carbon;
class ReportMarketController extends Controller
{

	public function index($auth){
		$customers = Customer::all();
		return view('report_market.intergration',['customers'=>$customers,'auth'=>$auth]);
	}
	public function test(){
		return view('test');
	}

	public function show($id){
		$data=ReportMarket::find($id);
		return response()->json($data);
	}
	public function destroy($id){
		$data=ReportMarket::find($id)->delete();
		return response()->json($data);
	}

	public function store(Request $request) {

		$data=$request->all();

		$data['date_work']=Carbon::createFromFormat('d/m/Y', $data['date_work'])->format('Y/m/d');

		if ($request->headers->has('Authorization')) {
			$header= $request->header('Authorization');
			$user = User::where('authentication',$header)->first();
			$data['user_id']=$user->id;
		}
		else return response()
			->json([
				'code'      =>  400,
				'message'   =>  'Quyền không hợp lệ!'
			], 400);

		
		if ($request->has('id')) {
			$respon=ReportMarket::find($request->id)->update($data);
			return $respon;
		}
		$respon=ReportMarket::create($data);
		return $respon;
	}

}
