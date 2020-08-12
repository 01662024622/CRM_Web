<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Apartment;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
	function __construct() {
		$this->middleware('manage');

	}

	public function index(){
		$apartments = Apartment::all();
		return view('users.index',['apartments'=>$apartments]);
	}

	public function profile(){
		return view('users.profile');
	}

	public function show($id){
		$data=User::find($id);
		$data['birth_day'] = Carbon::parse($data['birth_day'])->format('d/m/Y');
		return response()->json($data);
	}
	public function destroy($id){
		$data=User::find($id)->delete();
		return response()->json($data);
	}

	public function store(Request $request) {
		$data=$request->all();
		$data['password']=Hash::make($request->password);
		$data['birth_day']=Carbon::createFromFormat('d/m/Y', $data['birth_day'])->format('Y/m/d');
		$tagname=(string)$this->getTagName($data['name']);
		$count=User::where('tagname', 'LIKE', $tagname.'%')->count();

		if ($count>0) {
			$tagname.=(string)$count;
		}
		$data['tagname']=$tagname;
		$data['email']=$tagname.'@htauto.com.vn';

		$data['authentication']=md5($tagname);

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

	private function getTagName($string){
		$parts=preg_split('/\s+/',strtolower($this->convert_vi_to_en(trim($string))));
		$firstString="";
		$count = count($parts);
		for($i=0;$i<($count-1);$i++){ 
			$firstString.=$parts[$i][0];
		}
		$tagname=$parts[($count-1)].$firstString;
		return $tagname;
	}
	private function convert_vi_to_en($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
		$str = preg_replace("/(đ)/", "d", $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
		$str = preg_replace("/(Đ)/", "D", $str);
      //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
		return $str;
	}
}
