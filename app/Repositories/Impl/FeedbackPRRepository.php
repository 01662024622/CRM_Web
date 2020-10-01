<?php


namespace App\Repositories\Impl;


use App\FeedbackPR;
use App\Repositories\AbstractRepository;

class FeedbackPRRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct(new FeedbackPR());
    }
}
