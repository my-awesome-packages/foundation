<?php

namespace Awesome\Foundation\Traits;

trait Resourceable
{
    protected function string($value): ?string
    {
        return (string)$value ?: null;
    }

    protected function int($value): ?int
    {
        if (is_numeric($value)) {
            return (int)$value;
        }

        return null;
    }

    protected function float($value): ?float
    {
        if (is_numeric($value)) {
            return (float)$value;
        }

        return null;
    }

    protected function bool($value): bool
    {
        return (bool)$value;
    }

    protected function array($items): array
    {
        return (array)$items;
    }
}