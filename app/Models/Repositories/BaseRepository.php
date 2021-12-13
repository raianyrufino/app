<?php

namespace App\Models\Repositories;

abstract class BaseRepository
{
    protected $model;

    public function create($data)
    {
        return $this->model->create($data);   
    }

    public function findBy($field, $value)
    {   
        return $this->model->where($field, $value)->first();
    }

    public function delete($id)
    {
        return $this->model->whereId($id)->delete();
    }
}
