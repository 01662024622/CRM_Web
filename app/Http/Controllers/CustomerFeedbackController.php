<?php

namespace App\Http\Controllers;

use App\B20Customer;
use App\Http\Controllers\Base\ResouceController;
use App\Services\CustomerFeedbackService;
use Illuminate\Http\Request;

class CustomerFeedbackController extends ResouceController
{
    function __construct(CustomerFeedbackService $service)
    {
        parent::__construct($service, array('active' => 'report_feedback', 'group' => 'manager'));
    }

    public function store(Request $request)
    {
        $data = $request->only(['customer_code', 'attitude', 'knowledge', 'time', 'cost', 'diversity', 'quality', 'note']);
         parent::storeArr($data);
       return view('feedback.success');
    }

    public function destroy($id)
    {
    }
    public function show($id)
    {
        if (B20Customer::where("Code",$id)->first())
            return "true";
        else return response()
            ->json([
                'code' => 400,
                'message' => 'Mã khách hàng không hợp lệ!'
            ], 400);
    }
    public function indexCode($code)
    {
        if ($code==""||is_null($code)){
            return view("errors.404");
        }
        if (!(B20Customer::where("Code",$code)->first())){
            return view("errors.404");
        }
        return view("feedback.custmerFeedback",["code"=>$code]);
    }
    public function index()
    {
        return $this->indexCode("");
    }

}
