<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseApiRepository implements RepositoryInterface
{
    protected $modelClass = Model::class;

    /**
     * @param $model
     */
    public function __construct($model)
    {
        $this->modelClass = $model;
    }

    /**
     *
     */
    public function getModel()
    {
        return $this->modelClass;
    }

    /**
     * @return mixed
     */
    public function all(): mixed
    {
       return $this->getModel()::all();
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }
}
