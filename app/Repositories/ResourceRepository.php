<?php

namespace App\Repositories;

abstract class ResourceRepository
{

    protected $model;

    public function getPaginate($n)
    {
        return $this->model->paginate($n);
        //return $this->model->simplePaginate($n);
    }

    public function store(Array $inputs)
    {
        return $this->model->create($inputs); // verifier la méthode firstOrNew()
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $this->getById($id)->update($inputs);
    }

    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

}