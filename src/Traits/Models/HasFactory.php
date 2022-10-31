<?php

namespace Awesome\Foundation\Traits\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory as MainTrait;
use Illuminate\Support\Collection;

trait HasFactory
{
    use MainTrait;

    public static function createActiveList(int $count): Collection
    {
        return static::createList($count, ['is_active' => true]);
    }

    public static function createList(int $count, array $data = []): Collection
    {
        if (!static::factory()) {
            return collect();
        }

        return static::factory()->count($count)->create($data);
    }

    public static function createCustomList(array $data): Collection
    {
        if (!static::factory()) {
            return collect();
        }

        return static::factory()->createMany($data);
    }
}
