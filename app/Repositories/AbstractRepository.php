<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Exception;

abstract class AbstractRepository implements RepositoryInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->where('status', 0)->get();
    }

    public function create(array $data)
    {
//      return $data;
        try {
            if (array_key_exists("id", $data)) {
                return $this->model->find($data["id"])->update($data);
            }
            return $this->model->create($data);
        } catch (Exception $e) {
            return response()
                ->json([
                    'code' => 502,
                    'message' => 'Dữ liệu không hợp lệ!',
                    'detail' => $e
                ], 502);
        }
    }

    public function update(array $data, $id)
    {
        return null;
    }

    public function delete($id)
    {
        return $this->model->find($id)->update(["status" => 1]);
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

}

