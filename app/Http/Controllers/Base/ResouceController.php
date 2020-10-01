<?php
namespace App\Http\Controllers\Base;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Services\Service;

class ResouceController extends Controller
{
	protected $service;
	protected $table;
	function __construct(Service $service,array $arr) {
		$this->service = $service;
		foreach($arr as $key => $val) {
			View::share($key,$val);
		}
		$apartment = Apartment::where("user_id",Auth::id())->where("status",0)->get();
		View::share("apartment_user",$apartment);
		$this->table=$arr['active'];
	}
    protected function index(){
		return view($this->table.'.index');
	}

    protected function show($id){
		$data=$this->service->show($id);
		return response()->json($data);
	}
    protected function destroy($id){
		$data=$this->service->delete($id);
		return response()->json($data);
	}
//	protected function store(Request $request){
//        $data=$request->all();
//        return $this->storeArr($data);
//    }

    protected function storeArr(array $data) {
		$respon=$this->service->create($data);
		return $respon;

	}
}
