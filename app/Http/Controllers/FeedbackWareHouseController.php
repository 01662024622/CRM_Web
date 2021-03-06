<?php

namespace App\Http\Controllers;

use App\FeedbackWarehouseImprove;
use App\Http\Controllers\Base\ResouceController;
use App\Improve360;
use App\ReviewIprove360;
use App\Services\FeedbackPRService;
use App\Services\FeedbackWarehouseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackWareHouseController extends ResouceController
{
    function __construct(FeedbackWarehouseService $service)
    {
        $this->middleware('auth');
        parent::__construct($service, array('active' => 'report_feedback', 'group' => 'manager'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id']=Auth::id();
        $feedback = parent::storeArr($data);
            if (array_key_exists("list", $data)){
                foreach ($data['list'] as $value) {
                    FeedbackWarehouseImprove::create(['improve_360_id'=>$value,'feedback_warehouse_id'=>$feedback->id]);
                }
            }
            if (array_key_exists("newreport", $data)){
                $improve = Improve360::create(['content'=> trim($data['newreport'])]);
                FeedbackWarehouseImprove::create(['improve_360_id'=>$improve->id,'feedback_warehouse_id'=>$feedback->id]);
            }
            return $feedback;
    }
}
