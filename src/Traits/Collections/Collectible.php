<?php

namespace Awesome\Foundation\Traits\Collections;

use Illuminate\Support\Collection;

trait Collectible
{
    protected function pluckUniqueAttr(Collection $collection, string $attr): array
    {
        return $collection->pluck($attr)->unique()->all();
    }
}
