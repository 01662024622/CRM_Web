<?php


namespace App\Services\Impl;


use App\Repositories\Impl\CustomerFeedbackRepository;
use App\Services\CustomerFeedbackService;

class CustomerFeedbackServiceImpl implements CustomerFeedbackService
{
    protected $repository;
    public function __construct()
    {
        $this->repository = new CustomerFeedbackRepository();
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
        return $this->repository->show($id);
    }
}
