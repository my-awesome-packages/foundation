<?php

namespace Awesome\Foundation\Traits\Collections;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

trait Collectible
{
    protected function pluckUniqueAttr(Collection|EloquentCollection $collection, string $attr): array
    {
        return $collection->pluck($attr)->unique()->all();
    }
}
