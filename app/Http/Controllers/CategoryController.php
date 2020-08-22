<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
	function __construct() {
		$this->middleware('admin');
	}
	public function index(){
		$categories = Category::all();
		return view('categories.index',['categories'=>$categories]);
	}


	public function show($id){
		$data=Category::find($id);
        // $categories=Category::orderBy('id','DESC')->get();
		return response()->json($data);
	}
	public function destroy($data){
        // Product::find($id);

		$data=Category::find($id)->delete();
		return response()->json($data);
	}

	public function store(Request $request) {
		$data=$request->only(['name', 'parent_id']);
		$data['slug']=Str::slug($data['name'], '-').time();

		$respon=Category::create($data);

		return $respon;

	}
	public function update(Request $request, $id) {
		$data=$request->only(['name', 'parent_id']);
		// return $data;
		$data['slug']=Str::slug($request->name, '-').time();
		$respon=Category::find($id)->update($data);
		return $respon;
	}

	public function post($slug){

		$products= Category::where('slug',$slug)->first();

	}
}
