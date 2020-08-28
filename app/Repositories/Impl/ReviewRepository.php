<?php


namespace App\Repositories\Impl;


use App\Repositories\AbstractRepository;
use App\Review360;

class ReviewRepository extends  AbstractRepository {

    public function __construct()
    {
        parent::__construct(new Review360());
    }


}

