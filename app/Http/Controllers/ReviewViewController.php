<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResouceController;
use App\Services\ReviewService;

class ReviewViewController extends ResouceController
{
    function __construct(ReviewService $reviewService)
    {
        $this->middleware('auth');
        parent::__construct($reviewService, array('active' => 'report_review', 'group' => 'reports'));

    }

    public function feedbackMe()
    {
        return view("report_review.feedbackme",['active' => 'feedbackme','group'=>'reports']);
    }
    public function feedbackApartment(){
        return view("report_review.feedbackApartment",['active' => 'feedbackApartment','group'=>'reports']);
    }
}
