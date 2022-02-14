<?php declare(strict_types=1);

namespace App\Repositories;

abstract class BaseRepo
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass(): string;

    protected function startConditions()
    {
        return clone $this->model;
    }

    public function getById(int $id)
    {
        return $this->startConditions()->find($id);
    }

    public function getAll()
    {
        return $this->startConditions()->all();
    }
}
