<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResouceController;
use App\Services\FeedbackService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class FeedbackController extends ResouceController
{
    function __construct(FeedbackService $feedbackService) {
        $this->middleware('auth.api');
        parent::__construct($feedbackService, array('active' => 'report_feedback', 'group' => 'manager'));
    }
    public function store(Request $request)
    {
        $data = $request->only(['content','order', 'note']);
        $data['user_id'] = Auth::id();
        return parent::storeArr($data);
    }
}
