<?php

namespace App\Http\Controllers\DataApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Apartment;
use DB;

class ApartmentApiController extends Controller
{
	function __construct() {
		$this->middleware('admin');
	}
    public function anyData(Request $request){
		
		$data = Apartment::select('apartments.*');
	
		// $products->user;
		return Datatables::of($data)
		->addColumn('action', function ($dt) {
			return'
			<button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getInfo('.$dt['id'].')" href="#add-modal"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button>
			<button type="button" class="btn btn-xs btn-danger" onclick="alDelete('.$dt['id'].')"><i class="fa fa-trash" aria-hidden="true"></i></button>
			';
		})
		->setRowId('data-{{$id}}')
		->rawColumns(['action'])
		->make(true);
	}
}
