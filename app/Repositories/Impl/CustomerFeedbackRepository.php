<?php


namespace App\Repositories\Impl;


use App\CustomerFeedback;
use App\Repositories\AbstractRepository;

class CustomerFeedbackRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct(new CustomerFeedback());
    }
}
