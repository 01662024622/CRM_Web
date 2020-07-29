<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ReportMarket;
use App\Customer;

class ReportMarketController extends Controller
{

	public function index(){
		$customers = Customer::all();
		return view('report_market.intergration',['customers'=>$customers]);
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
		if ($request->has('id')) {
			$respon=ReportMarket::find($request->id)->update($data);
			return $respon;
		}
		$respon=ReportMarket::create($data);
		return $respon;
	}

}
