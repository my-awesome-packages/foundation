<?php

namespace Awesome\Foundation\Traits\Arrays;

trait Arrayable
{
    protected function pluckUniqueColumn(array $array, string $column): array
    {
        return array_unique(array_column($array, $column));
    }
}
