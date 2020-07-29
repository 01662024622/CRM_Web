<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    function __construct() {
		$this->middleware('manage');

	}

	public function index(){
		return view('users.index');
	}


	public function show($id){
		$data=User::find($id);
		return response()->json($data);
	}
	public function destroy($id){
		$data=User::find($id)->delete();
		return response()->json($data);
	}

	public function store(Request $request) {
		$data=$request->all();
		$data['password']=Hash::make($request->password);
		if ($request->has('id')) {
			$respon=User::find($request->id)->update($data);

			return $respon;
		}
		$respon=User::create($data);

		return $respon;

	}


	public function manageUser($slug){

		$products= Product::where('slug',$slug)->first();

	}
}
