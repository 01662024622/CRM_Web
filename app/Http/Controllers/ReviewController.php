<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Improve360;
use App\ReviewIprove360;
use App\Services\ApartmentService;
use App\Services\ReviewService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Base\ResouceController;

class ReviewController extends ResouceController
{
    function __construct(ReviewService $service) {
        $this->middleware('auth.api');
        parent::__construct($service, array('active' => 'report_review', 'group' => 'OKRs'));
        View::share("apartments",Apartment::where("status",0)->get());
    }


    public function index(){
        if (!Auth::check()) {
            return redirect('login');
        }elseif (Auth::user()->role!="admin") {
            return redirect('login');
        }
//        return view('report_market.index');
        return parent::index();
    }
    public function show($id){
        $data=User::where('apartment_id',$id)->where('role','<>','block')->where('status',0)->get();
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        if (array_key_exists("status", $data)) {
            return response()
                ->json([
                    'code' => 400,
                    'message' => 'Quyền không hợp lệ!'
                ], 400);
        }
        $data['create_by']=Auth::id();
        $review = parent::storeArr($data);
        if (array_key_exists("apartment_id", $data)) {
            if (array_key_exists("list", $data)){
                foreach ($data['list'] as $value) {
                    ReviewIprove360::create(['improve_360_id'=>$value,'review_360_id'=>$review->id]);
                }
            }
            if (array_key_exists("newreport", $data)){
                $improve = Improve360::create(['content'=> $data['newreport']]);
                ReviewIprove360::create(['improve_360_id'=>$improve->id,'review_360_id'=>$review->id]);
            }
            return $review;
        }else return $review;
    }

}
