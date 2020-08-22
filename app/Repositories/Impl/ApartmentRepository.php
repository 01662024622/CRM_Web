<?php
namespace App\Repositories\Impl;

use App\Apartment;
use App\Repositories\AbstractRepository;

class ApartmentRepository extends  AbstractRepository {

  public function __construct()
  {
    parent::__construct(new Apartment());
  } 
  
}

