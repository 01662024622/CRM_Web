<?php


namespace App\Services\Impl;


use App\Repositories\Impl\ReviewRepository;
use App\Services\ReviewService;
use Carbon\Carbon;

class ReviewServiceImpl implements ReviewService
{
    protected $repository;
    public function __construct()
    {
        $this->repository = new ReviewRepository();
    }

    public function all() {
        return $this->repository->all();
    }

    public function create(array $data){

        return $this->repository->create($data);
    }

    public function update(array $data, $id){
        return null;
    }

    public function delete($id){
        $this->repository->delete($id);
    }

    public function show($id){
        $data = $this->repository->show($id);
        return $data;
    }

}
