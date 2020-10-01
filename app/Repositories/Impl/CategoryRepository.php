<?php


namespace App\Repositories\Impl;


use App\Category;
use App\Repositories\AbstractRepository;

class CategoryRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct(new Category());
    }
}
