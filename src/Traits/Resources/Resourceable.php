<?php

namespace Awesome\Foundation\Traits\Resources;

use Carbon\Carbon;

trait Resourceable
{
    protected function string(mixed $value): ?string
    {
        return (string)$value ?: null;
    }

    protected function int(mixed $value): ?int
    {
        if (is_numeric($value)) {
            return (int)$value;
        }

        return null;
    }

    protected function float(mixed $value): ?float
    {
        if (is_numeric($value)) {
            return (float)$value;
        }

        return null;
    }

    protected function bool(mixed $value): bool
    {
        return (bool)$value;
    }

    protected function array(mixed $items): array
    {
        return (array)$items;
    }
    
    protected function timestamp(mixed $value): ?int
    {
        if (is_string($value)) {
            $value = (int)(new Carbon($value))->isoFormat('x');
        };

        return (int)$value ?: null;
    }
}
