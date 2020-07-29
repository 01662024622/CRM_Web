<?php

namespace App\Http\Controllers\DataApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\ReportMarket;
use DB;
use Carbon\Carbon;
class ReportMarketController extends Controller
{
	public function anyData(){
		$data = ReportMarket::select('report_markets.*','customers.name','customers.phone','customers.code','customers.address')->join('customers', 'report_markets.customer_id', '=', 'customers.id');
		
		// $products->user;
		return Datatables::of($data)
		->addColumn('action', function ($dt) {
			return'
			<button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getInfo('.$dt['id'].')" href="#add-modal"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button>
			<button type="button" class="btn btn-xs btn-danger" onclick="alDelete('.$dt['id'].')"><i class="fa fa-trash" aria-hidden="true"></i></button>
			';

		})
		->editColumn('created_at', function ($dt) {
			return Carbon::parse($dt['created_at'])->format('d/m/Y');
		})
		->setRowId('data-{{$id}}')
		->rawColumns(['action'])
		->make(true);
	}

	public function status(Request $request, $id){
		if (!in_array($request->role,$this->arrRole)) {
			return response()
			->json([
				'code'      =>  400,
				'message'   =>  'Cấp quyền không hợp lệ!'
			], 400);
		}
		$data=User::find($id)->update(array('role' => $request->role));
		return $data;
	}
}
