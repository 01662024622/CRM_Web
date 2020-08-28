<?php
namespace App\Repositories\Impl;
use App\Feedback;
use App\Repositories\AbstractRepository;

class FeedbackRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct(new Feedback());
    }
}
