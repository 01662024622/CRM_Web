<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ReportMarket;
use App\Customer;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReportMarketController extends Controller
{

	public function intergration($auth){
		//check Authorization header
		$user = User::where('authentication',$auth)->first();
		if (is_null($user)) {
			return response()
			->json([
				'code'      =>  400,
				'message'   =>  'Quyền không hợp lệ!'
			], 400);
		}
		$customers = Customer::all();
		return view('report_market.intergration',['customers'=>$customers,'auth'=>$auth,'name'=>$user['name']]);
	}
	public function index(){
		if (!Auth::check()) {
			return redirect('login');
		}elseif (Auth::user()->role!="admin") {
			return redirect('login');
		}

		$customers = Customer::all();
		return view('report_market.index',['customers'=>$customers]);
	}

	public function show($id){
		if (!Auth::check()) {
			if ($request->headers->has('Authorization')) {
				$header= $request->header('Authorization');
				$user = User::where('authentication',$header)->first();
				if (is_null($user)) {
					return response()
					->json([
						'code'      =>  400,
						'message'   =>  'Quyền không hợp lệ!'
					], 400);
				}
			}
			else return response()
				->json([
					'code'      =>  400,
					'message'   =>  'Quyền không hợp lệ!'
				], 400);
		}
		$data=ReportMarket::find($id);
		$data['date_work'] = Carbon::parse($data['date_work'])->format('d/m/Y');
		return response()->json($data);
	}
	public function destroy($id){
		if (!Auth::check()) {
			if ($request->headers->has('Authorization')) {
				$header= $request->header('Authorization');
				$user = User::where('authentication',$header)->first();
				if (is_null($user)) {
					return response()
					->json([
						'code'      =>  400,
						'message'   =>  'Quyền không hợp lệ!'
					], 400);
				}
			}
			else return response()
				->json([
					'code'      =>  400,
					'message'   =>  'Quyền không hợp lệ!'
				], 400);
		}
		$data=ReportMarket::find($id)->delete();
		return response()->json($data);
	}

	public function store(Request $request) {
		$data=$request->all();
		//check Authorization header
		if (Auth::check()) {
			$data['user_id']=Auth::id();
		}else{
			if ($request->headers->has('Authorization')) {
				$header= $request->header('Authorization');
				$user = User::where('authentication',$header)->first();
				if (is_null($user)) {
					return response()
					->json([
						'code'      =>  400,
						'message'   =>  'Quyền không hợp lệ!'
					], 400);
				}
				$data['user_id']=$user->id;
			}
			else return response()
				->json([
					'code'      =>  400,
					'message'   =>  'Quyền không hợp lệ!'
				], 400);
		}
		// check image and put job to driver
		$iamgeList;
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

		
		// check has update or store
		if ($request->has('id')) {
			$respon=ReportMarket::find($request->id)->update($data);
			return $respon;
		}
		$respon=ReportMarket::create($data);
		return $respon;
	}

}
