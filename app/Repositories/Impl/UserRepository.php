<?php
namespace App\Repositories\Impl;
use App\Repositories\AbstractRepository;
use App\User;

class UserRepository extends AbstractRepository {

    public function __construct()
    {
        parent::__construct(new User());
    }

}

