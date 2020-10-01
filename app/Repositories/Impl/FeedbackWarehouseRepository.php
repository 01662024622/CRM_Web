<?php


namespace App\Repositories\Impl;


use App\FeedbackWarehouse;
use App\Repositories\AbstractRepository;

class FeedbackWarehouseRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct(new FeedbackWarehouse());
    }
}
