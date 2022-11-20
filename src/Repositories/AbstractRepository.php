<?php

namespace Awesome\Foundation\Repositories;

use Illuminate\Database\Eloquent\{Collection, Model};

abstract class AbstractRepository
{
    private Model $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Model
     */
    protected function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @return Collection
     */
    protected function getCollection(): Collection
    {
        return $this->getModel()->newCollection();
    }
}