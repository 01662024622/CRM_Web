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
    public function warehouse(){
        return view("report_review.warehouse",['active' => 'warehouse','group'=>'reports']);
    }
    public function warehouseManager(){
        return view("report_review.warehouseManager",['active' => 'warehouseManager','group'=>'reports']);
    }
    public function publicRelationship(){
        return view("report_review.pr",['active' => 'pr','group'=>'reports']);
    }
    public function publicRelationshipManager(){
        return view("report_review.prmanager",['active' => 'prmanager','group'=>'reports']);
    }
    public function feedbackCustomer(){
        return view("report_review.feedbackCustomer",['active' => 'feedback_customer','group'=>'reports']);
    }
    public function feedbackCustomerManager(){
        return view("report_review.feedbackCustomerManager",['active' => 'feedback_customer_manager','group'=>'reports']);
    }



}
