<?php
namespace App\Repositories\Impl;

use App\Repositories\AbstractRepository;
use App\ReportMarket;

class ReportMarketRepository extends  AbstractRepository {

    public function __construct()
    {
        parent::__construct(new ReportMarket());
    }

}

